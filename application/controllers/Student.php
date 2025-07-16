<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Student_model');
	}

	public function manage() {
		$data['title'] = 'مدیریت دانش‌آموزان';
		$data['students'] = $this->Student_model->get_students_with_class();
		$data['content'] = $this->load->view('admin/students/index', $data, true);
		$this->load->view('admin/header/header', $data);
		$this->load->view('admin/sidebar/sidebar', $data);
		$this->load->view('admin/dashboard_layout', $data);
	}
	public function add() {
		$this->load->model('Class_model');
		$data['title'] = 'افزودن دانش‌آموز';
		$data['classes'] = $this->Class_model->get_all();
		$data['content'] = $this->load->view('admin/students/add', $data, true);
		$this->load->view('admin/header/header', $data);
		$this->load->view('admin/sidebar/sidebar', $data);
		$this->load->view('admin/dashboard_layout', $data);
	}

	public function save() {
		$data = [
			'name' => $this->input->post('name'),
			'birthdate' => $this->input->post('birthdate'),
			'class_id' => $this->input->post('class_id')
		];
		$this->Student_model->insert($data);
		redirect('index.php/Student/manage');
	}
	public function edit($id) {
		$this->load->model('Class_model');
		$student = $this->Student_model->get_by_id($id);

		if (!$student) {
			show_404();
		}

		$data['title'] = 'ویرایش دانش‌آموز';
		$data['student'] = $student;
		$data['classes'] = $this->Class_model->get_all();
		$data['content'] = $this->load->view('admin/students/edit', $data, true);
		$this->load->view('admin/header/header', $data);
		$this->load->view('admin/sidebar/sidebar', $data);
		$this->load->view('admin/dashboard_layout', $data);
	}

	public function update($id) {
		$data = [
			'name' => $this->input->post('name'),
			'birthdate' => $this->input->post('birthdate'),
			'class_id' => $this->input->post('class_id')
		];
		$this->Student_model->update($id, $data);
		redirect('index.php/Student/manage');
	}
	public function delete($id) {
		$this->Student_model->delete($id);
		redirect('index.php/Student/manage');
	}
}
