<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
	class Template{
		protected $_ci;
		
		function __construct(){ 
			$this->_ci=&get_instance();
            $this->_ci->load->library('access');
            $this->_ci->load->model('users_model');
		}
		
		function display_admin($template, $title, $data=null){
            if(empty($data['kode_menu'])){
                $data['kode_menu'] = 'KOSONG'; 
            }
            $data['site_name']=$this->_ci->config->item('site_name');
			$data['site_version']=$this->_ci->config->item('site_version');
            $data['nama']=$this->_ci->access->get_nama();
			$data['sidemenu']=$this->_ci->users_model->get_menu($data['kode_menu'], $this->_ci->access->get_level());;
            $data['content']=$this->_ci->load->view($template,$data,true);
			$data['title']=$title;
			$this->_ci->load->view('template/template_admin.php',$data);
		}
		
		function display_user($template, $title, $data=null){
			$data['site_name']=$this->_ci->config->item('site_name');
			$data['site_version']=$this->_ci->config->item('site_version');
			$data['content']=$this->_ci->load->view($template,$data,true);
			$data['title']=$title;
			$this->_ci->load->view('template/template_user.php',$data);
		}

		function display_tes($template, $title, $data=null){
			$data['site_name']=$this->_ci->config->item('site_name');
			$data['site_version']=$this->_ci->config->item('site_version');
			$data['content']=$this->_ci->load->view($template,$data,true);
			$data['title']=$title;
			$this->_ci->load->view('template/template_tes.php',$data);
		}
		
		function display_clean($template, $data=null){
			$data['_content']=$this->_ci->load->view($template,$data,true);
			$this->_ci->load->view('template/template_clean.php',$data);
		}

	} 
?>