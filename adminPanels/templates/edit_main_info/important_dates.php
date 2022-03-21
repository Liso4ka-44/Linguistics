<style>
	.importamt_dates {
		text-align: center
	}
	.fullwblock {
		text-align: left;
	}
	.fullwblock textarea {
		min-width: 100%;
		max-width: 100%;
		min-height: 50px;
	}

	.date_list {
		max-height: 500px;
		overflow: hidden;
	}
	.date_list input {
		margin: 5px auto;
	}
	.date_list textarea {
		margin: 0 auto 10px;
		width: 80%;
	}
</style>


<div class="importamt_dates">
	<h1>Важные даты</h1>
	<span class="info_text"><img src="img/icon/warning.png"> Если дата не является промежутком, продублируйте её в обе формы</span>
	<form class="add_date" method="POST" action="php/actions/edit_main_info/add_date.php">
		<input type='hidden' name='conf_id' value=<?="'".$conf_id."'"?>>

		<span>от </span>
		<input required type="date" name="begin_date">
		<span> до </span>
		<input required type="date" name="end_date">

		<br>
		
		<div class="fullwblock">
			<span class="text_ru">Описание</span><br>
			<label><textarea required name='text_ru'></textarea></label>
			<br>
			<span class="text_en">Description</span><br>
			<label><textarea required name='text_en'></textarea></label>
		</div>
		<input class="add_button" type="submit" value="Добавить дату">
	</form>

	<div class="mid_separator"></div>

	<div class="date_list">
		<?php 
			$i = 1;
			foreach ( $dates as $date ) {
				print("
					<div class='date_el list_el'>
					<form method=\"POST\" action='php/actions/edit_main_info/edit_date.php'>
						<h3>Дата ".$i."</h3>
						<span>от </span>
						<input type=\"date\" name=\"begin_date\" value='".$date['date_from']."'>
						<span> до </span>
						<input type=\"date\" name=\"end_date\" value='".$date['date_to']."'>
						<input type='hidden' name='date_id' value='".$date['ID_date']."'>
						<input class=\"submit_button\" type=\"submit\" name=\"sub_conf\" value=\"\">
					</form>

					<br>

					<form method=\"POST\" action='php/actions/edit_main_info/edit_date.php'>
						<span class=\"text_ru\">Описание</span><br>
						<label><textarea name=\"desc_ru\">".$date['text_ru']."</textarea></label>
						<input type='hidden' name='date_id' value='".$date['ID_date']."'>
						<input class=\"submit_button\" type=\"submit\" name=\"sub_conf\" value=\"\">
					</form>
					<form method=\"POST\" action='php/actions/edit_main_info/edit_date.php'>
						<span class=\"text_en\">Description</span><br>
						<label><textarea name=\"desc_en\">".$date['text_en']."</textarea></label>
						<input type='hidden' name='date_id' value='".$date['ID_date']."'>
						<input class=\"submit_button\" type=\"submit\" name=\"sub_conf\" value=\"\">
					</form>

					<form method='POST' action='php/actions/edit_main_info/delete_date.php'>
						<input type='hidden' name='date_id' value='".$date['ID_date']."'>
						<input class='delete_button' type='submit' value='Удалить дату'>
					</form>
				</div>
				<div class='small_separator'></div>

				");
				++$i;
			}
		?>
	</div>
	<a id="show_all_dates" onclick="show_all('date_list', 'show_all_dates', 'Смотреть все даты', 'Скрыть даты')" style="cursor: pointer; text-decoration: underline; color: blue;">Смотреть все даты</a>
</div>