<div class="dashboard">
	<h2>داشبورد مدرسه</h2>
	<div class="stats">
		<div>تعداد کل دانش‌آموزان: <?= $total_students ?></div>
		<div>دانش‌آموزان فعال: <?= $active_students ?></div>
		<div>تعداد معلمان: <?= $total_teachers ?></div>
		<div>تعداد کلاس‌ها: <?= $total_classes ?></div>
		<div>میانگین نمرات: <?= round($average_grade,2) ?></div>
		<div>حاضرین امروز: <?= $present_today ?></div>
	</div>
</div>
