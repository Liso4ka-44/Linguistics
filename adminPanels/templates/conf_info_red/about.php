<h2 id="conf_info">Информация о прошедшей конференции</h2>
<form method="POST" action="php/actions/conf_info_red/edit_about.php">
	<textarea required class='editor' name='conf_about'><?= $conf_info[ 'info_'.$suffix ] ?></textarea>

	<input type="hidden" name="suffix" value=<?="'".$suffix."'"?>>
	<input type="hidden" name="conf_id" value=<?="'".$conf_info['ID_conf']."'"?>>
	<input class="submit_button" type="submit" value="">
</form>
