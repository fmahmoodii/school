<div class="d-flex justify-content-between align-items-center mb-4">
	<h4>لیست دانش‌آموزان</h4>
	<a href="<?= base_url('index.php/Student/add') ?>" class="btn btn-primary">افزودن دانش‌آموز</a>
</div>

<table id="studentsTable" class="table table-striped">
	<thead>
	<tr>
		<th>ردیف</th>
		<th>نام</th>
		<th>نام خانوادگی</th>
		<th>کد ملی</th>
		<th>تاریخ تولد</th>
		<th>عملیات</th>
	</tr>
	</thead>
	<tbody>
	<?php $i = 1; foreach ($students as $student): ?>
		<tr>
			<td><?= $i++ ?></td>
			<td><?= $student['first_name'] ?></td>
			<td><?= $student['last_name'] ?></td>
			<td><?= $student['national_id'] ?></td>
			<td><?= $student['birth_date'] ?></td>
			<td>
				<a href="#" class="btn btn-sm btn-primary">ویرایش</a>
				<a href="#" class="btn btn-sm btn-danger">حذف</a>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>

<script>
	$(document).ready(function() {
		// ثبت نوع تاریخ شمسی برای مرتب‌سازی
		$.fn.dataTable.moment('YYYY/MM/DD');

		$('#studentsTable').DataTable({
			language: {
				url: "<?= base_url('assets/datatables/fa.json') ?>"
			},
			dom: 'Bfrtip',
			buttons: [
				'copy', 'excel', 'pdf', 'print'
			],
			order: [[0, 'asc']], // مرتب‌سازی پیش‌فرض روی ردیف
			responsive: true
		});
	});
</script>
