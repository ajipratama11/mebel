<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class A_voucher extends CI_Controller{
    function __construct(){
		parent::__construct();		
		
	}


	 public function index() {
  		 $this->load->view('element/Owner/Header_owner');
		$this->load->view('Owner_view/VA_voucher');
		$this->load->view('element/Owner/Footer_owner');
	}

	
}
?>
