<?php
	class Beckon extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('beckon_model');
			$this->load->helpers('url');
			$this->load->library('session');
		}
		//打开招零工列表页
		public function index(){
			$data['job_type']  = $this->beckon_model->getJob_type();
			$data['area'] = $this->beckon_model->getArea(/*$city_id']*/224);
			$data['pay_circle'] = $this->beckon_model->getPay_circle();
			$data['beckons'] = $this->beckon_model->getBeckons();
			ini_set('date.timezone','Asia/Shanghai');
			$this->load->view('beckon/beckons',$data);
		}
		//根据条件查询招聘信息
		public function getBeckonsByParam(){
			//将一个数组遍历成一个个以key命名的值
			extract($_GET);
			// var_dump($sgz);
			$list = $this->beckon_model->getBeckons($job_code ,$quyu ,$gongzi ,$jiesuan ,$fbsj ,$renzheng ,$xinyong,$gongzi_s,$gongzi_s_1,$gongzi_s_2,$sgz);
			echo json_encode($list);
			// echo $list;
		}
		//零工详情
		public function find(){
			$uid = $this->uri->segment(3);
			$data['news'] = $this->beckon_model->find($uid);
			$this->load->view('beckon/beckon',$data);
		}
	}
?>