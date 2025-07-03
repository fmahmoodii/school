<!DOCTYPE html>
<html lang="fa">
<head>
	<meta charset="UTF-8">
	<title>داشبورد ادمین</title>
	<style>
		body { font-family: Tahoma, sans-serif; direction: rtl; padding: 20px; }
		.box { border: 1px solid #ccc; padding: 15px; margin: 10px 0; background: #f9f9f9; }
		h2 { margin-bottom: 10px; }
	</style>
</head>
<body>

<h1>داشبورد ادمین</h1>

<div class="box">
	<h2>تعداد دانش‌آموزان:</h2>
	<p><?= $total_students ?></p>
</div>

<div class="box">
	<h2>تعداد معلمان:</h2>
	<p><?= $total_teachers ?></p>
</div>

<div class="box">
	<h2>تعداد کلاس‌ها:</h2>
	<p><?= $total_classes ?></p>
</div>

</body>
</html>
