<?php
class Daili_model extends CI_Model {

    public function __construct()
    {
        // Call the CI_Model constructor
        parent::__construct();
        $this->load->database();
        $this->load->model('string_model');
    }

    /**
     * 获取当前代理商 注册会员信息列表
     * 参数：userid
     * 返回值数组：no=>工号,name=>昵称/公司名,gong=>工种,is_vip=>零工状态/套餐期限,referrer=>注册类型(推介人id),vip_starttime=>充值时间,
     */
    public function getMemberInfo($userid){
        $city_id=$this->getCityid($userid);
        $sql = "select userlist.no,is_co,referrer,addtime,mobile from userlist where city_id='$city_id'";
        $query = $this->db->query($sql);
        $arr = $query->result_array();
        foreach ($arr as $k => $v){

            if($arr[$k]['is_co']==1){
                $sql1 = "select coname from user_co where uid='{$arr[$k]['uid']}'";
                $query1 = $this->db->query($sql1);
                $arr1 = $query1->row_array();
                $arr[$k]['name']=$arr1['coname'];
            }else{
                $sql1 = "select realname from user_personal where uid='{$arr[$k]['uid']}'";
                $query1 = $this->db->query($sql1);
                $arr1 = $query1->row_array();
                $arr[$k]['name']=$arr1['realname'];
            }
            $sql2 = "select job_type.name 
                     from job_type 
                     inner join publish_list on job_type.id=publish_list.uid 
                     where publish_list.uid='{$arr[$k]['uid']}'";
            $query2 = $this->db->query($sql2);
            foreach ($query2->result_array() as $row)
            {
                $gong.=$row['name'].',';
            }
            $arr[$k]['gong']=substr($gong, 0, -1);

            $time = time();
            //查看vip是否过期 有值则为vip
            $sql3 = "select starttime as vip_starttime,endtime as vip_endtime from user_service_log where uid='{$arr[$k]['uid']}' and endtime>'$time'  ";
            $query3 = $this->db->query($sql3);
            $arr3 = $query3->row_array();
            $arr[$k]['is_vip']= $arr['vip_endtime'];
            $arr[$k]['vip_starttime']= $arr['vip_starttime'];

        }
        return $arr;
    }


    /**
     * 根据代理商userid获取 代理区域id
     * 参数：userid
     * 返回值数组：城市编码=>城市名称
     */
    public function getCityid($userid){


        return '224';
    }


}