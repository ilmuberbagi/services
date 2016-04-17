<?php

/**
 * @package    portal.ilmuberbagi.or.id / 2016
 * @author     Sabbana
 * @copyright  Divisi IT IBF
 * @version    1.0
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {
	
	
	function __construct(){
		parent::__construct();
		$this->load->model("Mdl_post","mpost");
	}

	public function article($param){
		$query = null;
		switch($param){
			case "all": $query = $this->mpost->get_all_article(); break;
			case "top10": $query = $this->mpost->get_article_10(); break;
		}
		$this->_formatjson($query);
	}
	
	public function activity(){
		
	}
		
	private function _formatjson($data = array()){
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode($data);
	}


}