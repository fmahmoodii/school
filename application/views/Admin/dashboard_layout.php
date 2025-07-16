<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
	<meta charset="UTF-8">
	<title><?= isset($title) ? $title : 'پنل مدیریت' ?></title>

	<style>
		body { direction: rtl; }
		#sidebar-wrapper {
			width: 250px;
			height: 100vh;
			position: fixed;
		}
		#page-content-wrapper {
			margin-right: 250px;
			padding: 20px;
		}
	</style>
</head>
<body>


<!-- Page Content -->
<div id="page-content-wrapper">
	<h3 class="mb-4"><?= $title ?></h3>
	<?= $content ?>
</div>


</body>
</html>
