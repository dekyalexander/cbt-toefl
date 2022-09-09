<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Registrasi_akun extends CI_Controller {
    private $kode_menu = 'peserta-daftar';
    private $kelompok = 'manager';
    private $url = 'manager/registrasi_akun';
    function __construct(){
        parent:: __construct();
        $this->load->model('cbt_user_grup_model');
        $this->load->model('cbt_user_model');
    }
	public function index(){
        $data['kode_menu'] = $this->kode_menu;
        $data['url'] = $this->url;

        $query_group = $this->cbt_user_grup_model->get_group();

        if($query_group->num_rows()>0){
            $select = '';
            $query_group = $query_group->result();
            foreach ($query_group as $temp) {
                $select = $select.'<option value="'.$temp->grup_id.'">'.$temp->grup_nama.'</option>';
            }

        }else{
            $select = '<option value="100000">KOSONG</option>';
        }
        $data['select_group'] = $select;
        $this->load->library('user_agent');	
        $this->template->display_user($this->kelompok.'/registrasi_view', 'Registrasi', $data);
        		
	}
    
    function tambah(){
        $this->load->library('form_validation');
        
        $this->form_validation->set_rules('tambah-username', 'Username','required|strip_tags');
        $this->form_validation->set_rules('tambah-password', 'Password','required|strip_tags');
        $this->form_validation->set_rules('tambah-nama', 'Nama Lengkap','required|strip_tags');
        $this->form_validation->set_rules('tambah-email', 'Email','strip_tags');
        $this->form_validation->set_rules('tambah-group', 'Group','required|strip_tags');
        
        if($this->form_validation->run() == TRUE){
            $data['user_name'] = $this->input->post('tambah-username', true);
            $data['user_password'] = $this->input->post('tambah-password', true);
            $data['user_email'] = $this->input->post('tambah-email', true);
            $data['user_firstname'] = $this->input->post('tambah-nama', true);
            $data['user_grup_id'] = $this->input->post('tambah-group', true);

            if($this->cbt_user_grup_model->count_by_kolom('grup_id', $data['user_grup_id'])->row()->hasil>0){
                if($this->cbt_user_model->count_by_kolom('user_name', $data['user_name'])->row()->hasil>0){
                    $status['status'] = 0;
                    $status['pesan'] = 'Username sudah terpakai !';
                }else{
                    $this->cbt_user_model->save($data);
                    
                    $status['status'] = 1;
                    $status['pesan'] = 'Data Peserta berhasil disimpan ';
                }
            }else{
                $status['status'] = 0;
                $status['pesan'] = 'Data Group tidak tersedia, Silahkan tambah data Group';
            }
        }else{
            $status['status'] = 0;
            $status['pesan'] = validation_errors();
        }
        
        redirect('welcome');

    }
    

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */