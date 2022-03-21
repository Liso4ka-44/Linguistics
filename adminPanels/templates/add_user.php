<style type="text/css">
	.add_user_form {
		display: grid;
		width: 20%;
		margin: 0 auto;
	}
	.add_user_form * {
		margin-bottom: 20px;
	}
	.add_user_text {
		text-align: center;
	}
	.message {
		position: absolute;
		text-align: center;
		bottom: 0;
		margin: 0 auto;
		right: 0;
		left: 0;
		width: 400px;
		height: 100px;
		border-top-left-radius: 20px;
		border-top-right-radius: 20px;
		padding-top: 40px;
	}
	.message span {
		display: block;
	}
</style>

<div class="cont">
	<h1 class="add_user_text">Добавить пользователя</h1>
	<form class="add_user_form" method="POST" action="php/actions/add_user/add_user.php" >
		<input required type="text" placeholder="name" name="name">
		<input required type="text" placeholder="login" name="login">
		<input required type="password" placeholder="password" name="password">
		<input required type="number" name="access_level" min='0' value="0">
		<input class="add_button" type="submit" value="Добавить пользователя">
	</form>
	<div class='message' style='background: <?=$message_color?>;'>
		<span><?=$message?></span>
	</div>
</div>