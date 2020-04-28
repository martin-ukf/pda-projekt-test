<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Studenti_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	function ZobrazStudentov($id="") {
		if(!empty($id)){
			$query = $this->db->get_where('studenti', array('id' => $id));
			return $query->row_array();
		}else{
			$query = $this->db->get('studenti');
			return $query->result_array();
		}

	}
}
