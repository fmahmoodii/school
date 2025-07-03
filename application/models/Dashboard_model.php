<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function count_students()
	{
		return $this->db->count_all('students');
	}

	public function count_teachers()
	{
		return $this->db->count_all('teachers');
	}

	public function count_classes()
	{
		return $this->db->count_all('classes');
	}
}
