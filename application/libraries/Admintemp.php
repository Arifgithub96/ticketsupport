<?php

	/**
	 * 
	 */
	class Admintemp {

		protected $_CI;

		function __construct(){
			$this->_CI = &get_instance();
		}

		function view($admintemp,$data=null){
			$this->_CI->load->view('template/back_header');
			$this->_CI->load->view($admintemp,$data);
			$this->_CI->load->view('template/back_footer');
		}


	}

?>