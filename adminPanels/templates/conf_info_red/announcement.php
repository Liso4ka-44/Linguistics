<h2 id="conf_announcement">Анонс</h2>

<span>Вступление</span>
<form class="intro_form" method="POST" action="php/actions/conf_info_red/edit_announcement.php">
	<label><textarea class='wide_textarea' name='introduction'><?= $conf_info['anons_name_'.$suffix] ?></textarea></label>
	
	<input type="hidden" name="suffix" value=<?="'".$suffix."'"?>>
	<input type="hidden" name="conf_id" value=<?="'".$conf_info['ID_conf']."'"?>>
	<input class="submit_button" type="submit" value="">
</form>

<span>Информация об анонсе</span>
<form method="POST" action="php/actions/conf_info_red/edit_announcement.php">
	<textarea class='editor' name='announcment_info'><?= $conf_info['info_anons_'.$suffix] ?></textarea>
	
	<input type="hidden" name="suffix" value=<?="'".$suffix."'"?>>
	<input type="hidden" name="conf_id" value=<?="'".$conf_info['ID_conf']."'"?>>
	<input class="submit_button" type="submit" value="">
</form>
