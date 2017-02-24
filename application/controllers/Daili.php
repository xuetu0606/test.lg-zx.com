<?php
class Daili extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model('daili_model');
        $this->load->helper('url_helper');
    }


    /**
     * 代理商默认首页
     */
    public function index(){
        if ( ! file_exists(APPPATH.'views/daili/index.php')){
            show_404();
        }

        //是否登录
        if (!$this->hasLogin()){
            redirect('http://'.$_SERVER['HTTP_HOST'].'daili/login');
        }

        $data['title'] = '代理商管理后台'; // Capitalize the first letter
        $data['localhost'] = $_SERVER['HTTP_HOST'];//获取当前域名

        $this->load->view('daili/templates/header');
        $this->load->view('daili/index',$data);
        $this->load->view('daili/templates/footer');
    }

    /**
     * 登录
     */
    public function login(){
        if ( ! file_exists(APPPATH.'views/daili/login.php')){
            show_404();
        }

        //是否登录
        if ($this->hasLogin()){
            redirect('http://'.$_SERVER['HTTP_HOST'].'daili');
        }

        $data['title'] = '代理商登录'; // Capitalize the first letter
        $data['localhost'] = $_SERVER['HTTP_HOST'];//获取当前域名

        $this->load->view('daili/templates/header');
        $this->load->view('daili/login',$data);
        $this->load->view('daili/templates/footer');
    }


    /**
     * 是否登录验证
     */
    public function hasLogin()
    {
        /** 检查session，并与数据库里的数据相匹配 */
        if(!empty($_SESSION) and NULL !== $_SESSION['uid'])
        {
            return TRUE;
        }else{
            //return FALSE;
            return TRUE;
        }
    }

    /**
     * 会员统计
     */
    public function hytj(){
        if ( ! file_exists(APPPATH.'views/daili/hytj.php')){
            show_404();
        }

        //是否登录
        if (!$this->hasLogin()){
            redirect('http://'.$_SERVER['HTTP_HOST'].'daili/login');
        }

        $data['users']=$this->daili_model->getMemberInfo();

        $this->load->view('daili/templates/header');
        $this->load->view('daili/hytj',$data);
        $this->load->view('daili/templates/footer');

    }

    /**
     * 站内消息
     */
    public function mailbox(){
        if ( ! file_exists(APPPATH.'views/daili/mailbox.php')){
            show_404();
        }

        //是否登录
        if (!$this->hasLogin()){
            redirect('http://'.$_SERVER['HTTP_HOST'].'daili/login');
        }

        $data['users']=$this->daili_model->getMemberInfo();

        $this->load->view('daili/templates/header');
        $this->load->view('daili/mailbox',$data);
        $this->load->view('daili/templates/footer');

    }

}