<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Model extends CI_Model {

	public function __construct() {
		parent::__construct();
	}

	// =======================
	// GET با تمام گزینه‌ها
	// =======================
	public function get_data(
		$table,
		$select,
		$where = NULL,
		$or_where = NULL,
		$where_in = NULL,
		$where_not_in = NULL,
		$like = NULL,
		$or_like = NULL,
		$join = NULL,
		$group_by = NULL,
		$having = NULL,
		$order_by = NULL,
		$limit = NULL,
		$offset = NULL,
		$distinct = false,
		$custom_where = NULL
	) {
		$this->db->select($select ?: '*');

		if($distinct) $this->db->distinct();

		if ($where) $this->db->where($where);
		if ($or_where) $this->db->or_where($or_where);
		if ($where_in) {
			foreach($where_in as $col => $values){
				$this->db->where_in($col, $values);
			}
		}
		if ($where_not_in) {
			foreach($where_not_in as $col => $values){
				$this->db->where_not_in($col, $values);
			}
		}
		if ($like) {
			foreach($like as $col => $val){
				$this->db->like($col, $val);
			}
		}
		if ($or_like) {
			foreach($or_like as $col => $val){
				$this->db->or_like($col, $val);
			}
		}

		if ($join) {
			foreach($join as $j){
				$type = isset($j['type']) ? $j['type'] : '';
				$this->db->join($j['table'], $j['condition'], $type);
			}
		}

		if ($group_by) $this->db->group_by($group_by);
		if ($having) $this->db->having($having);

		if ($order_by) $this->db->order_by($order_by);
		if ($custom_where) $this->db->where($custom_where, NULL, FALSE);

		$query = $this->db->get($table, $limit, $offset);
		return $query->result_object();
	}

	// =======================
	// INSERT پیشرفته
	// =======================
	public function insert_data($table, $data, $check_exists = NULL, $multiple = false) {
		if($check_exists && !$multiple){
			$exists = $this->db->where($check_exists)->get($table)->row();
			if($exists) return false;
		}

		if($multiple){
			return $this->db->insert_batch($table, $data);
		} else {
			$this->db->insert($table, $data);
			return $this->db->insert_id();
		}
	}

	// =======================
	// UPDATE پیشرفته
	// =======================
	public function update_data(
		$table,
		$data,
		$where = NULL,
		$or_where = NULL,
		$where_in = NULL,
		$where_not_in = NULL,
		$like = NULL,
		$or_like = NULL,
		$custom_where = NULL
	) {
		if ($where) $this->db->where($where);
		if ($or_where) $this->db->or_where($or_where);
		if ($where_in) {
			foreach($where_in as $col => $values){
				$this->db->where_in($col, $values);
			}
		}
		if ($where_not_in) {
			foreach($where_not_in as $col => $values){
				$this->db->where_not_in($col, $values);
			}
		}
		if ($like) {
			foreach($like as $col => $val){
				$this->db->like($col, $val);
			}
		}
		if ($or_like) {
			foreach($or_like as $col => $val){
				$this->db->or_like($col, $val);
			}
		}
		if ($custom_where) $this->db->where($custom_where, NULL, FALSE);

		return $this->db->update($table, $data);
	}

	// =======================
	// DELETE پیشرفته
	// =======================
	public function delete_data(
		$table,
		$where = NULL,
		$or_where = NULL,
		$where_in = NULL,
		$where_not_in = NULL,
		$custom_where = NULL
	) {
		if ($where) $this->db->where($where);
		if ($or_where) $this->db->or_where($or_where);
		if ($where_in) {
			foreach($where_in as $col => $values){
				$this->db->where_in($col, $values);
			}
		}
		if ($where_not_in) {
			foreach($where_not_in as $col => $values){
				$this->db->where_not_in($col, $values);
			}
		}
		if ($custom_where) $this->db->where($custom_where, NULL, FALSE);

		return $this->db->delete($table);
	}

	// =======================
	// COUNT پیشرفته
	// =======================
	public function count_data(
		$table,
		$where = NULL,
		$or_where = NULL,
		$where_in = NULL,
		$where_not_in = NULL,
		$like = NULL,
		$or_like = NULL,
		$custom_where = NULL,
		$distinct = false
	) {
		if($distinct) $this->db->distinct();

		if ($where) $this->db->where($where);
		if ($or_where) $this->db->or_where($or_where);
		if ($where_in) {
			foreach($where_in as $col => $values){
				$this->db->where_in($col, $values);
			}
		}
		if ($where_not_in) {
			foreach($where_not_in as $col => $values){
				$this->db->where_not_in($col, $values);
			}
		}
		if ($like) {
			foreach($like as $col => $val){
				$this->db->like($col, $val);
			}
		}
		if ($or_like) {
			foreach($or_like as $col => $val){
				$this->db->or_like($col, $val);
			}
		}
		if ($custom_where) $this->db->where($custom_where, NULL, FALSE);

		return $this->db->count_all_results($table);
	}

}
