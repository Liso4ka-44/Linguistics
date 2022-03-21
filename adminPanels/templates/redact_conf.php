<style>
	.all_confs {
		width: 80%;
		margin: 0 auto;
	}

	#hidden_message {
		position: fixed;
		display: none;
		left: 0;
		right: 0;
		margin-left: auto;
		margin-right: auto;
		width: 50%;

	}
	.hidden_message__message {
		display: grid;
		text-align: center;
		padding: 10px;
		background: #eee;
		border-radius: 10px;
		box-shadow: 0 0 5px;
	}
</style>


<form id="delete_conf" method="POST" action="php/delete_conf.php">
	<input id='conf_id' type="hidden" name='conf_id' value=''>
</form>

<!-- <form id="delete_conf" method="GET" action="konf/delete_conf.php">
	<input id='conf_id' type="hidden" name='id' value=''>
</form> -->

<div id="hidden_message">
	<div class="hidden_message__message">
		<span>Вы уверены, что хотите удалить конференцию?</span>
		<span class="info_text"><img src="img/icon/warning.png"> Это действие нелья будет отменить!</span>
		<div>
			<button class="add_button" onclick="cancle_del()">Отмена</button>
			<button class="delete_button" onclick="submit_form()">Удалить</button>
		</div>
	</div>
</div>
<div class='all_confs'>
	<h1>Список конференций</h1>
	<?php
		foreach( $confs as $conf ) {
			print($conf);
		}
	?>
</div>

<script type="text/javascript">

	function submit_delete(id) {
		var msg = document.getElementById('hidden_message');
		msg.style.display = 'block';
		document.getElementById('conf_id').value = id;
	}

	function cancle_del() {
		var msg = document.getElementById('hidden_message');
		msg.style.display = 'none';
	}

	function submit_form() {
		var form = document.getElementById('delete_conf');
		form.submit();
	}
</script>