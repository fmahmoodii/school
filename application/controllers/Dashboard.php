<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('MY_Model', 'my_model'); // مدل عمومی
	}

	public function index() {
		$data['title']='داشبورد';

		$today = date('Y-m-d');

		// تعداد دانش‌آموزان
		$data['total_students'] = $this->my_model->count_data('students');
		$data['active_students'] = $this->my_model->count_data('students', ['status' => 1]);

		// تعداد معلمان
		$data['total_teachers'] = $this->my_model->count_data('teachers');
		$data['active_teachers'] = $this->my_model->count_data('teachers', ['status' => 1]);

		// تعداد کلاس‌ها
		$data['total_classes'] = $this->my_model->count_data('classes');
		$data['active_classes'] = $this->my_model->count_data('classes', ['status' => 1]);

		// تعداد والدین
		$data['total_parents'] = $this->my_model->count_data('parents');
		$data['active_parents'] = $this->my_model->count_data('parents', ['status' => 1]);

		// تعداد کاربران
		$data['total_users'] = $this->my_model->count_data('users');
		$data['active_users'] = $this->my_model->count_data('users', ['status' => 1]);

		// تعداد امتحانات
		$data['total_exams'] = $this->my_model->count_data('exams');
		$data['active_exams'] = $this->my_model->count_data('exams', ['status' => 1]);

		// حضور و غیاب امروز
		$data['present_today'] = $this->my_model->count_data(
			'attendance',
			['attendance_date' => $today, 'status' => 1]
		);
		$data['absent_today'] = $this->my_model->count_data(
			'attendance',
			['attendance_date' => $today, 'status' => 0]
		);

		// میانگین نمرات کل
		$avg_grade = $this->my_model->get_data('grades', 'AVG(grade) as avg_score');
		$data['average_grade'] = $avg_grade[0]->avg_score ?? 0;

		// میانگین نمرات هر کلاس
		$class_avg = $this->my_model->get_data(
			'grades g',
			'c.name as class_name, AVG(g.grade) as avg_grade',
			null,
			null,
			null,
			null,
			'c.id',
			null,
			null,
			null,
			[
				['exams e', 'g.exam_id = e.id', 'left'],
				['classes c', 'e.class_id = c.id', 'left']
			]
		);

		$data['class_average'] = $class_avg;

		// ارسال داده‌ها به ویو
		$this->load->view('admin/header/header', $data);
		$this->load->view('admin/sidebar/sidebar', $data);
		$this->load->view('admin/dashboard/index', $data);
	}

}
