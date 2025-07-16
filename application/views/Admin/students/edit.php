<div class="card">
	<div class="card-header bg-warning text-white">ویرایش دانش‌آموز</div>
	<div class="card-body">
		<form action="<?= base_url('index.php/Student/update/'.$student['id']) ?>" method="post">
			<div class="mb-3">
				<label class="form-label">نام دانش‌آموز</label>
				<input type="text" name="name" class="form-control" value="<?= $student['name'] ?>" required>
			</div>

			<div class="mb-3">
				<label class="form-label">تاریخ تولد</label>
				<input type="date" name="birthdate" class="form-control" value="<?= $student['birthdate'] ?>" required>
			</div>

			<div class="mb-3">
				<label class="form-label">کلاس</label>
				<select name="class_id" class="form-select" required>
					<option value="">انتخاب کلاس</option>
					<?php foreach ($classes as $class): ?>
						<option value="<?= $class['id'] ?>" <?= $student['class_id'] == $class['id'] ? 'selected' : '' ?>>
							<?= $class['name'] ?>
						</option>
					<?php endforeach; ?>
				</select>
			</div>

			<button type="submit" class="btn btn-success">ذخیره تغییرات</button>
			<a href="<?= base_url('index.php/Student/manage') ?>" class="btn btn-secondary">بازگشت</a>
		</form>
	</div>
</div>
