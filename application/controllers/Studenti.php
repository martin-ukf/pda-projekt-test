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

	// Zobrazenie detailu o studentovi
	public function view($id){
		$data = array();

		//kontrola, ci bolo zaslane id riadka
		if(!empty($id)){
			$data['studenti'] = $this->Studenti_model->ZobrazStudentov($id);
			$data['title'] = $data['studenti']['priezvisko'] . ' ' . $data['studenti']['meno'];

			//nahratie detailu zaznamu
			$this->load->view('templates/header', $data);
			$this->load->view('temperatures/view', $data);
			$this->load->view('templates/footer');
		}else{
			redirect('/studenti');
		}
	}

	// pridanie zaznamu o studentovi
	public function add(){
		$data = array();
		$postData = array();

		//zistenie, ci bola zaslana poziadavka na pridanie zazanmu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('id', 'id', 'required');
			$this->form_validation->set_rules('priezvisko', 'Zadajte priezvisko', 'required');
			$this->form_validation->set_rules('meno', 'Zadajte meno', 'required');

			//priprava dat pre vlozenie
			$postData = array(
				'id' => $this->input->post('id'),
				'priezvisko' => $this->input->post('priezvisko'),
				'meno' => $this->input->post('meno')
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//vlozenie dat
				$insert = $this->Studenti_model->insert($postData);

				if($insert){
					$this->session->set_userdata('success_msg', 'Záznam o študentovi bol úspešne vložený');
					redirect('/studenti');
				}else{
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}
	//	$data['users'] = $this->Studenti_model->get_users_dropdown();
	//	$data['users_selected'] = '';
		$data['post'] = $postData;
		$data['title'] = 'Pridať študenta';
		$data['action'] = 'Pridať';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('temperatures/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// aktualizacia dat o studentovi
	public function edit($id){
		$data = array();
		//ziskanie dat z tabulky
		$postData = $this->Studenti_model->ZobrazStudentov($id);

		//zistenie, ci bola zaslana poziadavka na aktualizaciu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('id', 'id', 'required');
			$this->form_validation->set_rules('priezvisko', 'Zadajte priezvisko', 'required');
			$this->form_validation->set_rules('meno', 'Zadajte meno', 'required');

			// priprava dat pre aktualizaciu
			$postData = array(
				'id' => $this->input->post('id'),
				'priezvisko' => $this->input->post('priezvisko'),
				'meno' => $this->input->post('meno')
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//aktualizacia dat
				$update = $this->Studenti_model->update($postData, $id);

				if($update){
					$this->session->set_userdata('success_msg', 'Záznam o študentovi bol aktualizovaný.');
					redirect('/temperatures');
				}else{
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}

	//$data['users'] = $this->Temperatures_model->get_users_dropdown();
	//	$data['users_selected'] = $postData['user'];
		$data['post'] = $postData;
		$data['title'] = 'Aktualizovať údaje';
		$data['action'] = 'Aktualizovať';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('temperatures/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// odstranenie dat o studentovi
	public function delete($id){
		//overenie, ci id nie je prazdne
		if($id){
			//odstranenie zaznamu
			$delete = $this->Studenti_model->delete($id);

			if($delete){
				$this->session->set_userdata('success_msg', 'Záznam bol odstránený.');
			}else{
				$this->session->set_userdata('error_msg', 'Záznam sa nepodarilo odstrániť.');
			}
		}

		redirect('/studenti');
	}
}
