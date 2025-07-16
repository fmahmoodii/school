<div class="bg-light border-end p-3" id="sidebar-wrapper">
	<div class="sidebar-heading fw-bold mb-3">مدیریت مدرسه</div>
	<div class="list-group list-group-flush">
		<a href="<?= base_url('AdminDashboard') ?>" class="list-group-item list-group-item-action <?= ($title == 'داشبورد') ? 'active' : '' ?>">
			داشبورد
		</a>
		<a href="<?= base_url('index.php/Student/manage') ?>" class="list-group-item list-group-item-action <?= ($title == 'مدیریت دانش‌آموزان') ? 'active' : '' ?>">
			مدیریت دانش‌آموزان
		</a>
		<a href="<?= base_url('Teacher/manage') ?>" class="list-group-item list-group-item-action <?= ($title == 'مدیریت معلمان') ? 'active' : '' ?>">
			مدیریت معلمان
		</a>
		<a href="<?= base_url('Class/manage') ?>" class="list-group-item list-group-item-action <?= ($title == 'مدیریت کلاس‌ها') ? 'active' : '' ?>">
			مدیریت کلاس‌ها
		</a>
	</div>
</div>
