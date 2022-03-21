<style>
	.inf_let {
		text-align: center;
	}
	.inf_let table {
		margin: 0 auto;
	}
	.inf_let table td {
		padding: 5px 5px;
	}

	.prog_name {
		width: 80%;
	}

	.prog_file_input {
		display: flex;
		flex-direction: row;
		width: 100%;
		justify-content: space-between;
	}

	.inf_list {
		max-height: 500px;
		overflow: hidden;
	}

</style>

<div class="inf_let" id="programs">
	<h1>Программки, инфармационные письма</h1>
	<form class="add_inf" enctype="multipart/form-data" method="POST" action="php/actions/edit_main_info/add_program.php">
		<input type='hidden' name='conf_id' value=<?="'".$conf_id."'"?>>
		<table>
			<tr>
				<td>
					<label><input required type="file" required name="file_ru"></label>
				</td>
				<td>
					<span class="text_ru">Название</span>
					<input required type="text" required name="name_ru">
				</td>
			</tr>
			<tr>
				<td>
					<input required type="file" required name="file_en">
				</td>
				<td>
					<span class="text_en">Name</span>
					<input required type="text" required name="name_en">
				</td>
			</tr>
		</table>
		<br>
		<br>
		<input class="add_button" type="submit" name="" value="Добавить программку">
	</form>

	<div class="mid_separator"></div>

	<div class="inf_list">
		<?php 
			$i = 1;
			foreach ( $programs as $prog ) {
				print("
				<div class='prog_el list_el'>
					<h3>Программка ".$i."</h3>
					<span class=\"text_ru\">Название</span>
					<br>
					<form method='POST' action = 'php/actions/edit_main_info/edit_program.php'>
						<input type='hidden' name='prog_id' value='".$prog['ID_playbill']."'>

						<input required class='prog_name' type=\"text\" name=\"name_ru\" value='".$prog['name_playbill_ru']."'>
						<input class=\"submit_button\" type=\"submit\" name=\"sub_conf\" value=\"\">
					</form>

					<br>

					<span class=\"text_ru\">Файл</span>

					<br>
					<form class='prog_file_input' method='POST' enctype='multipart/form-data' action='php/actions/edit_main_info/edit_program.php'>
						<div></div>
						<input type='hidden' name='prog_id' value='".$prog['ID_playbill']."'>
						<input type='hidden' name='conf_id' value='".$conf_id."'>

						<a class=\"file_name\" href='".$prog['road_ru']."'>".$prog['name_playbill_ru']."</a>
						<input required type=\"file\" name=\"file_ru\">
						<input class=\"submit_button\" type=\"submit\" name=\"sub_conf\" value=\"\">
					</form>


					<!-- Eng version -->
					
					<br>

					<span class=\"text_en\">Name</span>
					<br>  
					<form method='POST' action = 'php/actions/edit_main_info/edit_program.php'>
						<input type='hidden' name='prog_id' value='".$prog['ID_playbill']."'>

						<input required class='prog_name' type=\"text\" name=\"name_en\" value='".$prog['name_playbill_en']."'>
						<input class=\"submit_button\" type=\"submit\" name=\"sub_conf\" value=\"\">
					</form>

					<br>

					<span class=\"text_en\">Файл</span>

					<br>
					<form class='prog_file_input' method='POST' enctype='multipart/form-data' action = 'php/actions/edit_main_info/edit_program.php'>
						<div></div>
						<input type='hidden' name='prog_id' value='".$prog['ID_playbill']."'>
						<input type='hidden' name='conf_id' value='".$conf_id."'>

						<a class=\"file_name\" href='".$prog['road_en']."'>".$prog['name_playbill_en']."</a>
						<input required type=\"file\" name=\"file_en\">
						<input class=\"submit_button\" type=\"submit\" name=\"sub_conf\" value=\"\">
					</form>

					<form method='POST' action = 'php/actions/edit_main_info/delete_program.php'>
						<input type='hidden' name='prog_id' value='".$prog['ID_playbill']."'>
						<input class='delete_button' type='submit' value='Удалить Программку'>
					</form>
				</div>
				<div class=\"small_separator\"></div>
				");
				++$i;
			}
		?>
	</div>
	<a id="show_all_progs" onclick="show_all('inf_list', 'show_all_progs', 'Смотреть все программки', 'Скрыть программки')" style="cursor: pointer; text-decoration: underline; color: blue;">Смотреть все программки</a>
</div>