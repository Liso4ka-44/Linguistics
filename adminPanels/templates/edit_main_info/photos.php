<style>
	.main_photo {
		text-align: center;
	}
	.main_photo_file {
		display: flex;
		justify-content: space-around;
		align-items: center;
	}
	.main_photo_file img {
		width: 50%;
	}
	.main_photo_file form {
		display: flex;
		flex-direction: column;
	}
	.main_photo_file form input {
		margin: 5px 0;
	}
</style>

<div class="main_photo" id="photos">
	<h1>Главная фотография</h1>
	<div class="main_photo_file">
		<img alt="" src=<?="'".$main_photo."'"?>>
		<form method="POST" enctype="multipart/form-data" action="php/actions/edit_main_info/edit_main_photo.php">
			<input type="hidden" name="conf_id" value=<?="'".$conf_id."'"?>>
			<input required type="file" name="photo">
			<input class="new_file_button" type="submit" value="Загрузить новое фото">
		</form>
	</div>
</div>

<style>
	.conf_photo {
		text-align: center;
	}

	.photos_grid {
		display: grid;
		grid-template-columns: 30% 30% 30%;
		max-height: 250px;
		overflow: hidden;
	}
	.photos_grid img {
		display: block;
		width: 100%;
	}
	.photos_grid_el {
		margin: 10px;
	}
	.new_conf_photo {
		margin-bottom: 20px;
	}

</style>

<div class="conf_photo">
	<h1>Фото конференции</h1>
	<div class="new_conf_photo">
		<form method="POST" enctype="multipart/form-data" action="php/actions/edit_main_info/add_photo.php">
			<input type="hidden" name="conf_id" value=<?="'".$conf_id."'"?>>
			
			<input required multiple type="file" name="photo[]">
			<input class="new_file_button" type="submit" value="Загрузить фотографии">
		</form>
	</div>
	<div class='photos_grid'>
		<?php
		foreach( $conf_photos as $photo ) {
			print("
			<div class='photos_grid_el'>
				<img alt='...' src='".$photo['photo_conf']."'>
				<form method='POST' action='php/actions/edit_main_info/delete_photo.php'>
					<input type='hidden' name='photo_id' value='".$photo['ID_photo']."'>
					<input class='delete_button' type='submit' value='Удалить фото'>
				</form>
			</div>
			");
			// Add div with cross to delete photo
		}
		?>
	</div>
	<a id="show_all_photos" onclick="show_all('photos_grid', 'show_all_photos', 'Смотреть все фото', 'Скрыть фото', '250px')" style="cursor: pointer; text-decoration: underline; color: blue;">Смотреть все фото</a>
</div>