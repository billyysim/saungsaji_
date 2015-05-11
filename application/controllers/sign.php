<?php
class Sign extends CI_Controller{
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
        $data['base']=$this->base;
        $data['title']="SaungSaji.com - online food order and delivery";
		$data['msg']="";
		
		$this->load->model('users_model', '', TRUE);
		
        $this->form_validation->set_rules('signup-email', 'Sign Email', 'trim|required|valid_email|callback_check_email');

        if($this->input->post('btn_sign')){
            if($this->form_validation->run() == FALSE){
				$data['msg']="Cek kembali email anda";                    		     
            }
            else{
                if($this->users_model->add_email()){					
					$subject='Point SaungSaji.com - Do not reply';
                    $message = "<strong>Dear ".$this->input->post('signup-email').",</strong><br><br>
							<p>Anda mendapatkan 50 poin.<br>
							Anda dapat melihat poin anda setelah anda melakukan registrasi ulang<br><br>
							Kumpulkan lebih banyak lagi poin dengan melakukan transaksi di SaungSaji.com
							</p><br>
							<p>Sincerely yours,<br><br>Team of SaungSaji<br><a href='http://www.saungsaji.com'>http://www.saungsaji.com</a></p>";

					$from='hendi0509@gmail.com'; 
					$to=$this->input->post('signup-email',TRUE);

					if($this->send_email($subject,$message,$from,$to))
					{
						$data['msg']="Poin telah ditambahkan. Silakan cek email anda";
					}
				}
            }
        }
        $this->load->view('default',$data);     
    }
	
    function check_email($str){
		$str=$this->input->post('signup-email',TRUE);
        $res = $this->db->get_where('msemail', array('cEmail'=>$str));
        if($res->num_rows() > 0){
            $this->form_validation->set_message('check_email', 'Alamat email telah terdaftar');
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
