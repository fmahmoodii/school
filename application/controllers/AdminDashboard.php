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
		$data['title'] = 'داشبورد';

		// گرفتن داده‌های لازم از مدل
		$data['total_students'] = $this->Dashboard_model->count_students();
		$data['total_teachers'] = $this->Dashboard_model->count_teachers();
		$data['total_classes'] = $this->Dashboard_model->count_classes();

		// بارگذاری محتوای وسط در یک متغیر و ارسال به اسکلت
		$data['content'] = $this->load->view('admin/dashboard_content', $data, true);
		$this->load->view('admin/header/header', $data);
		$this->load->view('admin/sidebar/sidebar', $data);
		$this->load->view('admin/dashboard_layout', $data);
	}

}
