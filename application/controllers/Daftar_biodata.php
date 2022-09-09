<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
* TOEFL UNIS
* Deky Alexander
* dekyalexander200@gmail.com
*/
class Daftar_biodata extends Member_Controller {
	private $kode_menu = 'peserta-biodata';
	private $kelompok = 'ujian';
	private $url = 'daftar_biodata';
	
    function __construct(){
		parent:: __construct();
		$this->load->model('cbt_biodata');
	}
	
    public function index($page=null, $id=null){
        $data['kode_menu'] = $this->kode_menu;
        $data['url'] = $this->url;
        
        $this->template->display_admin($this->kelompok.'/daftar_biodata', 'Daftar Tes', $data);
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
	
	/**
	* funsi tambahan 
	* 
	* 
*/
	
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