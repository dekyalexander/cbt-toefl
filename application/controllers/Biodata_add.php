<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* TOEFL UNIS
* Deky Alexander
* dekyalexander200@gmail.com
*/
class Biodata_add extends Tes_Controller {
	private $kelompok = 'ujian';
	private $url = 'biodata_add';
	
    function __construct(){
		parent:: __construct();
		$this->load->model('cbt_user_model');
		$this->load->model('cbt_user_grup_model');

		$this->load->model('cbt_biodata');
	}
    
    public function index(){
        $this->load->helper('form');
        $data['nama'] = $this->access_tes->get_nama();
        $data['group'] = $this->access_tes->get_group();
        $data['url'] = $this->url;
        $data['timestamp'] = strtotime(date('Y-m-d H:i:s'));

        


        $this->template->display_tes($this->kelompok.'/biodata_tambah', 'Dashboard', $data);
    }
    function tambah(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('tambah-nim', 'NIM','required|strip_tags');
        $this->form_validation->set_rules('tambah-nama', 'Nama','required|strip_tags');
        $this->form_validation->set_rules('tambah-fakultas', 'Fakultas','required|strip_tags');
        $this->form_validation->set_rules('tambah-prodi', 'Prodi','strip_tags');
        $this->form_validation->set_rules('tambah-nomor', 'Nomorhp','required|strip_tags');
        $this->form_validation->set_rules('tambah-tanggal', 'Tanggal','required|strip_tags');
        
        if($this->form_validation->run() == TRUE){
        	$data['nim'] = $this->input->post('tambah-nim', true);
            $data['nama'] = $this->input->post('tambah-nama', true);
            $data['fakultas'] = $this->input->post('tambah-fakultas', true);
            $data['prodi'] = $this->input->post('tambah-prodi', true);
            $data['nomorhp'] = $this->input->post('tambah-nomor', true);
            $data['tanggal'] = $this->input->post('tambah-tanggal', true);

			if($this->cbt_biodata->save($data)){
			$status['pesan'] = 1 ;
	        $status['pesan'] = 'Data Peserta berhasil disimpan ';
	        }
	    }else{
	    	$status['status'] = 0;
            $status['pesan'] = validation_errors();

	    }
        
        redirect('biodata');
    }
    

	/**
	 * Merubah password user tes
	 */
	function password(){
        $this->load->library('form_validation');
        
		$this->form_validation->set_rules('password-old', 'Password Lama','required|strip_tags');
		$this->form_validation->set_rules('password-new', 'Password Baru','required|strip_tags');
        $this->form_validation->set_rules('password-confirm', 'Confirm Password','required|strip_tags');
        
        if($this->form_validation->run() == TRUE){
			$old = $this->input->post('password-old', TRUE);
			$new = $this->input->post('password-new', TRUE);
			$confirm = $this->input->post('password-confirm', TRUE);
			
			$username = $this->access_tes->get_username();
			
			if($this->cbt_user_model->count_by_username_password($username, $old)>0){
				if($new==$confirm){
					$data['user_password'] = $new;

					$this->cbt_user_model->update('user_name', $username, $data);
					$status['status'] = 1;
					$status['error'] = '';
				}else{
					$status['status'] = 0;
					$status['error'] = 'Kedua password baru tidak sama';
				}
			}else{
				$status['status'] = 0;
				$status['error'] = 'Password Lama tidak Sesuai';
			}
        }else{
            $status['status'] = 0;
            $status['error'] = validation_errors();
        }
        
        echo json_encode($status);
    }

    
}