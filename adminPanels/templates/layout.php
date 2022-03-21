<!DOCTYPE html>
<html lang="ru">
	<head>
		<title><?= $title; ?></title>
		<!-- <link rel="icon" href="/resources/icons/favicon.ico" type="image/x-icon"> -->
		<link rel="stylesheet" type="text/css" href="css/layout.css">
		<script type="text/javascript" src="js/layout.js"></script>
		<?php
			foreach ( $opt_css_files as $cssf ) {
				print("<link rel='stylesheet' type='text/css' href='".$cssf."'>");
			}
			foreach ( $opt_js_files as $jsf ) {
				print("<script type='text/javascript' src='".$jsf."'></script>");
			}
		?>
	</head>
	<body>
		<header>
			<nav>
				<div></div>
				<div class="lincks_block" onmouseleave="hide_underscope()">
					<ul class="nav_l">
						<li class="nav_l" id="add" onmouseover="place_underscope('add')"><a class="nav_l" href="add_conf.php">Добавление</a></li>
						<li class="nav_l" id="red" onmouseover="place_underscope('red')"><a class="nav_l" href="index.php">Редактирование</a></li>
						<li class="nav_l" id="org" onmouseover="place_underscope('org')"><a class="nav_l" href="orgcom.php">Оргкомитет</a></li>
						<li class="nav_l" id="usadd" onmouseover="place_underscope('usadd')"><a class="nav_l" href="add_user.php">Добавление пользователей</a></li>
						<li class="nav_l" id="analit" onmouseover="place_underscope('analit')"><a class="nav_l" href="analythics.php">Аналитика</a></li>
					</ul>
					<div class="underscope" id="us"></div>
				</div>
				<a href='/sign_in.php'>
					<div class="exit_account" >
						<span class="exit_account">Выйти</span>
						<img class="exit_account" alt="" src="img/icon/exitAccount.png">
					</div>
				</a>
			</nav>
			<div class="current_selection">
				<span class="current_selection"><?= $current_page; ?></span>
				<img class="current_selection" alt="" src="">
			</div>
		</header>

		<?= $content ?>

	</body>

</html>