<?php
class Report_print extends CI_Controller
{

	/* function Tutorial()
	{
		parent::Controller();		
		$this->load->helper('url');
	} */
	
	
	function index() 
	{	
		$this->load->helper('url');
		$this->hello_world();		
	}

	function hello_world()
	{
		$this->load->library('cezpdf');
		$this->load->helper('pdf');
		prep_pdf();

		$this->cezpdf->ezText('Hello World', 12, array('justification' => 'center'));
		$this->cezpdf->ezSetDy(-10);

		$content = 'The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog.
					Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs.';

		$this->cezpdf->ezText($content, 10);

		$this->cezpdf->ezStream();
	}	
	
	function tables()
	{
		$this->load->library('cezpdf');

		$db_data[] = array('name' => 'Jon Doe', 'phone' => '111-222-3333', 'email' => 'jdoe@someplace.com');
		$db_data[] = array('name' => 'Jane Doe', 'phone' => '222-333-4444', 'email' => 'jane.doe@something.com');
		$db_data[] = array('name' => 'Jon Smith', 'phone' => '333-444-5555', 'email' => 'jsmith@someplacepsecial.com');
		
		$col_names = array(
			'name' => 'Name',
			'phone' => 'Phone Number',
			'email' => 'E-mail Address'
		);
		
		$this->cezpdf->ezTable($table_data, $col_names, 'Contact List', array('width'=>550));
		$this->cezpdf->ezStream();
	}
	
