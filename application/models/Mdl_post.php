<?php

/*
	author : sabbana azmi
	created_date : 25-03-2016
	services ilmu berbagi foundation
*/

class Mdl_post extends CI_Model{
	
	public function __construct(){
		parent::__construct();
	}
	
	# for article
	# ==========================
	public function get_all_article(){
		$sql = "select a.*, b.category_name, c.member_name from ibf_article a 
				left join ibf_article_category b on a.article_category = b.category_id
				left join ibf_member c on a.article_author = c.member_id where a.article_title != '' and a.article_content != '' order by a.article_date_input DESC";
		return $this->db->query($sql)->result_array();
	}
	
	public function get_article_10(){
		$sql = "select a.*, b.category_name, c.member_name from ibf_article a 
				left join ibf_article_category b on a.article_category = b.category_id
				left join ibf_member c on a.article_author = c.member_id where a.article_title != '' and a.article_content != '' order by a.article_date_input DESC limit 0, 10";
		return $this->db->query($sql)->result_array();
	}
	
	function get_category_article(){
		$sql = "select * from ibf_article_category order by category_name ASC";
		return $this->db->query($sql)->result_array();
	}

	function get_article_by_category_name($param, $start, $offset){
		$sql = "select a.article_title, b.category_name, a.article_content, c.member_name, a.article_id, a.article_date_update
			from ibf_article a left join ibf_article_category b on a.article_category = b.category_id
			left join ibf_member c on a.article_author = c.member_id
			where b.category_name = '$param' order by a.article_date_update DESC limit ".$start.",".$offset;
		if($param == "all"){
			$sql = "select a.article_title, b.category_name, a.article_content, c.member_name, a.article_id, a.article_date_update
				from ibf_article a left join ibf_article_category b on a.article_category = b.category_id
				left join ibf_member c on a.article_author = c.member_id order by a.article_date_update DESC limit ".$start.",".$offset;
		}
		return $this->db->query($sql)->result_array();
	}

}