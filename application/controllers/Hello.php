<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hello extends CI_Controller {
public function __construct() {
		parent::__construct(); 
		error_reporting(0);

	}
	public function index()
	{

		echo "azzz";
		// $this->load->view('welcome_message');
	}
	public function reg()
	{

		echo "azzz";
		// $this->load->view('welcome_message');
	}
	
}
