<?php
	class Beckon extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('beckon_model');
			$this->load->helpers('url');
			$this->load->library('session');
			$this->load->library('pagination');
		}
		//打开招零工列表页
		public function index(){
			
			$pages = $this->uri->segment(3);
			session_start();
			if($pages){
				$_SESSION['pages'] = $pages;
			}
			$page = 10;
			if($_GET){
				//将一个数组遍历成一个个以key命名的值
				extract($_GET);
				// var_dump($sgz);
				$list = $this->beckon_model->getBeckons($page,$pages,$job_code ,$quyu ,$gongzi ,$jiesuan ,$fbsj ,$renzheng ,$xinyong,$gongzi_s,$gongzi_s_1,$gongzi_s_2,$sgz);
				echo json_encode($list);
				// echo $list;
			}else{
				$data['job_type']  = $this->beckon_model->getJob_type();
				$data['area'] = $this->beckon_model->getArea(/*$city_id*/224);
				$data['pay_circle'] = $this->beckon_model->getPay_circle();

				$config['base_url'] = site_url('beckon/index');
				$config['prev_link'] = '上一页';
				$config['next_link'] = '下一页';
				$config['total_rows'] = $this->beckon_model->getCount();
				$config['per_page'] = $page;
				$config['page_query_string'] = false;  
				$config['first_link'] = '首页';//首页  
				$config['first_tag_open'] = '';  
				$config['first_tag_close'] = '';  
				$config['last_tag_open'] = '';  
				$config['last_tag_close'] = '';
				$config['cur_tag_open'] = '<a style="background:#C6C6C6">';
				$config['cur_tag_close'] = '</a>';
				$config['last_link'] = '尾页';//尾页  
				$config['display_pages'] = true;
				$config['attributes']['rel'] = FALSE;
				
				$this->pagination->initialize($config);

				$data['link'] = $this->pagination->create_links();

				$data['beckons'] = $this->beckon_model->getBeckons($page,$pages);
				ini_set('date.timezone','Asia/Shanghai');
				// echo ($data['beckons']);
				$this->load->view('beckon/beckons',$data);
			}
		}
		//零工详情
		public function find(){
			$uid = $this->uri->segment(3);
			$data['news'] = $this->beckon_model->find($uid);
			$this->load->view('beckon/beckon',$data);
		}
	}
?>