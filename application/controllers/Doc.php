<?php

/**
 * @package    service.ilmuberbagi.or.id / 2016
 * @author     Sabbana
 * @copyright  Divisi IT IBF
 * @version    1.0
 */
 
defined('BASEPATH') OR exit('No direct script access allowed');

class Doc extends CI_Controller {
	
	var $data = array();
	
	function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->data['title'] = 'API Service Ilmu Berbagi Foundation';
		$this->data['page'] = 'page/home';
		$this->load->view('template', $this->data);
	}
	
	public function member(){
		$this->data['title'] = 'API Service : Member';
		$this->data['page'] = 'page/member';
		$this->load->view('template', $this->data);
	}
	
	public function article(){
		$this->data['title'] = 'API Service : Member';
		$this->data['page'] = 'page/member';
		$this->load->view('template', $this->data);
	}

}