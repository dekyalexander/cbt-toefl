<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* TOEFL UNIS
* Deky Alexander
* dekyalexander200@gmail.com
*/
class Welcome extends CI_Controller {
	private $kelompok = 'ujian';
	private $url = 'welcome';

	function __construct(){
		parent:: __construct();
		$this->load->library('access_tes');
		$this->load->library('user_agent');
	}
    
	public function index(){
		$data['url'] = $this->url;
		$data['timestamp'] = strtotime(date('Y-m-d H:i:s'));
		if ($this->agent->is_browser()){
            if($this->agent->browser()=='Internet Explorer' ){
                $this->template->display_user('blokbrowser_view', 'Browser yang didukung');
            }else{
                if(!$this->access_tes->is_login()){
                    $this->template->display_user($this->kelompok.'/welcome_view', 'Selamat Datang', $data);
        		}else{
                    redirect('tes_dashboard');
        		}
            }
        }else{
            $this->template->display_user('blokbrowser_view', 'Browser yang didukung');
        }
	}

	function login(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('username', 'Username','required|strip_tags');
        $this->form_validation->set_rules('password', 'Password','required|strip_tags');
        if($this->form_validation->run() == TRUE){
            $this->form_validation->set_rules('token','token','callback_check_login');
			if($this->form_validation->run() == FALSE){
				//Jika login gagal
                $status['status'] = 0;
                $status['error'] = validation_errors();
			}else{
				//Jika sukses
                $status['status'] = 1;
			}
        }else{
            $status['status'] = 0;
            $status['error'] = validation_errors();
        }
        echo json_encode($status);
    }
    
    function logout(){
		$this->access_tes->logout();
		redirect('welcome');
	}
	
	function check_login(){	
		$username = $this->input->post('username',TRUE);
		$password = $this->input->post('password',TRUE);
		
		$login = $this->access_tes->login($username, $password, $this->input->ip_address());
		if($login==1){
			return TRUE;
		}else if($login==2){
			$this->form_validation->set_message('check_login','Password yang dimasukkan salah');
			return FALSE;
		}else{
			$this->form_validation->set_message('check_login','Username yang dimasukkan tidak dikenal');
			return FALSE;
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */