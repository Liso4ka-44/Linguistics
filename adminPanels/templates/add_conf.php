<style>
	.add_conf_all {
		width: 80%;
		margin: 0 auto;
	}
	.conf_date__date {
		margin: 0 auto;
		width: 50%;
		display: flex;
		justify-content: space-around;
	}
	.add_conf_form {
		width: 80%;
		margin: 0 auto;
		text-align: center;
	}

	.anouncement_info {
		margin: 0 auto;
		width: 60%;
	}

	.anouncement_info__introduction {
		display: flex;	
	}
	.anouncement_info__introduction div {
		width: 50%;
	}
	.anouncement_info__introduction textarea {
		width: 90%;
	}

	.ck-editor__editable_inline {
		min-height: 200px;
	}

	.prog_info_letters {
		margin-bottom: 30px;
	}

	.prog_file_add {
		display: grid;
		margin-bottom: 10px;
	}
	.prog_file_add div{
		display: flex;
		align-items: center;
		justify-content: space-around;
		padding: 10px;
		width: 50%;
		margin: 0 auto;
	}

	.prog_file_add__file_and_name div {
		display: flex;
		flex-direction: column;
	}

	.add_conf_button {
		background: lightgreen;
		color: black;
		width: 30%;
		height: 50px;
		margin-bottom: 100px;
	}


</style>

<div class="add_conf_all">
	<?=$shorcuts?>
	<form class='add_conf_form' method="POST" enctype="multipart/form-data" action="php/actions/add_conf/add_conf.php">
		
		<div id='conf_date_i' class='conf_date'>
			<h1>Дата конференции</h1>
			<span class="info_text"><img src="img/icon/warning.png"> Если дата не является промежутком, продублируйте её в обе формы</span>
			<br>
			<div class="conf_date__date">
				<div>
					<span>от </span>
					<input required type="date" name="begin_date">
				</div>
				<div>
					<span> до </span>
					<input required type="date" name="end_date">
				</div>
			</div>
		</div>
		<div id='anouncement_info_i' class="anouncement_info">
			<h1>Сведения об анонсе</h1>
			<div class="anouncement_info__introduction">
				<div>
					<span class="text_ru">Вступление анонса</span>
					<label><textarea required name="intro_ru"></textarea></label>
				</div>
				<div>
					<span class="text_en">Introduction</span>
					<label><textarea required name="intro_en"></textarea></label>
				</div>
			</div>

			<div>
				<div>
					<span class="text_ru">Информация о конференции</span>
					<label><textarea class='editor' name="conf_info_ru"></textarea></label>
				</div>
				<div>
					<span class="text_en">Conference information</span>
					<label><textarea class='editor' name="conf_info_en"></textarea></label>
				</div>
			</div>

			<div>
				<div>
					<span class="text_ru">Концепция конференции</span>
					<label><textarea class='editor' name="conf_conception_ru"></textarea></label>
				</div>
				<div>
					<span class="text_en">Conference conception</span>
					<label><textarea class='editor' name="conf_conception_en"></textarea></label>
				</div>
			</div>
		</div>

		<div id='prog_info_letters_i' class="prog_info_letters">
			<h1>Программки,информационные письма</h1>
			<div>
				<div class="all_prog_files">
					<div class='prog_file_add list_el'>
						<h3>Документ 1</h3>
						<div class="prog_file_add__file_and_name">
							<div>
								<span class="text_ru">Файл</span>
								<input required type="file" name="file_ru[]">
							</div>
							<div>
								<span class="text_ru">Название</span>
								<input required type="text" name="fname_ru[]">
							</div>
						</div>
						<div class="prog_file_add__file_and_name">
							<div>
								<span class="text_en">File</span>
								<input required type="file" name="file_en[]">
							</div>
							<div>
								<span class="text_en">Name</span>
								<input required type="text" name="fname_en[]">
							</div>
						</div>
					</div>
				</div>
			</div>
			<button class='add_button' onclick="addElement()" type="button">Добавить программку</button>
		</div>
		<input class='add_button add_conf_button' type="submit" value="Добавить конференцию">
	</form>
</div>
<script>
	function addElement() {
		var progFiles = document.getElementsByClassName("prog_file_add");
		var progFilesNumber = progFiles.length+1;

		var newdiv = document.createElement("div");
		newdiv.className = "prog_file_add list_el";

		newdiv.innerHTML = "\
				<h3>Документ "+progFilesNumber+"</h3>\
						<div>\
							<div>\
								<span class='text_ru'>Файл</span>\
								<input required type='file' name='file_ru[]'>\
							</div>\
							<div>\
								<span class='text_ru'>Название</span>\
								<input required type='text' name='fname_ru[]'>\
							</div>\
						</div>\
						<div>\
							<div>\
								<span class='text_en'>File</span>\
								<input required type='file' name='file_en[]'>\
							</div>\
							<div>\
								<span class='text_en'>Name</span>\
								<input required type='text' name='fname_en[]'>\
							</div>\
						</div>\
			";

		document.getElementsByClassName("all_prog_files")[0].append(newdiv);

	}
</script>

<script>
	var editors_list = document.querySelectorAll('.editor');
	editors_list.forEach( el =>
		ClassicEditor.create( el ).then(editor => {
            	myEditor = editor
        	}
		).catch(error => {
        	console.error(error);
    	}
	));
</script>