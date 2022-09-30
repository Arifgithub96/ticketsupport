<?php if (!defined('BASEPATH')) { exit ('No Direct Script Allowed'); }

class Itsupport extends CI_Controller {

	public function __construct(){
		parent::__construct();
	    if(!$this->ion_auth->logged_in()){
	      redirect('auth/login', 'refresh');
	    }
	    // $this->load->model('m_masterdata');
	    $this->load->model('m_ticket_tool');
        date_default_timezone_set('Asia/Jakarta');
        $this->load->library('mailer');
        $this->load->helper('download');
        $this->load->library('curl');
        $this->load->helper("telegram");
	}

	public function index()
	{
        $this->data['get_data']     = $this->m_ticket_tool->get_data();
		$this->admintemp->view('backend/tooling/tooling', $this->data);
	}
}
