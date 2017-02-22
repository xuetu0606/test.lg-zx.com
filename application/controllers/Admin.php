<?php
class Admin extends CI_Controller{
	public function __construct(){
		parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('session');
        $this->load->model('admin_model');

        $username = $_SESSION['username'];
        //判断登录的用户是否是admin超级管理员,如果不是管理员，不能进入后台。跳转到前台首页
        if($username == 'admin'){
        	redirect('home/index');
        	die();
        }
	}

	public function index(){
		if ( ! file_exists(APPPATH.'views/admin/admin-index.php')){
	        show_404();
	    }
	    $data['title'] = '后台首页'; // 定义标题

	    $data['reallist'] = $this->admin_model->reallist();

		$this->load->view('templates/head_simple',$data);
        $this->load->view('admin/admin-index',$data);
        $this->load->view('templates/footer2',$data);
	}

	//点击未认证用户列表，跳转到详情页
	public function userinfo(){
		if ( ! file_exists(APPPATH.'views/admin/admin-userinfo.php')){
	        show_404();
	    }
	    $data['title'] = '后台审核认证详情页'; // 定义标题
	    $uid = $this->uri->segment(3);
	    $is_co = $this->uri->segment(4);
	    $city_id = $this->uri->segment(5);

	    $data['is_co'] = $is_co;
	    if($is_co == 1){//公司类型
			$data['detail'] = $this->admin_model->realdetail1($uid);
	    }else{//个人类型
	    	$data['detail'] = $this->admin_model->realdetail2($uid);
	    }

	    $data['pinyin'] = $this->admin_model->getCityCode($city_id);//根据城市id获取城市简码
		$this->load->view('templates/head_simple',$data);
        $this->load->view('admin/admin-userinfo',$data);
        $this->load->view('templates/footer2',$data);
	}

	//判断用户认证信息是否通过，并修改数据
	public function check(){
		$test['uid'] = $_POST['uid'];
		$check = $_POST['check'];
		if($check == '同意'){
			$test['check'] = 1;
		}else{
			$test['check'] = -1;
		}
		$this->admin_model->check($test);

		$data['reallist'] = $this->admin_model->reallist();

		$this->load->view('templates/head_simple',$data);
        $this->load->view('admin/admin-index',$data);
        $this->load->view('templates/footer2',$data);
	}

}