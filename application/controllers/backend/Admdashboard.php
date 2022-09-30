<?php if (!defined('BASEPATH')) { exit ('No Direct Script Allowed'); }

class Admdashboard extends CI_Controller {

	public function __construct(){
		parent::__construct();
	    if(!$this->ion_auth->logged_in()){
	      redirect('auth/login', 'refresh');
	    }
	    // $this->load->model('m_masterdata');
	    $this->load->model('m_dashboard');
	}

	public function index()
	{	
		$this->admintemp->view('backend/dashboard');
	}
	
}
