<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminDashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// بارگذاری مدل داشبورد
		$this->load->model('Dashboard_model');
	}

	public function index()
	{
		// گرفتن داده‌های لازم از مدل
		$data['total_students'] = $this->Dashboard_model->count_students();
		$data['total_teachers'] = $this->Dashboard_model->count_teachers();
		$data['total_classes'] = $this->Dashboard_model->count_classes();

		// بارگذاری ویو و ارسال داده‌ها
		$this->load->view('admin/dashboard', $data);
	}
}
