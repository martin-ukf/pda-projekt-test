<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Znamky_model extends CI_Model {
	public function __construct()
	{
		$this->load->database();
	}

	function ZobrazZnamky($id="") {
		if(!empty($id)){
			$query = $this->db->get_where('znamky', array('id' => $id));
			return $query->row_array();
		}else{
			$query = $this->db->get('znamky');
			return $query->result_array();
		}

	}

	function ZobrazZnamkySpravne($id=""){
		if(!empty($id)){
			$this->db->select('znamky.id, CONCAT(meno," ", priezvisko) AS cele_meno, predmet, datum, znamka')
			->from('studenti')
			->join('znamky', 'studenti.id = znamky.idstudent')
			->where('znamky.id',$id);
			$query = $this->db->get();
			return $query->row_array();
		}else{
			$this->db->select('znamky.id, CONCAT(meno," ", priezvisko) AS cele_meno, predmet, datum, znamka')
				->from('studenti')
				->join('znamky', 'studenti.id = znamky.idstudent');
			$query = $this->db->get();
			return $query->result_array();
		}

	}

	//  naplnenie selectu z tabulky studenti
	public function NaplnDropdownStudenti($id = ""){
		$this->db->order_by('priezvisko')
			->select('id, CONCAT(meno," ", priezvisko) AS cele_meno')
			->from('studenti');
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			$dropdowns = $query->result();
			foreach ($dropdowns as $dropdown)
			{
				$dropdownlist[$dropdown->id] = $dropdown->cele_name;
			}
			$dropdownlist[''] = 'Vyberte študenta';
			return $dropdownlist;
		}
	}

	// vlozenie zaznamu
	public function insert($data = array()) {
		$insert = $this->db->insert('znamky', $data);
		if($insert){
			return $this->db->insert_id();
		}else{
			return false;
		}
	}

	// aktualizacia zaznamu
	public function update($data, $id) {
		if(!empty($data) && !empty($id)){
			$update = $this->db->update('znamky', $data, array('id'=>$id));
			return $update?true:false;
		}else{
			return false;
		}
	}

	// odstranenie zaznamu
	public function delete($id){
		$delete = $this->db->delete('znamky',array('id'=>$id));
		return $delete?true:false;
	}

}

