<?php
class Admin_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->model('string_model');
        $this->load->helper('string');
        $this->load->helper('text');
    }



    /**
     * 根据代理商userid获取 代理区域id
     * 参数：userid
     * 返回值数组：城市编码=>城市名称
     */
    public function getCityid($userid){
        $sql = "select city_id from daili_userlist where uid='{$userid}'";
        $query = $this->db->query($sql);
        $arr = $query->row_array();
        if($arr){
            return $arr['city_id'];
        }else{
            return false;
        }
    }

    /**密码加密
     * 参数pwd  密码明文
     *return 加密后密码
     */
    public function encryptPwd($pwd){
        $salt = 'Random_sfqw2frhp3dd';
        return md5($pwd.$salt);
    }
    /**
     * 登陆验证
     * 参数：$data数组-登录数据项，包含 username-用户名或手机号；passwd-加密后密码
     * 返回值：有该用户则返回uid，否则返回false
     */
    public function getuserlist($data){
//    	$data = array('username'=>'shane','passwd'=>'123123');
        extract($data);
        $sql = "select uid,username,quanxian,zhiwu from admin_userlist where (username = '$username') and password = '$passwd'";
        $query = $this->db->query($sql);
        $arr = $query->row_array();
        if($arr){
            return $arr;
        }else{
            return false;
        }
    }

    /**
     * 获取用户信息
     */
    public function getuserinfo($uid){
        $sql = "select uid,username,quanxian,zhiwu from admin_userlist where uid = '$uid'";
        $query = $this->db->query($sql);
        $arr = $query->row_array();
        if($arr){
            return $arr;
        }else{
            return false;
        }
    }


    /**
     * 获取当前代理商 注册会员信息列表
     * 参数：$data array(userid=>用户id,time=>查询vip截止,gong=>公司类型0不限 1个人 2公司,reg=>注册类型0不限 1推广注册 2站内注册,addsql=>增加分页sql语句)
     * 返回值数组：no=>工号,name=>昵称/公司名,gong=>工种,is_vip=>零工状态/套餐期限,referrer=>注册类型(推介人id),vip_starttime=>充值时间,
     */
    public function getMemberInfo1($data){
        extract($data);
        if($city_id){
            $city_sql="and userlist.city_id='{$city_id}'";
        }else{
            $city_sql='';
        }
        if($gong==1){
            $gong_sql="and userlist.is_co!='1'";
        }elseif($gong==2){
            $gong_sql="and userlist.is_co='1'";
        }else{
            $gong_sql='';
        }
        if($reg==2){
            $reg_sql="and userlist.promotion_flag='0'";
        }elseif($reg==1){
            $reg_sql="and userlist.promotion_flag='1'";
        }else{
            $reg_sql='';
        }
        if($vip==1){
            $time=time()+2592000;
            $time="and user_service_log.endtime>{$time}";
        }else{
            $time='';
        }
        if($starttime and $endtime){
            $riqi="and {$starttime} < userlist.addtime and userlist.addtime < {$endtime} ";
        }else{
            $riqi='';
        }

        $sql = "select userlist.no,userlist.username,userlist.is_co,(select coname from user_co where uid=userlist.uid limit 1) as coname,
(select nickname from user_personal where uid=userlist.uid limit 1) as nickname,
GROUP_CONCAT( distinct job_type.name ) as gong,

userlist.addtime,userlist.referrer,userlist.promotion_flag,userlist.mobile,
user_service_log.vip_id,user_service_log.starttime as vip_starttime,user_service_log.endtime as is_vip,vip_service_dic.name
 from userlist 
left join publish_list on publish_list.uid=userlist.uid
left join job_type on job_type.id=publish_list.job_code
left join user_service_log on userlist.uid=user_service_log.uid 
left join vip_service_dic on user_service_log.vip_id=vip_service_dic.id
where 1=1 {$city_sql} {$reg_sql} {$gong_sql} {$time} {$riqi}
group by userlist.uid {$addsql}";
        $query = $this->db->query($sql);
        $arr = $query->result_array();
        return $arr;
    }


    /**
     * 获取省份列表
     *返回值数组：省份编码=>省份名称
     */
    public function getProvince(){
        $sql = "select dist_id,name from province_city where level=1 ";
        $query = $this->db->query($sql);
        $list = array();
        while ($row = $query->unbuffered_row('array')) {
            $list[$row['dist_id']] = $row['name'];
        }
        return $list;
    }

    /**
     * 获取全部城市列表
     *
     * 返回值数组：城市编码=>城市名称
     */
    public  function getAllCity(){
        $sql = "select pre_dist_id,dist_id,name from province_city where level=2 ";
        $query = $this->db->query($sql);
        $list = array();
        while ($row = $query->unbuffered_row('array')) {
            $list[$row['pre_dist_id']][$row['dist_id']] = $row['name'];
        }
        return $list;
    }


}