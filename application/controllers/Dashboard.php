<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('MY_Model', 'my_model'); // مدل عمومی
	}

	public function index() {
		// تعداد کل دانش‌آموزان
		$data['total_students'] = $this->my_model->count_data('students');

		// تعداد دانش‌آموزان فعال
		$data['active_students'] = $this->my_model->count_data('students', ['status'=>1]);

		// تعداد کل معلمان
		$data['total_teachers'] = $this->my_model->count_data('teachers');

		// تعداد کلاس‌ها
		$data['total_classes'] = $this->my_model->count_data('classes');

		// میانگین نمرات
		$avg_grade = $this->my_model->get_data('grades', 'AVG(score) as avg_score');
		$data['average_grade'] = $avg_grade[0]->avg_score ?? 0;

		// تعداد دانش‌آموزان حاضر امروز (مثال حضور و غیاب)
		$today = date('Y-m-d');
		$data['present_today'] = $this->my_model->count_data('attendance', ['date' => $today, 'status' => 'present']);

		// ارسال به ویو
		$this->load->view('dashboard/index', $data);
	}
}
