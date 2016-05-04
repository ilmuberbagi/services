<?php

/*
	author : sabbana azmi, ... , ...
	created_date : 25-03-2016
	services ilmu berbagi foundation
*/

class Mdl_member extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	# for auth
	# ==========================
	public function cekuser($data = array()){
		$user = str_replace(array("'",'"'),'', $data['username']);
		$pass = md5($data['password']);
		$sql = "select a.*, c.member_type, b.member_image_profile from ibf_member a 
				left join ibf_member_detail b on a.member_id = b.member_id
				left outer join ibf_member_type c on b.member_type = c.type_id 
				where (a.member_username = '$user' OR a.member_email = '$user') and a.member_password = '$pass'";
		return $this->db->query($sql)->result_array();
	}
	
	public function detail_member_by_id($data = array()){
		$id = $data['member_id'];
		$sql = "select * from ibf_member a 
				left join ibf_member_detail b on a.member_id = b.member_id 
				left outer join ibf_member_type c on b.member_type = c.type_id 
				left outer join ibf_region d on b.member_region = d.region_id 
				where a.member_id = '$id'";
		return $this->db->query($sql)->result_array();
	}
	
	public function detail_member_by_code($data = array()){
		$code = $data['member_ibf_code'];
		$sql = "select * from ibf_member a 
				left join ibf_member_detail b on a.member_id = b.member_id 
				left outer join ibf_member_type c on b.member_type = c.type_id 
				left outer join ibf_region d on b.member_region = d.region_id 
				where a.member_ibf_code = '$code'";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_privilage_user($data = array()){
		$id = $data['member_id'];
		$sql = "select * from ibf_privilage where member_id = '$id'";
		return $this->db->query($sql)->result_array();
	}

}