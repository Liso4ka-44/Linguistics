<style>
	.mats {
		text-align: center;
	}
	.add_mat {

	}
	.mat_desc {
		display: flex;
		justify-content: space-around;
	}
	.mat_desc input {
		width: 100%;
	}

	.mat_file_input {
		display: flex;
		justify-content: space-around;
	}
	.mat_link_input input {
		width: 80%;
	}

	.mat_list {
		max-height: 800px;
		overflow: hidden;
	}




</style>

<div class="mats" id="mats_list">
	<div class="add_mat">
		<h1>Сборники материалов</h1>
		<form method="POST" enctype="multipart/form-data" action="php/actions/edit_main_info/add_mat.php">
			<input type="hidden" name="conf_id" value=<?="'".$conf_id."'"?>>
			<div class="mat_desc">
				<div>
					<span class="text_ru">Описание</span>
					<input required type="text" name="desc_ru">
				</div>
				<div>
					<span class="text_en">Description</span>
					<input required type="text" name="desc_en">
				</div>
			</div>

			<div class="mat_file_input">
				<div>
					<span>Обложка</span><br>
					<input required type="file" name="cover">
				</div>

				<div>
					<span>Файл</span><br>
					<input required type="file" name="file">
				</div>
			</div>

			<div class='mat_link_input'>
				<span>Ссылка elibrary</span><br>
				<input required type="text" name="elib_link">
			</div>
			<input class="add_button" type="submit" value="Добавить сборник">
		</form>
	</div>

	<div class="mid_separator"></div>
	
	<style>
		.mat_list_el textarea {
			min-width: 70%;
			max-width: 70%;
			margin-bottom: 20px;

		}
		.elib_link {
			width: 80%;
			margin-bottom: 20px;
		}
		.mat_new_file {
			margin-bottom: 20px;
		}
	</style>

	<div class="mat_list">
		<h1>Список сборников материалов</h1>
		<?php
		foreach( $mats as $mat ) {
			print("
			<div class='mat_list_el list_el'>
				<span class='text_ru'>Название</span><br>
				<form method='POST' action='php/actions/edit_main_info/edit_mat.php'>
					<input type='hidden' name='mat_id' value='".$mat['ID_documents']."'>

					<label><textarea required name='desc_ru'>".$mat['Name_documents_ru']."</textarea></label>
					<input class=\"submit_button\" type='submit' value=''>
				</form>

				<span class='text_en'>Name</span><br>
				<form method='POST' action='php/actions/edit_main_info/edit_mat.php'>
					<input type='hidden' name='mat_id' value='".$mat['ID_documents']."'>

					<label><textarea required name='desc_en'>".$mat['Name_documents_en']."</textarea></label>
					<input class=\"submit_button\" type='submit' value=''>
				</form>

				<span>Обложка</span><br>
				<div class='mat_file_input'>
					<img style='width: 200px;' alt='...' src='".$mat['cover']."'>
					<form method='POST' enctype='multipart/form-data' action='php/actions/edit_main_info/edit_mat.php'>
						<input type='hidden' name='mat_id' value='".$mat['ID_documents']."'>
						<input type='hidden' name='conf_id' value='".$conf_id."'>

						<input required type='file' name='cover'><br>
						<input class=\"new_file_button\" type='submit' value='Загрузить новое фото'>
					</form>
				</div>

				<span>Ссылка на elibrary</span>
				<form method='POST' action='php/actions/edit_main_info/edit_mat.php'>
					<input type='hidden' name='mat_id' value='".$mat['ID_documents']."'>	

					
					<input required class='elib_link' type='text' name='elib_link' value='".$mat['link']."'>
					<input class='submit_button' type='submit' value=''>
				</form>

				<form class='mat_new_file' method='POST' enctype='multipart/form-data' action='php/actions/edit_main_info/edit_mat.php'>
					<input type='hidden' name='mat_id' value='".$mat['ID_documents']."'>
					<input type='hidden' name='conf_id' value='".$conf_id."'>

					<input required type='file' name='file'>
					<input class=\"new_file_button\" type='submit' value='Загрузить новый файл'>
				</form>

				<form method='POST' action = 'php/actions/edit_main_info/delete_mat.php'>
					<input type='hidden' name='mat_id' value='".$mat['ID_documents']."'>
					<input class='delete_button' type='submit' value='Удалить сборник'>
				</form>
			</div>
			
			");
		}

		?>
	</div>
	<a id="show_all_mats" onclick="show_all('mat_list', 'show_all_mats', 'Смотреть все сборники', 'Скрыть сборники', '800px')" style="cursor: pointer; text-decoration: underline; color: blue;">Смотреть все сборники</a>
</div>