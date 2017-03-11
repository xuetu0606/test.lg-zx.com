<?php
class Admin extends CI_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->model(array(
            'admin_model',
            'main_model'
        ));
        $this->load->helper(array(
            'url_helper',
            'form',
            'cookie'
        ));
        $this->load->library(array(
            'session',
            'form_validation'
        ));
    }


    /**
     * 后台默认首页
     */
    public function index(){
        if ( ! file_exists(APPPATH.'views/admin/index.php')){
            show_404();
        }

        //是否登录
        if (!$this->hasLogin()){
            redirect('http://'.$_SERVER['HTTP_HOST'].'/admin/login');
        }

        $data['title'] = '管理后台'; // Capitalize the first letter
        $data['localhost'] = $_SERVER['HTTP_HOST'];//获取当前域名
        $data['index_class']='active';

        $data['users']=$this->admin_model->getuserinfo($_SESSION['admin_uid']);

        //var_dump($data['users']);

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/index',$data);
        $this->load->view('admin/templates/footer',$data);
    }

    /**
     * 登录
     */
    public function login(){
		
        if ( ! file_exists(APPPATH.'views/admin/login.php')){
            show_404();
        }

        //是否登录
        if ($this->hasLogin()){
            redirect('http://'.$_SERVER['HTTP_HOST'].'/admin');
        }

        $data['title'] = '代理商登录'; // Capitalize the first letter
        $data['localhost'] = $_SERVER['HTTP_HOST'];//获取当前域名

        $this->form_validation->set_rules('username', '用户名', 'trim|required|min_length[3]|max_length[12]');
        $this->form_validation->set_rules('passwd', '密码', 'trim|required|min_length[6]');
        $this->form_validation->set_error_delimiters('<span>', '</span>');



        if ($this->form_validation->run() == FALSE) {
            $this->load->view('admin/login', $data);
        } else {
            $userdata['username'] = $this->input->post('username', TRUE);
            $userdata['passwd'] = $this->admin_model->encryptPwd($this->input->post('passwd', TRUE));

            $user = $this->admin_model->getuserlist($userdata);

            if (!empty($user)) {

                /** 记录用户登录状态 */
                $_SESSION['admin_uid'] = $user['uid'];
                $_SESSION['admin_username'] = $user['username'];

                redirect('http://' . $_SERVER['HTTP_HOST'] . '/admin');

            } else {

                $data['error_string'] = '用户名和密码不符';
                $data['userdata'] = $userdata;

                $this->load->view('admin/login', $data);
            }
        }

    }


    /**
     * 是否登录验证
     */
    public function hasLogin()
    {
        /** 检查session，并与数据库里的数据相匹配 */
        if(!empty($_SESSION) and NULL !== $_SESSION['admin_uid'])
        {
            return TRUE;
        }else{
            return FALSE;
            //return TRUE;
        }
    }


    /**
     * 站内消息
     */
    public function mailbox(){
        if ( ! file_exists(APPPATH.'views/admin/mailbox.php')){
            show_404();
        }

        //是否登录
        if (!$this->hasLogin()){
            redirect('http://'.$_SERVER['HTTP_HOST'].'/admin/login');
        }

        $data['users']=$this->admin_model->getMemberInfo($_SESSION['admin_uid']);
        $data['mailbox_class']='active';

        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/mailbox',$data);
        $this->load->view('admin/templates/footer');

    }

    /**
     * 用户登出
     *
     */
    public function logout()
    {
        $this->session->sess_destroy();

        redirect('http://' . $_SERVER['HTTP_HOST'] . '/admin');
    }

    /**
     * 会员统计
     */
    public function hylb(){
		echo '哈哈';
        if ( ! file_exists(APPPATH.'views/admin/hylb.php')){
            show_404();
        }

        //是否登录
        if (!$this->hasLogin()){
            redirect('http://'.$_SERVER['HTTP_HOST'].'/admin/login');
        }

        $data['title']='会员列表';
        $data['localhost'] = $_SERVER['HTTP_HOST'];//获取当前域名
        $data['hytj_class']='active';
        $data['class']='class="bg-green"';
        $data['url_gong']=$this->uri->segment(4, 0);
        $data['url_reg']=$this->uri->segment(6, 0);
        $data['url_vip']=$this->uri->segment(8, 0);
        //获取全部省市信息
        $data['area'] = array($this->admin_model->getProvince(), $this->admin_model->getAllCity());
echo '<pre>';
//var_dump($data['area']);
echo '</pre>';
        $page=$this->uri->segment(10, 0);
        $this->load->library('pagination');
        $fenye=10;//分页数
        
        //$count=count($this->admin_model->getMemberInfo1($_SESSION['admin_uid'],$sql));

        $sql=" LIMIT {$page},{$fenye}";

        $riqi1=$this->input->post('riqi1',true);
        $riqi2=$this->input->post('riqi2',true);

        if($_POST){
            $starttime=strtotime($riqi1);
            $endtime= strtotime($riqi2) + 86300;
            if($this->input->post('quxiao_riqi',true)){
                unset(
                    $_SESSION['starttime'],
                    $_SESSION['endtime']
                );

            }elseif($riqi1 and $riqi2){
                $_SESSION['starttime']=$starttime;
                $_SESSION['endtime']=$endtime;
            }
            if($this->input->post('quxiao_city',true)){
                unset(
                    $_SESSION['city_id'],
                    $_SESSION['pro_id']
                );

            }elseif($this->input->post('c_id',true)){
                $_SESSION['city_id']=$this->input->post('c_id',true);
                $_SESSION['pro_id']=$this->input->post('p_id',true);
            }

        }


        $data1=array(
            'userid'=>$_SESSION['admin_uid'],
            'starttime'=>$_SESSION['starttime'],
            'endtime'=>$_SESSION['endtime'],
            'gong'=>$data['url_gong'],
            'reg'=>$data['url_reg'],
            'vip'=>$data['url_vip'],
            'addsql'=>$sql,
            'city_id'=>$_SESSION['city_id']
        );

        $data2=array(
            'userid'=>$_SESSION['admin_uid'],
            'starttime'=>$_SESSION['starttime'],
            'endtime'=>$_SESSION['endtime'],
            'gong'=>$data['url_gong'],
            'reg'=>$data['url_reg'],
            'vip'=>$data['url_vip'],
            'addsql'=>'',
            'city_id'=>$_SESSION['city_id']
        );
        $count=count($this->admin_model->getMemberInfo1($data2));


        $data['users']=$this->admin_model->getMemberInfo1($data1);


        $config['base_url'] = 'http://'.$_SERVER['HTTP_HOST'].'/admin/hylb/gong/'.$data['url_gong'].'/reg/'.$data['url_reg'].'/vip/'.$data['url_vip'].'/page/';
        $config['total_rows'] = $count;
        $config['per_page'] = $fenye;
        $config['first_link'] = '第一页';
        $config['prev_link'] = '上一页';
        $config['next_link'] = '下一页';
        $config['last_link'] = '最后一页';

        //当前页链接的起始标签。
        $config['cur_tag_open'] = '<li class="paginate_button active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        //上一页标签
        $config['prev_tag_open'] = '<li class="paginate_button previous" id="example2_previous">';
        $config['prev_tag_close'] = '</li>';
        //下一页标签
        $config['next_tag_open'] = '<li class="paginate_button next" id="example2_next">';
        $config['next_tag_close'] = '</li>';
        //数字链接的起始标签
        $config['num_tag_open'] = '<li class="paginate_button ">';
        $config['num_tag_close'] = '</li>';

        //第一个链接的起始标签。
        $config['first_tag_open'] = '<li class="paginate_button previous">';
        $config['first_tag_close'] = '</li>';
        //最后一个链接的起始标签。
        $config['last_tag_open'] = '<li class="paginate_button next">';
        $config['last_tag_close'] = '</li>';


        $this->pagination->initialize($config);

        $data['page']=$this->pagination->create_links();



        //var_dump($this->admin_model->getMemberInfo1($_SESSION['admin_uid']));
        $this->load->view('admin/templates/header',$data);
        $this->load->view('admin/hylb',$data);


    }

}