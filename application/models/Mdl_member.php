<?php

/*
	author : sabbana azmi
	created_date : 25-03-2016
	services ilmu berbagi foundation
*/

class Mdl_member extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	# for auth
	# ==========================
	public function cekuser($u, $p){
		$user = str_replace(array("'",'"'),'', $u);
		$pass = md5($p);
		$sql = "select *, concat('IBF', sha1(member_username)) as ibf_token from ibf_member where (member_username = '$user' 
				OR member_email = '$user') and member_password = '$pass'";
		return $this->db->query($sql)->result_array();
	}
	
	public function detail_member($id){
		$sql = "select * from ibf_member a 
				left join ibf_member_detail b on a.member_id = b.member_id 
				left outer join ibf_member_type c on b.member_type = c.type_id 
				left outer join ibf_region d on b.member_region = d.region_id 
				where a.member_id = '$id'";
		return $this->db->query($sql)->result_array();
	}
	
	

}