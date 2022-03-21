<span>Название</span>
<form class='name_form' method="POST" action="php/actions/conf_info_red/edit_name_and_conception.php">
	<label><textarea class='wide_textarea' name='name'><?= $conf_info['Name_conf_'.$suffix] ?></textarea></label>

	<input type="hidden" name="suffix" value=<?="'".$suffix."'"?>>
	<input type="hidden" name="conf_id" value=<?="'".$conf_info['ID_conf']."'"?>>
	<input class="submit_button" type="submit" value="">
</form>
<span>Концепция конференции</span>
<form method="POST" action="php/actions/conf_info_red/edit_name_and_conception.php">
	<input type="hidden" name="conf_id" value=<?="'".$conf_info['ID_conf']."'"?>>
	<input type="hidden" name="suffix" value=<?="'".$suffix."'"?>>
	<textarea class="editor" name="conception">
		<?= $conf_info['an_conception_'.$suffix] ?>
	</textarea>
	<input class="submit_button" type="submit" value="">
</form>
