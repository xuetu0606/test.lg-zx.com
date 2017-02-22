<?php
class Admin_model extends CI_Model{

	public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
    }

    /*
    *	获取userlist表未实名认证的数据，根据时间降序
    * 	返回值：uid-用户id username-用户名 mobile-手机 addtime-新增时间
    * 
     */
    public function reallist(){
    	//$sql = "select uid,username,mobile,addtime,is_co,city_id from userlist where is_real=0 or is_real is null";
/*        $sql = "select uid,username,mobile,addtime,is_co,city_id from userlist inner join user_co on user_co.uid=userlist.uid 
            where userlist.is_real=0 or userlist.is_real is null
            and user_co.idno_img is not null
            and userlist.is_co=1";*/
        $sql = "select * from userlist 
        inner join user_co on user_co.uid=userlist.uid
        where ( userlist.is_real=0 or userlist.is_real is null)
        and user_co.idno_img is not null and userlist.is_co=1";
    	$query = $this->db->query($sql);
        
        $sql2 = "select * from userlist 
        inner join user_personal on user_personal.uid=userlist.uid
        where ( userlist.is_real=0 or userlist.is_real is null)and user_personal.idno_img is not null and userlist.is_co=0";
        $query2 = $this->db->query($sql2);
       
        $arr = array();
        while ($row = $query->unbuffered_row('array')){
            $arr[] = $row;
        }
    	while ($row2 = $query2->unbuffered_row('array')){
    		$arr[] = $row2;
    	}
    	return $arr;
    }

    /*
    *   根据uid获取公司类型的数据
    * 
     */
    public function realdetail1($uid){
        $sql = "select uid,coname,idno,idno_img,info from user_co where uid={$uid}";
        $query = $this->db->query($sql);
        $arr = $query->row_array();
        return $arr;
    }

    /*
    *   根据uid获取个人类型的数据
    * 
     */
    public function realdetail2($uid){
        $sql = "select uid,realname,idno,idno_img,info from user_personal where uid={$uid}";
        $query = $this->db->query($sql);
        $arr = $query->row_array();
        return $arr;
    }

    /*
    *   根据城市id获取城市简码
    * 
     */
    public function getCityCode($city_id){
        $sql = "select pinyin from province_city where dist_id={$city_id}";
        $query = $this->db->query($sql);
        $arr = $query->row_array();
        return $arr;
    }

    /*
    *   根据uid修改userlist表的实名认证is_real字段的值
    * 
     */
    public function check($test){
        extract($test);
        $sql = "update userlist set is_real={$check} where uid={$uid}";
        $query = $this->db->query($sql);
        if($query){
            return true;
        }else{
            return false;
        }
    }
} 