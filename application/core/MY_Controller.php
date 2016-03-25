<?php

/**
 * @package    studio_hub / 2015
 * @author     Alikuro, Alnol, Sabbana
 * @copyright  PT. Kompas Cyber Media
 * @version    1.0
 */

defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {
	
	var $data = array();

	public function __construct() {
                parent::__construct();
                /**
                 * General variable defined here
                 */
                $this->data['user_session'] = $this->lib_login->login_session();


                /**
                 * Specific class to be loaded are sets here
                 */
                // video platform class construct
                if(!empty($this->data['user_session']['privilage']['media'])) {
                	// $this->load->library('Lib_admintool');
                        $this->load->library('lib_queue');
                        $this->load->library('lib_media');
                        $this->load->library('lib_folder');
                        $this->load->library('lib_player');
                        $this->load->library('lib_geostrict');
                        $this->load->library('lib_user');
                	
						$this->load->model('Mdl_newsletter','mnewslette');
						$this->load->model('Mdl_analytics','manalytic');
                        $this->load->model('Mdl_media','mmedia');
						$this->load->model('Mdl_rendition','mrendition');
						$this->load->model('Mdl_user','muser');
						$this->load->model('Mdl_admintools','mtools');
                	// $this->load->model('Mdl_georestrict','mgeorestrict');
                }
				

	}

}