	function report_transaction($from,$until,$resto=NULL)
	{
		$this->load->library('cezpdf');
		$this->load->helper('pdf');
        $this->load->library('session');
		$this->load->model('users_model', '', TRUE);		
		
		//$setting=$this->db->query("SELECT * from setting")->row();
		prep_pdf(); // creates the footer for the document we are creating.
		
		$grand=0;
		
		if($resto==NULL){
			$resto=$this->session->userdata('userID');
		}

		$query=$this->db->query("select a.id, a.dTglOrder, coalesce(a.iTax,0) iTax, coalesce(a.iBiayaAntar,0) iBiayaAntar, coalesce(e.iNominal,0) iNominal, a.cStatusTarik,
					a.cAntarBy,a.cVoucherCode,e.cJenisVoucher,c.cNama
				from trorders a
				left join msusers c
					on a.idRestoran=c.id
				left join msvouchers e 
					on a.cVoucherCode=e.cCode
				where a.dTglOrder>='".date('Y-m-d',strtotime($from))."' and a.dTglOrder<='".date('Y-m-d',strtotime($until))."' and
					a.cStatus='Y' and a.idRestoran='".$resto."'	
					and a.iStatusAntar=2 order by a.dTglOrder,a.id asc
		"); //and (a.cStatusTarik='".$status_tarik1."' or a.cStatusTarik='".$status_tarik2."')	
		
		$this->cezpdf->ezText('REPORT TRANSAKSI', 13, array('justification' => 'center'));	
		$this->cezpdf->ezText(date('d-m-Y',strtotime($from))." s/d ".date('d-m-Y',strtotime($until)), 11, array('justification' => 'center'));	
		$this->cezpdf->ezText('________________________________________________________________________________', 11, array('justification' => 'center'));		
		$this->cezpdf->ezText('', 11, array('justification' => 'center'));		
		
		foreach ($query->result_array() as $row_query){  	  
			$this->cezpdf->ezText('No Invoice : #'.$row_query['id'].'-'.date('Ymd',strtotime($row_query['dTglOrder'])).'       Tanggal Pesan : '.date('d-m-Y',strtotime($row_query['dTglOrder'])).'         Diantar Oleh : '.$row_query['cAntarBy'], 10, array('justification' => 'left'));			
			$this->cezpdf->ezText(' ', 10);
			
 			$detail=$this->db->query("select a.iJumlah,b.cNama,a.iHarga,a.iDiskon,a.cDesc,a.iMenuId,d.dTglOrder
				from trorderdetails a
				left join msmenurestos b
					on a.iMenuId = b.id
				left join trorders d
					on a.idOrders = d.id
				where a.idOrders=".$row_query['id']."
					and a.cStatus='Y'");
			
			/*
			LEFT JOIN (select cnoinvoice,ckdbarang,sum(ijumlah) jumlah_beli from tr_pembelian_detail where cstatus='Y' group by id,ckdbarang) a	ON x.ckodebarang = a.ckdbarang		
			LEFT JOIN (select id,id_beli_detail,sum(ijumlah) jumlah_jual from tr_penjualan_detail where cstatus='Y' group by id,id_beli_detail) b ON a.id = b.id_beli_detail
			LEFT JOIN (select id_beli_detail,sum(ijumlah) retur_beli from tr_retur_pembelian where cstatus='Y' group by id_beli_detail) c ON a.id = c.id_beli_detail
			LEFT JOIN (select id_jual_detail,sum(ijumlah) retur_jual from tr_retur_penjualan where cstatus='Y' group by id_jual_detail) d ON b.id = d.id_jual_detail
			*/
			
						
			$no=1;$subtotal=0;
			unset($db_data);
			unset($db_data_);
			
			foreach ($detail->result_array() as $row_detail){  	  
				if ($row_detail['iDiskon']>0)
					$diskon_ = $row_detail['iDiskon']/100;
				else
					$diskon_ = 1;

				$db_data[]=array('no' => $no,
								'menu' => $row_detail['cNama'], 
								'jumlah' => $row_detail['iJumlah'],
								'harga' => number_format($row_detail['iHarga'],0,',','.'),
								'diskon' => number_format($row_detail['iDiskon'],0,',','.'),
								'total'=> number_format($row_detail['iHarga']*$row_detail['iJumlah']*$diskon_,0,',','.')
								);
				$no=$no+1;
				$subtotal=$subtotal+($row_detail['iJumlah']*$row_detail['iHarga']*$diskon_);
			} 
			
			$col_names = array(
				'no' => 'No',
				'menu' => 'Menu',
				'jumlah' => 'Jumlah Pesan',
				'harga' => 'Harga per Item',
				'diskon' => 'Diskon (%)',
				'total' => 'Total',
				);
			$this->cezpdf->ezTable($db_data, $col_names, '', array('width'=>500,'showHeadings'=>1,'showLines'=> 1,'cols'=>array('no'=>array('width'=>'30'),'jumlah'=>array('justification'=>'right'),'harga'=>array('justification'=>'right'), 'diskon'=>array('justification'=>'center'),'total'=>array('justification'=>'right'))));
			
			$db_data_[]=array('no' => ' ','menu' => 'Sub Total', 'jumlah' => ' ','harga' => ' ', 'diskon' => ' ', 'total' => number_format($subtotal,0,',','.'));
			
			if($row_query['iTax']>0){
				$db_data_[]=array('no' => ' ',
								'menu' => 'PPN', 
								'jumlah' => ' ',
								'harga' =>' ',
								'diskon' =>' ',
								'total'=> number_format($row_query['iTax'],0,',','.'));
			}		
			/*			
			if($row_query['iBiayaAntar']>0){
				$db_data_[]=array('no' => ' ',
								'menu' => 'Jasa Layanan', 
								'jumlah' => ' ',
								'harga' =>' ',
								'diskon' =>' ',
								'total'=> number_format($row_query['iBiayaAntar'],0,',','.'));
			}
					
			
			$db_data_[]=array('no' => ' ','menu' => 'Total Biaya', 'jumlah' => ' ','harga' =>' ','diskon' => ' ','total'=> number_format($subtotal+$row_query['iTax']+$row_query['iBiayaAntar'],0,',','.'));
			
			if($row_query['cVoucherCode']<>""){
				$db_data_[]=array('no' => ' ',
								'menu' => 'Voucher ('.$row_query['cVoucherCode'].') - '.$row_query['cJenisVoucher'], 
								'jumlah' => ' ',
								'harga' =>' ',
								'diskon' =>' ',
								'total'=> number_format($row_query['iNominal'],0,',','.'));
			}			
			*/
			$total_bayar=$subtotal+$row_query['iTax'];//+$row_query['iBiayaAntar']-$row_query['iNominal'];
			if($total_bayar>=0)
				$bayar=$total_bayar;
			else
				$bayar=0;
			
			$grand = $grand + $bayar;
			
			$db_data_[]=array('no' => ' ',
				'menu' => 'TOTAL BAYAR', 
				'jumlah' => ' ',
				'harga' =>' ',
				'diskon' =>' ',
				'total'=> number_format($bayar,0,',','.'));
			
			$col_names_ = array(
				'no' => 'No',
				'menu' => 'Menu',
				'jumlah' => 'Jumlah Pesan',
				'harga' => 'Harga per Item',
				'diskon' =>' ',
				'total' => 'Total',
				);
			$this->cezpdf->ezTable($db_data_, $col_names_, '', array('width'=>500,'showHeadings'=>0,'showLines'=> 0,'shaded'=>0,'cols'=>array('no'=>array('width'=>'30'),'jumlah'=>array('justification'=>'right'),'total'=>array('justification'=>'right'))));		

			$this->cezpdf->ezText('________________________________________________________________________________', 11, array('justification' => 'center'));		
			$this->cezpdf->ezText(' ', 10);
			
 		}		
		
		$db_data1[]=array('no' => ' ',
				'menu' => 'TOTAL TRANSAKSI', 
				'jumlah' => ' ',
				'harga' =>' ',
				'diskon' =>' ',
				'total'=> number_format($grand,0,',','.'));
				
		IF($resto==5 || $resto==43 || $resto==42){		
		$db_data1[]=array('no' => ' ',
				'menu' => 'KOMISI (10 %)', 
				'jumlah' => ' ',
				'harga' =>' ',
				'diskon' =>' ',
				'total'=> number_format(0.1*$grand,0,',','.'));
		
		$db_data1[]=array('no' => ' ',
				'menu' => 'GRAND TOTAL', 
				'jumlah' => ' ',
				'harga' =>' ',
				'diskon' =>' ',
				'total'=> number_format($grand-(0.1*$grand),0,',','.'));		
		}
			
		$col_names1 = array(
			'no' => 'No',
			'menu' => 'Menu',
			'jumlah' => 'Jumlah Pesan',
			'harga' => 'Harga per Item',
			'diskon' =>' ',
			'total' => 'Total',
			);
		$this->cezpdf->ezTable($db_data1, $col_names1, '', array('width'=>500,'showHeadings'=>0,'showLines'=> 0,'shaded'=>0,'cols'=>array('no'=>array('width'=>'30'),'jumlah'=>array('justification'=>'right'),'total'=>array('justification'=>'right'))));		
		
		$this->cezpdf->ezText('________________________________________________________________________________', 11, array('justification' => 'center'));		

		$this->cezpdf->ezStream();
	}

	function invoice_transaction($id)
	{
		$this->load->library('cezpdf');
		$this->load->helper('pdf');
        $this->load->library('session');
		$this->load->model('users_model', '', TRUE);		
		
		prep_pdf_header(); // creates the footer for the document we are creating.

		$query = $this->db->query("select id,cNama,dTglOrder,cPayment,iTax+iBiayaAntar-iNominal as iTotal,
					iStatusAntar,cPayment,dJamTerima,iTax,iBiayaAntar,iNominal,cVoucherCode,
					cNamaCust,cEmailCust,cHpCust,cTelpCust,cAlamatCust,cWilayahCust,iJenisLokasiAntar,
					cNamaOneCust,cEmailOneCust,cHPOneCust,cTelpOneCust,cAlamatOneCust,cAlamatAntar,cDesc
				 from
				 (
					select a.id,c.cNama,a.dTglOrder,d.cPayment,a.iStatusAntar,f.cNama as cNamaCust,
						f.cEmail as cEmailCust, h.cHp  as cHpCust, h.cTelp as cTelpCust, h.cAlamat as cAlamatCust, i.cWilayah as cWilayahCust,
						g.cNama as cNamaOneCust, g.cEmail as cEmailOneCust, g.cHP  as cHPOneCust, g.cTelp  as cTelpOneCust, g.cAlamat as cAlamatOneCust,
						a.iJenisLokasiAntar,a.cAlamatAntar,a.cDesc,a.dJamTerima,a.cVoucherCode,
						sum(coalesce(a.iTax,0)) iTax,sum(coalesce(a.iBiayaAntar,0)) iBiayaAntar,sum(coalesce(e.iNominal,0)) iNominal
					from trorders a					
					left join msusers c
						on a.idRestoran=c.id
					left join mspaymentmethods d
						on a.iPaymentId=d.id
					left join msvouchers e 
						on a.cVoucherCode=e.cCode
					left join msusers f
						on a.idCust=f.id
					left join msonestop_cust g
						on a.idOneStop=g.id	
					left join mscustprofiles h
						on f.id=h.iUsers
					left join mswilayahs i
						on h.cWilayah=i.id
					where a.cStatus='Y'
					group by a.id,c.cNama,a.dTglOrder,d.cPayment,a.iStatusAntar,f.cNama,g.cNama, f.cEmail,h.cHp,a.cDesc,a.dJamTerima,
						h.cTelp,h.cAlamat,i.cWilayah,g.cEmail,g.cHP,g.cTelp,g.cAlamat,a.iJenisLokasiAntar,a.cAlamatAntar,a.cVoucherCode
				)a 
				where a.id=".$id."
				order by a.dTglOrder desc, a.id desc")->row(); 	
		
		$this->cezpdf->ezText('', 12, array('justification' => 'center'));	
		$this->cezpdf->ezText('ORDER INVOICE', 13, array('justification' => 'center'));	
		$this->cezpdf->ezText(' ', 2);
		$this->cezpdf->ezText("No : #".$query->id."-".date('Ymd',strtotime($query->dTglOrder)), 11, array('justification' => 'center'));	
		$this->cezpdf->ezText('________________________________________________________________________________', 11, array('justification' => 'center'));		
		$this->cezpdf->ezText('', 11, array('justification' => 'center'));				
		
		if ($query->cNamaCust=="")
			$nama = $query->cNamaOneCust;
		else
			$nama = $query->cNamaCust;
			
		if ($query->cNamaOneCust!="")
			$alamat = $query->cAlamatOneCust;
		else{
			if($query->iJenisLokasiAntar==1) //terdaftar
				$alamat = $query->cAlamatCust." - ".$query->cWilayahCust;
			elseif ($query->iJenisLokasiAntar==2) //alamat baru
				$alamat = $query->cAlamatAntar;
		}
		
		$db_data1[]=array(
			'nama' => 'Customer',
			'alamat' => $nama,
			'hp' => 'Alamat',
			'telp' => $alamat		
		);
		
		$col_names1 = array(
			'nama' => 'Customer',
			'alamat' => 'Alamat',
			'hp' => 'HP',
			'telp' => 'Telp'
		);	

		$this->cezpdf->ezTable($db_data1, $col_names1, '', array('width'=>500,'showHeadings'=>0,'showLines'=>0,'fontSize' => 11,'cols'=>array('nama'=>array('width'=>70),'alamat'=>array('width'=>140),'hp'=>array('width'=>70),'telp'=>array('justification'=>'left','width'=>200))));				
		
		if ($query->cHpCust=="")
			$HP = $query->cHPOneCust;
		else
			$HP = $query->cHpCust;

		if ($query->cTelpCust=="")
			$telp = $query->cTelpOneCust;
		else
			$telp = $query->cTelpCust;
		
		$db_data2[]=array(
			'nama' => 'HP',
			'alamat' => $HP,
			'hp' => 'Telp',
			'telp' => $telp
		);
		
		$col_names2 = array(
			'nama' => 'Customer',
			'alamat' => 'Alamat',
			'hp' => 'HP',
			'telp' => 'Telp'
		);			

		$this->cezpdf->ezTable($db_data2, $col_names2, '', array('width'=>500,'showHeadings'=>0,'showLines'=>0,'fontSize' => 11,'cols'=>array('nama'=>array('width'=>70),'alamat'=>array('width'=>140),'hp'=>array('width'=>70),'telp'=>array('justification'=>'left','width'=>200))));				

		$db_data3[]=array(
			'nama' => 'Jam Terima',
			'alamat' => date('d-m-Y H:i',strtotime($query->dJamTerima)),
			'hp' => 'Restoran',
			'telp' => $query->cNama
		);
		
		$col_names3 = array(
			'nama' => 'Customer',
			'alamat' => 'Alamat',
			'hp' => 'HP',
			'telp' => 'Telp'
		);	

		$this->cezpdf->ezTable($db_data3, $col_names3, '', array('width'=>500,'showHeadings'=>0,'showLines'=>0,'fontSize' => 11,'cols'=>array('nama'=>array('width'=>70),'alamat'=>array('width'=>140),'hp'=>array('width'=>70),'telp'=>array('justification'=>'left','width'=>200))));				

		$detail = $this->db->query("select b.* 
			from trorders a
			left join
			(
				select a.idOrders, a.iMenuId, a.iJumlah, a.iHarga, a.iDiskon, a.cDesc, b.cNama
				from trorderdetails a
				left join msmenurestos b
					on a.iMenuid=b.id
				where a.cStatus='Y'
			)b 
				on a.id=b.idOrders
			where a.cStatus='Y' and a.iStatusAntar=1 and a.id=".$id);

		$no=1;$subtotal=0;
		
		foreach ($detail->result_array() as $row_detail){  	  
			if ($row_detail['iDiskon']>0)
				$diskon_ = $row_detail['iDiskon']/100;
			else
				$diskon_ = 1;

			$db_data[]=array('no' => $no,
							'menu' => $row_detail['cNama'], 
							'jumlah' => $row_detail['iJumlah'],
							'harga' => number_format($row_detail['iHarga'],0,',','.'),
							'diskon' => number_format($row_detail['iDiskon'],0,',','.'),
							'total'=> number_format($row_detail['iHarga']*$row_detail['iJumlah']*$diskon_,0,',','.')
							);
			$no=$no+1;
			$subtotal=$subtotal+($row_detail['iJumlah']*$row_detail['iHarga']*$diskon_);
		} 
		
		$col_names = array(
			'no' => 'No',
			'menu' => 'Menu',
			'jumlah' => 'Jumlah Pesan',
			'harga' => 'Harga per Item',
			'diskon' => 'Diskon (%)',
			'total' => 'Total',
			);
			
		$this->cezpdf->ezText(' ', 7);
		$this->cezpdf->ezTable($db_data, $col_names, '', array('width'=>480,'showHeadings'=>1,'showLines'=> 1,'fontSize' => 11,'shaded'=> 0,'cols'=>array('no'=>array('width'=>'30'),'jumlah'=>array('justification'=>'right'),'harga'=>array('justification'=>'right'), 'diskon'=>array('justification'=>'center'),'total'=>array('justification'=>'right'))));
		
		$db_data_[]=array('no' => ' ','menu' => 'Sub Total', 'jumlah' => ' ','harga' => ' ', 'diskon' => ' ', 'total' => number_format($subtotal,0,',','.'));
		
		if($query->iTax>0){
			$db_data_[]=array('no' => ' ',
							'menu' => 'PPN', 
							'jumlah' => ' ',
							'harga' =>' ',
							'diskon' =>' ',
							'total'=> number_format($query->iTax,0,',','.'));
		}	
		
		if($query->iBiayaAntar>0){
			$db_data_[]=array('no' => ' ',
							'menu' => 'Jasa Layanan', 
							'jumlah' => ' ',
							'harga' =>' ',
							'diskon' =>' ',
							'total'=> number_format($query->iBiayaAntar,0,',','.'));
		}		
	
	
		$db_data_[]=array('no' => ' ','menu' => 'Total Biaya', 'jumlah' => ' ','harga' =>' ','diskon' => ' ','total'=> number_format($subtotal+$query->iTax+$query->iBiayaAntar,0,',','.'));
	
		if($query->cVoucherCode<>""){
			$db_data_[]=array('no' => ' ',
							'menu' => 'Voucher ( '.$query->cVoucherCode.' )', 
							'jumlah' => ' ',
							'harga' =>' ',
							'diskon' =>' ',
							'total'=> number_format($query->iNominal,0,',','.'));
		}
		
		$tambahan=0;
		
		
		if(strpos($alamat,'lainnya') !== false){
			$tambahan=3000;
			$db_data_[]=array('no' => ' ',
							'menu' => 'Biaya Tambahan', 
							'jumlah' => ' ',
							'harga' =>' ',
							'diskon' =>' ',
							'total'=> number_format($tambahan,0,',','.'));			
		}					
		
		$total_bayar=$subtotal+$query->iTax+$query->iBiayaAntar-$query->iNominal+$tambahan;
		if($total_bayar>=0)
			$bayar=$total_bayar;
		else
			$bayar=0;
			
		$db_data_[]=array('no' => ' ',
			'menu' => 'TOTAL PEMBAYARAN', 
			'jumlah' => ' ',
			'harga' =>' ',
			'diskon' =>' ',
			'total'=> number_format($bayar,0,',','.'));

		
		$col_names_ = array(
			'no' => 'No',
			'menu' => 'Menu',
			'jumlah' => 'Jumlah Pesan',
			'harga' => 'Harga per Item',
			'diskon' =>' ',
			'total' => 'Total',
			);
		$this->cezpdf->ezTable($db_data_, $col_names_, '', array('width'=>480,'showHeadings'=>0,'showLines'=> 0,'shaded'=>0,'fontSize' => 11,'cols'=>array('no'=>array('width'=>'30'),'jumlah'=>array('justification'=>'right'),'total'=>array('justification'=>'right'))));		

		$this->cezpdf->ezText('________________________________________________________________________________', 11, array('justification' => 'center'));		
		$this->cezpdf->ezText(' ', 45);
		
		$db_data_1[]=array(
			'menu' => $this->session->userdata('cNama'), 
			'harga' =>'',
			'total'=> '');

		$db_data_1[]=array(
			'menu' => '----------------------', 
			'harga' =>'----------------------',
			'total'=> '----------------------');
			
		$db_data_1[]=array(
			'menu' => 'Saungsaji', 
			'harga' =>'Restoran',
			'total'=> 'Customer');
		
		$col_names_1 = array(
			'menu' => 'Menu',
			'harga' => 'Harga per Item',
			'total' => 'Total',
			);
		$this->cezpdf->ezTable($db_data_1, $col_names_1, '', array('width'=>450,'showHeadings'=>0,'showLines'=> 0,'shaded'=>0,'fontSize' => 11,'cols'=>array('menu'=>array('width'=>'150','justification'=>'center'),'harga'=>array('width'=>'150','justification'=>'center'),'total'=>array('width'=>'150','justification'=>'center'))));		
		
		$this->cezpdf->ezStream();
	}
	
	function report_all_transaction($from,$until)
	{
		$this->load->library('cezpdf');
		$this->load->helper('pdf');
        $this->load->library('session');
		$this->load->model('users_model', '', TRUE);		
		
		//$setting=$this->db->query("SELECT * from setting")->row();
		prep_pdf(); // creates the footer for the document we are creating.
		$grand=0;
		
		$query=$this->db->query("select a.id, a.dTglOrder, coalesce(a.iTax,0) iTax, coalesce(a.iBiayaAntar,0) iBiayaAntar, 
					coalesce(e.iNominal,0) iNominal, a.cStatusTarik,
					a.cAntarBy,a.cVoucherCode,e.cJenisVoucher,c.cNama
				from trorders a
				left join msusers c
					on a.idRestoran=c.id
				left join msvouchers e 
					on a.cVoucherCode=e.cCode
				where a.dTglOrder>='".date('Y-m-d',strtotime($from))."' and a.dTglOrder<='".date('Y-m-d',strtotime($until))."' and
					a.cStatus='Y' 	
					and a.iStatusAntar=2 order by a.dTglOrder,a.id asc
		"); //and (a.cStatusTarik='".$status_tarik1."' or a.cStatusTarik='".$status_tarik2."')	
		
		$this->cezpdf->ezText('REPORT TRANSAKSI', 13, array('justification' => 'center'));	
		$this->cezpdf->ezText(date('d-m-Y',strtotime($from))." s/d ".date('d-m-Y',strtotime($until)), 11, array('justification' => 'center'));	
		$this->cezpdf->ezText('________________________________________________________________________________', 11, array('justification' => 'center'));		
		$this->cezpdf->ezText('', 11, array('justification' => 'center'));		
		
		foreach ($query->result_array() as $row_query){  	  
			$this->cezpdf->ezText('No Invoice : #'.$row_query['id'].'-'.date('Ymd',strtotime($row_query['dTglOrder'])).'       Tanggal Pesan : '.date('d-m-Y',strtotime($row_query['dTglOrder'])).'         Diantar Oleh : '.$row_query['cAntarBy'], 10, array('justification' => 'left'));			
			$this->cezpdf->ezText(' ', 10);
			
 			$detail=$this->db->query("select a.iJumlah,b.cNama,a.iHarga,a.iDiskon,a.cDesc,a.iMenuId,d.dTglOrder
				from trorderdetails a
				left join msmenurestos b
					on a.iMenuId = b.id
				left join trorders d
					on a.idOrders = d.id
				where a.idOrders=".$row_query['id']."
					and a.cStatus='Y'");
			
			/*
			LEFT JOIN (select cnoinvoice,ckdbarang,sum(ijumlah) jumlah_beli from tr_pembelian_detail where cstatus='Y' group by id,ckdbarang) a	ON x.ckodebarang = a.ckdbarang		
			LEFT JOIN (select id,id_beli_detail,sum(ijumlah) jumlah_jual from tr_penjualan_detail where cstatus='Y' group by id,id_beli_detail) b ON a.id = b.id_beli_detail
			LEFT JOIN (select id_beli_detail,sum(ijumlah) retur_beli from tr_retur_pembelian where cstatus='Y' group by id_beli_detail) c ON a.id = c.id_beli_detail
			LEFT JOIN (select id_jual_detail,sum(ijumlah) retur_jual from tr_retur_penjualan where cstatus='Y' group by id_jual_detail) d ON b.id = d.id_jual_detail
			*/
			
						
			$no=1;$subtotal=0;
			unset($db_data);
			unset($db_data_);
			
			foreach ($detail->result_array() as $row_detail){  	  
				if ($row_detail['iDiskon']>0)
					$diskon_ = $row_detail['iDiskon']/100;
				else
					$diskon_ = 1;

				$db_data[]=array('no' => $no,
								'menu' => $row_detail['cNama'], 
								'jumlah' => $row_detail['iJumlah'],
								'harga' => number_format($row_detail['iHarga'],0,',','.'),
								'diskon' => number_format($row_detail['iDiskon'],0,',','.'),
								'total'=> number_format($row_detail['iHarga']*$row_detail['iJumlah']*$diskon_,0,',','.')
								);
				$no=$no+1;
				$subtotal=$subtotal+($row_detail['iJumlah']*$row_detail['iHarga']*$diskon_);
			} 
			
			$col_names = array(
				'no' => 'No',
				'menu' => 'Menu',
				'jumlah' => 'Jumlah Pesan',
				'harga' => 'Harga per Item',
				'diskon' => 'Diskon (%)',
				'total' => 'Total',
				);
			$this->cezpdf->ezTable($db_data, $col_names, '', array('width'=>500,'showHeadings'=>1,'showLines'=> 1,'cols'=>array('no'=>array('width'=>'30'),'jumlah'=>array('justification'=>'right'),'harga'=>array('justification'=>'right'), 'diskon'=>array('justification'=>'center'),'total'=>array('justification'=>'right'))));
			
			$db_data_[]=array('no' => ' ','menu' => 'Sub Total', 'jumlah' => ' ','harga' => ' ', 'diskon' => ' ', 'total' => number_format($subtotal,0,',','.'));
			
			if($row_query['iTax']>0){
				$db_data_[]=array('no' => ' ',
								'menu' => 'PPN', 
								'jumlah' => ' ',
								'harga' =>' ',
								'diskon' =>' ',
								'total'=> number_format($row_query['iTax'],0,',','.'));
			}		
			
			if($row_query['iBiayaAntar']>0){
				$db_data_[]=array('no' => ' ',
								'menu' => 'Jasa Layanan', 
								'jumlah' => ' ',
								'harga' =>' ',
								'diskon' =>' ',
								'total'=> number_format($row_query['iBiayaAntar'],0,',','.'));
			}		
			
			$db_data_[]=array('no' => ' ','menu' => 'Total Biaya', 'jumlah' => ' ','harga' =>' ','diskon' => ' ','total'=> number_format($subtotal+$row_query['iTax']+$row_query['iBiayaAntar'],0,',','.'));
		
			if($row_query['cVoucherCode']<>""){
				$db_data_[]=array('no' => ' ',
								'menu' => 'Voucher ('.$row_query['cVoucherCode'].') - '.$row_query['cJenisVoucher'], 
								'jumlah' => ' ',
								'harga' =>' ',
								'diskon' =>' ',
								'total'=> number_format($row_query['iNominal'],0,',','.'));
			}			
			
			$total_bayar=$subtotal+$row_query['iTax']+$row_query['iBiayaAntar']-$row_query['iNominal'];
			if($total_bayar>=0)
				$bayar=$total_bayar;
			else
				$bayar=0;
				
			$grand = $grand + $bayar;
				
			$db_data_[]=array('no' => ' ',
				'menu' => 'TOTAL BAYAR ', 
				'jumlah' => ' ',
				'harga' =>' ',
				'diskon' =>' ',
				'total'=> number_format($bayar,0,',','.'));

			
			$col_names_ = array(
				'no' => 'No',
				'menu' => 'Menu',
				'jumlah' => 'Jumlah Pesan',
				'harga' => 'Harga per Item',
				'diskon' =>' ',
				'total' => 'Total',
				);
			$this->cezpdf->ezTable($db_data_, $col_names_, '', array('width'=>500,'showHeadings'=>0,'showLines'=> 0,'shaded'=>0,'cols'=>array('no'=>array('width'=>'30'),'jumlah'=>array('justification'=>'right'),'total'=>array('justification'=>'right'))));		

			$this->cezpdf->ezText('________________________________________________________________________________', 11, array('justification' => 'center'));		
			$this->cezpdf->ezText(' ', 10);
			
 		}		
		
		$db_data1[]=array('no' => ' ',
				'menu' => 'GRAND TOTAL', 
				'jumlah' => ' ',
				'harga' =>' ',
				'diskon' =>' ',
				'total'=> number_format($grand,0,',','.'));

			
		$col_names1 = array(
			'no' => 'No',
			'menu' => 'Menu',
			'jumlah' => 'Jumlah Pesan',
			'harga' => 'Harga per Item',
			'diskon' =>' ',
			'total' => 'Total',
			);
		$this->cezpdf->ezTable($db_data1, $col_names1, '', array('width'=>500,'showHeadings'=>0,'showLines'=> 0,'shaded'=>0,'cols'=>array('no'=>array('width'=>'30'),'jumlah'=>array('justification'=>'right'),'total'=>array('justification'=>'right'))));		
		
		$this->cezpdf->ezText('________________________________________________________________________________', 11, array('justification' => 'center'));		
				
		$this->cezpdf->ezStream();
	}

	
}
?>