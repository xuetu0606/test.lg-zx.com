<?php
	class News_file extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->helpers('url');
			$this->load->library('session');
			$this->load->library('pagination');
		}
		
	}
?>