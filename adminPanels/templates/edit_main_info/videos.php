<style>
	.conf_video {
		text-align: center;
	}
	.video_list {
		max-height: 350px;
		overflow: hidden;
	}
	.video_list iframe {
		border: 1px solid lightgrey;
	}
</style>

<div class="conf_video" id="videos">
	<h1>Видео конференции</h1>
	<span>Ссылка на видео из ютуб</span><br>
	<form method="POST" action="php/actions/edit_main_info/add_video.php">
		<input required type="text" name="video">
		<input type="hidden" name='conf_id' value=<?="'".$conf_id."'"?>>
		<input class="add_button" type="submit" value="Добавить видео">
	</form>
	<br>

	<div class="video_list">
	<?php
	foreach( $conf_videos as $video) {
		print("
		<iframe width='560' height='315' src='https://www.youtube.com/embed/".$video['video_conf']."' title='YouTube video player' frameborder='0' allow='accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe>
		
		<form method='POST' action='php/actions/edit_main_info/delete_video.php'>
			<input type='hidden' name='video_id' value='".$video['ID_video_conf']."'>
			<input class='delete_button' type='submit' value='Удалить видео'>
		</form>
		");
	}
	?>
	</div>
	<a id="show_all_videos" onclick="show_all('video_list', 'show_all_videos', 'Смотреть все видео', 'Скрыть видео', '350px')" style="cursor: pointer; text-decoration: underline; color: blue;">Смотреть все видео</a>
</div>