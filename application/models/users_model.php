<?php
class Users_Model extends CI_Model{

    function  __construct() {
        parent::__construct();
		$this->load->helper('security');
    }	

    function add_user($type=NULL,$pass=NULL){
        $user_array=$this->db->get('msusers')->result_array();
        if(in_array($this->input->post('email',TRUE), $user_array)){
            return false;
        }

        $data_common=array(
			'cNama'=>$this->input->post('name',TRUE),
            'cEmail'=>$this->input->post('email',TRUE),
            'cPassword'=>md5($pass),//$this->session->userdata('session_id')
            'iGroupAccess'=>$type,
			'cStatus'=>'Y',			
            'dCreated'=>date('Y-m-d H:i:s')
        );		
        $this->db->insert('msusers', $data_common);
		
        $_new_user = mysql_insert_id();
		
		if($type==1)
		{
			$data=array(
					'iUsers'=>mysql_insert_id(),					
					'cAlamat'=>$this->input->post('alamat',TRUE),
					'cWilayah'=>$this->input->post('region',TRUE),
					'cHp'=>$this->input->post('hp',TRUE),
					'cTelp'=>$this->input->post('telp',TRUE)
				);
			$this->db->insert('mscustprofiles', $data);
		}
		else if	($type==2)
		{
			$data=array(
					'iUsers'=>mysql_insert_id()
				);
			$this->db->insert('msrestprofiles', $data);
		}

        if(mysql_errno()==0){
            //$this->send_mail($_new_user);
            return true;
        }
        else return false;
    }
	
    function get_user(){
		$this->db->select('a.id,a.cNama,a.cEmail,c.cGroupName');
		$this->db->from('msusers a');
		$this->db->join('msgroupaccesses c', 'a.iGroupAccess= c.id');
		$this->db->where('a.cEmail', $this->input->post('email',TRUE)); 
		$this->db->where('a.cPassword', md5($this->input->post('password',TRUE))); 
		$this->db->where('a.cStatus', 'Y'); 
		$this->db->where('c.cStatus', 'Y'); 
        $query=$this->db->get();		

       	if($query->num_rows() > 0){
            return $query->row_array();
        }
        else return null;
    }
	
