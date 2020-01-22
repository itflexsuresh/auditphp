<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CC_Controller 
{
	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$this->session->unset_userdata('userid');
		redirect(''); 
	}
}
