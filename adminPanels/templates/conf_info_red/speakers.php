<style type="text/css">
	.speaker__name_and_link {
		display: flex;
		justify-content: space-around;

	}
	.speaker__name_and_link div {
		display: flex;
		flex-direction: column;
		width: 50%;
	}
	.speaker__photo_and_info {
		display: flex;
		flex-direction: column;
		align-items: center;
	}
	.speaker__photo_and_info div {
		margin: 10px 0;
	}
</style>

<h2 id="conf_speakers">Спикеры</h2>

<span class="info_text"><img src="img/icon/warning.png"> если спикер был добавлен ранее на английском, он уже имеется в списке</span>

<form method="POST" enctype="multipart/form-data" action="php/actions/conf_info_red/add_speaker.php">
	<div class='speaker__name_and_link'>
		<div>
			<span>ФИО</span>
			<label><textarea required class='wide_textarea' name='name'></textarea></label>
		</div>
		<div>
			<span>Ссылка</span>
			<label><textarea required class='wide_textarea' name='link'></textarea></label>
		</div>
	</div>
	<div class='speaker__photo_and_info'>
		<div>
			<span>Фотография</span>
			<br>
			<input required type="file" name='photo'>
		</div>
		<div>
			<span>Информация о спикере</span>
			<label><textarea class='editor' name='info'></textarea></label>
		</div>
	</div>
	<input type="hidden" name="suffix" value=<?="'".$suffix."'"?>>
	<input type="hidden" name="conf_id" value=<?="'".$conf_info['ID_conf']."'"?>>
	<input class="add_button" type="submit" value="Добавить спикера">
</form>

<hr>

<style>
	.speakers_list img {
		display: inline-block;
		width: 25%;
	}
	.speaker__new_photo {
		display: flex;
		margin: 0 auto;
		justify-content: space-between;
		align-items: center;
	}
</style>

<div class="speakers_list">
	<?php 
		foreach( $speakers as $speaker ) {
			print("
				<div class='speakers_list_el list_el'>
					<span>ФИО</span>
					<form method='POST' enctype='multipart/form-data' action='php/actions/conf_info_red/edit_speaker.php'>
						<input type='hidden' name='suffix' value='".$suffix."'>
						<input type='hidden' name='speaker_id' value='".$speaker['ID_speak']."'>
						<input type='hidden' name='conf_id' value='".$speaker['ID_conf']."'>

						<label><textarea class='wide_textarea' name='name'>".$speaker[ 'name_'.$suffix ]."</textarea></label>
						<input class='submit_button' type='submit' value=''>
						
						<br>
						<span>Фотография</span>
						<br>
						<div class = 'speaker__new_photo'>
							<img src='".$speaker['photo']."'>
							<div>
								<span>Загрузить новое фото</span><br>
								<input type='file' name='photo'>
							</div>
							<input class='submit_button' type='submit' value=''>
						</div>
						<br>
						<span>Информация о спикере</span><br>
						<label><textarea class='editor' name='info'>".$speaker[ 'info_'.$suffix ]."</textarea></label>
						<input class='submit_button' type='submit' value=''>
						<br>

						<span>Ссылка на информацию о спикере</span><br>
						<label><textarea class='speakers_list__wide_textarea' name='link'>".$speaker[ 'linkSP_'.$suffix ]."</textarea></label>

						<input class='submit_button' type='submit' value=''>
					</form>
					<form method='POST' action='php/actions/conf_info_red/delete_speaker.php'>
						<input type='hidden' name='speaker_id' value='".$speaker['ID_speak']."'>
						<input class='delete_button' type='submit' value='Удалить спикера'>
					</form>
				</div>
				<div style='width: 100%; border-top: 3px dotted grey; margin: 20px 0;'></div>
			");		
		}
	?>
</div>

