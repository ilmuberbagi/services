<?php

/**
 * @package    services.ilmuberbagi.id / 2016
 * @author     Sabbana
 * @copyright  Divisi IT IBF
 * @version    1.0
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends CI_Controller {
	
	
	function __construct(){
		parent::__construct();
		$this->load->model("Mdl_post","article");
	}

	public function category($param = "", $start=0, $offset=6){
		$res = $this->article->get_category_article();
		if($param !== "")
			$res = $this->article->get_article_by_category_name($param, $start, $offset);
		
		return $this->_formatjson($res);
	}
	
	
	public function index(){
		$query = null;
		if(isset($_POST['api_kode']) && isset($_POST['api_datapost'])){
			$kode 		= (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
			$datapost	= $_POST['api_datapost'];
			$err_number = 404;
			
			switch($kode){
				case 1000: $query = $this->member->detail_member_by_id($datapost[0]); break;
				case 1001: $query = $this->member->detail_member_by_code($datapost[0]); break;
			}
		}
		$this->_formatjson($query);
	}
		
	private function _formatjson($data = array()){
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode($data);
	}


}