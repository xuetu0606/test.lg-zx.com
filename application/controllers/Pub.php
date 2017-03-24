<?php
class Pub extends CI_Controller
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
         * 选择要发布的工种
         *
         */
    public function selest($id)
        {
            if (!file_exists(APPPATH . 'views/home/user/publish.php')) {
                show_404();
            }

//是否登录
            if (!$this->user_model->hasLogin()) {
                redirect('http://' . $_SERVER['HTTP_HOST'] . '/user');
            }

            $zlg=$this->uri->segment(4, 0);
            if($zlg){
               $data['title']='招零工';
            }else{
                $data['title']='发布工种';
            }
            $data['foot_js']='<script>
    $(function() {
        if('.$this->uri->segment(3, 0).'){
            $(\'.step2\').addClass(\'stress\');
        }
        $(\'.type\').show();
        var count1 = 0;
        var count2 = 0;
        $(\'.allcheck1\').click(function () {
            count1++;
            if (count1 % 2 == 1)
                $(this).parent().parent().find(\'input[type=checkbox]\').prop(\'checked\', \'checked\');
            else {
                $(this).parent().parent().find(\'input[type=checkbox]\').prop(\'checked\', false);
            }
        });
        $(\'.allcheck2\').click(function () {
            count2++;
            if (count2%2==1)
                $(this).parent().parent().find(\'input[type=checkbox]\').prop(\'checked\', \'checked\');
            else {
                $(this).parent().parent().find(\'input[type=checkbox]\').prop(\'checked\', false);
            }
        });
        $(\'.gb\').click(function(){
            $(this).parent().remove();
        })
    });
</script>';
            $this->load->view('templates/header', $data);

            $data['hang'] = $this->user_model->getJobType(array('level' => 1, 'pre_id' => 0, 'pre_pre_id' => 0));

            if ($id) {
                $data['zhi'] = $this->user_model->getJobType(array('level' => 2, 'pre_id' => $id, 'pre_pre_id' => 0));

            }

            if($zlg=='zlg'){
                $data['url']='zlg';
            }else{
                $data['url']='index';
            }
            $this->load->view('home/user/publish_selest', $data);
            $this->load->view('home/user/templates/footer', $data);

        }

        /**
         * 发布工种
         *
         */
    public function index()
        {
            if (!file_exists(APPPATH . 'views/home/user/publish.php')) {
                show_404();
            }

//是否登录
            if (!$this->user_model->hasLogin()) {
                redirect('http://' . $_SERVER['HTTP_HOST'] . '/user');
            }

            //var_dump($_FILES);

            /*/修改
            if ($edit) {
            $this->form_model->getGzDetal(array('uid' => $_SESSION['uid'], 'id' => $this->uri->segment(4, 0)));
            $data['baseinfo'] = $this->form_model->baseinfo;

            $data['qyinfo'] = $this->form_model->qyinfo;
            $data['three_level'] = $this->list_model->get_three_level();
            $this->main_model->getDistArea();
            $data['dist'] = $this->main_model->list_dist;
            $data['area'] = $this->main_model->list_area;
            $data['edit'] = $edit;
            $_POST['id'] = $this->uri->segment(4, 0);
            }*/

            $data['title'] = '发布工种'; // 网页标题
        $data['foot_js']='<script src="/static/js/ajaxfileupload.js"></script>
<script src="/static/js/publish.js"></script>
<script>
    var params = {
        fileInput: $("#fileImage").get(0),
        dragDrop: $("#fileDragArea").get(0),
        upButton: $("#fileSubmit").get(0),
        url: $("#uploadForm").attr("action"),
        filter: function(files) {
            var arrFiles = [];
            for (var i = 0, file; file = files[i]; i++) {
                if (file.type.indexOf("image") == 0) {
                    if (file.size >= 20480000) {
                        alert(\'您这张"\'+ file.name +\'"图片大小过大，应小于12M\');
                    } else {
                        arrFiles.push(file);
                    }
                } else {
                    alert(\'文件"\' + file.name + \'"不是图片。\');
                }
            }
            return arrFiles;
        },
        onSelect: function(files) {
            var html = \'\', i = 0;
            $("#preview").html(\'<div class="upload_loading"></div>\');
            var funAppendImage = function() {
                file = files[i];
                if (file) {
                    var reader = new FileReader()
                    reader.onload = function(e) {
                        html = html + \'<div id="uploadList_\'+ i +\'" class="upload_append_list zhtp"><a href="javascript:" class="upload_delete gb" title="删除" data-index="\'+ i +\'"><img src="/static/images/publish/gb.png" alt=""></a>\' + \'<img id="uploadImage_\' + i + \'" src="\' + e.target.result + \'" class="upload_image tp" /></div>\';

                        //html = html + \'<div id="uploadList_\'+ i +\'" class="upload_append_list zhtp">\' + \'<img id="uploadImage_\' + i + \'" src="\' + e.target.result + \'" class="upload_image tp" /></div>\';

                        i++;
                        funAppendImage();
                    }
                    reader.readAsDataURL(file);
                } else {
                    $("#preview").html(html);
                    if (html) {
                        //删除方法
                        $(".upload_delete").click(function() {
                            ZXXFILE.funDeleteFile(files[parseInt($(this).attr("data-index"))]);
                            //alert($(this).attr("data-index"));
                            return false;
                        });
                        //提交按钮显示
                        $("#fileSubmit").show();
                    } else {
                        //提交按钮隐藏
                        $("#fileSubmit").hide();
                    }
                }
            };
            funAppendImage();
        },
        onDelete: function(file) {
            $("#uploadList_" + file.index).fadeOut();
            $("#delfile").val($("#delfile").val()+\',\'+file.index);
        },
        onDragOver: function() {
            $(this).addClass("upload_drag_hover");
        },
        onDragLeave: function() {
            $(this).removeClass("upload_drag_hover");
        },
        onProgress: function(file, loaded, total) {
            var eleProgress = $("#uploadProgress_" + file.index), percent = (loaded / total * 100).toFixed(2) + \'%\';
            eleProgress.show().html(percent);
        },
        onSuccess: function(file, response) {
            $("#uploadInf").append("<p>上传成功，图片地址是：" + response + "</p>");
        },
        onFailure: function(file) {
            $("#uploadInf").append("<p>图片" + file.name + "上传失败！</p>");
            $("#uploadImage_" + file.index).css("opacity", 0.2);
        },
        onComplete: function() {
            //提交按钮隐藏
            $("#fileSubmit").hide();
            //file控件value置空
            $("#fileImage").val("");
            $("#uploadInf").append("<p>当前图片全部上传完毕，可继续添加上传。</p>");
        }
    };
    ZXXFILE = $.extend(ZXXFILE, params);
    ZXXFILE.init();
</script>
<script>
    $("input:checkbox").click(function () {

        //alert($(this).attr(\'value\'));
        if ($(this).is(":checked")) {
            $("#jiedao"+$(this).attr(\'value\')).show();
        } else {
            $("#jiedao"+$(this).attr(\'value\')).hide();
        }
    });
    $("#quanxuan").click(function () {
        $(".jiedao").hide();
    })
</script>';
            $data['hang'] = $this->user_model->getJobType(array('level' => 1, 'pre_id' => 0, 'pre_pre_id' => 0));
            $data['zhi'] = $this->user_model->getJobType(array('level' => 2, 'pre_id' => $this->uri->segment(3, 0), 'pre_pre_id' => 0));
            $data['gong'] = $this->user_model->getJobType(array('level' => 3, 'pre_id' => $this->uri->segment(4, 0), 'pre_pre_id' => $this->uri->segment(3, 0)));

            if($_SESSION['is_co']==1){
                $data['user'] = $this->user_model->getCoUserInfo($_SESSION['uid']);//获取会员基础信息
            }else{
                $data['user'] = $this->user_model->getPersonalInfo($_SESSION['uid']);//获取会员基础信息
            }

            $city = $this->main_model->getCityInfoByCode($this->main_model->getCityCode());//获取当前城市ｉｄ 名字
            $data['city'] = $city['name'];
            //var_dump($this->main_model->getCityCode());

//获取当前城市区县街道
            $this->main_model->getDistArea();
            $data['area'] = array($this->main_model->list_dist, $this->main_model->list_area);
//var_dump($data['area']);

            $credit1 = $this->user_model->getUserCredit1($_SESSION['uid']);//获取当前会员零工币
            if ($data['isvip'] = $this->user_model->isVip($_SESSION['uid'])) {//是否会员
                $ok = TRUE;
            } elseif ($credit1 >= count($_POST['job_code'])*2) {//零工币是否大于２
                $ok = TRUE;
            } else {
                $ok = FALSE;
            }


            $this->load->view('templates/header', $data);//加载头部Publish

            $this->form_validation->set_rules('title', '标题', 'trim|required|max_length[20]');
            $this->form_validation->set_rules('mobile', '手机号', 'trim|required|numeric|exact_length[11]');
            $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

        //var_dump($_POST); die();

            if ($this->form_validation->run() == FALSE) {
                $this->load->view('home/user/publish', $data);
            } elseif (!$ok) {
                $this->main_model->alert("您的零工币不足请及时充值", '/user/recharge');
            } else {

                if (!$_POST['job_code']) {
                    $this->main_model->alert("请选择您的服务内容", 'back');
                }

                //已发工种
                $gong = $this->form_model->getMyGZPublish($_SESSION['uid']);
                foreach ($gong as $k) {
                    foreach ($_POST['job_code'] as $k1){
                        if ($k1 == $k['job_code']) {
                            $this->main_model->alert("您已发布过'{$data['gong'][$k1]}'工种,不能重复发布", 'back');
                        }
                    }

                }

                $img_arr=$this->upload($this->main_model->getCityCode(),$_POST['delfile']);//上传图片
                if(!$img_arr and $_POST['delfile']){
                    $this->main_model->alert("上传图片有误,请重新上传", 'back');
                }

                if(count($img_arr)>8){
                    $this->main_model->alert("上传图片不能超过8张", 'back');
                }
                foreach ($img_arr as $k){
                    $img.=$k['file_name'].',';
                }

                    foreach ($_POST['job_code'] as $v){
                        $data_add=array(
                            'uid'=>$_SESSION['uid'],
                            'title'=>$_POST['title'],
                            'job_code'=>$v,
                            'mobile'=>$_POST['mobile'],
                            'address'=>$_POST['address'],
                            'fwjs'=>$_POST['fwjs'],
                            'cityid'=>$city['id'],
                            'districtid'=>$_POST['districtid'],
                            'areaid'=>$_POST['areaid'],
                            'img'=>substr($img, 0, -1)
                        );
                        $return = $this->form_model->addGz($data_add);
                        if($return['flag']==-1){
                            $this->main_model->alert($return['info'], 'back');
                        }
                        $return_flag+=$return['flag'];
                    }



                    $mess['uid'] = $_SESSION['uid'];
                    $mess['title'] = '您发布了'.count($_POST['job_code']).'条工种信息';
                    $mess['message'] = '您于' . date('Y-m-d H:i') . "发布了".count($_POST['job_code'])."条工种信息";

                $this->main_model->addMessage($mess);

                if ($return_flag == count($_POST['job_code'])) {

                    $_POST = array();  //防止重复提交


                        if ($data['isvip']) {
                            $credits = 0;
                        } else {
                            $credits = $return_flag*2;
                        }
                        $return_recharge = $this->user_model->recharge(array('uid' => $_SESSION['uid'], 'type' => 'credit1', 'wayid' => '3', 'credits' => $credits));

                        if ($return_recharge['flag'] == 1) {
                            //var_dump($data['isvip']);
                            //var_dump($credits);
                            $data['credits']=$credits;
                            $data['credit1'] = $this->user_model->getUserCredit1($_SESSION['uid']);
                            $this->load->view('home/user/publishSueecss', $data);
                        } else {

                            $data['formerror'] = $return_recharge['info'];
                            $this->load->view('home/user/publish', $data);
                        }

                } else {
                    $data['formerror'] = $return['info'];
//var_dump($return);
                    $this->load->view('home/user/publish', $data);
                }
            }

$this->load->view('home/user/templates/footer', $data);

    }


    /**
     * 上传工种信息图片 自动生成 图片文件名_150_100 图片文件名_600_400 两个文件
     * @param $citycode 用户当前城市简码  例如:qd
     * @param $del  上传图片时 删除的图片id
     * @return mixed 成功返回file  否则error
     */
    function upload($citycode,$del) {

            //初始化
            $config['upload_path'] =  getcwd() . '/upload/' . $citycode .'/gzxx/'.$_SESSION['uid'];
            $config['allowed_types'] = 'gif|jpg|png|bmp|jpeg';
            $config['encrypt_name'] = TRUE;
            $config['remove_spaces'] = TRUE;
            $config['max_size']  = '0';
            $config['max_width']  = '0';
            $config['max_height']  = '0';

        if(!is_dir($config['upload_path'])){
            mkdir($config['upload_path'],0777,true);
        }

            $this->load->library('upload', $config);

            //170*170图片
            $configThumb = array();
            $configThumb['image_library'] = 'gd2';
            $configThumb['source_image'] = '';
            $configThumb['create_thumb'] = TRUE;
            $configThumb['maintain_ratio'] = TRUE; //保持图片比例
            $configThumb['new_image'] = getcwd() . '/upload/' . $citycode .'/gzxx/'.$_SESSION['uid'];
            $configThumb['width'] = 150;
            $configThumb['height'] = 100;
            $configThumb['thumb_marker']="_150_100";//缩略图名字后加上 "_150_100",

            //600*600图片
            $configLarge = array();
            $configLarge['image_library'] = 'gd2';
            $configLarge['source_image'] = '';
            $configLarge['create_thumb'] = TRUE;
            $configLarge['maintain_ratio'] = TRUE; //保持图片比例
            $configLarge['new_image'] = getcwd() . '/upload/' . $citycode .'/gzxx/'.$_SESSION['uid'];
            $configLarge['width'] = 600;
            $configLarge['height'] = 400;
            $configLarge['thumb_marker']="_600_400";//缩略图名字后加上 "_xxx_xxx",

            $this->load->library('image_lib');


        if($del){
            $del=explode(',',$del);
            for ($i=1;$i<count($del);$i++){
                foreach ($_FILES['fileselect'] as $k=>$v){
                    array_splice($v,$del[$i], 1);
                    $_FILES['fileselect'][$k]=$v;
                }
            }

        }



        $arr=$this->upload->multiple("fileselect");

                //$upload = $this->upload->do_upload('image'.$i);
                //if($upload === FALSE) continue;
        if($arr['error']){
            return $arr['error'];
        }else{
            foreach ($arr['files'] as $k){
                if($k['is_image'] == 1) {
                    //初始化150*100
                    $configThumb['source_image'] = $k['full_path']; //文件路径带文件名
                    $this->image_lib->initialize($configThumb);
                    $this->image_lib->resize();
                    //初始化600*400
                    $configLarge['source_image'] = $k['full_path']; //文件路径带文件名
                    $this->image_lib->initialize($configLarge);
                    $this->image_lib->resize();
                }
            }
            return $arr['files'];
        }

    }

    /**
     * 批量删除
     *
     */
    public function del()
    {
        $id=$this->input->get('del_check',true);
        $url_array = $this->uri->uri_to_assoc(3);
//    	print_r($url_array);
        if ($url_array['type'] == 'gz') {
            if ($url_array['ac'] == 'del') {
                foreach ($id as $v){
                    $flag += $this->form_model->delGzInfo(array('uid' => $_SESSION['uid'], 'id' => $v));
                }
            }

            if ($flag == count($id)) {
                $this->main_model->alert('删除成功', 'back');
            } else {
                $this->main_model->alert('删除失败，请稍后重试', 'back');
            }

        } elseif ($url_array['type'] == 'zlg') {

            if ($url_array['ac'] == 'del') {
                $flag = $this->form_model->delZlgInfo(array('uid' => $_SESSION['uid'], 'id' => $url_array['id']));
                if ($flag['flag'] == 1) {
                    $this->main_model->alert('删除成功', 'back');
                } else {
                    $this->main_model->alert('删除失败，请稍后重试', 'back');
                }
            }

        }
    }

    /**
     * 修改工种
     *
     */
    public function edit($id)
    {
        if (!file_exists(APPPATH . 'views/home/user/publish_edit.php')) {
            show_404();
        }

//是否登录
        if (!$this->user_model->hasLogin()) {
            redirect('http://' . $_SERVER['HTTP_HOST'] . '/user');
        }



        $this->form_model->getGzDetal(array('uid' => $_SESSION['uid'], 'id' => $this->uri->segment(3, 0)));
        $data['baseinfo'] = $this->form_model->baseinfo;

        $data['qyinfo'] = $this->form_model->qyinfo;

        $data['citycode'] = $this->main_model->getCityCode();

        //echo '<pre>';
        //var_dump($data['baseinfo']);
        //var_dump($data['qyinfo']);
        //echo '</pre>';

        $data['three_level'] = $this->list_model->get_three_level();
        $this->main_model->getDistArea();
        $data['dist'] = $this->main_model->list_dist;
        $data['area'] = $this->main_model->list_area;

        $_POST['id'] = $this->uri->segment(4, 0);


        $data['title'] = '修改工种'; // 网页标题
        $data['hang'] = $this->user_model->getJobType(array('level' => 1, 'pre_id' => 0, 'pre_pre_id' => 0));
        $data['zhi'] = $this->user_model->getJobType(array('level' => 2, 'pre_id' =>$data['baseinfo']['job_level_1'], 'pre_pre_id' => 0));
        $data['gong'] = $this->user_model->getJobType(array('level' => 3, 'pre_id' => $data['baseinfo']['job_level_2'], 'pre_pre_id' => $data['baseinfo']['job_level_1']));

        if($_SESSION['is_co']==1){
            $data['user'] = $this->user_model->getCoUserInfo($_SESSION['uid']);//获取会员基础信息
        }else{
            $data['user'] = $this->user_model->getPersonalInfo($_SESSION['uid']);//获取会员基础信息
        }

        $city = $this->main_model->getCityInfoByCode($this->main_model->getCityCode());//获取当前城市ｉｄ 名字
        $data['city'] = $city['name'];
        //var_dump($this->main_model->getCityCode());

//获取当前城市区县街道
        $this->main_model->getDistArea();
        $data['area'] = array($this->main_model->list_dist, $this->main_model->list_area);
//var_dump($data['area']);

        $credit1 = $this->user_model->getUserCredit1($_SESSION['uid']);//获取当前会员零工币
        if ($data['isvip'] = $this->user_model->isVip($_SESSION['uid'])) {//是否会员
            $ok = TRUE;
        } elseif ($credit1 >= count($_POST['job_code'])*2) {//零工币是否大于２
            $ok = TRUE;
        } else {
            $ok = FALSE;
        }


        $this->load->view('templates/header', $data);//加载头部Publish

        $this->form_validation->set_rules('title', '标题', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('mobile', '手机号', 'trim|required|numeric|exact_length[11]');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

        //var_dump($_POST); die();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('home/user/publish_edit', $data);
        } elseif (!$ok) {
            $this->main_model->alert("您的零工币不足请及时充值", '/user/recharge');
        } else {

            if (!$_POST['job_code']) {
                $this->main_model->alert("请选择您的服务内容", 'back');
            }

            //已发工种
            $gong = $this->form_model->getMyGZPublish($_SESSION['uid']);
            foreach ($gong as $k) {
                foreach ($_POST['job_code'] as $k1){
                    if ($k1 == $k['job_code']) {
                        $this->main_model->alert("您已发布过'{$data['gong'][$k1]}'工种,不能重复发布", 'back');
                    }
                }

            }

            $img_arr=$this->upload($this->main_model->getCityCode(),$_POST['delfile']);//上传图片

            if($_POST['delfile']){
                if(!$img_arr){
                    $this->main_model->alert("上传图片有误,请重新上传", 'back');
                }
            }


            if((count($img_arr)+count(explode(',',$data['baseinfo']['img'])))>8){
                $this->main_model->alert("上传图片不能超过8张", 'back');
            }
            foreach ($img_arr as $k){
                $img.=$k['file_name'].',';
            }
            if($data['baseinfo']['img']){
                $img=$data['baseinfo']['img'].','.$img;
            }



                $data_add=array(
                    'id'=>$this->uri->segment(3, 0),
                    'uid'=>$_SESSION['uid'],
                    'title'=>$_POST['title'],
                    'job_code'=>$_POST['job_code'],
                    'mobile'=>$_POST['mobile'],
                    'address'=>$_POST['address'],
                    'fwjs'=>$_POST['fwjs'],
                    'cityid'=>$city['id'],
                    'districtid'=>$_POST['districtid'],
                    'areaid'=>$_POST['areaid'],
                    'img'=>substr($img, 0, -1)
                );
                $return = $this->form_model->updateGz($data_add);


            if ($return['flag'] == 1) {

                $_POST = array();  //防止重复提交

                $this->main_model->alert("修改成功", '/user');

            } else {
                $data['formerror'] = $return['info'];
//var_dump($return);
                $this->load->view('home/user/publish_edit', $data);
            }
        }

        $this->load->view('templates/footer', $data);

    }


    /**
     * 删除上传图片
     *
     */
    public function delimg()
    {
        $id=$this->input->post('id',TRUE);
        $img=$this->input->post('img',TRUE);
        $img_url=$this->input->post('img_url',TRUE);
        $img_arr=explode('|',$img_url);

        $return=$this->user_model->updatePublishImg($id,$img);

        if($return['flag']==1){
            $arr['status'] = "success";
            unlink (getcwd() .$img_arr[0].'.'.$img_arr[1]);
            unlink (getcwd() .$img_arr[0].'_150_100.'.$img_arr[1]);
            unlink (getcwd() .$img_arr[0].'_600_400.'.$img_arr[1]);
        }else{
            $arr["status"] = "failed";
        }
        $arr['msg'] = $return['info'];
        //$arr['msg'] = $img_arr[0].'.'.$img_arr[1];

        echo json_encode($arr);
    }

    /**
     * 发布工种
     *
     */
    public function zlg($edit)
    {
        if (!file_exists(APPPATH . 'views/home/user/publish_zlg.php')) {
            show_404();
        }

//是否登录
        if (!$this->user_model->hasLogin()) {
            redirect('http://' . $_SERVER['HTTP_HOST'] . '/user');
        }


        $data['hang'] = $this->user_model->getJobType(array('level' => 1, 'pre_id' => 0, 'pre_pre_id' => 0));
        $data['zhi'] = $this->user_model->getJobType(array('level' => 2, 'pre_id' => $this->uri->segment(3, 0), 'pre_pre_id' => 0));
        $data['gong'] = $this->user_model->getJobType(array('level' => 3, 'pre_id' => $this->uri->segment(4, 0), 'pre_pre_id' => $this->uri->segment(3, 0)));
        //var_dump($edit);

        //修改
        if ($edit=='edit') {
            $data['zlg'] = $this->form_model->getZlgDetal(array('uid' => $_SESSION['uid'], 'id' => $this->uri->segment(4, 0)));
            //var_dump($data['zlg']);
            $data['three_level'] = $this->list_model->get_three_level();
            $this->main_model->getDistArea();
            $data['dist'] = $this->main_model->list_dist;
            $data['area'] = $this->main_model->list_area;
            $data['edit'] = $edit;
            $_POST['id'] = $this->uri->segment(4, 0);
            $data['zhi'] = $this->user_model->getJobType(array('level' => 2, 'pre_id' => $data['zlg']['job_level_1'], 'pre_pre_id' => 0));
            $data['gong'] = $this->user_model->getJobType(array('level' => 3, 'pre_id' => $data['zlg']['job_level_2'], 'pre_pre_id' => $data['zlg']['job_level_1']));
            //var_dump($data['dist']);
            //var_dump($data['area']);
        }

        $data['title'] = '招零工'; // 网页标题
        $data['foot_js']='
<script src="/static/js/publish.js"></script>
<script src="/static/js/select.js"></script>
<script>
    $("input:checkbox").click(function () {

        //alert($(this).attr(\'value\'));
        if ($(this).is(":checked")) {
            $("#jiedao"+$(this).attr(\'value\')).show();
        } else {
            $("#jiedao"+$(this).attr(\'value\')).hide();
        }
    });
    $("#quanxuan").click(function () {
        $(".jiedao").hide();
    })
</script>';

        if($_SESSION['is_co']==1){
            $data['user'] = $this->user_model->getCoUserInfo($_SESSION['uid']);//获取会员基础信息
        }else{
            $data['user'] = $this->user_model->getPersonalInfo($_SESSION['uid']);//获取会员基础信息
        }

        $city = $this->main_model->getCityInfoByCode($this->main_model->getCityCode());//获取当前城市ｉｄ 名字
        $data['city'] = $city['name'];
        //var_dump($this->main_model->getCityCode());

//获取当前城市区县街道
        $this->main_model->getDistArea();
        $data['area'] = array($this->main_model->list_dist, $this->main_model->list_area);
//var_dump($data['area']);

        //获取工资单位数据
        $data['unit'] = $this->form_model->getUnit();
        //获取工资结算周期
        $data['pay_circle'] = $this->form_model->getPayCircle();

        //var_dump($data['unit']);
        //var_dump($data['pay_circle']);

        $this->load->view('templates/header', $data);//加载头部Publish

        $this->form_validation->set_rules('title', '标题', 'trim|required|max_length[20]');
        $this->form_validation->set_rules('mobile', '手机号', 'trim|required|numeric|exact_length[11]');
        $this->form_validation->set_error_delimiters('<p class="error">', '</p>');

        //var_dump($_POST); die();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('home/user/publish_zlg', $data);
        } else{
            if (!$_POST['job_code']) {
                $this->main_model->alert("请选择您的服务内容", 'back');
            }
            if ($edit=='edit') {
                //var_dump($_POST);
                //die();
                $_POST['uid']=$_SESSION['uid'];
                $_POST['cityid']=$city['id'];
                $_POST['job_code']=$_POST['job_code'][0];
                $return = $this->form_model->updateZlg($_POST);
                $mess['uid'] = $_SESSION['uid'];
                $mess['title'] = '您修改了一条招零工信息';
                $mess['message'] = '您于'.date('Y-m-d H:i')."修改了一条招零工信息";
            } else {
                foreach ($_POST['job_code'] as $v){
                    $data_add=$_POST;
                    $data_add['uid']=$_SESSION['uid'];
                    $data_add['job_code']=$v;
                    $data_add['cityid']=$city['id'];
                    $return = $this->form_model->addZlg($data_add);
                    if($return['flag']==-1){
                        $this->main_model->alert($return['info'], 'back');
                    }
                    $return_flag+=$return['flag'];
                }
                $mess['uid'] = $_SESSION['uid'];
                $mess['title'] = '您发布了'.count($_POST['job_code']).'条招零工信息';
                $mess['message'] = '您于' . date('Y-m-d H:i') . "发布了".count($_POST['job_code'])."条招零工信息";
            }


            if ($return_flag == count($_POST['job_code'])) {
                $this->main_model->addMessage($mess);

                $_POST = array();  //防止重复提交
                $this->main_model->alert("发布成功", '/user');

            }elseif($return['flag']==1){
                $this->main_model->alert("修改成功", '/user');
            } else {
                $data['formerror'] = $return['info'];
//var_dump($return);
                $this->load->view('home/user/publish_zlg', $data);
            }
        }

        $this->load->view('home/user/templates/footer', $data);

    }



}