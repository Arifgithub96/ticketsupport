<?php

	/**
	 * 
	 */
	class Template {

		protected $_CI;

		function __construct(){
			$this->_CI = &get_instance();
		}

		function view($template,$data=null){
			$this->_CI->load->view('template/front_header');
			$this->_CI->load->view($template,$data);
			$this->_CI->load->view('template/front_footer');
		}


	}

?>