<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* TOEFL UNIS
* Deky Alexander
* dekyalexander200@gmail.com
*/
class Biodata extends Tes_Controller {
	private $kelompok = 'ujian';
	private $url = 'biodata';
	
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

        


        $this->template->display_tes($this->kelompok.'/biodata_view', 'Dashboard', $data);
    }
    function get_by_id($id=null){
    	$data['data'] = 0;
		if(!empty($nim)){
			$query = $this->cbt_biodata->get_by_kolom('nim', $nim);
			if($query->num_rows()>0){
				$query = $query->row();
				$data['data'] = 1;
				$data['nim'] = $query->nim;
				$data['nama'] = $query->nama;
				$data['fakultas'] = $query->fakultas;
				$data['prodi'] = $query->prodi;
				$data['nomorhp'] = $query->nomorhp;
				$data['tanggal'] = $query->tanggal;
			}
		}
		echo json_encode($data);
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

    /**
     * Mendapatkan daftar tes yang dapat diikuti
     */
     function get_datatable(){
		// variable initialization
		$search = "";
		$start = 0;
		$rows = 10;

		// get search value (if any)
		if (isset($_GET['sSearch']) && $_GET['sSearch'] != "" ) {
			$search = $_GET['sSearch'];
		}

		// limit
		$start = $this->get_start();
		$rows = $this->get_rows();

		// run query to get user listing
		$query = $this->cbt_biodata->get_datatable($start, $rows, 'nama', $search);
		$iFilteredTotal = $query->num_rows();
		
		$iTotal= $this->cbt_biodata->get_datatable_count('nama', $search)->row()->hasil;
	    
		$output = array(
			"sEcho" => intval($_GET['sEcho']),
	        "iTotalRecords" => $iTotal,
	        "iTotalDisplayRecords" => $iTotal,
	        "aaData" => array()
	    );

	    // get result after running query and put it in array
		$i=$start;
		$query = $query->result();
	    foreach ($query as $temp) {			
			$record = array();
            
			
            $record[] = $temp->nim;
            $record[] = $temp->nama;
            $record[] = $temp->fakultas;
            $record[] = $temp->prodi;
            $record[] = $temp->nomorhp;
            $record[] = $temp->tanggal;
            

			$output['aaData'][] = $record;
		}
		// format it to JSON, this output will be displayed in datatable
        
		echo json_encode($output);
	}
	
	
	function get_start() {
		$start = 0;
		if (isset($_GET['iDisplayStart'])) {
			$start = intval($_GET['iDisplayStart']);

			if ($start < 0)
				$start = 0;
		}

		return $start;
	}

	function get_rows() {
		$rows = 10;
		if (isset($_GET['iDisplayLength'])) {
			$rows = intval($_GET['iDisplayLength']);
			if ($rows < 5 || $rows > 500) {
				$rows = 10;
			}
		}

		return $rows;
	}

	function get_sort_dir() {
		$sort_dir = "ASC";
		$sdir = strip_tags($_GET['sSortDir_0']);
		if (isset($sdir)) {
			if ($sdir != "asc" ) {
				$sort_dir = "DESC";
			}
		}

		return $sort_dir;
	}
}