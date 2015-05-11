<?php
class Prelaunch extends CI_Controller{
    var $base;

    function  __construct() {
		parent::__construct();
        $this->base =$this->config->item('base_url');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    function index(){
        $data['title'] = "SaungSaji.com - online food order and delivery";
		$data['base'] = $this->base;	
		$data['msg']="";
		
		$this->load->model('users_model', '', TRUE);
		
        $this->form_validation->set_rules('email', 'Wajib diisi', 'trim|required|valid_email|callback_check_email');

		if($this->input->post('submit')){
            if($this->form_validation->run() == false){
				$data['msg']="Cek kembali email anda";
            }
            else{
				if($this->users_model->add_email()){					
					$subject='Point at SaungSaji.com - Do not reply';
                    $message = "<strong>Dear ".$this->input->post('email').",</strong><br><br>
							<p>Anda mendapatkan 50 poin.<br>
							Anda dapat melihat poin anda setelah anda mendaftar di Saungsaji.com dengan menggunakan alamat email yang sama<br><br>
							Kumpulkan lebih banyak lagi poin dengan melakukan transaksi di SaungSaji.com
							</p><br>
							<p>Sincerely yours,<br><br>Team of SaungSaji<br><a href='http://www.saungsaji.com'>http://www.saungsaji.com</a></p>";

					$from='hendi0509@gmail.com'; 
					$to=$this->input->post('email',TRUE);

					if($this->send_email($subject,$message,$from,$to))
					{
						$data['msg']="Anda telah mendapat 50 poin. Silakan cek email anda";
					}
				}		
			}
		}
		
		$this->load->view('prelaunch',$data);
    }
	
    function check_email($str){
		$this->load->model('users_model', '', TRUE);
		$str=$this->input->post('email',TRUE);
        $res = $this->db->get_where('msemail', array('cEmail'=>$str));
        if($res->num_rows() > 0){
            $this->form_validation->set_message('check_email', 'Alamat email telah digunakan');
            return false;
        }
        return true;
    }

	function send_email($subject,$message,$from,$to)
	{		
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: SaungSaji <info@saungsaji.com>' . "\r\n";
		mail('hendi0509@gmail.com', $subject, $message, $headers);
		if (mail($to, $subject, $message, $headers))
			return true;
	}
}
?>
