<?php
class Home extends CI_Controller{
    var $base;

    function  __construct() {
		parent::__construct();
        $this->base =$this->config->item('base_url');
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->helper('cookie');
		$this->load->library('pagination');        
    }

    function index(){
        $title = "SaungSaji.com - online food order and delivery";
	
        $sess=$this->session->userdata('cOrderSess'); 
        if($sess==null){
			$sess_order=array('cOrderSess'=>$this->session->userdata('session_id'));
    	    $this->session->set_userdata($sess_order);					
			$sess=$this->session->userdata('cOrderSess');
		}
		//echo $sess;
		$this->redirects('home',$title);
    }

    function build_order($resto=NULL){
        //$this->login_check();
        $title = "SaungSaji.com - online food order and delivery";
		//cek apakah sudah ada pesanan, jika belum ada, maka tidak bisa akses halaman ini
		$this->redirects('build_order',$title,$resto);
    }

    function check_out(){
        //$this->login_check();
		//cek juga apakah sudah ada pesanan. Jika belum ada, maka tidak bisa akses halaman ini.	
        $title = "SaungSaji.com - online food order and delivery";
		$this->load->model('users_model', '', TRUE);		
		$jum_order = $this->db->query("select * from trorderdetails_tmp where cSession='".$this->session->userdata('cOrderSess')."'");		
		if($jum_order->num_rows()>0)
			$this->redirects('check_out',$title);
		else
            redirect($this->base."/index.php");
    }

    function finish(){
        //$this->login_check();
		//cek juga apakah sudah ada pesanan. Jika belum ada, maka tidak bisa akses halaman ini.	
		//menampilkan data menu yang terakhir di order oleh sesi tersebut
        $title = "SaungSaji.com - online food order and delivery";
		
		$this->load->model('users_model', '', TRUE);		
		$jum_order = $this->db->query("select * from trorders where cSession='".$this->session->userdata('cOrderSess')."' and idRestoran='".$this->session->userdata('idRestoran')."'");
		if($jum_order->num_rows()>0)
			$this->redirects('finish',$title);
		else
            redirect($this->base."/index.php");		
	}

	/*	
	function check_out(){	
		//cek juga apakah sudah ada pesanan. Jika belum ada, maka tidak bisa akses halaman ini.	
        $this->user_type_check();
		$this->load->model('users_model', '', TRUE);		
        $data['base'] = $this->base;
        $data['title']='SaungSaji.com - online food order and delivery';
		$data['user_menu']=$this->users_model->get_user_menu(1);

		if ($this->session->userdata('userType')<>"")
			$view='checkout_login';
		else
			$view='checkout_nologin';

		$this->form_validation->set_rules('email', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');		

		if($this->input->post('login_submit')){
            if($this->form_validation->run() == false){
				$this->load->view('header', $data);
				$this->load->view($view, $data);
				$this->load->view('menu', $data);
				$this->load->view('login', $data);
				$this->load->view('footer', $data);			
            }
            else{
                $user = $this->users_model->get_user();
                if($user != NULL){
                    $sess_data=array('cNama'=>$user['cNama'], 'cEmail'=>$user['cEmail'], 'userType'=>$user['cGroupName']);
                    $this->session->set_userdata($sess_data);					
			        $type=$this->session->userdata('userType');
					if($type=='customer'){
						$this->load->view('header', $data);
						$this->load->view('checkout_login', $data);	
						$this->load->view('menu', $data);
						$this->load->view('login', $data);
						$this->load->view('footer', $data);
					}
					elseif($type=='restaurant'){
						//redirect ke controller restoran
						redirect($this->base."/index.php/restaurant/home");				
					}
                }
                else{
		            $data['msg']="Username/Password Anda salah.";
					$this->load->view('header', $data);
					$this->load->view($view, $data);
					$this->load->view('menu', $data);
					$this->load->view('login', $data);
					$this->load->view('footer', $data);
                }				
            }			
		}
		else
		{
			$this->load->view('header', $data);
			$this->load->view($view, $data);
			$this->load->view('menu', $data);
			$this->load->view('login', $data);
			$this->load->view('footer', $data);
		}	
	}
	*/

	function close(){
        $data['base']=$this->base;
        $this->load->view('close',$data);
    }

    function carakerja(){
        $data['base']=$this->base;
        $this->load->view('carakerja',$data);
    }

    function about(){
        $data['base']=$this->base;
        $this->load->view('about',$data);
    }

    function contact(){
        $data['base']=$this->base;
        $this->load->view('contact',$data);
    }
	
    function carapesan(){
        $data['base']=$this->base;
        $this->load->view('carapesan',$data);
    }

    function carabayar(){
        $data['base']=$this->base;
        $this->load->view('carabayar',$data);
    }

    function faq(){
        $data['base']=$this->base;
        $this->load->view('faq',$data);
    }

    function terms(){
        $data['base']=$this->base;
        $this->load->view('terms',$data);
    }
	
	function change_password(){
        $data['base']=$this->base;
        $data['title']="SaungSaji.com - online food order and delivery";
		$data['msg']="";
		
		$this->load->model('users_model', '', TRUE);

        $this->form_validation->set_rules('old_pass', '*', 'trim|required|callback_password_check');
        $this->form_validation->set_rules('new_pass', 'Password Baru', 'trim|required|min_length[6]');
        $this->form_validation->set_rules('re_new_pass', ' ', 'trim|required|matches[new_pass]');

        if($this->input->post('submit_change_pass')){
            if($this->form_validation->run() == FALSE){
				$data['msg']="Cek kembali password yang telah anda ketik";                    
            }
            else{
                if($this->users_model->edit_pass($this->session->userdata('userID'))){
                    $data['msg']="Password anda telah diubah";                    			        
                }
                else{
                    $data['msg']="<font color='red'>Password anda belum dapat diubah</font>";                    
                }				
            }
			//$this->load->view('changepassword',$data);
        }
        //else
		//{
        $this->load->view('changepassword',$data);
        //}		
    }	

    function password_check(){        
        $str = md5($this->input->post('old_pass',TRUE));//
		$this->load->model('users_model', '', TRUE);
		$pass = $this->users_model->check_pass($this->session->userdata('userID'))->row();
		if ($pass->cPassword<>$str){
            $this->form_validation->set_message('password_check', 'Password salah');
            return false;
        }
        return true;
    }

	function reset_password(){
        $data['base']=$this->base;
        $data['title']="SaungSaji.com - online food order and delivery";
		$data['msg']="";
		
		$this->load->model('users_model', '', TRUE);
		
        $this->form_validation->set_rules('email', 'Wajib diisi', 'trim|required|valid_email|callback_check_email_reset');

        if($this->input->post('reset')){
            if($this->form_validation->run() == FALSE){
				$data['msg']="Cek kembali email";                    
		        //$this->load->view('resetpassword',$data);
            }
            else{
					$new_pass = strtoupper(substr(md5(microtime()),rand(0,26),7));//rand(123456, 7654321);
                    $this->db->where(array('cEmail'=>$this->input->post('email',TRUE)));
                    $this->db->update('msusers', array('cPassword'=>md5($new_pass)));    
					$user = $this->users_model->get_user_by_email();					
					
					$subject='Password Reset at SuangSaji - Do not reply';
                    $message = "<strong>Dear ".$user['cNama'].",</strong><br><br>
							<p>Permintaan Anda untuk reset Password telah diterima. <br>
							Password Anda telah di-reset. <br><br>
							Anda dapat menggunakan password sebagai berikut:</p><br><b>
							<table border=0 cellpadding=0 cellspacing=0></tr>
							<tr><td>Password</td><td>&nbsp;:&nbsp;</td><td>$new_pass</td></tr></table>
							</b><br><p>Pastikan Anda langsung mengganti password Anda kembali. 
							Anda dapat melakukan penggantian password kapanpun. <br><br>
							Sincerely yours,<br><br>Team of SaungSaji<br><a href='http://www.saungsaji.com'>http://www.saungsaji.com</a></p>";

					//$from='hendi0509@gmail.com'; 
					$from='info';
					$to=$this->input->post('email',TRUE);

					if($this->send_email($subject,$message,$from,$to))
					{
						$data['msg']="Password baru telah dikirim ke alamat email anda";
			        	//$this->load->view('resetpassword',$data);
					}
            }
        }
        //else
		//{
        $this->load->view('resetpassword',$data);
        //}		
    }	
	
	function send_email($subject,$message,$from,$to)
	{
		/*
		$config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'hendi0509@gmail.com', // change it to yours
		  'smtp_pass' => 'hendi591983', // change it to yours
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
		);
		
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from($from); // change it to yours
		$this->email->to($to);// change it to yours
		$this->email->subject($subject);
		$this->email->message($message);
		if($this->email->send())
		{
			return true;
		}
		else
		{
			show_error($this->email->print_debugger());
		}
		*/	
		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: SaungSaji <'.$from.'@saungsaji.com>' . "\r\n";
		mail('hendi0509@gmail.com', $subject, $message, $headers);
		if (mail($to, $subject, $message, $headers))
			return true;
	}
	/*
	function resto_page(){
        $data['base'] = $this->base;
        $data['title']='SaungSaji.com - online food order and delivery';
        $this->load->model('users_model', '', TRUE);
		$data['user_menu']=$this->users_model->get_user_menu(2);

		$this->load->view('header', $data);
		$this->load->view('resto_profile', $data);
		$this->load->view('menu', $data);
		$this->load->view('footer', $data);
	}
	*/
	
