<?php
	class Beckon_model extends CI_Model {
	    public function __construct(){
	        parent::__construct();
	        $this->load->database();
	    }
	    //获取所有工种
	    public function getJob_type(){
	    	$sql = "select 
				    	id,
						name,
						pre_id,
						pre_pre_id,
						level
					from
						job_type";
			$result = $this->db->query($sql);
			$list = $result->result_array();
			return $list;
	    }
	    //获取所有地域
	    public function getArea($city_id){
	    	$sql = "select 
						id,
						name,
						level,
						upid,
						displayorder,
						hot
					from
						district_dic
					where
						1=1";
			if($city_id){
				$sql.=" and upid=".$city_id;
			}
			$result = $this->db->query($sql);
			$list = $result->result_array();
			return $list;
	    }
	    //获取结算周期
	    public function getPay_circle(){
	    	$sql = "select 
		    			id,
		    			name
		   			from 
		   				pay_circle_dic";
		   	$result = $this->db->query($sql);
			$list = $result->result_array();
			return $list;
	    }
	    //获取招聘信息总数
	    public function getCount(){
	    	$sql = 'select count(*) as count from invite_list';
	    	$result = $this->db->query($sql);
			$result = $result->result_array();
			// var_dump($result);
			return $result[0]['count'];
	    }
	    //获取招零工信息
	    public function getBeckons($page = false,$pages = false,$job_code = false ,$quyu = false ,$gongzi = false ,$jiesuan = false ,$fbsj = false ,$renzheng = false ,$xinyong = false,$gongzi_s = false,$gongzi_s_1 = false,$gongzi_s_2 = false,$sgz = false){
	    	$sql = "select 
						i.id as  id,
						i.uid as  uid,
						i.job_code as job_code ,
						i.city_id as  city_id,
						i.district_id as  district_id,
						i.title as  title,
						i.pay as  pay,
						i.pay_unit as  pay_unit,
						i.pay_circle as  pay_circle,
						i.sum as  sum,
						i.worktime as  worktime,
						i.contacts as  contacts,
						i.mobile as  mobile,
						i.address as  address,
						i.info as  info,
						i.flag as  flag,
						i.pv as  pv,
						i.addtime as addtime ,
						i.updatetime as  updatetime,
						i.flushtime as  flushtime,
						u.is_real as is_real,
						j.name as job_name
					from
						invite_list i
						LEFT OUTER JOIN
						userlist u
						ON i.uid=u.uid
						LEFT OUTER JOIN
						job_type j
						ON i.job_code=j.id
					where 
						1=1";
			if($job_code){
				$job_code_sql = "select level from job_type where id=".$job_code;
				$result = $this->db->query($job_code_sql);
				$result = $result->result_array();
				$job_code_sql_1 = false;
				if($result[0]['level'] == 1){
					$job_code_sql_1 = 'select id from job_type where pre_pre_id='.$job_code;
				}else if($result[0]['level'] == 2){
					$job_code_sql_1 = 'select id from job_type where pre_id='.$job_code;
				}else if($result[0]['level'] == 3){
					$sql.=' and i.job_code='.$job_code;
				}
				$result = $this->db->query($job_code_sql_1);
				$result = $result->result_array();
				if($job_code_sql_1){
					$sql.=' and (1=2 ';
					foreach($result as $item){
						$sql.=' or i.job_code='.$item['id'];
					}
					$sql.=' ) ';
				}
			}else if($jiesuan){
				$sql.=' and i.pay_circle='.$jiesuan;
			}else if($gongzi){
				if($gongzi == 'num'){
					$sql.=' and i.pay_unit=1 and i.pay>100';
				}else{
					$sql.=' and i.pay_unit=1 and i.pay<'.$gongzi;
				}
			}else if($fbsj){
				ini_set('date.timezone','Asia/Shanghai');
				$time = time();
				$sql.=' and i.addtime<'.($time-$fbsj*24*60*60*1000);
			}else if($renzheng){
				$sql.=' and u.is_real='.$renzheng;
			}else if($xinyong){
				$sql.=' order by credit3 desc';
			}else if($gongzi_s_1 && $gongzi_s_2){
				$sql.=' and i.pay_unit=1 and i.pay<'.$gongzi_s_2.' and i.pay>'.$gongzi_s_1;
			}else if($quyu != false){
				$sql.=' and i.district_id='.$quyu;
			}else if($sgz){
				$sql.=' and i.title LIKE \'%'.$sgz.'%\' or j.name LIKE \'%'.$sgz.'%\' ';
			}
			if(! $pages){
				$pages = 0;
			}
			$sql.=' LIMIT '.$pages.', '.$page.'';
			// return $sql;
	    	$result = $this->db->query($sql);
			$list = $result->result_array();
			for($i = 0 ; $i < count($list) ; $i++){
				//查询区县
				$sql = "select name from district_dic where id=".$list[$i]['district_id'];
				$result = $this->db->query($sql);
				$name = $result->result_array();
				$list[$i]['aera'] = $name[0]['name'];
				//查询公司名称,公司形象
				$sql = "select coname,img from user_co where uid=".$list[$i]['uid'];
				$result = $this->db->query($sql);
				$name = $result->result_array();
				$list[$i]['coname'] = $name[0]['coname'];
				$list[$i]['coimg'] = $name[0]['img'];
				//查询是否是会员
				$sql = "select endtime from user_service_log where uid=".$list[$i]['uid'];
				$result = $this->db->query($sql);
				$endtime = $result->result_array();
				$now_time = time();
				$list[$i]['vip'] = $endtime[0]['endtime'] > $now_time ? 1 : 2;
			}
			return $list;
	    }
	    public function find($uid){
		$sql = "select 
					id,
					uid,
					job_code,
					city_id,
					district_id,
					title,
					pay,
					pay_unit,
					pay_circle,
					sum,
					worktime,
					contacts,
					mobile,
					address,
					info,
					flag,
					pv,
					addtime,
					updatetime,
					flushtime
				from 
					invite_list
				where 
					uid=".$uid;
		$result = $this->db->query($sql);
        $news = $result->result_array();
		$time = time();
		for($i = 0 ; $i < count($news) ; $i++){
			$sql = "select coname,img,info from user_co where uid=".$news[$i]['uid'];
			$query = $this->db->query($sql);
	        $arr = $query->result_array();
			$news[$i]['coname'] = $arr[0]['coname'];
			$news[$i]['img'] = $arr[0]['img'];
			$news[$i]['co_info'] = $arr[0]['info'];
			
			$sql = "select endtime from user_service_log where uid=".$news[$i]['uid'];
			$query = $this->db->query($sql);
	        $arr = $query->result_array();
			$news[$i]['vip'] = $arr[0]['endtime'] > $time ? 1 : 2;
			
			$sql = "select name from pay_circle_dic where id=".$news[$i]['pay_circle'];
			$query = $this->db->query($sql);
	        $arr = $query->result_array();
			$news[$i]['pay_circle'] = $arr[0]['name'];
			
			$sql = "select name from pay_unit_dic where id=".$news[$i]['pay_unit'];
			$query = $this->db->query($sql);
	        $arr = $query->result_array();
			$news[$i]['pay_unit'] = $arr[0]['name'];
			
			$sql = "select name from district_dic where id=".$news[$i]['district_id'];
			$query = $this->db->query($sql);
	        $arr = $query->result_array();
			$news[$i]['district_dic'] = $arr[0]['name'];
			
			$sql = "select is_real from userlist where uid=".$news[$i]['uid'];
			$query = $this->db->query($sql);
	        $arr = $query->result_array();
			$news[$i]['yingyezhiz'] = $arr[0]['is_real'];
			
			$sql = "select name from job_type where id=".$news[$i]['job_code'];
			$query = $this->db->query($sql);
	        $arr = $query->result_array();
			$news[$i]['job_name'] = $arr[0]['name'];
		}
		return $news;
	}

	}
?>