    function get_user_by_email(){
		$this->db->select('a.id,a.cNama,a.cEmail,c.cGroupName');
		$this->db->from('msusers a');
		$this->db->join('msgroupaccesses c', 'a.iGroupAccess= c.id');
		$this->db->where('a.cEmail', $this->input->post('email',TRUE)); 
		$this->db->where('a.cStatus', 'Y'); 
		$this->db->where('c.cStatus', 'Y'); 
        $query=$this->db->get();		

       	if($query->num_rows() > 0){
            return $query->row_array();
        }
        else return null;
    }

	
	function get_all_menu($idR=NULL,$perpage=NULL,$position=NULL,$wilayah=NULL,$harga=NULL,$menu=NULL,$kat=NULL,$new=NULL,$deal=NULL){	         
 		$this->db->distinct();	
		if($deal=="Y"){		
			$this->db->select('a.id,a.cNama,a.cImageThumb,d.iHarga,c.cNama as cNamaResto,b.cStatusOpen,b.iUsers,g.iHargaDeal,g.cStatusCharge');
		}
		else{
			$this->db->select('a.id,a.cNama,a.cImageThumb,d.iHarga,c.cNama as cNamaResto,b.cStatusOpen,b.iUsers');
		}
		$this->db->from('msmenurestos a');
		$this->db->join('msrestprofiles b', 'a.idRestoran= b.id');
		$this->db->join('msusers c', 'b.iUsers= c.id');
		$this->db->join('mshargamenus d', 'a.id= d.idMenu');				
		if($wilayah>0){		
			$this->db->join('mspengantarans e', 'b.iUsers= e.idRestoran');
			$this->db->where('e.cStatus', 'Y');
			$this->db->where('e.idWilayah', $wilayah);
		}
		
		if($harga>0){
			$this->db->join('msharga f', 'f.iStartHarga <= d.iHarga AND f.iEndHarga >= d.iHarga');
			$this->db->where('f.cStatus', 'Y');
			$this->db->where('f.id', $harga);
		}
		
		if($menu!=""){
			$this->db->like('a.cNama', $menu); 		
		}
		
		if($kat==1){
			$this->db->where('a.iKategori', $kat); 		
		}		
		
		if($new!=NULL){
			$this->db->where('a.cStatusNew', $new); 		
		}	
		
		if($deal=="Y"){		
			$this->db->join('trdeals g', 'a.id = g.iMenuId');
			$this->db->where('g.dStartBerlaku <=', date('Y-m-d')); 
			$this->db->where('g.dEndBerlaku >=', date('Y-m-d')); 
		}	
		
		if($deal=="N"){
			$query=$this->db->query("select * from trdeals  									
									where dStartBerlaku <= '".date('Y-m-d')."' and dEndBerlaku >= '".date('Y-m-d')."'")->row();
									
			if($query){
				$this->db->where_not_in('a.id', $query->iMenuId); 
			}
		}	

	 	if($this->session->userdata('crandom')==1)	
			$this->db->order_by("a.id", "asc"); 
		elseif ($this->session->userdata('crandom')==2)	
			$this->db->order_by("a.id", "desc"); 
		elseif ($this->session->userdata('crandom')==3)	
			$this->db->order_by("a.cNama", "asc"); 
		elseif ($this->session->userdata('crandom')==4)	
			$this->db->order_by("a.cNama", "desc"); 
		elseif ($this->session->userdata('crandom')==5)	
			$this->db->order_by("a.cImageThumb", "asc"); 
		else
			$this->db->order_by("a.cImageThumb", "desc"); 

		$this->db->where('a.cStatus', 'Y'); 
		$this->db->where('c.cStatus', 'Y'); 
		$this->db->where('d.cStatus', 'Y'); 
		$this->db->where('d.dStartBerlaku <=', date('Y-m-d')); 		
		$this->db->where('d.dEndBerlaku >=', date('Y-m-d')); 						
		
		if($idR>0)
			$this->db->where('c.id', $idR); 
		//$this->db->order_by("a.cNama", "desc"); 		
		if($perpage!=NULL)
			$this->db->limit($perpage, $position);			
        return $this->db->get();
    }
	
	function get_menu_by_name($id=NULL){
		$this->db->distinct();
		$this->db->select('cNama');
		$this->db->from('msmenurestos');
		$this->db->where('cStatus', 'Y'); 
		$this->db->like('cNama', $id); 		
		$this->db->order_by("cNama", "asc"); 
        return $this->db->get();
    }

	function get_all_restoran(){
		$this->db->select('a.*,b.cStatusOpen,b.cImage');
		$this->db->from('msusers a');
		$this->db->join('msrestprofiles b', 'a.id= b.iUsers');
		$this->db->where('a.cStatus', 'Y'); 
		$this->db->where('a.iGroupAccess', 2); 
		$this->db->order_by("cNama", "asc"); 
        return $this->db->get();
    }

	function get_all_wilayah($id=NULL){
		$this->db->select('id, cWilayah');
		$this->db->from('mswilayahs a');
		if($id!=NULL){
			$this->db->where('a.id', $id); 
		}
		$this->db->where('a.cStatus', 'Y'); 
		$this->db->order_by("cWilayah", "asc"); 
        return $this->db->get();
    }

	function get_all_harga(){
		$this->db->select('id, iStartHarga, iEndHarga');
		$this->db->from('msharga a');
		$this->db->where('a.cStatus', 'Y'); 
		$this->db->order_by("iStartHarga", "asc"); 
        return $this->db->get();
    }

	////====================== perbaikan query harga berdasarkan tanggal berlaku ===================//////////////////////
	function get_menu_detail($resto_name,$menu_name,$deal=NULL){
		/*
		$query=$this->db->query("select a.id,a.cNama,a.cImageLarge,a.cImageThumb,coalesce(d.iHarga,0) iHarga,c.cNama as cNamaResto,b.iMinOrder,b.iCharge, 
									c.id as iRestoId,b.id as idRestoProfile
									from msmenurestos a
									left join msrestprofiles b on a.idRestoran= b.id
									left join msusers on c b.iUsers= c.id
									left join 
									(	
										select *
										from mshargamenus  									
										where dStartBerlaku <= '".date('Y-m-d')."' and dEndBerlaku >= '".date('Y-m-d')."'										
											and cStatus='Y'
									)d
										on a.id= d.idMenu 
									where a.cStatus='Y' and a.idRestoran='".$id."' and b.cStatusOpen='Y' 
										and	replace(c.cNama , " ","") = '".$resto_name."' and replace(a.cNama , " ","") = '".$menu_name."'
									order by a.id
								");
		return $query;
		*/
		if($deal!=NULL){
			$this->db->select('a.id,a.cNama,a.cImageThumb,d.iHarga,c.cNama as cNamaResto,c.id as iRestoId,b.id as idRestoProfile,g.iHargaDeal,g.cStatusCharge,g.cDealBy');
		}
		else{
			$this->db->select('a.id,a.cNama,a.cImageThumb,d.iHarga,c.cNama as cNamaResto,c.id as iRestoId,b.id as idRestoProfile');
		}
		$this->db->from('msmenurestos a');
		$this->db->join('msrestprofiles b', 'a.idRestoran= b.id');
		$this->db->join('msusers c', 'b.iUsers= c.id');		
		$this->db->join('mshargamenus d', 'a.id= d.idMenu');
		if($deal!=NULL){
			$this->db->join('trdeals g', 'a.id = g.iMenuId');
			$this->db->where('g.dStartBerlaku <=', date('Y-m-d')); 
			$this->db->where('g.dEndBerlaku >=', date('Y-m-d')); 
		}
		$this->db->where('replace(c.cNama , " ","")=', $resto_name); 				
		$this->db->where('replace(a.cNama , " ","")=', $menu_name); 
		$this->db->where('a.cStatus', 'Y'); 
		$this->db->where('c.cStatus', 'Y'); 
		$this->db->where('b.cStatusOpen', 'Y'); 
		$this->db->where('d.cStatus', 'Y'); 
		$this->db->where('d.dStartBerlaku <=', date('Y-m-d')); 
		$this->db->where('d.dEndBerlaku >=', date('Y-m-d')); 
        return $this->db->get();		
    }
	
	function get_pengantaran_byname($resto_name){
		/*
		$query=$this->db->query("select a.id,a.cNama,a.cImageLarge,a.cImageThumb,coalesce(d.iHarga,0) iHarga,c.cNama as cNamaResto,b.iMinOrder,b.iCharge, 
									c.id as iRestoId,b.id as idRestoProfile
									from msmenurestos a
									left join msrestprofiles b on a.idRestoran= b.id
									left join msusers on c b.iUsers= c.id
									left join 
									(	
										select *
										from mshargamenus  									
										where dStartBerlaku <= '".date('Y-m-d')."' and dEndBerlaku >= '".date('Y-m-d')."'										
											and cStatus='Y'
									)d
										on a.id= d.idMenu 
									where a.cStatus='Y' and a.idRestoran='".$id."' and b.cStatusOpen='Y' 
										and	replace(c.cNama , " ","") = '".$resto_name."' and replace(a.cNama , " ","") = '".$menu_name."'
									order by a.id
								");
		return $query;
		*/
		
		$this->db->select('c.cWilayah');
		$this->db->from('mspengantarans a');		
		$this->db->join('msusers b', 'a.idRestoran= b.id');		
		$this->db->join('mswilayahs c', 'a.idWilayah= c.id');		
		$this->db->where('replace(b.cNama , " ","")=', $resto_name); 				
		$this->db->where('a.cStatus', 'Y'); 
		$this->db->where('c.cStatus', 'Y'); 
        return $this->db->get();		
    }
	
	function get_restoran($id){
		$this->db->select('a.id,c.cNama,a.cHp,a.cTelp,a.iMinOrder,a.iCharge,a.cStatusOpen,a.cStatusAntar,a.cStatusTax,a.cImage');
		$this->db->from('msrestprofiles a');
		$this->db->join('msmenurestos b', 'a.id = b.idrestoran');
		$this->db->join('msusers c', 'a.iUsers= c.id');		
		$this->db->where('b.id', $id); 
		$this->db->where('c.cStatus', 'Y'); 
		$this->db->where('b.cStatus', 'Y'); 		
        return $this->db->get();
    }
	
	function get_resto_profile($id){
		$this->db->select('a.id,c.cNama,a.cHp,a.cTelp,a.iMinOrder,a.iCharge,a.cStatusOpen,a.cStatusAntar,a.cStatusTax,a.cImage,c.id as idResto, c.cEmail, a.cDescription, a.iDeliveryTime');
		$this->db->from('msrestprofiles a');
		$this->db->join('msusers c', 'a.iUsers= c.id');		
		$this->db->where('c.id', $id); 
		$this->db->where('c.cStatus', 'Y'); 
        return $this->db->get();
    }
	
	function get_restoid($nama){
		$this->db->select('id,cNama');
		$this->db->from('msusers');
		$this->db->where('replace(cnama , " ","")=', $nama); 
		$this->db->where('cStatus', 'Y'); 
        return $this->db->get();
    }

	function get_alamat($id){
		$this->db->select('id,cAlamat');
		$this->db->from('msalamats');
		$this->db->where('idRestoran', $id); 
		$this->db->where('cStatus', 'Y'); 
        return $this->db->get();
    }

	function get_pengantaran($id){
		$this->db->select('a.id,b.cWilayah');
		$this->db->from('mspengantarans a');		
		$this->db->join('mswilayahs b', 'a.idWilayah= b.id');						
		$this->db->where('a.idRestoran', $id); 
		$this->db->where('a.cStatus', 'Y'); 
		$this->db->where('b.cStatus', 'Y'); 
        return $this->db->get();
    }

	function get_opening($id,$hari=NULL){
		$this->db->select('id,cHari,dOpenHour,dCloseHour,cStatus');
		$this->db->from('msopenings');
		$this->db->where('idRestoran', $id); 
		if ($hari!=NULL){
			$this->db->where('cHari', $hari); 
		}
		//$this->db->where('cStatus', 'Y'); 
        return $this->db->get();
    }

	function get_menu_restoran($id){//-- untuk dipakai di halaman build_order untuk menampilkan menu di restoran tertentu 
		//data menu tidak tampil di build_order dan di myMenu jika tidak ada harga yang berlaku di current date
		$query=$this->db->query("select a.id, a.cNama, coalesce(b.iHarga,0) iHarga, coalesce(c.iHargaDeal,0) iHargaDeal, a.cImageThumb, 
									a.cImageLarge, a.cDesc
								from msmenurestos a
								left join 
								(	
									select *
									from mshargamenus  									
									where dStartBerlaku <= '".date('Y-m-d')."' and dEndBerlaku >= '".date('Y-m-d')."'										
										and cStatus='Y'
								)b on a.id= b.idMenu 
								left join
								(	
									select *
									from trdeals
									where dStartBerlaku <= '".date('Y-m-d')."' and dEndBerlaku >= '".date('Y-m-d')."'										
								)c on a.id= c.iMenuId
								where a.cStatus='Y' and a.idRestoran='".$id."' order by a.cNama
							");
		return $query;
	
		/*	
		$this->db->select('a.id,a.cNama,b.iHarga,a.cImageThumb,a.cImageLarge,a.cDesc');
		$this->db->from('msmenurestos a');
		$this->db->join('mshargamenus b', "a.id= b.idMenu and b.dStartBerlaku <= ".date('Y-m-d')." and b.dEndBerlaku >= ".date('Y-m-d'), 'left');
		//$this->db->join('mshargamenus b', 'b.dStartBerlaku <= '.date('Y-m-d'), 'left');
		//$this->db->join('mshargamenus b', 'b.dEndBerlaku >= '.date('Y-m-d'), 'left');
		//$this->db->join('mshargamenus c', 'c.dStartBerlaku= b.idMenu');

		//$this->db->where('d.dStartBerlaku <=', date('Y-m-d')); 		
		//$this->db->where('d.dEndBerlaku >=', date('Y-m-d')); 				

		$this->db->where('a.idRestoran', $id);
		$this->db->where('a.cStatus', 'Y');
		$this->db->where('b.cStatus', 'Y');
        return $this->db->get();
		*/
    }
	
	function get_menu_diskon($idR=NULL, $idM=NULL, $idS=NULL){
		if($idR!=NULL){		
			$this->db->select('b.cNama,a.iDiskon,a.dStartBerlaku,a.dEndBerlaku');	
		}
		else{
			$this->db->select('a.*');
		}
		$this->db->from('trdiskons a');
		if($idR!=NULL){		
			$this->db->join('msmenurestos b', 'a.iMenuId= b.id');
			$this->db->where('b.idRestoran', $idR);
		}	
		if($idM!=NULL){		
			$this->db->where('a.iMenuId', $idM); //digunakan untuk cart
		}
		if($idS!=NULL){		
			$this->db->where('a.cJenis', $idS); //digunakan untuk mencari diskon yang di set oleh restoran
		}

		$this->db->where('a.cStatus', 'Y');
        return $this->db->get();
    }


	function get_user_menu($id){
		$this->db->select('b.cMenuItem,b.cLink');
		$this->db->from('msmenuaccesses a');
		$this->db->join('msmenus b', 'a.iMenuid = b.id');	
		$this->db->where('a.iGroupId', $id); 
		$this->db->where('a.cStatus', 'Y'); 
		$this->db->where('b.cStatus', 'Y'); 
        return $this->db->get();
    }

	function get_user_profile($id=NULL,$type,$session=NULL){
		if($type=='customer'){
			$this->db->select('b.cNama,b.cEmail,a.cAlamat,a.cHp,a.cTelp,b.cEmailNew,a.cWilayah,c.cWilayah as cNamaWilayah,b.cStatus,b.id');
			$this->db->from('mscustprofiles a');
			$this->db->join('msusers b', 'a.iusers = b.id');	
			$this->db->join('mswilayahs c', 'a.cWilayah = c.id');	
			if($session!=NULL){
				$this->db->where('b.cActivateCode', $session); 
			}
			if($id!=NULL){
				$this->db->where('b.id', $id); 
				$this->db->where('b.cStatus', 'Y'); 
			}
			$this->db->order_by("b.cNama", "asc");
		}
		else if($type=='restaurant'){
			$this->db->select('b.cNama,b.cEmail,a.cHp,a.cTelp,a.iMinOrder,a.iDeliveryTime,a.iCharge,a.cStatusOpen,a.cStatusAntar,a.cStatusTax,a.cDescription,a.cImage,b.cEmailNew,b.cStatus,b.id');
			$this->db->from('msrestprofiles a');
			$this->db->join('msusers b', 'a.iusers = b.id');	
			if($session!=NULL){
				$this->db->where('b.cActivateCode', $session); 
			}
			if($id!=NULL){
				$this->db->where('b.id', $id); 
				$this->db->where('b.cStatus', 'Y'); 
			}
			$this->db->order_by("b.cNama", "asc");
		}
        return $this->db->get();
    }
	
	function get_user_one_stop($session=NULL){
		$this->db->select('id,cNama,cEmail,cHp,cTelp,cAlamat');
		$this->db->from('msonestop_cust');
		$this->db->where('cSession', $session); 
        return $this->db->get();
    }

	function edit_user($id){
        $data_user=array(
            'cNama'=>$this->input->post('name',TRUE),
            'cEmailNew'=>$this->input->post('email',TRUE),
	        'cActivateCode'=>$this->session->userdata('session_id'),
            'dUpdated'=>date('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        $this->db->update('msusers', $data_user);

		if($this->session->userdata('userType')=='customer'){
			$data_cust=array(
				'cAlamat'=>$this->input->post('addr',TRUE),
				'cWilayah'=>$this->input->post('region',TRUE),
				'cHp'=>$this->input->post('hp',TRUE),
				'cTelp'=>$this->input->post('telp',TRUE)
			);
			$this->db->where('iUsers', $id);
			$this->db->update('mscustprofiles', $data_cust);
        }
		elseif ($this->session->userdata('userType')=='restaurant'){
			if($this->input->post('delivery_resto',TRUE)=='Y')
				$status_antar='Y';
			else
				$status_antar='N';
				
			if($this->input->post('tax_resto',TRUE)=='Y')
				$status_pajak='Y';
			else
				$status_pajak='N';
				
			$data_cust=array(				
				'cHp'=>$this->input->post('hp_resto',TRUE),
				'cTelp'=>$this->input->post('telp_resto',TRUE),
				'iMinOrder'=>$this->input->post('min_order_resto',TRUE),
				'cStatusAntar'=>$status_antar,
				'cStatusTax'=>$status_pajak,
				'cDescription'=>$this->input->post('desc_resto',TRUE),
			);
			$this->db->where('iUsers', $id);
			$this->db->update('msrestprofiles', $data_cust);
		}
		
        if(mysql_errno()==0){
            return true;
        }
        return false;
	}
	
	function check_pass($id){
		$this->db->select('cPassword');
		$this->db->from('msusers');
		$this->db->where('id', $id); 
		$this->db->where('cStatus', 'Y'); 
        return $this->db->get();
    }
	
	function edit_pass($id){
        $data_user=array(
            'cPassword'=>md5($this->input->post('re_new_pass',TRUE)),
            'dUpdated'=>date('Y-m-d H:i:s')
        );
        $this->db->where('id', $id);
        $this->db->update('msusers', $data_user);
		
        if(mysql_errno()==0){
            return true;
        }
        return false;
	}

	function get_sys_table($id,$var=NULL){
		$this->db->select('cChildCode,cValue');
		$this->db->from('mssystables');
		$this->db->where('cMasterCode', $id); 
		if($var!=NULL){
			$this->db->where('cChildCode', $var); 
		}		
		$this->db->where('cStatus', 'Y'); 
        return $this->db->get();
    }

    function add_wallet(){
        $data_common=array(
			'idCust'=>$this->session->userdata('userID'),
            'cRekCompany'=>$this->input->post('rek_comp',TRUE),
            'dtgltransfer'=>date('Y-m-d',strtotime($this->input->post('input_date',TRUE))),
            'cBankUser'=>$this->input->post('rek_from',TRUE),
            'cRekeningUser'=>$this->input->post('acc_from',TRUE),
            'cNamaUser'=>$this->input->post('name_from',TRUE),
            'iJumlah'=>$this->input->post('jumlah',TRUE),
			'cStatusVerified'=>'N',			
			'cStatus'=>'Y',			
            'dCreated'=>date('Y-m-d H:i:s')
        );		
        $this->db->insert('trtopups', $data_common);

        if(mysql_errno()==0){
            return true;
        }
        else return false;
    }
	/*
	function wallet(){
		$query=$this->db->query("select (coalesce(a.iJumlah,0)-coalesce(b.iBiayaAntar,0)-coalesce(b.iTax,0)-coalesce(b.total,0)) as wallet
								from trtopups a
								left join
								(
									select a.idCust,a.iTax,a.iBiayaAntar,a.total
									from
									(
										select a.idCust,sum(coalesce(a.iTax,0)) iTax,sum(coalesce(a.iBiayaAntar,0)) iBiayaAntar,
											sum(coalesce(b.total,0)) total
										from trorders a
										left join
										(
											select a.idOrders, sum(a.iJumlah*c.iHarga) total
											from trorderdetails a
											left join msmenurestos b
												on a.iMenuid=b.id
											left join mshargamenus c
												on b.id=c.idMenu
											where c.dStartBerlaku <='".date('Y-m-d H:i:s')."'
												and c.dEndBerlaku >='".date('Y-m-d H:i:s')."'
												and c.cStatus='Y'
												and a.cStatus='Y'
											group by idOrders
										)b on a.id=b.idOrders
										where a.iPaymentId=2 and a.cStatus='Y' and a.idCust='".$this->session->userdata('userID')."'
										group by a.idCust
									)a
								)b on a.idCust=b.idCust
								where a.cStatusVerified='Y' and a.cStatus='Y'
									and a.idCust='".$this->session->userdata('userID')."'");
		return $query;
	}
	*/
	
	function wallet(){
		$query=$this->db->query("select a.idCust,sum(coalesce(a.iJumlah,0)) wallet
								from trtopups a
								where a.cStatusVerified='Y' and a.cStatus='Y'
									and a.idCust='".$this->session->userdata('userID')."'
								group by a.idCust");
		return $query;
	}	
	
	function order_header(){
		$query=$this->db->query("select a.idCust,sum(coalesce(a.iTax,0)) iTax, sum(coalesce(a.iBiayaAntar,0)) iBiayaAntar, sum(coalesce(b.iNominal,0))iNominal
			from trorders a
			left join msvouchers b on a.cVoucherCode=b.cCode
			where a.iPaymentId=2 and
				a.cStatus='Y' and a.idCust='".$this->session->userdata('userID')."'
			group by a.idCust");

		return $query;
	}		

	
	function order_detail(){
		$query=$this->db->query("select a.dTglOrder, b.idOrders, b.iMenuId, b.iJumlah, b.iHarga, b.dStartBerlaku, b.dEndBerlaku
			from trorders a
			left join
			(
				select a.idOrders, a.iMenuId, a.iJumlah, c.iHarga, c.dStartBerlaku, c.dEndBerlaku
				from trorderdetails a
				left join msmenurestos b
					on a.iMenuid=b.id
				left join mshargamenus c
					on b.id=c.idMenu
				where c.cStatus='Y'
					and a.cStatus='Y'
			)b 
				on a.id=b.idOrders
			where b.dStartBerlaku <= a.dTglOrder
				and b.dEndBerlaku >= a.dTglOrder and a.iPaymentId=2 and
				a.cStatus='Y' and a.idCust='".$this->session->userdata('userID')."'");

		return $query;
	}		
	
	function wallet_tr(){
		$this->db->select('dTglTransfer,cBankUser,cRekeningUser,iJumlah,cStatusVerified');
		$this->db->from('trtopups');
		$this->db->where('cStatus', 'Y');
		$this->db->where('idCust', $this->session->userdata('userID'));
		$this->db->order_by("dTglTransfer", "desc");
		return $this->db->get();
	}
	
	function get_charge(){
		$this->db->select('iCharge');
		$this->db->from('mscharges');
		$this->db->where('dStartBerlaku <=', date('Y-m-d')); 		
		$this->db->where('dEndBerlaku >=', date('Y-m-d')); 		
		$this->db->where('cStatus', 'Y');		
        return $this->db->get();
    }
	
	function get_payment(){
		$this->db->select('id,cPayment');
		$this->db->from('mspaymentmethods');
		$this->db->where('cStatus', 'Y');
        return $this->db->get();
    }

    function get_voucher($voucher,$idRest){
		$this->db->select('*');
		$this->db->from('msvouchers');
		$this->db->where('cCode', $voucher);
		$this->db->where('cStatus', 'Y');
		$this->db->where('cStatusUsed', 'N');
		$this->db->where('dStartBerlaku <=', date('Y-m-d'));
		$this->db->where('dEndBerlaku >=', date('Y-m-d'));

        $hasil=$this->db->get();
		$record=$hasil->num_rows();
		
		if($record>0){
			$result=$hasil->row();
			if($result->cJenisVoucher=="Resto"){ // Jika yang keluarkan voucher adalah resto, maka di cek apakah penggunaannya sesuai dengan restoran yang sedang dipesan
				$this->db->select('cCode');
				$this->db->from('msvouchers');
				$this->db->where('cCode', $voucher);
				$this->db->where('idRestoran', $idRest);
				$this->db->where('cStatus', 'Y');
				$this->db->where('cStatusUsed', 'N');
				$this->db->where('dStartBerlaku <=', date('Y-m-d'));
				$this->db->where('dEndBerlaku >=', date('Y-m-d'));
				$hasil_qry=$this->db->get();
				$record=$hasil_qry->num_rows();
			}
		}
		return $record;
    }

	function add_order($id,$jumlah,$desc=NULL,$harga,$diskon){
        $data_common=array(
			'cSession'=>$this->session->userdata('cOrderSess'),
			'iRestoId'=>$this->session->userdata('idRestoran'),		
            'iMenuId'=>$id,
	        'iJumlah'=>$jumlah,
			'iHarga'=>$harga,
			'iDiskon'=>$diskon,
			'cDesc'=>$desc,
			'cStatus'=>'Y',
            'dCreated'=>date('Y-m-d H:i:s')
        );		
		$this->db->insert('trorderdetails_tmp', $data_common);
		
        if(mysql_errno()==0){
            return true;
        }
        return false;
	}

	//digunakan di build order
	function get_order_session(){
		$this->db->select('a.cSession,a.iMenuId, b.cNama, sum(a.iJumlah)iJumlah, a.iHarga, a.iDiskon');
		$this->db->from('trorderdetails_tmp a');
		$this->db->join('msmenurestos b', 'a.iMenuId= b.id');
		//$this->db->join('mshargamenus c', 'b.id= c.idMenu');				
		$this->db->where('a.cSession',$this->session->userdata('cOrderSess')); 
		$this->db->where('a.cStatus', 'Y'); 		
		$this->db->where('b.cStatus', 'Y'); 		
		//$this->db->where('c.dStartBerlaku <=', date('Y-m-d')); 		
		//$this->db->where('c.dEndBerlaku >=', date('Y-m-d')); 				
		//$this->db->where('c.cStatus', 'Y'); 
		$this->db->where('a.iRestoId', $this->session->userdata('idRestoran')); 
		//$this->db->group_by("a.cSession,a.iMenuId,b.cNama,c.iHarga"); 
		$this->db->group_by("a.cSession,a.iMenuId,b.cNama,a.iHarga,a.iDiskon"); 
        return $this->db->get();
    }
	
	//digunakan untuk checkout login dan finish
	function get_order_session_check_out(){
		$this->db->select('a.cSession,a.iMenuId,b.cNama,sum(a.iJumlah)iJumlah,a.iHarga,a.iDiskon,a.cDesc');
		$this->db->from('trorderdetails_tmp a');
		$this->db->join('msmenurestos b', 'a.iMenuId= b.id');
		//$this->db->join('mshargamenus c', 'b.id= c.idMenu');				
		$this->db->where('a.cSession',$this->session->userdata('cOrderSess')); 
		$this->db->where('a.iRestoId', $this->session->userdata('idRestoran')); 
		$this->db->where('a.cStatus', 'Y'); 		
		$this->db->where('b.cStatus', 'Y'); 		
		//$this->db->where('c.dStartBerlaku <=', date('Y-m-d')); 		
		//$this->db->where('c.dEndBerlaku >=', date('Y-m-d')); 				
		//$this->db->where('c.cStatus', 'Y'); 
		//$this->db->group_by("a.cSession,a.iMenuId,b.cNama,c.iHarga,a.cDesc"); 
		$this->db->group_by("a.cSession,a.iMenuId,b.cNama,a.iHarga,a.iDiskon,a.cDesc"); 
        return $this->db->get();
    }

	function get_subtotal_session(){
		$this->db->select('sum(a.iJumlah*c.iHarga)subtotal');
		$this->db->from('trorderdetails_tmp a');
		$this->db->join('msmenurestos b', 'a.iMenuId= b.id');
		$this->db->join('mshargamenus c', 'b.id= c.idMenu');
		$this->db->where('a.cSession',$this->session->userdata('cOrderSess'));
		$this->db->where('a.iRestoId', $this->session->userdata('idRestoran'));
		$this->db->where('a.cStatus', 'Y');
		$this->db->where('b.cStatus', 'Y');
		$this->db->where('c.dStartBerlaku <=', date('Y-m-d'));
		$this->db->where('c.dEndBerlaku >=', date('Y-m-d')); 				
		$this->db->where('c.cStatus', 'Y');
		$this->db->group_by("a.cSession");
        return $this->db->get();
    }
	
	function delete_order($id){
		$this->db->where('cSession', $this->session->userdata('cOrderSess'));
		$this->db->where('iRestoId', $this->session->userdata('idRestoran'));		
		$this->db->where('iMenuId', $id);
		$this->db->delete('trorderdetails_tmp'); 
		
        if(!mysql_errno()) 
			return true;
		else
	        return false;
	}
	
	function get_idMenu($id){
		$this->db->select('a.iMenuId');
		$this->db->from('trorderdetails_tmp a');
		$this->db->where('a.cStatus', 'Y'); 		
		$this->db->where('a.id', $id);		
        return $this->db->get();
    }
	
    function add_trorders_tmp($iTax,$subtotal,$service){
		$this->db->where('cSession', $this->session->userdata('cOrderSess'));
		$this->db->where('idRestoran', $this->session->userdata('idRestoran'));
		$this->db->delete('trorders_tmp');
		
        if(!mysql_errno()) {
			if($this->input->post('del_option',TRUE)=='1')
				$time=$this->input->post('time_del',TRUE);
			elseif($this->input->post('del_option',TRUE)=='2')
				$time=date('Y-m-d H:i');//$this->input->post('time_pick',TRUE);    				  
			$data_common=array(
				'idCust'=>$this->session->userdata('userID'),
				'idRestoran'=>$this->session->userdata('idRestoran'),
				'dTglOrder'=>date('Y-m-d'),
				'iTax'=>$iTax,
				'cAntarBy'=>'SaungSaji',//$this->input->post('deliver_method',TRUE),			
				'iBiayaAntar'=>$service,//$this->session->userdata('iCharge')*$subtotal/100,
				'cJenisTerimaMakanan'=>$this->input->post('del_option',TRUE),//1 waktu ke depan, 2 secepatnya			
				'dJamTerima'=>date('Y-m-d H:i',strtotime($time)),
				'iPaymentId'=>$this->input->post('payment_method',TRUE),
				'cVoucherCode'=>$this->input->post('voucher_code',TRUE),
				'cSession'=>$this->session->userdata('cOrderSess')
			);		
	        $this->db->insert('trorders_tmp', $data_common);
			    if(mysql_errno()==0){
		            return true;
		        }
		        else return false;
		}
		else
	        return false;    
    }
	
	function add_tmp_order_transaction_one_stop(){
		$this->db->where('cSession', $this->session->userdata('cOrderSess'));
		//$this->db->where('cEmail', $this->input->post('email_new',TRUE));		
		$this->db->delete('msonestop_cust'); 

		$trorders_tmp = $this->db->query("select * from trorders_tmp where cSession='".$this->session->userdata('cOrderSess')."'");
		if($trorders_tmp->num_rows()>0){			
			$wilayah = $this->get_all_wilayah($this->input->post('region',TRUE))->row();
			if($wilayah)
				$namawilayah = $wilayah->cWilayah;				
		
			$data_common=array(
				'cSession'=>$this->session->userdata('cOrderSess'),
				'cNama'=>$this->input->post('nama',TRUE),
				'cEmail'=>$this->input->post('email_new',TRUE),
				'cHp'=>$this->input->post('hp',TRUE),
				'cTelp'=>$this->input->post('telp',TRUE),
				'cAlamat'=>$this->input->post('alamat',TRUE)." - ".$namawilayah,
				'cStatus'=>'Y',
				'dCreated'=>date('Y-m-d H:i:s'),
			);		
			$this->db->insert('msonestop_cust', $data_common);
			//$id_cust=mysql_insert_id();
			
			$data_update=array(
				'cDesc'=>$this->input->post('info',TRUE)
			);
	
			$this->db->where('cSession', $this->session->userdata('cOrderSess'));
			$this->db->update('trorders_tmp', $data_update);
			
			if(mysql_errno()==0){
				return true;
			}
			else return false;
		}
		else
			return false;
    }

    function add_final_order_transaction($type=null){
		/*
		if($type==2){ // 2 untuk one stop, 1 untuk member
			$this->db->where('cSession', $this->session->userdata('cOrderSess'));
			$this->db->where('cEmail', $this->input->post('email_new',TRUE));		
			$this->db->delete('msonestop_cust'); 
		}
		*/
		
		$trorders_tmp = $this->db->query("select * from trorders_tmp where cSession='".$this->session->userdata('cOrderSess')."'");//apakah menggunakan session saat ini atau session dari msonestop yang tercreate
		$id_cust=$this->session->userdata('userID');
		if($trorders_tmp->num_rows()>0){			
			/*
			//type=2 untuk one stop cust
			if($type==2){		
				$wilayah = $this->get_all_wilayah($this->input->post('region',TRUE))->row();
				if($wilayah)
					$namawilayah = $wilayah->cWilayah;				
			
				$data_common=array(
					'cSession'=>$this->session->userdata('cOrderSess'),
					'cNama'=>$this->input->post('nama',TRUE),
					'cEmail'=>$this->input->post('email_new',TRUE),
					'cHP'=>$this->input->post('hp',TRUE),
					'cTelp'=>$this->input->post('telp',TRUE),
					'cAlamat'=>$this->input->post('alamat',TRUE)." - ".$namawilayah,
					'cStatus'=>'Y',
					'dCreated'=>date('Y-m-d H:i:s'),
				);		
				$this->db->insert('msonestop_cust', $data_common);
				$id_cust=mysql_insert_id();			
			}			
			*/
			$trorders_tmp_row = $trorders_tmp->row();			
			//type=2 untuk one stop cust			
			if($type==2){
				$user=$this->get_user_one_stop($this->session->userdata('cOrderSess'))->row();
				$data_orders=array(
					'cSession'=>$this->session->userdata('cOrderSess'),
					'idOneStop'=>$user->id,
					'idRestoran'=>$trorders_tmp_row->idRestoran,
					'dTglOrder'=>$trorders_tmp_row->dTglOrder,
					'iTax'=>$trorders_tmp_row->iTax,
					'cAntarBy'=>$trorders_tmp_row->cAntarBy,
					'iBiayaAntar'=>$trorders_tmp_row->iBiayaAntar,
					'cJenisTerimaMakanan'=>$trorders_tmp_row->cJenisTerimaMakanan,			
					'dJamTerima'=>$trorders_tmp_row->dJamTerima,
					'iPaymentId'=>$trorders_tmp_row->iPaymentId,
					'cVoucherCode'=>$trorders_tmp_row->cVoucherCode,		
					'cDesc'=>$trorders_tmp_row->cDesc,			
					'iStatusAntar'=>1,
					'cStatusTarik'=>'3',
					'cStatus'=>'Y',
					'dCreated'=>date('Y-m-d H:i:s')
				);
			}
			else if($type==1){
				$namawilayah = "";
				if($this->input->post('address',TRUE)==2){
					$wilayah = $this->get_all_wilayah($this->input->post('region',TRUE))->row();
					if($wilayah)
						$namawilayah = $wilayah->cWilayah;
				}
				$data_orders=array(
					'cSession'=>$this->session->userdata('cOrderSess'),
					'idCust'=>$id_cust,
					'iJenisLokasiAntar'=>$this->input->post('address',TRUE),
					'cAlamatAntar'=>$this->input->post('address2',TRUE)." - ".$namawilayah,
					'idRestoran'=>$trorders_tmp_row->idRestoran,
					'dTglOrder'=>$trorders_tmp_row->dTglOrder,
					'iTax'=>$trorders_tmp_row->iTax,
					'cAntarBy'=>$trorders_tmp_row->cAntarBy,
					'iBiayaAntar'=>$trorders_tmp_row->iBiayaAntar,
					'cJenisTerimaMakanan'=>$trorders_tmp_row->cJenisTerimaMakanan,			
					'dJamTerima'=>$trorders_tmp_row->dJamTerima,
					'iPaymentId'=>$trorders_tmp_row->iPaymentId,
					'cVoucherCode'=>$trorders_tmp_row->cVoucherCode,		
					'cDesc'=>$this->input->post('info',TRUE),			
					'iStatusAntar'=>1,
					'cStatusTarik'=>'3',
					'cStatus'=>'Y',
					'dCreated'=>date('Y-m-d H:i:s')
				);
			}			
			/*
			$data_orders=array(
				'idRestoran'=>$trorders_tmp_row->idRestoran,
				'dTglOrder'=>$trorders_tmp_row->dTglOrder,
				'iTax'=>$trorders_tmp_row->iTax,
				'iBiayaAntar'=>$trorders_tmp_row->iBiayaAntar,
				'cJenisTerimaMakanan'=>$trorders_tmp_row->cJenisTerimaMakanan,			
				'dJamTerima'=>$trorders_tmp_row->dJamTerima,
				'iPaymentId'=>$trorders_tmp_row->iPaymentId,
				'cVoucherCode'=>$trorders_tmp_row->cVoucherCode,		
				'cDesc'=>$this->input->post('info',TRUE),			
				'cStatus'=>'Y',
				'dCreated'=>date('Y-m-d H:i:s')
			);
			*/
			$this->db->insert('trorders', $data_orders);
			$id_order=mysql_insert_id();			
		
			$trorderdetails_tmp = $this->get_order_session_check_out();
			
			if($trorderdetails_tmp->num_rows()>0){
				foreach ($trorderdetails_tmp->result_array() as $row_order){			
					$data_orderdetails=array(
						'idOrders'=>$id_order,
						'iMenuId'=>$row_order['iMenuId'],
						'iJumlah'=>$row_order['iJumlah'],
						'iHarga'=>$row_order['iHarga'],
						'iDiskon'=>$row_order['iDiskon'],
						'cDesc'=>$row_order['cDesc'],
						'cStatus'=>'Y',
						'dCreated'=>date('Y-m-d H:i:s')
					);		
					$this->db->insert('trorderdetails', $data_orderdetails);
				}
				
				$this->db->where('cSession', $this->session->userdata('cOrderSess'));
				$this->db->delete('trorders_tmp'); 			
	
				$this->db->where('cSession', $this->session->userdata('cOrderSess'));
				$this->db->delete('trorderdetails_tmp'); 			

				if($type==2){
					$user=$this->get_user_one_stop($this->session->userdata('cOrderSess'))->row();
					$data_update=array(
						'cSession'=>' '
					);
			
					$this->db->where('id', $user->id);
					$this->db->update('msonestop_cust', $data_update);
				}
			}
			
			//Non aktif bagian ini sehingga status voucher bisa digunakan lebih dari 1 x
			
			if($trorders_tmp_row->cVoucherCode!='SAUNGSAJI'){
				$data_status=array(
					'cStatusUsed'=>'Y'
				);
		
				$this->db->where('cCode', $trorders_tmp_row->cVoucherCode);
				$this->db->update('msvouchers', $data_status);					
			}
			
			if(mysql_errno()==0){
				return true;
			}
			else return false;
		}
		else
			return false;
    }
	/*
	function get_order_detail_finish($id){
		$this->db->select('a.iJumlah,b.cNama,c.iHarga,a.cDesc, a.iMenuId,d.dTglOrder');
		$this->db->from('trorderdetails a');
		$this->db->join('msmenurestos b', 'a.iMenuId = b.id');
		$this->db->join('mshargamenus c', 'b.id = c.idMenu');
		$this->db->join('trorders d', 'a.idOrders = d.id');
		$this->db->where('a.idOrders', $id);
		$this->db->where('a.cStatus', 'Y');
		$this->db->where('b.cStatus', 'Y');
		$this->db->where('c.dStartBerlaku <=', 'd.dTglOrder' );//date('Y-m-d H:i:s')
		$this->db->where('c.dEndBerlaku >=', 'd.dTglOrder');//date('Y-m-d H:i:s')
		$this->db->where('c.cStatus', 'Y');
        return $this->db->get();
    }
	*/
	/*
	function get_order_detail_finish($id){		
		$query=$this->db->query("select a.iJumlah,b.cNama,c.iHarga,a.cDesc, a.iMenuId,d.dTglOrder
				from trorderdetails a
				left join msmenurestos b
					on a.iMenuId = b.id
				left join mshargamenus c
					on b.id = c.idMenu
				left join trorders d
					on a.idOrders = d.id
				where a.idOrders=".$id."
					and a.cStatus='Y'
					and b.cStatus='Y'
					and c.cStatus='Y'
					and c.dStartBerlaku <= d.dTglOrder
					and c.dEndBerlaku >= d.dTglOrder"); 
	
		return $query;
	}	
	*/
	function get_order_detail_finish($id){		
		$query=$this->db->query("select a.iJumlah, b.cNama, a.iHarga, a.iDiskon, a.cDesc, a.iMenuId, d.dTglOrder
				from trorderdetails a
				left join msmenurestos b
					on a.iMenuId = b.id
				left join trorders d
					on a.idOrders = d.id
				where a.idOrders=".$id."
					and a.cStatus='Y'
					and b.cStatus='Y'"); 
	
		return $query;
	}	
	
	function customer_order($id1,$id2){		
		$query=$this->db->query("select id,cNama,dTglOrder,cPayment,total+iTax+iBiayaAntar as iTotal,iStatusAntar,cPayment
			 from
			 (
				select a.id,a.idCust,c.cNama,a.dTglOrder,d.cPayment,a.iStatusAntar,
					sum(coalesce(a.iTax,0)) iTax,sum(coalesce(a.iBiayaAntar,0)) iBiayaAntar,
					sum(coalesce(b.total,0)) total
				from trorders a
				left join
				(
					select a.idOrders, sum(a.iJumlah*c.iHarga) total
					from trorderdetails a
					left join msmenurestos b
						on a.iMenuid=b.id
					left join mshargamenus c
						on b.id=c.idMenu
					left join trorders d
						on a.idOrders=d.id
					where c.dStartBerlaku <= d.dTglOrder
						and c.dEndBerlaku >= d.dTglOrder
						and c.cStatus='Y'
						and a.cStatus='Y'
					group by idOrders
				)b 
					on a.id=b.idOrders
				left join msusers c
					on a.idRestoran=c.id
				left join mspaymentmethods d
					on a.iPaymentId=d.id
				where a.cStatus='Y' and a.idCust='".$this->session->userdata('userID')."'
					and (a.iStatusAntar=".$id1." or a.iStatusAntar=".$id2.")
				group by a.idCust,c.cNama,a.dTglOrder,d.cPayment,a.iStatusAntar
			)a "); 
	
		return $query;
	}

    function add_email(){
        $data_common=array(
            'cEmail'=>$this->input->post('email',TRUE),
            'iPoin'=>'50',
			'cStatus'=>'Y',
			'cCreated'=>'system',						
            'dCreated'=>date('Y-m-d H:i:s')
        );		
        $this->db->insert('msemail', $data_common);
		
        if(mysql_errno()==0){
            return true;
        }
        else return false;
    }
	
	function get_email($order_id,$email){
		$this->db->select('*');
		$this->db->from('tremail');
		$this->db->where('idorder', $order_id);
		$this->db->where('cemail', $email);		
        return $this->db->get();
    }
	
	function add_send_email_tr($order_id,$email){
        $data_common=array(
            'cemail'=>$email,
            'idorder'=>$order_id,			
			'ccreated'=>'system',						
            'dcreated'=>date('Y-m-d H:i:s')
        );		
        $this->db->insert('tremail', $data_common);
		
        if(mysql_errno()==0){
            return true;
        }
        else return false;
    }
	
	//point di tambahkan jika pesanan telah diantar dan diterima
	function customer_point($id){		
		$query=$this->db->query("
			select e.id,coalesce(a.iPoint,0) iPoint, f.iPoin 
			from msusers e
			left join
			(
				select a.idCust, sum(b.iJumlah * d.iHarga) iPoint
				from trorders a
				left join trorderdetails b
					on a.id=b.idOrders
				left join msmenurestos c
					on b.iMenuid=c.id
				left join mshargamenus d
					on c.id=d.idMenu					
				where d.dStartBerlaku <= a.dTglOrder
					and d.dEndBerlaku >= a.dTglOrder
					and d.cStatus='Y'
					and a.cStatus='Y'
					and a.iStatusAntar=2
					and a.idCust='".$id."'					
				group by a.idCust
			)a
				on a.idCust=e.id
			left join msemail f
				on e.cEmail=f.cEmail
			where e.id='".$id."'"); 
	
		return $query;
	}
	
	function customer_redeem_point($id){		
		$query=$this->db->query("
			select coalesce(a.iPoint,0) iPoint
			from
			(
				select a.idCust, sum(b.iPoin*a.iJumlah) iPoint
				from trredeempoints a
				left join msrewards b
					on a.idReward=b.id
				where a.idCust='".$id."'
				group by a.idCust
			)a"); 
	
		return $query;
	}	
	
	function redeem_point(){		
		$query=$this->db->query("select a.dTglRedeem, b.cNama, b.iPoin, a.cCode
				from trredeempoints a
				left join msrewards b
					on a.idReward=b.id
				where a.idCust='".$this->session->userdata('userID')."'"); 
	
		return $query;
	}	

	
	function point_trans_sys(){		
		$query=$this->db->query("select cChildCode
				from mssystables
				where cMasterCode='PointOrder' and cStatus='Y'"); 
	
		return $query;
	}
	
	function sign_up_point($email){		
		$query=$this->db->query("select iPoin
				from msemail
				where cEmail='".$email."' and cStatus='Y'"); 
	
		return $query;
	}

	function get_all_reward(){
		$this->db->select('*');
		$this->db->from('msrewards');
		$this->db->where('cStatus', 'Y'); 
        return $this->db->get();
    }
	
	function get_reward_detail($nama){
		$this->db->select('*');
		$this->db->from('msrewards');
		$this->db->where('replace(cNama , " ","")=', $nama); 				
		$this->db->where('cStatus', 'Y'); 
        return $this->db->get();
    }

	function add_tr_redeem_point($id,$jumlah,$code){
        $data_common=array(			
			'idCust'=>$this->session->userdata('userID'),
			'idReward'=>$id,
			'cCode'=>$code,		
	        'iJumlah'=>$jumlah,
            'dStartBerlaku'=>date('Y-m-d'),
            'dEndBerlaku'=>date('Y-m-d',time()+30*24*3600), //berlaku 1 bulan
			'cStatus'=>'Y',
			'dTglRedeem'=>date('Y-m-d'),
            'dCreated'=>date('Y-m-d H:i:s')
        );		
		$this->db->insert('trredeempoints', $data_common);
		
        if(mysql_errno()==0){
            return true;
        }
        return false;
	}
	
    function add_ms_voucher($value,$code,$jenis,$idR=NULL){
        $data_common=array(
			'cCode'=>$code,
            'iNominal'=>$value,
            'cJenisVoucher'=>$jenis,
			'idRestoran'=>$idR,
            'dStartBerlaku'=>date('Y-m-d'),
            'dEndBerlaku'=>date('Y-m-d',time()+30*24*3600), // 1 bulan
            'cStatusUsed'=>'N',
            'cStatus'=>'Y',
			'cCreated'=>'system',
            'dCreated'=>date('Y-m-d H:i:s')
        );		
        $this->db->insert('msvouchers', $data_common);

        if(mysql_errno()==0){
            return true;
        }
        else return false;
    }

	function report_header($awal, $akhir){
		//Jika restoran tersebut yang mengeluarkan voucher maka total penjualan kurang nominal voucher
		/*
		$query= $this->db->query("select a.id, a.dTglOrder, coalesce(a.iTax,0) + coalesce(a.iBiayaAntar,0) - coalesce(e.iNominal,0) iTotal, a.cStatusTarik
				from trorders a
				left join msusers c
					on a.idRestoran=c.id
				left join msvouchers e 
					on a.cVoucherCode=e.cCode and e.idRestoran = a.idRestoran
				where a.dTglOrder>='".date('Y-m-d',strtotime($awal))."' and a.dTglOrder<='".date('Y-m-d',strtotime($akhir))."' and
					a.cStatus='Y' and a.idRestoran='".$this->session->userdata('userID')."'					
					and a.iStatusAntar=2 order by a.dTglOrder desc"); 					
		*/
		$query= $this->db->query("select a.id, a.dTglOrder, coalesce(a.iTax,0) + coalesce(a.iBiayaAntar,0) - coalesce(e.iNominal,0) iTotal, a.cStatusTarik
				from trorders a
				left join msusers c
					on a.idRestoran=c.id
				left join msvouchers e 
					on a.cVoucherCode=e.cCode
				where a.dTglOrder>='".date('Y-m-d',strtotime($awal))."' and a.dTglOrder<='".date('Y-m-d',strtotime($akhir))."' and
					a.cStatus='Y' and a.idRestoran='".$this->session->userdata('userID')."'					
					and a.iStatusAntar=2 order by a.dTglOrder asc,a.id asc"); 					

		/*
		$query=$this->db->query("select a.id,a.dTglOrder, sum(coalesce(a.iTax,0) + coalesce(a.iBiayaAntar,0) + coalesce(b.total,0)) total		
				from trorders a
				left join 
				(
					select a.idOrders, sum(a.iJumlah*c.iHarga) total
					from trorderdetails a
					left join msmenurestos b
						on a.iMenuid=b.id
					left join mshargamenus c
						on b.id=c.idMenu
					left join trorders d
						on a.idOrders=d.id
					where c.dStartBerlaku <= d.dTglOrder
						and c.dEndBerlaku >= d.dTglOrder
						and c.cStatus='Y'
						and a.cStatus='Y'
					group by idOrders				
				)b on a.id=b.idOrders	
				where a.dTglOrder>='".date('Y-m-d',strtotime($awal))."' and a.dTglOrder<='".date('Y-m-d',strtotime($akhir))."' and
					a.iStatusAntar=2 and a.idRestoran=".$this->session->userdata('userID')." and a.cStatusTarik='".$status."'
				group by a.id,a.dTglOrder
				order by a.dTglOrder");
		*/
		return $query;
	}	
	
	function report_detail($awal, $akhir){
		$query=$this->db->query("select a.idOrders,a.iMenuId, a.iJumlah, a.iHarga, a.iDiskon
					from trorderdetails a
					left join msmenurestos b
						on a.iMenuid=b.id
					left join trorders d
						on a.idOrders=d.id
					where a.cStatus='Y'
						and d.dTglOrder>='".date('Y-m-d',strtotime($awal))."' and d.dTglOrder<='".date('Y-m-d',strtotime($akhir))."' 
						and	d.iStatusAntar=2 and d.idRestoran=".$this->session->userdata('userID'));
		return $query;
	}	
	
	function select_data($from,$to){
		$this->db->select('id');
		$this->db->from('trorders');
        $this->db->where('dTglOrder >=', date('Y-m-d',strtotime($from)));
		$this->db->where('dTglOrder <=', date('Y-m-d',strtotime($to)));
		$this->db->where('idRestoran', $this->session->userdata('userID')); 
		$this->db->where('iStatusAntar', '2'); //sudah diantar
		$this->db->where('cStatusTarik', '1'); //belum ditarik
        return $this->db->get();		
	}
	
	function tarik_dana($from,$to){
        $data_user=array(
            'cStatusTarik'=>'2',
			'dTglTarik'=>date('Y-m-d'),
            'cUpdated'=>$this->session->userdata('userID'),
            'dUpdated'=>date('Y-m-d H:i:s')
        );
        $this->db->where('dTglOrder >=', date('Y-m-d',strtotime($from)));
		$this->db->where('dTglOrder <=', date('Y-m-d',strtotime($to)));
		$this->db->where('idRestoran', $this->session->userdata('userID')); 
		$this->db->where('iStatusAntar', '2');
		$this->db->where('cStatusTarik', '1');		
        $this->db->update('trorders', $data_user);

        if(mysql_errno()==0){
            return true;
        }
        return false;
	}
	
    function add_address(){
        $data_common=array(
			'idRestoran'=>$this->session->userdata('userID'),
            'cAlamat'=>$this->input->post('addr',TRUE),
			'cStatus'=>'Y',			
            'dCreated'=>date('Y-m-d H:i:s')
        );		
        $this->db->insert('msalamats', $data_common);

        if(mysql_errno()==0){
            return true;
        }
        else return false;
    }

    function del_address(){
		$this->db->where('id', $this->input->post('id',TRUE));
		$this->db->delete('msalamats'); 

        if(mysql_errno()==0){
            return true;
        }
        else return false;
    }
	
    function add_deli(){
		$this->db->select('idWilayah');
		$this->db->from('mspengantarans');
		$this->db->where('idRestoran', $this->session->userdata('userID')); 
		$this->db->where('idWilayah', $this->input->post('add_d',TRUE)); 
		$this->db->where('cStatus', 'Y'); 
        $query=$this->db->get();		

       	if($query->num_rows() > 0){
            return false;
        }
        else{
	        $data_common=array(
				'idRestoran'=>$this->session->userdata('userID'),
				'idWilayah'=>$this->input->post('add_d',TRUE),
				'cStatus'=>'Y',			
				'dCreated'=>date('Y-m-d H:i:s')
			);		
			$this->db->insert('mspengantarans', $data_common);
	
			if(mysql_errno()==0){
				return true;
			}
			else return false;
		};	
    }

    function del_deli(){
		$this->db->where('id', $this->input->post('id',TRUE));
		$this->db->delete('mspengantarans'); 

        if(mysql_errno()==0){
            return true;
        }
        else return false;
    }
	
    function add_contact_us(){
        $data_common=array(
			'cNama'=>$this->input->post('name',TRUE),
            'cEmail'=>$this->input->post('email',TRUE),
            'cHp'=>$this->input->post('hp',TRUE),
            'cDescription'=>$this->input->post('desc',TRUE),
            'dCreated'=>date('Y-m-d H:i:s')
        );		
        $this->db->insert('trcontact', $data_common);

        if(mysql_errno()==0){
            return true;
        }
        else return false;
    }


}
?>