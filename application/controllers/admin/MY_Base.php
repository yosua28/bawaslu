<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Base extends CI_Controller {

	var $CI = NULL;
	public function __construct(){
		parent::__construct();
		$this->simple_login->cek_login();
		$this->CI =& get_instance();
	}
	

}
