<?php

/**
 * @package    mitrakomunitas/libraries - 2016
 * @author     Sabbana
 * @copyright  Divisi IT IBF
 * @version    1.0
 *
 *
 * Documentation :
 *  This is how to implement a simply send mail by lib_mailer: 
 *
 *  $this->load->library('lib_mailer');
 *  $this->lib_mailer->init();
 *  $this->lib_mailer->sendmail(array('email'=>$email), 'Subject', 'message');
 */

if(!defined('BASEPATH'))
    exit('No direct script access allowed');

class Lib_mailer {

    private $ci;
	private $mail;
    private $data;
    private $redis;

    function __construct() {
    	require 'mailer/class.phpmailer.php';
    	require 'mailer/class.smtp.php';
        $this->ci =&get_instance();
        $this->mail = new PHPMailer();
    }

    public function init($from=array()) {
    	$this->mail->setFrom((isset($from['email'])?$from['email']:'noreply.mitrakomunitas@ilmuberbagi.or.id'), (isset($from['name'])?$from['name']:'Mitra Komunitas IBF'));
 		$this->isSMTP();
    }

    public function isSMTP($host='localhost', $port=25, $auth=FALSE, $username='', $password='') {
    	$this->mail->isSMTP();
    	$this->mail->Host = $host;
    	$this->mail->Port = $port;
    	$this->mail->SMTPAuth = $auth;
    	if(!empty($username))
    		$this->mail->Username = $username;
    	if(!empty($password))
    		$this->mail->Password = $password;
    }

    public function sendmail($to, $subject, $message, $cc=array(), $bcc=array()) {
    	if(!is_array($to))
    		return FALSE;
    	if(isset($to['email']))
    		$this->mail->addAddress($to['email'], (isset($to['name'])?$to['name']:'') );
    	else if(isset($to[0]['email']))
    		foreach ($to as $key) { $this->mail->addAddress($key['email'], (isset($key['name'])?$key['name']:'') ); }
    	else
    		return FALSE;

        // Copy Carbon/ CC
        if(isset($cc['email']))
            $this->mail->addCC($cc['email'], (isset($cc['name'])?$cc['name']:'') );
        else if(isset($cc[0]['email']))
            foreach ($cc as $key) { $this->mail->addCC($key['email'], (isset($key['name'])?$key['name']:'') ); }

        // Blank Carbon/ BCC
        if(isset($bcc['email']))
            $this->mail->addBCC($bcc['email'], (isset($bcc['name'])?$bcc['name']:'') );
        else if(isset($bcc[0]['email']))
            foreach ($bcc as $key) { $this->mail->addBCC($key['email'], (isset($key['name'])?$key['name']:'') ); }

    	$this->mail->Subject = $subject;
    	$this->mail->msgHTML($message);

    	if(!$this->mail->send()) {
    		return -1;
    	}

    	return TRUE;
    }

}
