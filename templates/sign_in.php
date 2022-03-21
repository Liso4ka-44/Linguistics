<!DOCTYPE html>
<html lang="ru">
	<head>
		<title>Sign In/Sign Up</title>
		<!-- <link rel="icon" href="/resources/icons/favicon.ico" type="image/x-icon"> -->
		<link rel="stylesheet" type="text/css" href="../css/layout.css">
		<script type="text/javascript" src="../js/layout.js"></script>
	</head>

	<style>
		body {
			background-image: url("img/home/123.png");
			padding-top: 10%;
		}
		.l_block {
			padding: 20px;
			background: linear-gradient(#0006, #0001);
			border-radius: 30px;
			position: relative;
			margin: 0 auto;
			width: 50%;
		}
		.mid_block {
			text-align: center;
			width: 100%;
		}
		.mid_block * {
			display: block;
			margin: 0 auto;
		}
		.mid_block input {
			margin: 5px auto;
			height: 30px;
			width: 50%;
			border-radius: 5px 0px;
			border: 0;

		}
		.mid_block h3 {
			font: 1.5em "Fira Sans", sans-serif;
			color: lightgrey;
		}
		#separator {
			height: 40px;
		}
	</style>
	
	<body>
		<div class="l_block">
			<div class="mid_block">
				<h3>SIGN IN</h3>
				<form method="POST" action="actions/sign_in.php">
					<input type="text" name="login" placeholder="login">
					<br>
					<input type="password" name="password" placeholder="password">
					<br>
					<input type="submit" value="sign in">
				</form>
			</div>
			<div id="separator"></div>
			<div class="mid_block">
				<h3>SIGN UP</h3>
				<form id="sign_up" method="POST" action="actions/sign_up.php" onsubmit="checkpass()">
					<input type="text" name="login" placeholder="login">
					<br>
					<input type="text" name="name" placeholder="name">
					<br>
					<input id="pass" type="password" name="password" placeholder="password">
					<br>
					<input id="repeatPass" type="password" name="" placeholder="repeat password">
					<br>
					<input type="submit" value="sign up">
				</form>
			</div>

		</div>
		<script>
			function checkpass() {
				var p1 = document.getElementById('pass');
				var p2 = document.getElementById('repeatPass');

				if(p1.value != p2.value) {
					alert("Passwords are not the same!");
				} else {
					document.getElementById('sign_up').submit();
				}
			}
		</script>
	</body>
</html>