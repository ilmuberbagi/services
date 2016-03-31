<?php

/**
 * @package    service.ilmuberbagi.or.id / 2016
 * @author     Sabbana
 * @copyright  Divisi IT IBF
 * @version    1.0
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Doc extends CI_Controller {
	
	
	function __construct(){
		parent::__construct();
	}

	public function index(){
		$url = 'http://localhost/ibf/adminportal';
		echo file_get_contents($url);
	}
	

}