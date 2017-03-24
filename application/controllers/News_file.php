<?php
	class Beckon extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->helpers('url');
			$this->load->library('session');
			$this->load->library('pagination');
		}
		/**
		 * 打开消息文件页面
		 */
		public function index(){
			
		}
	}
?>