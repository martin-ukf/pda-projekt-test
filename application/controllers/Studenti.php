<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Studenti extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Studenti_model');
	}
	public function index(){
		$data = array();
		$data['studenti'] = $this->Studenti_model->ZobrazStudentov();
		$data['nazov'] = 'Zoznam študentov';
		//nahratie zoznamu studentov
		$this->load->view('studenti/index', $data);
	}
}
