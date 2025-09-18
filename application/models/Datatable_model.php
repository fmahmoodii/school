<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datatable_model extends CI_Model {

	public function __construct() {
		parent::__construct();
		$this->load->model('MY_Model', 'model'); // مدل عمومی CRUD
	}

	/**
	 * get_datatable
	 */
	public function get_datatable(
		$table,
		$select,
		$columns_search = [],   // ستون‌هایی که search روی آن‌ها انجام می‌شود
		$order_columns = [],    // ['column'=>'ASC|DESC']
		$search_value = NULL,   // متن جستجو
		$where = NULL,
		$or_where = NULL,
		$where_in = NULL,
		$where_not_in = NULL,
		$like = NULL,
		$or_like = NULL,
		$join = NULL,
		$limit = NULL,
		$offset = NULL,
		$custom_where = NULL
	) {

		// 1. اعمال join و ستون‌ها
		$this->db->select($select ?: '*');

		if ($join) {
			foreach($join as $j){
				$type = isset($j['type']) ? $j['type'] : '';
				$this->db->join($j['table'], $j['condition'], $type);
			}
		}

		// 2. اعمال شرط‌ها
		if ($where) $this->db->where($where);
		if ($or_where) $this->db->or_where($or_where);
		if ($where_in) foreach($where_in as $col => $vals) $this->db->where_in($col, $vals);
		if ($where_not_in) foreach($where_not_in as $col => $vals) $this->db->where_not_in($col, $vals);
		if ($like) foreach($like as $col => $val) $this->db->like($col, $val);
		if ($or_like) foreach($or_like as $col => $val) $this->db->or_like($col, $val);
		if ($custom_where) $this->db->where($custom_where, NULL, FALSE);

		// 3. اعمال search سراسری روی چند ستون
		if(!empty($columns_search) && !empty($search_value)){
			$this->db->group_start();
			foreach($columns_search as $col){
				$this->db->or_like($col, $search_value);
			}
			$this->db->group_end();
		}

		// 4. order_by
		if($order_columns){
			foreach($order_columns as $col => $dir){
				$this->db->order_by($col, $dir);
			}
		}

		// 5. limit / offset
		if($limit !== NULL) $this->db->limit($limit, $offset);

		// 6. اجرای query
		$query = $this->db->get($table);
		return $query->result_object();
	}

	/**
	 * count_filtered
	 */
	public function count_filtered(
		$table,
		$columns_search = [],
		$search_value = NULL,
		$where = NULL,
		$or_where = NULL,
		$where_in = NULL,
		$where_not_in = NULL,
		$like = NULL,
		$or_like = NULL,
		$join = NULL,
		$custom_where = NULL
	){
		if ($join) {
			foreach($join as $j){
				$type = isset($j['type']) ? $j['type'] : '';
				$this->db->join($j['table'], $j['condition'], $type);
			}
		}

		if ($where) $this->db->where($where);
		if ($or_where) $this->db->or_where($or_where);
		if ($where_in) foreach($where_in as $col => $vals) $this->db->where_in($col, $vals);
		if ($where_not_in) foreach($where_not_in as $col => $vals) $this->db->where_not_in($col, $vals);
		if ($like) foreach($like as $col => $val) $this->db->like($col, $val);
		if ($or_like) foreach($or_like as $col => $val) $this->db->or_like($col, $val);
		if ($custom_where) $this->db->where($custom_where, NULL, FALSE);

		if(!empty($columns_search) && !empty($search_value)){
			$this->db->group_start();
			foreach($columns_search as $col){
				$this->db->or_like($col, $search_value);
			}
			$this->db->group_end();
		}

		return $this->db->count_all_results($table);
	}

	/**
	 * count_all
	 */
	public function count_all($table, $where = NULL){
		return $this->model->count_data($table, $where);
	}
}
