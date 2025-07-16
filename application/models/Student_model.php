<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_model extends CI_Model {

	public function get_students_with_class() {
		$this->db->select('students.*, classes.name as class_name');
		$this->db->from('students');
		$this->db->join('classes', 'classes.id = students.class_id', 'left');
		return $this->db->get()->result_array();
	}
	public function insert($data) {
		return $this->db->insert('students', $data);
	}
	public function get_by_id($id) {
		return $this->db->get_where('students', ['id' => $id])->row_array();
	}

	public function update($id, $data) {
		$this->db->where('id', $id);
		return $this->db->update('students', $data);
	}
	public function delete($id) {
		return $this->db->delete('students', ['id' => $id]);
	}

}
