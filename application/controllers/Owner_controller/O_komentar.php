<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class O_Komentar extends CI_Controller{
	function __construct(){
		parent::__construct();		
		$this->load->model('Owner_models/MO_transaksi');
		$this->load->helper(array('url'));
		
	}

	public function index(){
		
		$this->load->view('element/Owner/Header_owner');
		$this->load->view('Owner_view/komentar');
		$this->load->view('element/Owner/Footer_owner');
	}

} 
?>