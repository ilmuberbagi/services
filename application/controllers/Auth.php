<?php

/**
 * @package    portal.ilmuberbagi.or.id / 2016
 * @author     Sabbana
 * @copyright  Divisi IT IBF
 * @version    1.0
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	
	
	function __construct(){
		parent::__construct();
		$this->load->model("Mdl_member","member");
	}

	public function index(){
		echo "--- IBF MEMBER API AUTH SERVICES ---";
	}
	
	public function user(){
		$query = null;
		if(isset($_POST['api_kode']) && isset($_POST['api_datapost'])){
			$kode 		= (int)preg_replace("/[^0-9]/", "", $_POST['api_kode']);
			$datapost	= $_POST['api_datapost'];
			$err_number = 404;
			
			switch($kode){
				case 1000: 
					$query = $this->member->cekuser($datapost[0], $datapost[1]);
				break;
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