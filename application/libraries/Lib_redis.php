<?php

/**
 * @package    service ilmuberbagi / 2016
 * @author     Sabbana
 * @copyright  Ilmu Berbagi Foundation
 * @version    1.0
 */

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Redis config
 */

class Lib_redis{
	
	function __construct() {
        require 'predis/Autoloader.php';
		Predis\Autoloader::register();
    }

    /**
     * Function to set the client host also database index,
	 * Assign db to :
	 *       0 --> cache detail article or post
	 *       1 --> list article or post
	 */
	 
	function set_client($db=0) {
		try {
			$CI =& get_instance();
			$conf = array(
				"scheme" => "tcp",
				"host" => '127.0.0.1',
				"port" => 6379
			);

			if(is_numeric($db)) if($db > 0) $conf['database'] = $db;

			$redis = new Predis\Client($conf);
			
			return $redis;
		}
		catch (Exception $e) {
			echo $e->getMessage();
		}
	}

}