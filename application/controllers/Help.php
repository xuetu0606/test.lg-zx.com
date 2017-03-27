<?php
	/**
	 * 零工小参
	 */
	class Help extends CI_Controller {
		public function __construct(){
	        parent::__construct();
	        $this->load->helper('url');
	        $this->load->helper('captcha');
	    }
	    //零工小参
	    public function index(){
	    	$this->load->view('helps');
	    }
	    //帮助中心
	    public function help(){
	    	$this->load->view('help');
	    }
	    //用户协议
	    public function yhxy(){
	    	$this->load->view('yhxy');
	    }
	    //常见问题
	    public function cjwt(){
	    	$this->load->view('cjwt');
	    }
	    //了解
	    public function lj(){
	    	$this->load->view('lj');
	    }
	    //加入
	    public function jr(){
	    	$this->load->view('jr');
	    }
	    //更多帮助
	    public function gdbz(){
	    	$this->load->view('gdbz');
	    }
	    //意见反馈
	    public function yjfk(){
	    	if($_POST){
	    		var_dump($_POST);
	    	}
	    	$this->load->view('yjfk');
	    }
	    //接受意见反馈信息
	    public function save(){
	    	$vals = array(
			    'word'      => 'Random word',
			    'img_path'  => './captcha/',
			    'img_url'   => 'http://example.com/captcha/',
			    'font_path' => './path/to/fonts/texb.ttf',
			    'img_width' => '150',
			    'img_height'    => 30,
			    'expiration'    => 7200,
			    'word_length'   => 8,
			    'font_size' => 16,
			    'img_id'    => 'Imageid',
			    'pool'      => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',

			    // White background and border, black text and red grid
			    'colors'    => array(
			        'background' => array(255, 255, 255),
			        'border' => array(255, 255, 255),
			        'text' => array(0, 0, 0),
			        'grid' => array(255, 40, 40)
			    )
			);

			$cap = create_captcha($vals);
			echo $cap['image'];
	    }
	}
?>