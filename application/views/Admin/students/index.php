<div class="d-flex justify-content-between align-items-center mb-4">
	<h4>لیست دانش‌آموزان</h4>
	<a href="<?= base_url('index.php/Student/add') ?>" class="btn btn-primary">افزودن دانش‌آموز</a>
</div>

<table class="table table-bordered table-hover">
	<thead class="table-light">
	<tr>
		<th>ردیف</th>
		<th>نام</th>
		<th>کلاس</th>
		<th>تاریخ تولد</th>
		<th>عملیات</th>
	</tr>
	</thead>
	<tbody>
	<?php if (!empty($students)): ?>
		<?php $i = 1; foreach ($students as $student): ?>
			<tr>
				<td><?= $i++ ?></td>
				<td><?= $student['name'] ?></td>
				<td><?= $student['class_name'] ?></td>
				<td><?= $student['birthdate'] ?></td>
				<td>
					<a href="<?= base_url('index.php/Student/edit/' . $student['id']) ?>" class="btn btn-sm btn-warning">ویرایش</a>
					<a href="<?= base_url('index.php/Student/delete/'.$student['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('آیا از حذف مطمئنی؟')">حذف</a>
				</td>
			</tr>
		<?php endforeach; ?>
	<?php else: ?>
		<tr><td colspan="5" class="text-center">هیچ دانش‌آموزی ثبت نشده است.</td></tr>
	<?php endif; ?>
	</tbody>
</table>
