<?php if (!defined('BASEPATH')) { exit ('No Direct Script Allowed'); }

class Error extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
	    if(!$this->ion_auth->logged_in()){
	      redirect('auth/login', 'refresh');
	    }
	    $this->db01 = $this->load->database('test_01', true);
	    $this->load->model('m_booking');
	    $this->zend->load('Zend/Barcode');
	}

	public function index()
	{
		$this->load->view('error');
	}
	
}
