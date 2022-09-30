<?php

	/**
	 * 
	 */
	class Login {

		protected $_CI;

		function __construct(){
			$this->_CI = &get_instance();
		}

		function view($logintemp,$data=null){
			$this->_CI->load->view('template/header_login');
			$this->_CI->load->view($logintemp,$data);
			$this->_CI->load->view('template/footer_login');
		}


	}

?>