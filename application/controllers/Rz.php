<?php
class Rz extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array(
            'user_model',
            'list_model',
            'form_model',
            'main_model'
        ));
        $this->load->helper(array(
            'form',
            'url_helper',
            'cookie'
        ));
        $this->load->library(array(
            'session',
            'form_validation'
        ));

    }

    /**
     * 查看认证
     *
     */
    public function index()
    {
        if (!file_exists(APPPATH . 'views/home/user/identifySuccess.php')) {
            show_404();
        }
        //是否登录
        if (!$this->hasLogin()) {
            redirect('http://' . $_SERVER['HTTP_HOST'] . '/user');
        }
        $uid=$this->session->uid;
        $data['user'] = $this->user_model->getUserBaseInfo($uid);

        //是否认证
        if ($data['user']['is_real']!=1) {
            redirect('http://' . $_SERVER['HTTP_HOST'] . '/rz/app');
        }
        $data['title'] = '实名认证'; // 网页标题
        $data['foot_js']='<script src="/static/js/jquery.js"></script><script src="/static/js/head-foot.js"></script><script src="/static/js/lgb.js"></script><script src="/static/js/getyzm.js"></script>';
        $data['head_css']='<link rel="stylesheet" href="/static/css/lgb.css"/><link rel="stylesheet" href="/static/css/lgb-wdzl.css"/><link rel="stylesheet" href="/static/css/register.css"/>';

        $this->load->view('home/user/templates/header', $data);
        $this->load->view('home/user/identifySuccess', $data);
        $this->load->view('home/user/templates/footer', $data);
    }


    /**
     * 个人认证
     *
     */
    public function app()
    {
        if (!file_exists(APPPATH . 'views/home/user/identify_pe.php')) {
            show_404();
        }
        //是否登录
        if (!$this->hasLogin()) {
            redirect('http://' . $_SERVER['HTTP_HOST'] . '/user');
        }

        $data['title'] = '实名认证'; // 网页标题
        $data['foot_js']='<script src="/static/js/jquery.js"></script><script src="/static/js/head-foot.js"></script><script src="/static/js/lgb.js"></script><script src="/static/js/getyzm.js"></script><style>
    form div.scsfz div{
        display: inline-block;
        margin-right: 40px;
        width: 200px;
        height: 100px;
        border: solid 1px #c6c6c6;
        background-color: #ededed;
        margin-left: 14px;
    }
    form div.scsfz div p.p1{
        margin: 10px 0;
        text-align: center;
    }
    div.success p{
        text-align: center;
        margin: 20px 0!important;
        font-size: 16px;
    }
</style>';
        $data['head_css']='<link rel="stylesheet" href="/static/css/lgb.css"/><link rel="stylesheet" href="/static/css/lgb-wdzl.css"/><link rel="stylesheet" href="/static/css/register.css"/>';

        $uid=$this->session->uid;

        $data['user'] = $this->user_model->getUserBaseInfo($uid);
        //var_dump($data['user']);


        $citycode = $this->user_model->getCityCode($data['user']["city_id"]);
        $citycode = $citycode['pinyin'];
        //var_dump($citycode);

        //是否公司
        if ($is_so = $this->session->is_co) {
            $config['upload_path'] = getcwd() . '/upload/' . $citycode . '/gssm/' . date('ym');
            $this->form_validation->set_rules('coname', '公司名称', 'trim|required');
        } else {
            $config['upload_path'] = getcwd() . '/upload/' . $citycode . '/grsm/' . date('ym');
            $this->form_validation->set_rules('realname', '真实姓名', 'trim|required');
        }
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10048;
        $config['file_name']  = time();

        $this->form_validation->set_rules('idno', '证件号', 'trim|required');

        $this->form_validation->set_error_delimiters('<span>', '</span>');

        if(!is_dir($config['upload_path'])){
            mkdir($config['upload_path'],0777,true);
        }

        $this->load->view('home/user/templates/header', $data);
        if ($this->form_validation->run() == FALSE) {
            $this->load->view('home/user/identify_pe', $data);
        } else {
            //上传图片
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('idno_img')) {
                $data['error'] = '请选择正确格式的图片文件';
                $data['error'] = $this->upload->display_errors();
                $this->load->view('home/user/identify_pe', $data);
            } else {
                $upload_data = $this->upload->data();
                //提交认证
                $_POST['uid'] = $uid;
                $_POST['idno_img'] = date('ym') . '/' . $upload_data['file_name'];

                if ($this->session->is_co) {
                    $return = $this->user_model->updateCoRealInfo($_POST);
                } else {
                    $return = $this->user_model->updatePersonalRealInfo($_POST);
                }

                if ($return['flag'] == 1) {
                    //var_dump($_POST);
                    $data['buzhou']='<span>填写信息</span><span> > </span><span class="stress">等待审核</span><span> >  </span><span>完成</span>';
                    $data['info'] = '认证信息提交成功!我们将在24小时内审核,请耐心等待';
                    $this->load->view('home/user/successPage', $data);
                } else {
                    $data['error'] = $return['info'];
                    //var_dump($_POST);
                    $this->load->view('home/user/identify_pe', $data);
                }
            }

        }

        $this->load->view('home/user/templates/footer', $data);
    }


    /**
     * 判断用户是否已经登录
     *sasa
     */
    public function hasLogin()
    {
        /** 检查session，并与数据库里的数据相匹配 */
        if (!empty($_SESSION) and NULL !== $_SESSION['uid']) {
            return TRUE;
        } else {
            return FALSE;
        }
    }


}