	function redirects($view=NULL,$title=NULL,$nama=NULL){
        $this->user_type_check();
        $data['base'] = $this->base;
        $data['title']=$title;
		$data['pesan']="";
		$data['msg']="";
		$this->load->model('users_model', '', TRUE);
		$data['user_menu']=$this->users_model->get_user_menu(1);
					
		if($view=='home'){
            $data['menu'] = $this->users_model->get_all_menu(0);
			$data['restoran'] = $this->users_model->get_all_restoran();
			$data['wilayah'] = $this->users_model->get_all_wilayah();
			$data['harga'] = $this->users_model->get_all_harga();
		}
		else if($view=='build_order'){					
			$restoran = $this->users_model->get_restoid($nama)->row(); 			
			//$sess_resto_id=array('idRestoran'=>$restoran->id); //irestoid dari msusers
			//$this->session->set_userdata($sess_resto_id);					
									
			//$sess_resto=array('idRestoran'=>$restoran->id);
    	    //$this->session->set_userdata($sess_resto);					
			//$resto_id=$this->session->userdata('idRestoran');			
			
			//------------------------
			//$this->users_model->add_order($this->session->userdata('cFirstOrder'),1)
			//------------------------
			
			//echo $this->session->userdata('idRestoran');
			$data['order']	= 	$this->users_model->get_order_session();
			$jum_order=$this->db->query("select * from trorderdetails_tmp where cSession='".$this->session->userdata('cOrderSess')."' and iRestoId=".$this->session->userdata('idRestoran')."");
			if($jum_order->num_rows()>0){
				$subtotal = $this->users_model->get_subtotal_session()->row();										
				$sub=$subtotal->subtotal;
			}
			else 
				$sub=0;			
			$data['sub']	= 	$sub;
						
			$data['restoran'] = $this->users_model->get_resto_profile($this->session->userdata('idRestoran'))->row(); //id dari msuser=5 untuk warung tekko
			$id_restoran = $this->users_model->get_resto_profile($this->session->userdata('idRestoran'))->row();			
			
			$data['alamat'] = $this->users_model->get_alamat($id_restoran->id);
			$data['pengantaran'] = $this->users_model->get_pengantaran($id_restoran->id);
			$data['senin'] = $this->users_model->get_opening($this->session->userdata('idRestoran'),'Senin')->row();
			$data['selasa'] = $this->users_model->get_opening($this->session->userdata('idRestoran'),'Selasa')->row();
			$data['rabu'] = $this->users_model->get_opening($this->session->userdata('idRestoran'),'Rabu')->row();
			$data['kamis'] = $this->users_model->get_opening($this->session->userdata('idRestoran'),'Kamis')->row();
			$data['jumat'] = $this->users_model->get_opening($this->session->userdata('idRestoran'),'Jumat')->row();
			$data['sabtu'] = $this->users_model->get_opening($this->session->userdata('idRestoran'),'Sabtu')->row();
			$data['minggu'] = $this->users_model->get_opening($this->session->userdata('idRestoran'),'Minggu')->row();
			$data['menu_restoran'] = $this->users_model->get_menu_restoran($id_restoran->id);
			$data['menu_diskon'] = $this->users_model->get_menu_diskon(NULL,NULL,NULL);
			//$data['menu_order'] = $this->users_model->get_menu_detail($id)->row();//												
			$data['charge_delivery']=$this->users_model->get_charge()->row();
			$data['payment_method']=$this->users_model->get_payment();					
		}
		else if($view=='check_out'){
			if ($this->session->userdata('userType')<>""){
				$data['user_profile']=$this->users_model->get_user_profile($this->session->userdata('userID'))->row();
				$data['menu_diskon'] = $this->users_model->get_menu_diskon(NULL,NULL,NULL);
				$data['order_check_out']=$this->users_model->get_order_session_check_out();//dipakai di checkout_login
				$data['order_temp'] = $this->db->query("select a.id, a.iTax,a.iBiayaAntar,a.dTglOrder,
					a.cJenisTerimaMakanan,a.dJamTerima,a.cVoucherCode,a.cAlamatAntar,a.cDesc,a.iJenisLokasiAntar,b.cPayment,c.iNominal
					from trorders_tmp a 
					left join mspaymentmethods b on a.iPaymentId=b.id
					left join msvouchers c on a.cVoucherCode=c.cCode										
					where a.cSession='".$this->session->userdata('cOrderSess')."' and a.idRestoran='".$this->session->userdata('idRestoran')."'
					order by a.id desc limit 0,1")->row();		//setelah index ke 0 sebanyak 1 record

				$view='checkout_login';								
			}
			else{
				$view='checkout_nologin';
			}
		}				
		else if($view=='finish'){			
			if($this->session->userdata('userID')==""){
				$data['order_finish'] = $dataorder = $this->db->query("select a.id, a.idOneStop,a.idCust,a.iTax,a.iBiayaAntar,a.cJenisTerimaMakanan,
					a.dJamTerima,a.cVoucherCode,a.cAlamatAntar,a.cDesc,a.iJenisLokasiAntar,a.dTglOrder,
					b.cPayment,c.cNama,c.cHp,c.cAlamat as cAlamatOneStop,e.cAlamat as cAlamatCustomer,f.iNominal, c.cEmail, g.cNama as cNamaRestoran
					from trorders a 
					left join mspaymentmethods b on a.iPaymentId=b.id					
					left join msonestop_cust c on a.idOneStop=c.id
					left join msusers d on a.idCust=d.id
					left join mscustprofiles e on d.id=e.iUsers
					left join msvouchers f on a.cVoucherCode=f.cCode
					left join msusers g on a.idRestoran=g.id
						where a.cSession='".$this->session->userdata('cOrderSess')."' and a.idRestoran='".$this->session->userdata('idRestoran')."'		
					order by a.id desc limit 0,1")->row();		//setelah index ke 0 sebanyak 1 record
			}
			else{	
				$data['order_finish'] = $dataorder = $this->db->query("select a.id, a.idOneStop,a.idCust,a.iTax,a.iBiayaAntar,a.cJenisTerimaMakanan,
					a.dJamTerima,a.cVoucherCode,a.cAlamatAntar,a.cDesc,a.iJenisLokasiAntar,a.dTglOrder,
					b.cPayment,c.cAlamat as cAlamatOneStop,d.cNama,e.cAlamat as cAlamatCustomer,e.cHp,f.iNominal, d.cEmail, g.cNama as cNamaRestoran
					from trorders a
					left join mspaymentmethods b on a.iPaymentId=b.id
					left join msonestop_cust c on a.idOneStop=c.id
					left join msusers d on a.idCust=d.id
					left join mscustprofiles e on d.id=e.iUsers
					left join msvouchers f on a.cVoucherCode=f.cCode
					left join msusers g on a.idRestoran=g.id
						where a.idCust='".$this->session->userdata('userID')."'
					order by a.id desc limit 0,1")->row();		//setelah index ke 0 sebanyak 1 record			
			}
			$data['menu_diskon'] = $menu_diskon = $this->users_model->get_menu_diskon(NULL,NULL,NULL);				
			$data['finish'] = $finish = $this->users_model->get_order_detail_finish($dataorder->id);
			//-----------------send email order ke user----------------------
			$subject='Order at SuangSaji - Do not reply';
			$message = "<div style='font-family: verdana; font-size:12px;'>
							<div style='font-size:20px;font-weight:bold;'>SaungSaji.com</div>
							<div>
								<div style='margin-top:20px;'>Dear ".$dataorder->cNama.", </div>
								<div style='margin-top:20px;'>Terima kasih telah melakukan pemesanan
									<div style='margin-top:5px;'>Kami akan segera menghubungi anda</div>
								</div>
							</div>
							<div style='margin-top:20px;'>
								<table cellpadding=3px cellspacing=0 style='font-size:12px;'>
									<tr><td style='width:120px;'>Customer</td><td>".$dataorder->cNama."</td></tr>
									<tr><td>Order Invoice</td><td>".substr('00000000'.$dataorder->id,-8)."</td></tr>
									<tr><td>Restoran</td><td>".$dataorder->cNamaRestoran."</td></tr>
								</table>
							</div>
							<div style='margin-top:20px;'>
								<table cellpadding=5px cellspacing=0 style='font-size:12px;border: 1px solid #BDB76B;table-layout: fixed;'>
								<tr bgcolor='#BDB76B' style='color:white;'>
									<td style='width:200px;text-align:center'>Menu</td>
									<td style='width:110px;text-align:center'>Harga per Item</td>
									<td style='width:75px;text-align:center'>Disc (%)</td>
									<td style='width:50px;text-align:center'>Jumlah</td>
									<td style='width:80px;text-align:center'>Total</td>
									<td style='width:150px;text-align:center'>Keterangan</td>	
								</tr>";
				$subtotal=0;
				foreach ($finish->result_array() as $row_finish){  	  
					$diskon=1;
					foreach ($menu_diskon->result_array() as $row_menu_diskon){
						if($row_finish['iMenuId']==$row_menu_diskon['iMenuId']){
							if(date('Y-m-d',strtotime($row_menu_diskon['dStartBerlaku']))<=date('Y-m-d',strtotime($dataorder->dTglOrder))){
								if(date('Y-m-d',strtotime($row_menu_diskon['dEndBerlaku']))>=date('Y-m-d',strtotime($dataorder->dTglOrder))){
									$diskon = $row_menu_diskon['iDiskon']/100;
								}									
							}
						}
					}					
					$subtotal=$subtotal + ($row_finish['iJumlah']*$row_finish['iHarga']*$diskon);
					if ($diskon<1)
						$disc=number_format($diskon*100,0,",",".")." %";
					else
						$disc="";							
								
					$message .="<tr>
									<td valign='top'>".$row_finish['cNama']."</td>
									<td valign='top' style='text-align: right;'>".number_format($row_finish['iHarga'],0,",",".")."</td>
									<td valign='top' style='text-align: center;'>".$disc."</td>
									<td valign='top' style='text-align: right;'>".number_format($row_finish['iJumlah'],0,",",".")."</td>
									<td valign='top' style='text-align: right;'>".number_format($row_finish['iJumlah']*$row_finish['iHarga']*$diskon,0,",",".")."</td>
									<td valign='top' style='text-wrap:normal;'>".str_replace('%20',' ',$row_finish['cDesc'])."</td>	
								</tr>";
				}
			$message .="<tr bgcolor='#FFFFEO'>
							<td>Subtotal</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td style='text-align: right;'>".number_format($subtotal,0,",",".")."</td>
							<td>&nbsp;</td>	
						</tr>
						<tr>
							<td>Tax</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td style='text-align: right;'>".number_format($dataorder->iTax,0,",",".")."</td>
							<td>&nbsp;</td>	
						</tr>
						<tr>
							<td>Delivery Cost</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td style='text-align: right;'>".number_format($dataorder->iBiayaAntar,0,",",".")."</td>
							<td>&nbsp;</td>	
						</tr>
						<tr>
							<td>Total Cost</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td style='text-align: right;'>".number_format($subtotal+$dataorder->iTax+$dataorder->iBiayaAntar,0,",",".")."</td>
							<td>&nbsp;</td>		
						</tr>";
				$nominal=0;
				if($dataorder->cVoucherCode!=""){
					$nominal=$dataorder->iNominal;		
					$message .="
							<tr>
								<td>Voucher ( ".strtoupper($dataorder->cVoucherCode)." )</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td>&nbsp;</td>
								<td style='text-align: right;'>".number_format($nominal,0,",",".")."</td>
								<td>&nbsp;</td>		
							</tr>";
				}
				
				$tanggal = date('l', strtotime(str_replace('-','/', $dataorder->dJamTerima)));
				$Hari = $this->NamaHari($tanggal);
				if($dataorder->cJenisTerimaMakanan==1)
					$jenis = "Delivery to Me";
				else if($dataorder->cJenisTerimaMakanan==2)
					$jenis = "Pick up";						
					
				if($dataorder->idOneStop!="NULL" && $dataorder->idOneStop!="0")
					$alamat = $dataorder->cAlamatOneStop;
				else if($dataorder->idCust!="NULL" && $dataorder->idCust!="0"){
					if ($dataorder->iJenisLokasiAntar==1)
						$alamat = $dataorder->cAlamatCustomer;
					else if ($dataorder->iJenisLokasiAntar==2)
						$alamat = $dataorder->cAlamatAntar;
				}		
				$message .="
						<tr bgcolor='#BDB76B' >
							<td>Total Payment</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td style='text-align: right;'>".number_format($subtotal+$dataorder->iTax+$dataorder->iBiayaAntar-$nominal,0,",",".")."</td>
							<td>&nbsp;</td>		
						</tr>
					</table>
				</div>
				<div style='margin-top:20px;'>
					<table cellpadding=4px cellspacing=0 style='font-size:12px;'>
					<tr>
						<td>".$jenis."</td>
						<td>".$Hari.", ".date('d-m-Y H:i',strtotime($dataorder->dJamTerima))."</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>		
					</tr>
					<tr>
						<td>Alamat Antar</td>
						<td>".$alamat."</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>		
					</tr>
					<tr>
						<td>Payment Method</td>
						<td>".$dataorder->cPayment."</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>		
					</tr>
					<tr>
						<td>Mobile Phone</td>
						<td>".$dataorder->cHp."</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>		
					</tr>	
					<tr>
						<td>Info tambahan</td>
						<td>".$dataorder->cDesc."</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>		
					</tr>
					</table>
				</div>
				<div style='margin-top:30px;'>
					Terima kasih,	
					<div style='margin-top:20px;'>Team of SaungSaji</div>
					<div><a href='http://www.saungsaji.com'>http://www.saungsaji.com</a></div>	
				</div>
			</div>";

			//$from='hendi0509@gmail.com'; 
			$from='order'; 
			$to=$dataorder->cEmail;
			
			if($this->users_model->get_email($dataorder->id,$dataorder->cEmail)->num_rows() < 1){			
				if($this->send_email($subject,$message,$from,$to)){
					$this->users_model->add_send_email_tr($dataorder->id,$dataorder->cEmail);
					$data['msg']="Terima kasih telah memesan makanan di SaungSaji.com";
			}
			}
			//-----------------end of send email order ke user---------------
		}
		//-----------start untuk handle sewaktu klik check out di build order		
		if($this->input->post('btncheckout')){
			$jum_order=$this->db->query("select * from trorderdetails_tmp where cSession='".$this->session->userdata('cOrderSess')."' and  iRestoId=".$this->session->userdata('idRestoran')."");
			if($jum_order->num_rows()>0){
				if($this->input->post('payment_method',TRUE)!=0){
					if($this->input->post('del_option',TRUE)=='1')
						$time=$this->input->post('time_del',TRUE);
					elseif($this->input->post('del_option',TRUE)=='2')
						$time=$this->input->post('time_pick',TRUE);
					$waktu = date('Y-m-d H:i',strtotime($time));	
					$tanggal = date('l', strtotime(str_replace('-','/', $waktu)));
					$Hari = $this->NamaHari($tanggal);
					$get_waktu_restoran = $this->users_model->get_opening($this->session->userdata('idRestoran'),$Hari)->row();
					
					$date = strtotime(date('Y-m-d H:i:s'));
					$datetime1 = strtotime($waktu);
					$interval  = abs($datetime1 - $date);
					$minutes   = round($interval / 60);					
						
					if($waktu>date('Y-m-d H:i') && $minutes>30){ //lebih dari jam sekarang -- date('Y-m-d H:i',strtotime($time))>date('Y-m-d H:i')
						if($waktu>date('H:i',strtotime($get_waktu_restoran->dOpenHour)) && $waktu<date('H:i',strtotime($get_waktu_restoran->dCloseHour))){ // date('H:i',strtotime($time)) -- antara jam buka restoran
							$order = $this->users_model->get_order_session();
							$menu_diskon = $this->users_model->get_menu_diskon(NULL,NULL,NULL);				
							$subtotal=0;
							if($order){	
								foreach ($order->result_array() as $row_order){			
									$diskon=1;
									foreach ($menu_diskon->result_array() as $row_menu_diskon){
										if($row_order['iMenuId']==$row_menu_diskon['iMenuId']){
											if(date('Y-m-d',strtotime($row_menu_diskon['dStartBerlaku']))<=date('Y-m-d')){
												if(date('Y-m-d',strtotime($row_menu_diskon['dEndBerlaku']))>=date('Y-m-d')){
													$diskon = $row_menu_diskon['iDiskon']/100;
												}									
											}
										}
									}					
									$subtotal = $subtotal + ($row_order['iJumlah']*$row_order['iHarga']*$diskon);							
								}
							}
							/*				
							$subtotal = $this->users_model->get_subtotal_session()->row();
							$sub=$subtotal->subtotal;
							*/
							if($id_restoran->cStatusTax=='Y'){
								$iTax=0.1*$subtotal;
							}
							else
								$iTax=0;
			
								if($this->input->post('del_option',TRUE)=='1'){
									if ($this->input->post('deliver_method',TRUE)!='0'){
										if($this->session->userdata('userID')!="" && $this->input->post('payment_method',TRUE)==2)
										{
											$wallet=$this->users_model->wallet()->row();
											if($wallet->wallet-$subtotal-$iTax-$this->session->userdata('iCharge')>=0)
											{
												if($this->users_model->add_trorders_tmp($iTax))
													redirect($this->base."/index.php/home/check_out");
											}
											else
												$data['pesan']="<font color='red'>Saldo di wallet anda tidak mencukupi<br>Saldo di wallet anda saat ini adalah Rp. ".number_format($wallet->wallet,0,",",".")."</font>";
										}
										else
										{
											if($this->users_model->add_trorders_tmp($iTax))
												redirect($this->base."/index.php/home/check_out");
										}
									}								
									else{
										$data['pesan']="<font color='red'>Pilih Deliver Method</font>";
									}
								}
								else{
									if($this->session->userdata('userID')!="" && $this->input->post('payment_method',TRUE)==2)
									{
										$wallet=$this->users_model->wallet()->row();
										if($wallet->wallet-$subtotal-$iTax-$this->session->userdata('iCharge')>=0)
										{
											if($this->users_model->add_trorders_tmp($iTax))
												redirect($this->base."/index.php/home/check_out");
										}
										else
											$data['pesan']="<font color='red'>Saldo di wallet anda tidak mencukupi<br>Saldo di wallet anda saat ini adalah Rp. ".number_format($wallet->wallet,0,",",".")."</font>";
									}
									else
									{
										if($this->users_model->add_trorders_tmp($iTax))
											redirect($this->base."/index.php/home/check_out");
									}									
								}									
						}
						else{
							$data['pesan']="<font color='red'>Waktu pengiriman / pengambilan harus antara jam buka dan tutup restoran</font>";	
						}
					}
					else{
						$data['pesan']="<font color='red'>Waktu pemesanan min 30 menit ke depan</font>";	
					}
				}
				else{
					$data['pesan']="<font color='red'>Pilih Payment Method yang anda inginkan</font>";	
				}
			}
			else
				$data['pesan']="<font color='red'>Anda belum order<br>Silahkan pesan menu yang ada</font>";
		}
		//-----------end untuk handle sewaktu klik check out di build order					
		
		//submit order untuk check out no login
		if($this->input->post('btncontinue')){
			//-----------start untuk handle sewaktu klik continue order di check out no login
			$this->form_validation->set_rules('nama', '*', 'trim|required');
			$this->form_validation->set_rules('email_new', 'Wajib diisi', 'trim|valid_email');
			$this->form_validation->set_rules('hp', 'Wajib diisi', 'trim|required|min_length[10]');
			$this->form_validation->set_rules('telp', 'Wajib diisi', 'trim|min_length[5]');
			$this->form_validation->set_rules('alamat', 'Wajib diisi', 'trim|required|min_length[10]');
			$this->form_validation->set_rules('agree', 'Wajib di cek', 'trim|required|');			
			//-----------end untuk handle sewaktu klik continue order di check out no login		

			if($this->form_validation->run() == FALSE){											
				$data['pesan']="<font color='red'>Mohon lengkapi data yang dibutuhkan</font>";
			}
			else{
				if($this->users_model->add_final_order_transaction(2)){				
					//$this->send_email_transaction();
					redirect($this->base."/index.php/home/finish");
				}					
				else
					$data['pesan']="Anda belum pesan";
			}
		}
			
		//submit order untuk check out login
		if($this->input->post('btnsubmit')){			
			if($this->users_model->add_final_order_transaction(1)){
				//$this->send_email_transaction();
				redirect($this->base."/index.php/home/finish");
			}					
			else
				$data['pesan']="Anda belum pesan";
		}			

		if($this->input->post('login_submit') || $this->input->post('login_submit_')){				
			$this->form_validation->set_rules('email', 'Wajib diisi', 'required|trim|valid_email');
			$this->form_validation->set_rules('password', '*', 'required|trim');		
			
            if($this->form_validation->run() == false){
				//echo 'test';
				//exit;
				$data['msg']="Cek kembali email dan password yang anda masukkan";
				$this->load->view('header', $data);
				//$this->load->view($view, $data);
				if($this->input->post('login_submit')){
					$this->load->view('relogin', $data);
				}
				else{
					$this->load->view($view, $data);
				}

				$this->load->view('menu', $data);
				$this->load->view('login', $data);
				$this->load->view('footer', $data);			
            }
            else{			
                $user = $this->users_model->get_user();
                if($user != NULL){
                    $sess_data=array('cNama'=>$user['cNama'], 'cEmail'=>$user['cEmail'], 'userType'=>$user['cGroupName'], 'userID'=>$user['id']);
                    $this->session->set_userdata($sess_data);					
			        $type=$this->session->userdata('userType');
					if($type=='customer'){
						//$data['order_check_out']=$this->users_model->get_order_session_check_out();//dipakai di checkout_login						
						$data['order_temp'] = $this->db->query("select a.id, a.iTax,a.iBiayaAntar,a.dTglOrder,
								a.cJenisTerimaMakanan,a.dJamTerima,a.cVoucherCode,a.cAlamatAntar,a.cDesc,a.iJenisLokasiAntar,b.cPayment,
								c.iNominal
							from trorders_tmp a 
							left join mspaymentmethods b on a.iPaymentId=b.id
							left join msvouchers c on a.cVoucherCode=c.cCode					
							where a.cSession='".$this->session->userdata('cOrderSess')."' and a.idRestoran='".$this->session->userdata('idRestoran')."'		
							order by a.id desc limit 0,1")->row();		//setelah index ke 0 sebanyak 1 record
						$data['order_check_out']=$this->users_model->get_order_session_check_out();//dipakai di checkout_login					
						$data['user_profile']=$this->users_model->get_user_profile($this->session->userdata('userID'))->row();
						
						$this->load->view('header', $data);
						if ($view=='checkout_nologin'){
							$data['menu_diskon'] = $this->users_model->get_menu_diskon(NULL,NULL,NULL);				
							$this->load->view('checkout_login', $data);	
						}
						elseif ($view=='finish')
				            redirect($this->base."/index.php");
						else
							$this->load->view($view, $data);	
						$this->load->view('menu', $data);
						$this->load->view('login', $data);
						$this->load->view('footer', $data);
					}
					elseif($type=='restaurant'){
						//redirect ke controller restoran
						redirect($this->base."/index.php/r/home");				
					}
                }
                else{
					//redirect($this->base."/index.php/home/relogin");				
					$data['msg']="Email atau Password Anda salah.";
					$this->load->view('header', $data);
					if($this->input->post('login_submit')){
						$this->load->view('relogin', $data);
					}
					else{
						$this->load->view($view, $data);
					}
					$this->load->view('menu', $data);
					$this->load->view('login', $data);
					$this->load->view('footer', $data);
                }				
            }			
		}
		else
		{
			$this->load->view('header', $data);
			$this->load->view($view, $data);
			$this->load->view('menu', $data);
			$this->load->view('login', $data);
			$this->load->view('footer', $data);
		}	
	}

	function relogin(){
        $data['base'] = $this->base;
		$data['title'] = 'Login - SaungSaji.com - online food order and delivery';
		$data['msg']="Username / Password Anda salah.";
		$this->load->view('header', $data);
		$this->load->view('relogin', $data);
		$this->load->view('menu', $data);
		$this->load->view('login', $data);
		$this->load->view('footer', $data);	
	}

    function login_check(){
        $userId=$this->session->userdata('cNama');
        if($userId==null){
            redirect($this->base."/index.php");
        }
    }	
	
    function user_type_check(){
        $userType=$this->session->userdata('userType');
        if($userType=='restaurant'){
            redirect($this->base."/index.php/r/home");
        }
    }		
	
    function signup(){
        //$this->login_check();
        $this->load->model('users_model', '', TRUE);

        $data['base']=$this->base;
        $data['title']="Sign Up - SaungSaji.com - online food order and delivery";
		$data['msg']="";

        $data['cap']=$this->get_captcha();
		
        $this->form_validation->set_rules('name', '*', 'trim|required');
        $this->form_validation->set_rules('email', 'Wajib diisi', 'trim|required|valid_email|callback_check_email');
        $this->form_validation->set_rules('alamat', 'Wajib diisi', 'trim|required|min_length[10]');
        $this->form_validation->set_rules('telp', 'Diisi', 'trim|min_length[5]');
        $this->form_validation->set_rules('hp', 'Wajib diisi', 'trim|required||min_length[10]');
		$this->form_validation->set_rules('agree', 'Wajib dicek', 'trim|required|');		

        if($this->input->post('signup_submit')){
            if($this->form_validation->run() == FALSE){
                /*echo "Ami Ekhane";
                echo validation_errors();
                exit;*/
				$data['msg']="";                                    
            }
            else{
				$new_pass = strtoupper(substr(md5(microtime()),rand(0,26),7));//rand(123456, 7654321);
                if($this->users_model->add_user(1,$new_pass)){					
					$subject='Registration at SuangSaji - Do not reply';
                    $message = "<strong>Dear ".$this->input->post('name',TRUE).",</strong><br><br>
							<p>Anda telah terdaftar di <a href='www.saungsaji.com'>SaungSaji.com</a> <br><br>
							Nikmati layanan pemesanan online menu makanan yang tersedia dan kumpulkan setiap poinnya</p>
							<br><b>
							<table border=0 cellpadding=0px cellspacing=5px>
							<tr><td>Email</td><td>&nbsp;:&nbsp;</td><td>".$this->input->post('email',TRUE)."</td></tr>
							<tr><td>Password</td><td>&nbsp;:&nbsp;</td><td>".$new_pass."</td></tr></table>
							</b><br><p>Pastikan Anda langsung mengganti password Anda kembali. 
							Anda dapat melakukan penggantian password kapanpun. <br><br>
							Sincerely yours,<br><br>Team of SaungSaji<br><a href='http://www.saungsaji.com'>http://www.saungsaji.com</a></p>";

					//$from='hendi0509@gmail.com'; 
					$from='info'; 
					$to=$this->input->post('email',TRUE);

					if($this->send_email($subject,$message,$from,$to)){
						$data['msg']="Terima kasih telah mendaftar. Password telah dikirim ke alamat email anda";                    
						//$this->load->view('daftar', $data);
					}
                }
                else{
                    $data['msg']="<font color='red'>Email telah terdaftar atas nama user lain</font>";                    
                    //$this->load->view('daftar', $data);
                }
            }
			//$this->load->view('daftar', $data);
        }
        //else
		//{
		$this->load->view('daftar', $data);
        //}
    }

    function cart($resto,$menu,$submit=NULL,$jumlah=NULL,$desc=NULL){
        //$this->login_check();
        $this->load->model('users_model', '', TRUE);
        $data['base']=$this->base;
        $data['title']="SaungSaji.com - online food order and delivery";
		$data['msg']="";
		//echo $this->session->userdata('idRestoran');
		//echo $this->session->userdata('cNamaResto');
		if($this->users_model->get_menu_detail($resto,$menu)->num_rows() > 0){		
			//if($this->input->post('submit_')){				
			if($submit=='submit'){				
				$id_first_order=$this->users_model->get_menu_detail($resto,$menu)->row_array();	
				$sess_resto=array('idRestoran'=>$id_first_order['iRestoId'],'cNamaResto'=>$resto); //irestoid dari msusers
				$this->session->set_userdata($sess_resto);					
				//$resto_id=$this->session->userdata('idRestoran');						
				$this->users_model->add_order($id_first_order['id'],$jumlah,urldecode($desc));
				//$this->redirects('build_order',$title,$id_first_order['cNamaResto']);				
				redirect($this->base."/index.php/home/build_order/".$resto);
			}
			else{
				$data['menu_detail'] = $menu_detail = $this->users_model->get_menu_detail($resto,$menu)->row_array();
				$data['menu_diskon'] = $this->users_model->get_menu_diskon(NULL,$menu_detail['id'],NULL);
				//$id_first_order=$this->users_model->get_menu_detail($menu)->row_array();
				//$sess_first_order=array('cFirstOrder'=>$id_first_order['id']);
				//$this->session->set_userdata($sess_first_order);					
				//echo $this->session->userdata('cFirstOrder');
				//$sess_resto=array('cNamaResto'=>$id_first_order['cNamaResto']);
				//$this->session->set_userdata($sess_resto);					
				$this->load->view('cartnew', $data);			
			}
		}
    }
	
    function check_email($str){
        $res = $this->db->get_where('msusers', array('cemail'=>$str));
        if($this->session->userdata('cEmail')!=$str && $res->num_rows() > 0){
            $this->form_validation->set_message('check_email', 'Alamat email telah terdaftar');
            return false;
        }
        return true;
    }

    function check_email_reset($str){
		$str=$this->input->post('email',TRUE);
        $res = $this->db->get_where('msusers', array('cEmail'=>$str));
        if($res->num_rows() < 1){
            $this->form_validation->set_message('check_email_reset', 'Alamat email tidak terdaftar');
            return false;
        }
        return true;
    }
	
    function get_captcha($type=null){
        $this->load->helper('captcha');
        $this->form_validation->set_rules('captcha', 'Captcha', 'trim|required|callback_captcha_check');
        $vals = array(
  			    'word' => rand(123456, 987654),
                'img_path'    => './captcha/',
                'img_url'    => $this->base.'/captcha/',
                'font_path'   => './font/MyriadPro-Regular.ttf'
        );
        $cap = create_captcha($vals);

        $dati = array(
            'captcha_id'  => '',
            'captcha_time'  => $cap['time'],
            'ip_address'  => $this->input->ip_address(),
            'word'        => $cap['word']
        );

        $sql = $this->db->insert_string('captcha', $dati);
        $this->db->query($sql);
        if($type!=null) echo $cap['image'];
        else return $cap['image'];
    }

    function captcha_check()
    {
        $expiration = time()-7200; // Two hour limit
        $this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
        // Then see if a captcha exists:
        $exp=time()-600;
        $sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
        $binds = array($this->input->post('captcha'), $this->input->ip_address(), $exp);
        $query = $this->db->query($sql, $binds);
        $row = $query->row();

        if ($row->count == 0)
        {
            $this->form_validation->set_message('captcha_check', 'Captcha yang Anda masukkan salah!');
            return FALSE;
        }else
		{
            return TRUE;
        }
    }
	
    function logout(){
        //$this->session->sess_destroy();
		$sess_data=array('cNama'=>'', 'cEmail'=>'', 'userType'=>'', 'userID'=>'', 'cOrderSess'=>'');
		$this->session->unset_userdata($sess_data);
        redirect($this->base);
    }
	
	function myprofile(){
		$this->login_check();
        $this->user_type_check();
		$this->load->model('users_model', '', TRUE);
		$data['base']=$this->base;
        $data['title']="SaungSaji.com - online food order and delivery";
		$data['msg1']="";
		$data['msg2']="";
		$data['user_menu']=$this->users_model->get_user_menu(1);
		$data['user_profile']=$this->users_model->get_user_profile($this->session->userdata('userID'))->row();
		
        $this->form_validation->set_rules('name', 'Wajib diisi', 'trim|required');
        $this->form_validation->set_rules('email', 'Wajib diisi', 'trim|required|valid_email|callback_check_email');
        $this->form_validation->set_rules('addr', 'Wajib diisi', 'trim|required|min_length[10]');
        $this->form_validation->set_rules('telp', 'Diisi', 'trim|min_length[5]');
        $this->form_validation->set_rules('hp', 'Wajib diisi', 'trim|required||min_length[10]');

        if($this->input->post('submit_profile')){
            if($this->form_validation->run() == FALSE){
                /*echo "Ami Ekhane";
                echo validation_errors();
                exit;*/
				$data['msg1']="Cek kembali data yang telah anda isi";
            }
            else{
                if($this->users_model->edit_user($this->session->userdata('userID'))){
                    $data['msg1']="Data profile anda telah diupdate";
					$data['user_profile']= $user = $this->users_model->get_user_profile($this->session->userdata('userID'))->row();
					$sess_data=array('cNama'=>$user->cNama, 'cEmail'=>$user->cEmail);
					$this->session->set_userdata($sess_data);					
                }
                else{
                    $data['msg1']="<font color='red'>Cek kembali data profile anda</font>"; 
                }
            }
        }	
		$this->load->view('header', $data);
		$this->load->view('myprofile', $data);
		$this->load->view('menu', $data);
		$this->load->view('footer', $data);	
	}

	function myorder($id1,$id2){
		$this->login_check();
        $this->user_type_check();
		
		$this->load->model('users_model', '', TRUE);		
		$data['base'] = $this->base;
        $data['title'] = "SaungSaji.com - online food order and delivery";
		$data['msg'] = "";
		$data['user_menu'] = $this->users_model->get_user_menu(1);
		$data['order_count'] = $this->users_model->customer_order($id1,$id2);
		$data['id1'] = $id1;
		$data['id2'] = $id2;
		$this->load->view('header', $data);
		$this->load->view('myorder', $data);
		$this->load->view('menu', $data);
		$this->load->view('footer', $data);
	}
	
	function by_order(){
		$id1=$this->input->post('id1',TRUE);
		$id2=$this->input->post('id2',TRUE);
		$page_number = filter_var($this->input->post('page',TRUE), FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
		//throw HTTP error if page number is not valid
		if(!is_numeric($page_number)){
			header('HTTP/1.1 500 Invalid page number!');
			exit();
		}
		//get current starting point of records
		$item_per_page = 4;
		$position = ($page_number * $item_per_page);

		$this->load->model('users_model', '', TRUE);
		$data['base']=$this->base;
		/*
        $data['order']= $this->db->query("select ".$position." as posisi,id,cNama,dTglOrder,cPayment,total+iTax+iBiayaAntar as iTotal,iStatusAntar,cPayment
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
						where c.dStartBerlaku <='".date('Y-m-d H:i:s')."'
							and c.dEndBerlaku >='".date('Y-m-d H:i:s')."'
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
						and a.iStatusAntar=".$id."
					group by a.idCust,c.cNama,a.dTglOrder,d.cPayment,a.iStatusAntar
				)a order by a.dTglOrder desc limit ".$position.",".$item_per_page.""); 
		*/
		$data['menu_diskon'] = $this->users_model->get_menu_diskon(NULL,NULL,NULL);
		
		$data['order_details']= $this->db->query("select b.* 
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
				and b.dEndBerlaku >= a.dTglOrder and
				a.cStatus='Y' and a.idCust='".$this->session->userdata('userID')."' and (a.iStatusAntar=".$id1." or a.iStatusAntar=".$id2.")");

		$data['order']= $this->db->query("select ".$position." as posisi,id,cNama,dTglOrder,cPayment,iTax+iBiayaAntar-iNominal as iTotal,
				 iStatusAntar,cPayment
				 from
				 (
					select a.id,a.idCust,c.cNama,a.dTglOrder,d.cPayment,a.iStatusAntar,
						sum(coalesce(a.iTax,0)) iTax,sum(coalesce(a.iBiayaAntar,0)) iBiayaAntar,sum(coalesce(e.iNominal,0)) iNominal
					from trorders a					
					left join msusers c
						on a.idRestoran=c.id
					left join mspaymentmethods d
						on a.iPaymentId=d.id
					left join msvouchers e 
						on a.cVoucherCode=e.cCode
					where a.cStatus='Y' and a.idCust='".$this->session->userdata('userID')."'
						and (a.iStatusAntar=".$id1." or a.iStatusAntar=".$id2.")
					group by a.id,a.idCust,c.cNama,a.dTglOrder,d.cPayment,a.iStatusAntar
				)a 				
				order by a.dTglOrder desc limit ".$position.",".$item_per_page.""); 				

		$this->load->view('tr_orders', $data);
	}	

	function myprevorder(){
		$this->login_check();
        $this->user_type_check();
		$this->load->model('users_model', '', TRUE);		
		$data['base']=$this->base;
        $data['title']="SaungSaji.com - online food order and delivery";
		$data['msg']="";
		$data['user_menu']=$this->users_model->get_user_menu(1);
	
		$this->load->view('header', $data);
		$this->load->view('myprevorder', $data);
		$this->load->view('menu', $data);
		$this->load->view('footer', $data);	
	}

	function mywallet(){ //belum dikurangi voucher
		$this->login_check();
        $this->user_type_check();
		$this->load->model('users_model', '', TRUE);		
		$data['base']=$this->base;
        $data['title']="SaungSaji.com - online food order and delivery";
		$data['msg']="";
		$data['user_menu']=$this->users_model->get_user_menu(1);
		$data['bank_company']=$this->users_model->get_sys_table('Bank');
		$data['wallet']=$this->users_model->wallet()->row();
		$data['order_header']=$this->users_model->order_header()->row();
		$data['order_detail'] = $this->users_model->order_detail();
		$data['menu_diskon'] = $this->users_model->get_menu_diskon(NULL,NULL,NULL);
		
		$this->form_validation->set_rules('input_date', '*', 'required|trim');
        $this->form_validation->set_rules('rek_from', '*', 'required|trim');		
		$this->form_validation->set_rules('acc_from', '*', 'required|trim');				
		$this->form_validation->set_rules('name_from', '*', 'required|trim');						
		$this->form_validation->set_rules('jumlah', '*', 'required|trim');								

		if($this->input->post('submit_top_up')){
            if($this->form_validation->run() == false){
				$data['msg']="Cek kembali data yang telah anda input";
            }
            else{
				if($this->users_model->add_wallet()){
                    //Send Confirmation Mail Here
                    $data['msg']="Terima kasih. Top up anda akan segera diverifikasi";                    
	            }
                else{
                    $data['msg']="<font color='red'>Error</font>";                                    
                }                
			}
		}	
	
		$this->load->view('header', $data);
		$this->load->view('mywallet', $data);
		$this->load->view('menu', $data);
		$this->load->view('footer', $data);	
	}

	function mywallet_t(){
		$this->login_check();
        $this->user_type_check();
		$this->load->model('users_model', '', TRUE);		
		$data['base']=$this->base;
        $data['title']="SaungSaji.com - online food order and delivery";
		$data['msg']="";
		$data['user_menu']=$this->users_model->get_user_menu(1);
		$data['mywallet_tr']=$this->users_model->wallet_tr();
	
		$this->load->view('header', $data);
		$this->load->view('mywallet_t', $data);
		$this->load->view('menu', $data);
		$this->load->view('footer', $data);	
	}
	
	function top_up(){
		$page_number = filter_var($this->input->post('page',TRUE), FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
		//throw HTTP error if page number is not valid
		if(!is_numeric($page_number)){
			header('HTTP/1.1 500 Invalid page number!');
			exit();
		}
		//get current starting point of records
		$item_per_page = 4;
		$position = ($page_number * $item_per_page);

		$this->load->model('users_model', '', TRUE);
		$data['base']=$this->base;
		
		$data['top_up']= $this->db->query("select ".$position." as posisi,dTglTransfer,cBankUser,cRekeningUser,iJumlah,cStatusVerified
				from trtopups where cStatus='Y' and idCust='".$this->session->userdata('userID')."'
				order by dTglTransfer desc
				limit ".$position.",".$item_per_page.""); 				

		$this->load->view('top_up', $data);
	}	

	function mypoint($warning=NULL){
		$this->login_check();
        $this->user_type_check();
		$this->load->model('users_model', '', TRUE);		
		$data['base']=$this->base;
        $data['title']="SaungSaji.com - online food order and delivery";
		if($warning=='warning')
			$data['msg']="Poin anda tidak mencukupi";
		elseif ($warning=='warning_')
			$data['msg']="Poin dapat digunakan setelah ada pemesanan yang diselesaikan";
		elseif ($warning=='success')
			$data['msg']="Poin telah ditukarkan. Silakan cek email anda.";
		else
			$data['msg']="";
		$data['user_menu']=$this->users_model->get_user_menu(1);
		$data['user_point']=$this->users_model->customer_point()->row();
		$data['sign_up_point']=$this->users_model->sign_up_point()->row();
		$data['user_redeem_point']=$this->users_model->customer_redeem_point()->row();
		$data['point_trans']=$this->users_model->point_trans_sys()->row();
		$data['all_reward']=$this->users_model->get_all_reward();

		$this->load->view('header', $data);
		$this->load->view('mypoint', $data);
		$this->load->view('menu', $data);
		$this->load->view('footer', $data);	
	}

	function mypoint_t(){
		$this->login_check();
        $this->user_type_check();
		$this->load->model('users_model', '', TRUE);		
		$data['base']=$this->base;
        $data['title']="SaungSaji.com - online food order and delivery";
		$data['msg']="";
		$data['user_menu']=$this->users_model->get_user_menu(1);
		$data['redeem_point']=$this->users_model->redeem_point();
		
		$this->load->view('header', $data);
		$this->load->view('mypoint_t', $data);
		$this->load->view('menu', $data);
		$this->load->view('footer', $data);	
	}	
	
	function redeem(){
		$page_number = filter_var($this->input->post('page',TRUE), FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
		//throw HTTP error if page number is not valid
		if(!is_numeric($page_number)){
			header('HTTP/1.1 500 Invalid page number!');
			exit();
		}
		//get current starting point of records
		$item_per_page = 4;
		$position = ($page_number * $item_per_page);

		$this->load->model('users_model', '', TRUE);
		$data['base']=$this->base;
		
		$data['redeem']= $this->db->query("select ".$position." as posisi, a.dTglRedeem, b.cNama,b.iPoin, a.cCode
				from trredeempoints a
				left join msrewards b
					on a.idReward=b.id
				where a.cStatus='Y' and a.idCust='".$this->session->userdata('userID')."'
				order by a.dTglRedeem desc
				limit ".$position.",".$item_per_page.""); 				

		$this->load->view('redeem', $data);
	}	
	
	function add_order(){
		$stat=$this->input->post('stat',TRUE);
		$id=$this->input->post('id',TRUE); // idMenu trorderdetails_tmp
		$jumlah=$this->input->post('j',TRUE); // jumlah pesanan
		$type=$this->input->post('type',TRUE); // type delivery
		$idRest=$this->input->post('idRest',TRUE);
		$desc=$this->input->post('req',TRUE);// description pesanan
		$tax=0;
		$total=0;
		$charge=0;
		$sisa=0;

		$this->load->model('users_model', '', TRUE);			
		$menu_diskon = $this->users_model->get_menu_diskon(NULL,NULL,NULL);
		
		if ($stat == 'add')
			$kondisi = $this->users_model->add_order($id,$jumlah,$desc);
		else if ($stat == 'del'){
			//$getidMenu = $this->users_model->get_idMenu($id)->row();
			//$menuId = $getidMenu->iMenuId;
			$kondisi = $this->users_model->delete_order($id);			
		}
		else if ($stat == 'type_del'){
			$kondisi = true;
		}
	
        if($kondisi){
			//$output="<h3 class='order-myitem'>My Items</h3>";
			//$output .="<div class='padd7 borderorange'>&nbsp;</div>";
			$output="";
			$order = $this->users_model->get_order_session();					
			if($stat == 'add' || $stat == 'del')
				$restoran=$this->users_model->get_restoran($id)->row();
			elseif($stat == 'type_del')
				$restoran=$this->users_model->get_resto_profile($idRest)->row();
			
			$charge_delivery=$this->users_model->get_charge()->row();
			
			$jum_order=$this->db->query("select * from trorderdetails_tmp where cSession='".$this->session->userdata('cOrderSess')."' and  iRestoId=".$this->session->userdata('idRestoran')."");				
			if($jum_order->num_rows()>0){
				$subtotal = $this->users_model->get_subtotal_session()->row();					
				$sub=$subtotal->subtotal;
			}
			else 
				$sub=0;				
			
			if($order){	
				$subtotal=0;
				foreach ($order->result_array() as $row_order){			
					$output .="<div class='order-myitem-row' id='row".$row_order['iMenuId']."'>";
					$output .="<div class='order-myitem-col5'>".$row_order['iJumlah']."</div>";
					$output .="<div class='order-myitem-col6'>".$row_order['cNama']."</div>";					
					$output .="<div class='order-myitem-col4'>Rp</div>";
					$output .="<div class='order-myitem-col2'>";
					$diskon=1;
					foreach ($menu_diskon->result_array() as $row_menu_diskon){
						if($row_order['iMenuId']==$row_menu_diskon['iMenuId']){
							if(date('Y-m-d',strtotime($row_menu_diskon['dStartBerlaku']))<=date('Y-m-d')){
								if(date('Y-m-d',strtotime($row_menu_diskon['dEndBerlaku']))>=date('Y-m-d')){
									$diskon = $row_menu_diskon['iDiskon']/100;
								}									
							}
						}
					}					
					$subtotal = $subtotal + ($row_order['iJumlah']*$row_order['iHarga']*$diskon);							

					$output .="<input type='text' readonly class='currency myitem-price' name='total1' id='total1' value='".number_format($row_order['iJumlah']*$row_order['iHarga']*$diskon,0,",",".")."'>";
					$output .="</div>"; 					
					$output .="<div class='order-myitem-col3'>";
					$output .="<a href=\"JavaScript:void(0);\">";
					//$output .="<img src='".$this->base."/img/delete.png' style='cursor:pointer' onclick=\"delete_row(this.id, ".$charge.", \"".$restoran->cStatusAntar."\")\" id=\"".$row_order['iMenuId']."\">";
					//$output1 .="<img src='".$this->base."/img/delete.png' style='cursor:pointer' onclick=\"delete_row(this.id, ".$charge.", '".$restoran->cStatusAntar."');delete_o(this.id);\" id=\"".$row_order['id']."\">";
					$output .="<img src='".$this->base."/img/delete.png' style='cursor:pointer' onclick=\"delete_row_(this.id);\" id=\"".$row_order['iMenuId']."\">";
					$output .="</a>";
					$output .="</div>";
					$output .="</div>";
				}
				
				if ($restoran->cStatusAntar=='Y'){
					if ($type=='1')	{		
						if($subtotal>=$restoran->iMinOrder){
							$charge=0;
						}
						else{
							$charge=$restoran->iCharge;
						}
					}
				}
				elseif ($restoran->cStatusAntar=='N'){
					if ($type=='1'){		
						$charge=$charge_delivery->cValue;
					}				
				}
				
				$sess_resto=array('iCharge'=>$charge);
				$this->session->set_userdata($sess_resto);					
								
			}			
			$output .="<div class='order-myitem-row'>";
			$output .="<div class='order-myitem-col1 orange'>Subtotal</div>";
			$output .="<div class='order-myitem-col4 orange'>Rp</div>";
			$output .="<div class='order-myitem-col2 orange'><input type='text' readonly class='currency myitem-price orange' name='subtotal' id='subtotal' value=".number_format($subtotal,0,",",".")."></div>";
			$output .="<div class='order-myitem-col3 orange'>&nbsp;</div>";
			$output .="</div>";
			if ($restoran->cStatusTax=='Y')
			{
				$tax=0.1*$subtotal;
				$output .="<div class='order-myitem-row'>";
				$output .="<div class='order-myitem-col1'>Tax</div>";
				$output .="<div class='order-myitem-col4'>Rp</div>";
				$output .="<div class='order-myitem-col2'><input type='text' readonly class='currency myitem-price' name='tax' id='tax' value=".number_format($tax,0,",",".")."></div>";
				$output .="<div class='order-myitem-col3'>&nbsp;</div>";
				$output .="</div>";
			}							
			$output .="<div class='order-myitem-row'>";
			$output .="<div class='order-myitem-col1'>Delivery Cost</div>";
			$output .="<div class='order-myitem-col4'>Rp</div>";
			$output .="<div class='order-myitem-col2'>";
			$output .="<input type='text' readonly class='currency myitem-price' name='delivery' id='delivery' value='".number_format($charge,0,",",".")."'>"; 
			$output .="</div>";
			$output .="<div class='order-myitem-col3'>&nbsp;</div>";
			$output .="</div>";
			$total=$subtotal+$tax+$charge;
			$output .="<div class='order-myitem-row'>";
			$output .="<div class='order-myitem-col1 orange'>Total</div>";
			$output .="<div class='order-myitem-col4 orange'>Rp</div>";
			$output .="<div class='order-myitem-col2 orange'>";
			$output .="<input type='text' readonly class='currency myitem-price orange' name='ttotal'";
			/*
			if ($restoran->cStatusTax=='Y')	{
				$output .="id='ttotal'";
			}
			else{
				$output .="id='ttotalnotax'"; 
			}
			*/
			$output .="value=".number_format($total,0,",",".")."></div>";
			
			$output .="<div class='order-myitem-col3 orange'>&nbsp;</div></div>";
			if ($restoran->cStatusAntar=='Y' && $subtotal<$restoran->iMinOrder){
				$sisa=$restoran->iMinOrder-$subtotal;
			}
			$output .="<div class='order-myitem-row'>";
			$output .="<div class='order-myitem-col1'>Untuk free delivery</div>";
			$output .="<div class='order-myitem-col4'>Rp</div>";
			$output .="<div class='order-myitem-col2'>";
			$output .="<input type='text' readonly class='currency myitem-price' name='remain' id='remain' value=".number_format($sisa,0,",",".")."></div>";
			//$output .="<input type='text' readonly class='currency myitem-price' name='remain' id='remain' value=".$sisa."></div>";
			$output .="<div class='order-myitem-col3'>-</div></div>";

			//$payment_method=$this->users_model->get_payment();		
			
			//$output .="<div class='padd25'>&nbsp;</div><div class='option-payment'>";
			///$output .="<select class='options-list-payment' id='optionspayment' onchange=\"payment_method();\">";
			//$output .="<option> Payment Method </option>";
			
			//foreach ($payment_method->result_array() as $row_payment_method){  	  			
			//	$output .="<option value='".$row_payment_method['id']."'>".$row_payment_method['cPayment']."</option>";
			//}
			//$output .="</select></div><div class='padd7'>&nbsp;</div>";
			//$output .="<div class='box-voucher' style='display:none'><input type='text' class='input-voucher' placeholder=' Voucher Code ' onkeyup=\"check_voucher();\"></div>";			
			//$output .="<div id='checking'></div><div class='checkout'>";			
			//$output .="<input type='submit' name='btncheckout' id='btncheckout' value='Check Out'></div></div>";		
			
			echo $output;
		}
	}
	
	function check_voucher(){
		$voucher=$this->input->post('voucher',TRUE);
		$idRest=$this->input->post('idRest',TRUE);		
		$this->load->model('users_model', '', TRUE);				
        $res = $this->users_model->get_voucher($voucher,$idRest);
		
	    //if($res < 1)
			echo $res;//'Voucher tidak terdaftar atau sudah digunakan atau sudah kadarluarsa';
		//else
			//echo 'Voucher terdaftar';
		
	}
	
	function delete_order(){
		$id=$this->input->post('id',TRUE);
		$this->load->model('users_model', '', TRUE);				
        if($this->users_model->delete_order($id))			
			echo $id;
	}
	
	function tanggal(){
		echo date('Y-m-d H:i:s');
	}
	
	function by_page(){
		$idR=$this->input->post('idR',TRUE);
		$idW=$this->input->post('idW',TRUE);
		$idH=$this->input->post('idH',TRUE);
		$idM=$this->input->post('idM',TRUE);				
		$page_number = filter_var($this->input->post('page',TRUE), FILTER_SANITIZE_NUMBER_INT, FILTER_FLAG_STRIP_HIGH);
		//throw HTTP error if page number is not valid
		if(!is_numeric($page_number)){
			header('HTTP/1.1 500 Invalid page number!');
			exit();
		}
		//get current starting point of records
		$item_per_page = 2;
		$position = ($page_number * $item_per_page);
		
		$this->load->model('users_model', '', TRUE);
        $data['menu']= $this->users_model->get_all_menu($idR,$item_per_page,$position,$idW,$idH,$idM);		
		$data['menu_diskon'] = $this->users_model->get_menu_diskon(NULL,NULL,NULL);
		
		$data['base']=$this->base;
		$this->load->view('list_menu', $data);
		/*
		$menu = $this->db->query("select a.id,a.cNama,a.cImageThumb,d.iHarga,c.cNama as cNamaResto,b.cStatusOpen from msmenurestos a 
				left join msrestprofiles b on a.idRestoran= b.id
				left join msusers c on b.iUsers= c.id
				left join mshargamenus d on a.id= d.idMenu
				where a.cStatus='Y' and c.cStatus='Y' and d.cStatus='Y' and d.dStartBerlaku <=".date('Y-m-d H:i:s')." and 
					d.dEndBerlaku >=".date('Y-m-d H:i:s')."
				LIMIT ".$position.",".$item_per_page); 
		*/
		/*
		if($menu->num_rows()>0){
			$output ="<ul class='list-food'>";
			foreach ($menu->result_array() as $row_menu){
				$no++;
				if($no % 4 <> 0){
					$output .= "<li><img src='".$this->base."/img/menu_thumb/".$row_menu['cImageThumb']."'>";
					$output .= "<span class='deskripsi-food'><div class='deskripsi-food-text'>";
					$output .= "<span class='title'>".$row_menu['cNama']."</span>";
					$output .= "<div id='open'><a href='".$this->base."/index.php/home/cart/".str_replace(' ','',$row_menu['cNamaResto'])."/".str_replace(' ','',$row_menu['cNama'])."' class='popupimage gradGreen'>Open</a></div>";
					$output .= "<div id='price'>".$row_menu['iHarga']."</div></div></span></li>";
				}
				else{
					$output .= "<li class='last'>";
					$output .= "<img src='".$this->base."/img/menu_thumb/".$row_menu['cImageThumb']."'>";
					$output .= "<span class='deskripsi-food'>";
					$output .= "<div class='deskripsi-food-text'>";
					$output .= "<span class='title'>".$row_menu['cNama']."</span>";
					$output .= "<div id='open'><a href='".$this->base."/index.php/home/cart/".str_replace(' ','',$row_menu['cNamaResto'])."/".str_replace(' ','',$row_menu['cNama'])."' class='popupimage gradGreen'>Open</a></div>";
					$output .= "<div id='price'>".$row_menu['iHarga']."</div>";
					$output .= "</div></span></li>";
				}
			}
			$output .= "</ul>";	
		}	
		echo $output;
		*/
	}	

	function by_restaurant(){
		$this->load->model('users_model', '', TRUE);
		$idR=$this->input->post('idR',TRUE);		
		$idW=$this->input->post('idW',TRUE);		
		$idH=$this->input->post('idH',TRUE);		
		$idM=$this->input->post('idM',TRUE);				
		$item_per_page=2;
		$menu= $this->users_model->get_all_menu($idR,NULL,NULL,$idW,$idH,$idM);		
		echo ceil($menu->num_rows()/$item_per_page);		
        //$data['menu']= $this->users_model->get_all_menu($id);		
		//$data['base']=$this->base;
		//$this->load->view('list_menu', $data);
	}	

	function suggestions()
	{
		$term=trim($this->input->get('term', TRUE));

		$this->load->model('users_model', '', TRUE);		
		$menu = $this->users_model->get_menu_by_name($term);		
		
		foreach ($menu->result_array() as $row_menu){
			$output[] = $row_menu['cNama'];		
		}

		// Return data
		echo json_encode($output);
	}
	
	function check_detail_order($status=NULL)
	{		
		$this->load->model('users_model', '', TRUE);
		$order=$this->users_model->get_order_detail_finish($this->input->post('id',TRUE));				
		$menu_diskon=$this->users_model->get_menu_diskon(NULL,NULL,NULL);
		
		if($status==NULL){
			$dataorder = $this->db->query("select a.id, a.idOneStop,a.idCust,a.iTax,a.iBiayaAntar,a.cJenisTerimaMakanan,a.dJamTerima,f.cCode cVoucherCode,
						a.cAlamatAntar,a.cDesc,a.iJenisLokasiAntar,b.cPayment,c.cAlamat as cAlamatOneStop,e.cAlamat as cAlamatCustomer, f.iNominal
						from trorders a 
						left join mspaymentmethods b on a.iPaymentId=b.id					
						left join msonestop_cust c on a.idOneStop=c.id
						left join msusers d on a.idCust=d.id
						left join mscustprofiles e on d.id=e.iUsers
						left join msvouchers f on a.cVoucherCode=f.cCode
							where a.id='".$this->input->post('id',TRUE)."'")->row();
		}
		else{
			$dataorder = $this->db->query("select a.id, a.idOneStop,a.idCust,a.iTax,a.iBiayaAntar,a.cJenisTerimaMakanan,a.dJamTerima,f.cCode cVoucherCode,
						a.cAlamatAntar,a.cDesc,a.iJenisLokasiAntar,b.cPayment,c.cAlamat as cAlamatOneStop,e.cAlamat as cAlamatCustomer, f.iNominal
						from trorders a 
						left join mspaymentmethods b on a.iPaymentId=b.id					
						left join msonestop_cust c on a.idOneStop=c.id
						left join msusers d on a.idCust=d.id
						left join mscustprofiles e on d.id=e.iUsers
						left join msvouchers f on a.cVoucherCode=f.cCode and f.idRestoran='".$this->session->userdata('userID')."'
							where a.id='".$this->input->post('id',TRUE)."'")->row();
		}
							
		$output = "";
		$output .= "<div class='myorder-box-detail'>";
		
		foreach ($order->result_array() as $row_order){			
			$diskon=1;
			foreach ($menu_diskon->result_array() as $row_menu_diskon){
				if($row_order['iMenuId']==$row_menu_diskon['iMenuId']){
					if(date('Y-m-d',strtotime($row_menu_diskon['dStartBerlaku']))<=date('Y-m-d',strtotime($row_order['dTglOrder']))){
						if(date('Y-m-d',strtotime($row_menu_diskon['dEndBerlaku']))>=date('Y-m-d',strtotime($row_order['dTglOrder']))){
							$diskon = $row_menu_diskon['iDiskon']/100;
						}					
					}
				}
			}
			$harga=$row_order['iHarga']*$diskon;
			if ($diskon==1)
				$disc="";
			else
				$disc = "- Disc : ". $diskon*100 ." %";
			
			$output .= "<div class='checkbox-row'>";
			$output .= "<div class='myorder-detail-desc'>".$row_order['iJumlah']." ".$row_order['cNama']." ".$disc."</div>";
			$output .= "<div class='myorder-detail-price'>Rp. ".number_format($harga,0,",",".")."</div>";
			$output .= "</div>";					
		}
		
		$output .= "<div class='checkbox-row'>";
		$output .= "<div class='myorder-detail-desc'>Tax</div>";
		$output .= "<div class='myorder-detail-price'>Rp. ".number_format($dataorder->iTax,0,",",".")."</div>";
		$output .= "</div>";
		$output .= "<div class='checkbox-row'>";
		$output .= "<div class='myorder-detail-desc'>Delivery Cost</div>";
		$output .= "<div class='myorder-detail-price'>Rp. ".number_format($dataorder->iBiayaAntar,0,",",".")."</div>";
		$output .= "</div>";		
		$output .= "<div class='checkbox-row'>";
		if ($dataorder->cVoucherCode<>""){
			$output .= "<div class='myorder-detail-desc'>Voucher - ".$dataorder->cVoucherCode."</div>";
			$output .= "<div class='myorder-detail-price'>- ( Rp. ".number_format($dataorder->iNominal,0,",",".")." )</div>";	
		}
		$output .= "</div></div>";
		
		echo $output;
	}		
	
	function Hari($tanggal){
		$hari = date('Y-m-d',strtotime($tanggal));
		return($hari);
	}

	function NamaHari($hari){
		switch($hari){
			case "Sunday": $hari = "Minggu";break;
			case "Monday": $hari = "Senin";break;
			case "Tuesday": $hari = "Selasa";break;
			case "Wednesday": $hari = "Rabu";break;
			case "Thursday": $hari = "Kamis";break;
			case "Friday": $hari = "Jumat";break;
			case "Saturday": $hari = "Sabtu";break;
		}
		return($hari);
	}
	
	function testing(){
		echo ceil(0);
	}
	
    function redeem_point($nama,$submit=NULL,$jumlah=NULL,$desc=NULL){
        $this->load->model('users_model', '', TRUE);
        $data['base']=$this->base;
        $data['title']="SaungSaji.com - online food order and delivery";
		$data['msg']="";
		
		$user_point=$this->users_model->customer_point()->row();
		$user_redeem_point=$this->users_model->customer_redeem_point()->row();
		$point_trans=$this->users_model->point_trans_sys()->row();		
		$reward_detail=$this->users_model->get_reward_detail($nama)->row_array();
		$sign_up_point=$this->users_model->sign_up_point()->row();

		if ($user_point)
			$user_poin = $user_point->iPoint;
		else
			$user_poin = 0;					
		
		if ($user_redeem_point)
			$tr_poin=$user_redeem_point->iPoint;
		else
			$tr_poin=0;
		
		if($sign_up_point)
			$sign_up_poin=$sign_up_point->iPoin;
		else
			$sign_up_poin=0;
	
		$poin_usr=ceil($user_poin/$point_trans->cChildCode)+$sign_up_poin-$tr_poin;
		
		$order_count = $this->users_model->customer_order(2,2);
		
		if($this->users_model->get_reward_detail($nama)->num_rows() > 0){
			if($submit=='submit'){
				if($order_count->num_rows()>0){
					if($poin_usr-($reward_detail['iPoin'])>=0){
						$reward_detail=$this->users_model->get_reward_detail($nama)->row_array();
						$code=strtoupper(substr(md5(microtime()),rand(0,26),7));
	
						if ($reward_detail['cJenis']=='Voucher Online'){
							if($reward_detail['cVendor']=='SaungSaji'){
								if ($this->users_model->add_ms_voucher($reward_detail['iValue'],$code,'Saung',NULL))
									$this->users_model->add_tr_redeem_point($reward_detail['id'],1,$code);
							}
							else{								
								$resto=$this->users_model->get_restoid(str_replace(' ','',$reward_detail['cVendor']))->row();
								if ($resto){
									if ($this->users_model->add_ms_voucher($reward_detail['iValue'],$code,'Resto',$resto->id))
									$this->users_model->add_tr_redeem_point($reward_detail['id'],1,$code);								
								}								
							}
						}
						else{
							$this->users_model->add_tr_redeem_point($reward_detail['id'],1,$code);
						}
						redirect($this->base."/index.php/home/myPoint/success");
					}
					else{
						redirect($this->base."/index.php/home/myPoint/warning");
					}
				}
				else{
					redirect($this->base."/index.php/home/myPoint/warning_");
				}
			}
			else{
				$data['reward_detail']=$this->users_model->get_reward_detail($nama)->row_array();
				$this->load->view('redeem_point', $data);			
			}
		}
    }
	
	function test_tanggal(){
		//echo date('Y-m-d H:i:s',time()+30*24*3600);
		echo strtoupper(substr(md5(microtime()),rand(0,26),7));		
	}	
	
	function diff_time(){
		$today = new DateTime(date('y-m-d h:m:s'));
		$pastDate = $today->diff(new DateTime('2012-09-11 10:25:00'));
		echo $pastDate->y ." "; //return the difference in Year(s).
		echo $pastDate->m ." "; //return the difference in Month(s).
		echo $pastDate->d ." "; //return the difference in Day(s).
		echo $pastDate->h ." "; //return the difference in Hour(s).
		echo $pastDate->i ." "; //return the difference in Minute(s)
		echo $pastDate->s;
	}
	
	function date_difference() {
		$all = round((strtotime("2011-10-09 10:00:00") - strtotime("2011-10-10 10:00:00")) / 60);
		$d = floor ($all / 1440);
		$h = floor (($all - $d * 1440) / 60);
		$m = $all - ($d * 1440) - ($h * 60);
		//Since you need just hours and mins
		return array('hours'=>$h, 'mins'=>$m);
	}
	
	function beda(){
		$date = strtotime(date('Y-m-d H:i:s'));
		$datetime1 = strtotime("2014-10-10 10:00:00"); //date('Y-m-d H:i',strtotime("2011-10-09 10:00:00")); //strtotime("2011-10-09 10:00:00");
		$datetime2 = strtotime("2014-10-10 10:00:00"); //date('Y-m-d H:i',strtotime("2011-10-10 10:00:00")); //strtotime("2011-10-10 10:00:00"); //date('Y-m-d H:i:s'); date('Y-m-d H:i',strtotime($time))
		$interval  = abs($datetime1 - $date);
		$minutes   = round($interval / 60);
		echo date('Y-m-d H:i:s') . "<br>";
		echo "2014-10-10 10:00:00<br>";
		echo 'Diff. in minutes is: '.$minutes; 
		//echo $date;
		/*
		$today = date('Y-m-d H:i:s');
		$past = date('Y-m-d H:i:s',strtotime('2014-10-01 10:00:00'));
		echo $past-$today. "<br>" ;
		echo $past. "<br>" ;
		//$this->date_difference($today, $past);
		*/
	}
	
	function error(){ 
        $this->user_type_check();
		$this->login_check();
        $data['base'] = $this->base;
        $data['title']="Error Page";
		$data['pesan']="";
		$data['msg']="";
        
		$this->load->view('header', $data);		
		$this->load->view('menu', $data);
		$this->load->view('error', $data);
		$this->load->view('login', $data);
		$this->load->view('footer', $data);
    } 

}
?>
