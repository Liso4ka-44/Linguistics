<?php 
$header = "
<style type=\"text/css\">
	* {
		font: 1em \"Fira Sans\", sans-serif;
	}
	header {
		width: 80%;
		margin: 0 auto;
	}
	nav {
		display: flex;
		justify-content: space-between;
		align-items: center;
	}
	.lincks_block {
	}
	ul.nav_l {
		white-space: nowrap;
	}
	li.nav_l {
		display: inline-block;
		margin: 0px 20px;
	}
	a.nav_l {
		color: black;
		text-decoration: none;
	}
	div.exit_account {
	}
	span.exit_account {
		margin-right: 5px;
	}
	span.current_selection 
	{
		color: grey;
	}
	.underscope {
		background: linear-gradient( to right, lightblue, blue, lightblue );
		width: 20%;
		height: 2px;
		transition: .1s;
		opacity: 0;
	}
</style>

<header>
	<nav>
		<div></div>
		<div class=\"lincks_block\" onmouseleave=\"hide_underscope()\">
			<ul class=\"nav_l\">
				<li class=\"nav_l\" id=\"add\" onmouseover=\"place_underscope('add')\"><a class=\"nav_l\" href=\"\">Добавление</a></li>
				<li class=\"nav_l\" id=\"red\" onmouseover=\"place_underscope('red')\"><a class=\"nav_l\" href=\"\">Редактирование</a></li>
				<li class=\"nav_l\" id=\"org\" onmouseover=\"place_underscope('org')\"><a class=\"nav_l\" href=\"\">Оргкомитет</a></li>
				<li class=\"nav_l\" id=\"usadd\" onmouseover=\"place_underscope('usadd')\"><a class=\"nav_l\" href=\"\">Добавление пользователей</a></li>
				<li class=\"nav_l\" id=\"analit\" onmouseover=\"place_underscope('analit')\"><a class=\"nav_l\" href=\"\">Аналитика</a></li>
			</ul>
			<div class=\"underscope\" id=\"us\"></div>
		</div>
		<div class=\"exit_account\">
			<span class=\"exit_account\">Выйти</span>
			<img class=\"exit_account\" alt=\"\" src=\"img/icon/exitAccount.png\">
		</div>
	</nav>
	<div class=\"current_selection\">
		<span class=\"current_selection\">Добавление</span>
		<img class=\"current_selection\" alt=\"\" src=\"\">
	</div>
</header>

<script type=\"text/javascript\">
	let underscope = document.getElementById(\"us\");
	let all_nav = document.getElementsByClassName(\"nav_l\")[0];
	function place_underscope(el_id) {
		var sc_elem = document.getElementById(el_id);
		var elem_pos = sc_elem.offsetLeft - all_nav.offsetLeft;
		var elem_width = sc_elem.offsetWidth;
		underscope.style.opacity = \"1\";
		underscope.style.marginLeft = elem_pos + \"px\";
		underscope.style.width = elem_width + \"px\";
	}
	function hide_underscope() {
		underscope.style.opacity = \"0\";
	}
</script>
"
?>

