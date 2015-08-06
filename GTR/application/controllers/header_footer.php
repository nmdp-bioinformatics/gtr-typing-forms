<?php
class Header_footer extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	public function index()
	{
	}

	public function header()
	{ 
	$this->load->view('header_template');
	}

	public function footer()
	{
	$this->load->view('footer_template');
	}
}
?>