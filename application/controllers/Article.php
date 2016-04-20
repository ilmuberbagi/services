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
		$this->load->library('Lib_redis');
	}

	public function index(){
		echo "Artikel Index API Services";
	}
	
	public function category($param = "", $start=0, $offset=6){
		$redis = $this->lib_redis->set_client(1);
		if($param != ""){
			$key = 'list:category:'.$param.':'.$start.':'.$offset;
			if($redis->exists($key) == FALSE){
				$data = $this->article->get_article_by_category_name($param, $start, $offset);
				$redis->set($key, json_encode($data));
				$redis->expire($key, 60); # 1 minute
				$res = $redis->get($key);
			}else
				$res = $redis->get($key);
		}else{
			$key = 'list:category_article';
			if($redis->exists($key) == FALSE){
				$data = $this->article->get_category_article();
				$redis->set($key, json_encode($data));
				$redis->expire($key, 360); # 1 hour
				$res = $redis->get($key);
			}else
				$res = $redis->get($key);
		}
		echo $res;
	}
	
	public function read($id){
		$redis = $this->lib_redis->set_client(0);
		$key = 'read:article:'.$id;
		if($redis->exists($key) == FALSE){
			$data = $this->article->get_detail_article($id);
			$redis->set($key, json_encode($data));
			$redis->expire($key, 120); # 2 minutes
			$res = $redis->get($key);
		}else
			$res = $redis->get($key);
		echo $res;
	}
	
	
	private function _formatjson($data = array()){
		header('Cache-Control: no-cache, must-revalidate');
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Content-type: application/json');
		echo json_encode($data);
	}


}