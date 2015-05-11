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
    }

    function index(){
        $this->login_check();
		$this->load->model('users_model', '', TRUE);
        $data['base']= $base = $this->base;
        $data['title']="SaungSaji - online food order and delivery";
        $data['msg']="";
		$data['user_menu']=$this->users_model->get_user_menu(2);
		$data['wilayah'] = $this->users_model->get_all_wilayah();
		$data['pengantaran'] = $this->users_model->get_pengantaran($this->session->userdata('userID'));
		$data['alamat'] = $this->users_model->get_alamat($this->session->userdata('userID'));
		$data['opening'] = $this->users_model->get_opening($this->session->userdata('userID'));
		$data['resto_profile'] = $this->users_model->get_resto_profile($this->session->userdata('userID'))->row();
		
        $this->form_validation->set_rules('name', 'Wajib diisi', 'trim|required');
        $this->form_validation->set_rules('email', 'Wajib diisi', 'trim|required|valid_email|callback_check_email');
		$this->form_validation->set_rules('hp_resto', 'Wajib diisi', 'trim|required||min_length[10]');
        $this->form_validation->set_rules('min_order_resto', 'Wajib diisi', 'trim|required');

		if($this->input->post('btnprofile')){
            if($this->form_validation->run() == FALSE){
				$data['msg']="<font color='red'>Cek kembali data yang telah anda input</font>";
            }
            else{
				if($this->users_model->edit_user($this->session->userdata('userID'))){				
					$data['resto_profile']= $user = $this->users_model->get_user_profile($this->session->userdata('userID'),$this->session->userdata('userType'),NULL)->row();
					$sess_data=array('cNama'=>$user->cNama);
					$this->session->set_userdata($sess_data);
					if($this->session->userdata('cEmail')!=$this->input->post('email',TRUE)){					
						//kirim email aktivasi ke user
						$subject='Info at SuangSaji - Do not reply';
	                    $message = "<strong>Dear ".$this->input->post('name',TRUE).",</strong><br><br>
							Email pendaftaran anda di Saungsaji.com akan diganti menjadi <b>".$this->input->post('email',TRUE)."</b><br>
							<p>Klik link aktivasi berikut untuk melakukan pergantian email</p>
							<p><a href='http://www.saungsaji.com/index.php/home/email_activation/".$this->session->userdata('userID')."/".$this->session->userdata('userType')."/".$this->session->userdata('session_id')."' target='_blank'>
							http://www.saungsaji.com/index.php/home/email_activation/".$this->session->userdata('userID')."/".$this->session->userdata('userType')."/".$this->session->userdata('session_id')."</a></p><br>
							<p>Email baru anda akan aktif setelah link di atas di klik<br><br>
							Sincerely yours,<br><br>Team of SaungSaji<br><a href='http://www.saungsaji.com'>http://www.saungsaji.com</a></p>";	
						$from='info'; 
						$to=$this->session->userdata('cEmail');
						if($this->send_email($subject,$message,$from,$to)){
							$data['msg']="<div style='margin-bottom:5px;'>Data profile anda telah diupdate</div>
							<div style='margin-bottom:5px;'>Link aktivasi pergantian email telah dikirim ke ".$this->session->userdata('cEmail')."</div>";
						}
					}		
					else{
						$data['msg']="<div style='margin-bottom:5px;'>Data profile anda telah diupdate</div>";
					}			
				}
				else{
					$data['msg']="<font color='red'>Cek kembali data yang telah anda input</font>";                    
				}					    				
			}	
		}
		$this->load->view('header', $data);
		$this->load->view('resto_profile', $data);		
		$this->load->view('menu', $data);
		$this->load->view('footer', $data);
    }

    function login_check(){
        $userType=$this->session->userdata('userType');
        if($userType<>'restaurant'){
            redirect($this->base);
        }
    }	
	
    function user_type_check(){
        $userType=$this->session->userdata('userType');
        if($userType=='customer'){
            redirect($this->base);
        }
    }	

	function mymenu(){
		$this->login_check();
        $this->user_type_check();
		$this->load->model('users_model', '', TRUE);		
		$data['base']=$this->base;
        $data['title']="My Menu - SaungSaji.com - online food order and delivery";
		$data['msg']="";
		$data['user_menu']=$this->users_model->get_user_menu(2);
		$id_restoran = $this->users_model->get_resto_profile($this->session->userdata('userID'))->row();
		$data['menu_restoran'] = $this->users_model->get_menu_restoran($id_restoran->id);
		$this->load->view('header', $data);
		$this->load->view('mymenu', $data);
		$this->load->view('menu', $data);
		$this->load->view('footer', $data);	
	}

	function addmenu(){
		$this->login_check();
        $this->user_type_check();
		$this->load->model('users_model', '', TRUE);		
		$data['base']=$this->base;
        $data['title']="My Menu - SaungSaji.com - online food order and delivery";
		$data['msg']="";
		$data['user_menu']=$this->users_model->get_user_menu(2);
	
		$this->load->view('header', $data);
		$this->load->view('addmenu', $data);
		$this->load->view('menu', $data);
		$this->load->view('footer', $data);	
	}
	
	function editmenu(){
		$this->login_check();
        $this->user_type_check();
		$this->load->model('users_model', '', TRUE);		
		$data['base']=$this->base;
        $data['title']="My Menu - SaungSaji.com - online food order and delivery";
		$data['msg']="";
		$data['user_menu']=$this->users_model->get_user_menu(2);
	
		$this->load->view('editmenu', $data);
	}

	function mypromo(){
		$this->login_check();
        $this->user_type_check();
		$this->load->model('users_model', '', TRUE);		
		$data['base']=$this->base;
        $data['title']="My Promo - SaungSaji.com - online food order and delivery";
		$data['msg']="";
		$data['user_menu']=$this->users_model->get_user_menu(2);
		
		$id_restoran = $this->users_model->get_resto_profile($this->session->userdata('userID'))->row();
		
		$data['menu_diskon'] = $this->users_model->get_menu_diskon($id_restoran->id, NULL, 'Resto');	
		$this->load->view('header', $data);
		$this->load->view('mypromo', $data);
		$this->load->view('menu', $data);
		$this->load->view('footer', $data);	
	}

	function addpromo(){
		$this->login_check();
        $this->user_type_check();
		$this->load->model('users_model', '', TRUE);		
		$data['base']=$this->base;
        $data['title']="My Promo - SaungSaji.com - online food order and delivery";
		$data['msg']="";
		$data['user_menu']=$this->users_model->get_user_menu(2);
	
		$this->load->view('header', $data);
		$this->load->view('addpromo', $data);
		$this->load->view('menu', $data);
		$this->load->view('footer', $data);	
	}

	function myreport(){
		$this->login_check();
        $this->user_type_check();
		$this->load->model('users_model', '', TRUE);		
		$data['base']=$this->base;
        $data['title']="My Report - SaungSaji.com - online food order and delivery";
		$data['msg']="";
		$data['user_menu']=$this->users_model->get_user_menu(2);		
	
		$this->load->view('header', $data);
		$this->load->view('myreport', $data);
		$this->load->view('menu', $data);
		$this->load->view('footer', $data);	
	}

	function myreport_t(){
		$this->login_check();
        $this->user_type_check();
		$this->load->model('users_model', '', TRUE);		
		$data['base']=$this->base;
        $data['title']="My Report - SaungSaji.com - online food order and delivery";
		$data['msg']="";
		$data['user_menu']=$this->users_model->get_user_menu(2);
	
		$this->load->view('header', $data);
		$this->load->view('myreport_t', $data);
		$this->load->view('menu', $data);
		$this->load->view('footer', $data);	
	}
	/*
	function report($param=NULL){
		$from=$this->input->post('from',TRUE);
		$to=$this->input->post('to',TRUE);
		$total_all = 0;
		$this->load->model('users_model', '', TRUE);		
		if($param=="a"){
			$param1="1";
			$param2="1";
		}
		else{
			$param1="2"; //onprogress
			$param2="3"; //sudah tarik
		}
		$report_header = $this->users_model->report_header($from,$to,$param1,$param2);		
		$report_detail = $this->users_model->report_detail($from,$to,$param1,$param2);		
		
		$output = "";		
		if($report_header->num_rows()>0){
			$no=0;
			$total_all=0;
			$output .= "<form name='detail' method='post'><div class='checkbox-row'>
							<div class='mymenu-th-no left bold middle'>No</div>
							<div class='mymenu-th-menu center pink bold middle'>Tanggal</div>
							<div class='mymenu-th-total center bold middle'>Penjualan (Rp)</div>";
			if($param=="b"){		
				$output .= "<div class='mymenu-th-status center pink bold middle'>Status Penarikan</div>";
			}
							
			$output .= "<div class='mymenu-th-action center middle'>&nbsp;</div></div>";

			foreach ($report_header->result_array() as $row_report_header){  	  
				$no=$no+1;
				$total=0;
				foreach ($report_detail->result_array() as $row_report_detail){
					if($row_report_header['id']==$row_report_detail['idOrders']){
						$diskon=1;
						$menu_diskon = $this->users_model->get_menu_diskon(NULL,$row_report_detail['iMenuId'],'Resto');
						foreach ($menu_diskon->result_array() as $row_menu_diskon){
							if($row_report_detail['iMenuId']==$row_menu_diskon['iMenuId']){
								if(date('Y-m-d',strtotime($row_menu_diskon['dStartBerlaku']))<=date('Y-m-d',strtotime($row_report_header['dTglOrder']))){
									if(date('Y-m-d',strtotime($row_menu_diskon['dEndBerlaku']))>=date('Y-m-d',strtotime($row_report_header['dTglOrder']))){
										$diskon = $row_menu_diskon['iDiskon']/100;
									}									
								}
							}
						}
						$total=$total + ($row_report_detail['iJumlah']*$row_report_detail['iHarga']*$diskon);
					}
				}
				$output .= "<div class='checkbox-row'>
								<div class='mymenu-th-no middle left'>".$no."</div>
								<div class='mymenu-th-menu middle center padd10px1'>".date("d-m-Y",strtotime($row_report_header['dTglOrder']))."</div>
								<div class='mymenu-th-total middle right padd10px1'>".number_format($row_report_header['iTotal']+$total,0,",",".")."</div>";
				
				if($param=="b"){		
					if ($row_report_header['cStatusTarik']=="2")
						$status="On Progress";
					else
						$status="Sudah di transfer";
					$output .= "<div class='mymenu-th-status center middle'>".$status."</div>";
				}
								
				$output .= "<div class='mymenu-th-action middle center'><div class='btn-style'	onclick='check_detail(".$row_report_header['id'].")'>detail</div></div>
							</div>
							<div align='center' id='loading".$row_report_header['id']."' style='display:none;margin-top:50px;'></div>
							<div class='padd33px paddbottom".$row_report_header['id']."'><div id='refresh".$row_report_header['id']."'></div></div>";
										
				$total_all=$total_all+$row_report_header['iTotal']+$total;
			}
			
			$output .= "<div class='checkbox-row'>
								<div class='mymenu-th-no middle left'></div>
								<div class='mymenu-th-menu middle center padd10px1 bold'>Total</div>
								<div class='mymenu-th-total middle right padd10px1 bold'>
								<input type='hidden' name='nTotal' value='".$total_all."'>
								".number_format($total_all,0,",",".")."</div>
								<div class='mymenu-th-action middle center'></div>
							</div></form>";
			
		}					
		else{
			$output .= "Data yang anda cari tidak ditemukan";
		}		
		echo $output;
	}
	*/
	function report(){
		$from=$this->input->post('from',TRUE);
		$to=$this->input->post('to',TRUE);
		$total_all = 0;
		$this->load->model('users_model', '', TRUE);		
		$report_header = $this->users_model->report_header($from,$to);		
		$report_detail = $this->users_model->report_detail($from,$to);		
		
		$output = "";		
		if($report_header->num_rows()>0){
			$no=0;
			$total_all=0;
			$output .= "<form name='detail' method='post'><div class='checkbox-row'>
							<div class='mymenu-th-no left bold middle'>No</div>
							<div class='mymenu-th-menu center pink bold middle'>Invoice</div>
							<div class='mymenu-th-menu center bold middle'>Tanggal</div>
							<div class='mymenu-th-total center pink bold middle'>Total Bayar (Rp)</div>";
			/*				
			if($param=="b"){		
				$output .= "<div class='mymenu-th-status center pink bold middle'>Status Penarikan</div>";
			}
			*/
							
			$output .= "<div class='mymenu-th-action center middle'>&nbsp;</div></div>";

			foreach ($report_header->result_array() as $row_report_header){  	  
				$no=$no+1;
				$total=0;
				foreach ($report_detail->result_array() as $row_report_detail){
					if($row_report_header['id']==$row_report_detail['idOrders']){
						if($row_report_detail['iDiskon']>0)
							$diskon=$row_report_detail['iDiskon']/100;
						else
							$diskon=1;

						/*
						$menu_diskon = $this->users_model->get_menu_diskon(NULL,$row_report_detail['iMenuId'],NULL);
						foreach ($menu_diskon->result_array() as $row_menu_diskon){
							if($row_report_detail['iMenuId']==$row_menu_diskon['iMenuId']){
								if(date('Y-m-d',strtotime($row_menu_diskon['dStartBerlaku']))<=date('Y-m-d',strtotime($row_report_header['dTglOrder']))){
									if(date('Y-m-d',strtotime($row_menu_diskon['dEndBerlaku']))>=date('Y-m-d',strtotime($row_report_header['dTglOrder']))){
										$diskon = $row_menu_diskon['iDiskon']/100;
									}									
								}
							}
						}
						*/
						$total=$total + ($row_report_detail['iJumlah']*$row_report_detail['iHarga']*$diskon);
					}
				}
				
				if($row_report_header['iTotal']+$total>=0){
					$total_=$row_report_header['iTotal']+$total;
				}
				else{
					$total_=0;
				}
				
				$output .= "<div class='checkbox-row'>
								<div class='mymenu-th-no middle left'>".$no."</div>
								<div class='mymenu-th-menu middle center padd10px1'>#".$row_report_header['id']."-".date("Ymd",strtotime($row_report_header['dTglOrder']))."</div>
								<div class='mymenu-th-menu middle center padd10px1'>".date("d-m-Y",strtotime($row_report_header['dTglOrder']))."</div>
								<div class='mymenu-th-total middle right padd10px1'>".number_format($total_,0,",",".")."</div>";
				
				/*
				if($param=="b"){		
					if ($row_report_header['cStatusTarik']=="2")
						$status="On Progress";
					else
						$status="Sudah di transfer";
					$output .= "<div class='mymenu-th-status center middle'>".$status."</div>";
				}
				*/
								
				$output .= "<div class='mymenu-th-action middle center'><div class='btn-style'	onclick='check_detail(".$row_report_header['id'].")'>detail</div></div>
							</div>
							<div align='center' id='loading".$row_report_header['id']."' style='display:none;margin-top:50px;'></div>
							<div class='padd33px paddbottom".$row_report_header['id']."'><div id='refresh".$row_report_header['id']."'></div></div>";
										
				$total_all = $total_all + $total_;
				//echo $total_all."<br>";
			}
			
			$output .= "<div class='checkbox-row'>
								<div class='mymenu-th-no middle left'></div>
								<div class='mymenu-th-menu middle center padd10px1 bold'>Total</div>
								<div class='mymenu-th-total middle right padd10px1 bold'>
								<input type='hidden' name='nTotal' value='".$total_all."'>
								".number_format($total_all,0,",",".")."</div>
								<div class='mymenu-th-action middle center'></div>
							</div></form>";
			
		}					
		else{
			$output .= "Data yang anda cari tidak ditemukan";
		}		
		echo $output;
	}
	
	function cash_(){	
		$this->load->model('users_model', '', TRUE);
		$from=$this->input->post('from',TRUE);
		$to=$this->input->post('to',TRUE);
		$output = "";

		if($from!="" && $to!=""){
			if($this->users_model->select_data($from,$to)->num_rows()>0){
				if($this->users_model->tarik_dana($from,$to)){
					$output .="Terima kasih. Dana anda akan segera di proses.";		
				}
			}
			else
				$output .="Tidak ada penarikan untuk range tanggal tersebut";	
		}
		else
			$output .="Pilih range tanggal penarikan";	
		echo $output;
	}
	
	function mytransaction(){
		$this->login_check();
        $this->user_type_check();
		$this->load->model('users_model', '', TRUE);		
		$data['base']=$this->base;
        $data['title']="My Transaction - SaungSaji.com - online food order and delivery";
		$data['msg']="";
		$data['user_menu']=$this->users_model->get_user_menu(2);		
	
		$this->load->view('header', $data);
		$this->load->view('mytransaction', $data);
		$this->load->view('menu', $data);
		$this->load->view('footer', $data);	
	}
	
    function update_status(){
		$this->load->model('users_model', '', TRUE);
		$id = $this->input->post('id',TRUE);
		$value = $this->input->post('value',TRUE);
		$idR = $this->input->post('idR',TRUE);
		$openh = $this->input->post('openH',TRUE);
		$closeh = $this->input->post('closeH',TRUE);
		
		if($id == 'close_' || $id == 'open_'){
			$this->db->where('id', $idR);
			$this->db->update('msrestprofiles', array('cStatusOpen'=>$value,'dUpdated'=>date('Y-m-d H:i:s')));
		}
		else{
			$id_ = explode("-",$id);
			$this->db->where('id', $id_[1]);
			$this->db->update('msopenings', array('cStatus'=>$value,'dOpenHour'=>$openh,'dCloseHour'=>$closeh,'dUpdated'=>date('Y-m-d H:i:s')));
		}		
        
        if(!mysql_errno())
            echo "<font color='red'>Status buka restoran telah diupdate</font>";       	
        else 
			echo "<font color='red'>Data tida bisa diupdate</font>";
    }
	
	function update_openH(){
		$this->load->model('users_model', '', TRUE);		
		$id = $this->input->post('id',TRUE);
		$openh = $this->input->post('openH',TRUE);
		
		$this->db->where('id', $id);
		$this->db->update('msopenings', array('dOpenHour'=>$openh,'dUpdated'=>date('Y-m-d H:i:s')));		
        
        if(!mysql_errno())
            echo "<font color='red'>Waktu buka restoran telah diupdate</font>";
        else 
			echo "<font color='red'>Data tida bisa diupdate</font>";
    }
	
	function update_closeH(){
		$this->load->model('users_model', '', TRUE);		
		$id = $this->input->post('id',TRUE);
		$closeh = $this->input->post('closeH',TRUE);
		
		$this->db->where('id', $id);
		$this->db->update('msopenings', array('dCloseHour'=>$closeh,'dUpdated'=>date('Y-m-d H:i:s')));		
        
        if(!mysql_errno())
            echo "<font color='red'>Waktu tutup restoran telah diupdate</font>";
        else 
			echo "<font color='red'>Data tida bisa diupdate</font>";
    }
	
	function add_addr(){
		$this->load->model('users_model', '', TRUE);		
		
		if($this->input->post('addr',TRUE)!=""){
			if($this->users_model->add_address()){
				$alamat = $this->users_model->get_alamat($this->session->userdata('userID'));
				if ($alamat->num_rows()>0){
					foreach ($alamat->result_array() as $row_alamat){
						echo "<div>
								<div class='label-myprofile-2'>- ".$row_alamat['cAlamat']."</div>
								<div class='input-myprofile-text'>
									<input type='button' class='btn-style' name='del_address' value='hapus' onClick='del_address(".$row_alamat['id'].");'>
								</div>			
							</div>";		
						//echo "<div class='label-opening-col2-'>- ".$row_alamat['cAlamat']."</div>";				
					}
				}
				else{
					echo "<div class='label-opening-col2- red'>Belum ada alamat yang ditambahkan</div>";				
				}
			}		
		}		
    }
	
	function del_addr(){
		$this->load->model('users_model', '', TRUE);		
	
		if($this->users_model->del_address()){
			$alamat = $this->users_model->get_alamat($this->session->userdata('userID'));
			if ($alamat->num_rows()>0){
				foreach ($alamat->result_array() as $row_alamat){
					echo "<div>
							<div class='label-myprofile-2'>- ".$row_alamat['cAlamat']."</div>
							<div class='input-myprofile-text'>
								<input type='button' class='btn-style' name='del_address' value='hapus' onClick='del_address(".$row_alamat['id'].");'>
							</div>			
						</div>";		
					//echo "<div class='label-opening-col2-'>- ".$row_alamat['cAlamat']."</div>";				
				}
			}
			else{
				echo "<div class='label-opening-col2- red'>Belum ada alamat yang ditambahkan</div>";				
			}
		}		
    }

	function add_deli(){
		$this->load->model('users_model', '', TRUE);		
		$str = "";
		$warning = "";
		if(!$this->users_model->add_deli()){			
			$warning .= "<div class='label-opening-col2- red'>Wilayah yang ingin ditambahkan telah terdaftar</div>";				
		}
		
		$pengantaran = $this->users_model->get_pengantaran($this->session->userdata('userID'));
		if ($pengantaran->num_rows()>0){
			foreach ($pengantaran->result_array() as $row_pengantaran){
				$str .= "<div>
						<div class='label-myprofile-2'>- ".$row_pengantaran['cWilayah']."</div>
						<div class='input-myprofile-text'>
							<input type='button' class='btn-style' name='del_wilayah' value='hapus' onClick='del_deli(".$row_pengantaran['id'].");'>
						</div>			
					</div>";		
				//echo "<div class='label-opening-col2-'>- ".$row_alamat['cAlamat']."</div>";				
			}
		}
		else{
			$str .= "<div class='label-opening-col2- red'>Belum ada wilayah yang ditambahkan</div>";				
		}
		
		echo $warning.$str;
    }

	function del_deli(){
		$this->load->model('users_model', '', TRUE);		
	
		if($this->users_model->del_deli()){
			$pengantarans = $this->users_model->get_pengantaran($this->session->userdata('userID'));
			if ($pengantarans->num_rows()>0){
				foreach ($pengantarans->result_array() as $row_pengantarans){
					echo "<div>
							<div class='label-myprofile-2'>- ".$row_pengantarans['cWilayah']."</div>
							<div class='input-myprofile-text'>
								<input type='button' class='btn-style' name='del_address' value='hapus' onClick='del_deli(".$row_pengantarans['id'].");'>
							</div>			
						</div>";		
					//echo "<div class='label-opening-col2-'>- ".$row_alamat['cAlamat']."</div>";				
				}
			}
			else{
				echo "<div class='label-opening-col2- red'>Belum ada wilayah pengantaran yang ditambahkan</div>";				
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


}

?>