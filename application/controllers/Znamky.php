<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Znamky extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('Znamky_model');
	}
	public function index(){
		$data = array();

		//ziskanie sprav zo session
		if($this->session->userdata('success_msg')){
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if($this->session->userdata('error_msg')){
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}

		$data['znamky'] = $this->Znamky_model->ZobrazZnamky();
		$data['znamky2'] = $this->Znamky_model->ZobrazZnamkySpravne();
		$data['nazov'] = 'Zoznam známok';
		//nahratie zoznamu studentov
		$this->load->view('templates/header', $data);
		$this->load->view('znamky/index', $data);
		$this->load->view('templates/footer');
	}

	// Zobrazenie detailu o znamke
	public function view($id){
		$data = array();

		//kontrola, ci bolo zaslane id riadka
		if(!empty($id)){
			$data['znamky'] = $this->Znamky_model->ZobrazZnamky($id);
			$data['title'] = 'Detail známky';

			//nahratie detailu zaznamu
			$this->load->view('templates/header', $data);
			$this->load->view('znamky/view', $data);
			$this->load->view('templates/footer');
		}else{
			redirect('/znamky');
		}
	}

	// pridanie zaznamu o znamke
	public function add(){
		$data = array();
		$postData = array();

		//zistenie, ci bola zaslana poziadavka na pridanie zazanmu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('znamka', 'Pole znamka', 'required');
			$this->form_validation->set_rules('datum', 'Pole datum', 'required');
			$this->form_validation->set_rules('predmet', 'Pole predmet', 'required');
			$this->form_validation->set_rules('idstudent', 'Pole student', 'required');

			//priprava dat pre vlozenie
			$postData = array(
				'znamka' => $this->input->post('znamka'),
				'datum' => $this->input->post('datum'),
				'predmet' => $this->input->post('predmet'),
				'idstudent' => $this->input->post('idstudent'),
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//vlozenie dat
				$insert = $this->Znamky_model->insert($postData);

				if($insert){
					$this->session->set_userdata('success_msg', 'Záznam o známke bol úspešne vložený');
					redirect('/znamky');
				}else{
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}
		$data['post'] = $postData;
		$data['title'] = 'Pridať známku';
		$data['action'] = 'add';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('znamky/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// aktualizacia dat o znamke
	public function edit($id){
		$data = array();
		//ziskanie dat z tabulky
		$postData = $this->Znamky_model->ZobrazZnamky($id);

		//zistenie, ci bola zaslana poziadavka na aktualizaciu
		if($this->input->post('postSubmit')){
			//definicia pravidiel validacie
			$this->form_validation->set_rules('znamka', 'Pole znamka', 'required');
			$this->form_validation->set_rules('datum', 'Pole datum', 'required');
			$this->form_validation->set_rules('predmet', 'Pole predmet', 'required');
			$this->form_validation->set_rules('idstudent', 'Pole student', 'required');

			// priprava dat pre aktualizaciu
			$postData = array(
				'znamka' => $this->input->post('znamka'),
				'datum' => $this->input->post('datum'),
				'predmet' => $this->input->post('predmet'),
				'idstudent' => $this->input->post('idstudent'),
			);

			//validacia zaslanych dat
			if($this->form_validation->run() == true){
				//aktualizacia dat
				$update = $this->Znamky_model->update($postData, $id);

				if($update){
					$this->session->set_userdata('success_msg', 'Záznam o znamke bol aktualizovaný.');
					redirect('/znamky');
				}else{
					$data['error_msg'] = 'Nastal problém.';
				}
			}
		}

		//$data['users'] = $this->Temperatures_model->get_users_dropdown();
		//	$data['users_selected'] = $postData['user'];
		$data['post'] = $postData;
		$data['title'] = 'Aktualizovať údaje';
		$data['action'] = 'edit';

		//zobrazenie formulara pre vlozenie a editaciu dat
		$this->load->view('templates/header', $data);
		$this->load->view('znamky/add-edit', $data);
		$this->load->view('templates/footer');
	}

	// odstranenie dat o znamke
	public function delete($id){
		//overenie, ci id nie je prazdne
		if($id){
			//odstranenie zaznamu
			$delete = $this->Znamky_model->delete($id);

			if($delete){
				$this->session->set_userdata('success_msg', 'Záznam bol odstránený.');
			}else{
				$this->session->set_userdata('error_msg', 'Záznam sa nepodarilo odstrániť.');
			}
		}

		redirect('/znamky');
	}
}

