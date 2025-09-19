
	<title><?= $title ?></title>
<div class="container mt-4">
	<h1 class="mb-4">داشبورد مدرسه</h1>

	<!-- کارت‌های آماری -->
	<div class="dashboard-row">
		<div class="card p-3 bg-primary text-white">
			<h3><?= $total_students ?? 0 ?></h3>
			<p>دانش‌آموزان کل</p>
		</div>
		<div class="card p-3 bg-success text-white">
			<h3><?= $active_students ?? 0 ?></h3>
			<p>دانش‌آموزان فعال</p>
		</div>
		<div class="card p-3 bg-info text-white">
			<h3><?= $total_teachers ?? 0 ?></h3>
			<p>معلمان کل</p>
		</div>
		<div class="card p-3 bg-warning text-dark">
			<h3><?= $total_classes ?? 0 ?></h3>
			<p>کلاس‌ها</p>
		</div>
		<div class="card p-3 bg-secondary text-white">
			<h3><?= $present_today ?? 0 ?></h3>
			<p>حاضر امروز</p>
		</div>
		<div class="card p-3 bg-danger text-white">
			<h3><?= $absent_today ?? 0 ?></h3>
			<p>غایب امروز</p>
		</div>
	</div>

	<!-- میانگین نمرات کل -->
	<div class="card p-3 mt-4">
		<h4>میانگین نمرات کل دانش‌آموزان: <?= round($average_grade, 2) ?></h4>
	</div>

	<!-- میانگین نمرات کلاس‌ها -->
	<div class="card mt-4 p-3">
		<h4>میانگین نمرات هر کلاس</h4>
		<table class="table table-bordered mt-3">
			<thead>
			<tr>
				<th>نام کلاس</th>
				<th>میانگین نمره</th>
			</tr>
			</thead>
			<tbody>
			<?php if(!empty($class_average)): ?>
				<?php foreach($class_average as $class): ?>
					<tr>
						<td><?= $class->class_name ?></td>
						<td><?= round($class->avg_grade, 2) ?></td>
					</tr>
				<?php endforeach; ?>
			<?php else: ?>
				<tr><td colspan="2">اطلاعی موجود نیست</td></tr>
			<?php endif; ?>
			</tbody>
		</table>
	</div>
</div>


