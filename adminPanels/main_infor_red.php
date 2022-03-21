<?php 
	require "header.php";
	print($header);
?>
<style>
	div.all_blocks {
		padding-top: 50px;
		width: 80%;
		margin: 0 auto;
	}
	div.shortcuts {
		float:  left;
	}
	a.shortcuts {
		color: black;
		text-decoration: none;
		transition: all .1s;
		line-height: 2em;
	}
	a.shortcuts:hover {
		color: red;
	}
	div.red_fields {
		width: 70%;
		margin: 0 auto;
	}
</style>

<style type="text/css">
	input {
		border-radius: 5px;
		border: 1px solid black;
	}

	.red_block {
		text-align: center;
		align-items: center;
		align-content: center;
	}
	.red_fields h2 {
		text-align: center;
		font-size: 25px;
	}
	.red_fields div {
		margin-bottom: 50px;
	}
	.text_ru {
		color: blue;
	}
	.text_en {
		color: red;
	}
	.importamt_dates {
		text-align: center
	}
	.info {
		font-style: italic;
	}
	.fullwblock {
		text-align: left;
	}
	.fullwblock input {
		width: 100%;
	}



	#message {
		position: fixed;
		bottom: -100px;
		right: 50px;
		padding: 20px;
		background: lightgreen;
		border-top: 1px solid darkgreen;
		border-left: 1px solid darkgreen;
		border-right: 1px solid darkgreen;

		border-top-left-radius: 5px;
		border-top-right-radius: 5px;

		transition: all .5s;
	}

	.sss {
		width: 50%;
		display: flex;
		justify-content: space-around;
		width: 100%;
	}

	.sss div {
		
	}

	hr {
		margin-bottom: 30px;
	}

</style>

<div class="all_blocks">
	<div class="shortcuts">
		<a class="shortcuts" href="#dates">Даты</a><br>
		<a class="shortcuts" href="#programs">Программки</a><br>
		<a class="shortcuts" href="#mats_list">Сборники материалов</a><br>
		<a class="shortcuts" href="#photos">Фотографии</a><br>
		<a class="shortcuts" href="#videos">Видео</a><br>
		<a class="shortcuts" href="#partners">Партнёры</a><br>
	</div>
	<div class="red_fields">
		<div class="data_red" id="dates">
			<h2>Дата конференции</h2>
			<span>от </span>
			<input type="date">
			<span> до </span>
			<input type="date">
		</div>
		<div class="importamt_dates">
			<h2>Важные даты</h2>
			<span class="info">i Если дата не является промежутком, продублируйте её в обе формы</span>
			<div class="add_date">
				<span>от </span>
				<input type="date"><img src="">
				<span> до </span>
				<input type="date">
				<br>
				<div class="fullwblock">
					<span class="text_ru">Описание</span><br>
					<input type="text">
					<br>
					<span class="text_en">Description</span><br>
					<input type="text">
				</div>
			</div>
			<div class="date_list">
				<h3>Дата 1</h3>
				<span>от </span>
				<input type="date">
				<span> до </span>
				<input type="date">
				<br>
				<span class="text_ru">Описание</span>
				<input type="text">
				<br>
				<span class="text_en">Description</span>
				<input type="text">
			</div>
			<span>Смотреть все даты</span>
		</div>

		<hr>

		<div class="inf_let" id="programs">
			<h2>Программки, инфармационные письма</h2>
			<div class="add_inf">
				<input type="file" name="">
				<span class="text_ru">Название</span>
				<input type="text" name="">
				<br>
				<input type="file" name="">
				<span class="text_en">Name</span>
				<input type="text" name="">
			</div>
			<div class="inf_list">
				<h3>Программка 1</h3>
				<span class="text_ru">Название</span>
				<br>
				<input type="text" name="">
				<br>
				<span class="text_ru">Файл</span>
				<br>
				<span>Программа конференции 2020</span>
				<input type="file" name="">

				<!-- En version here -->

			</div>
		</div>

		<hr>

		<div class="mats" id="mats_list">
			<div class="add_mat">
				<h2>Сборники материалов</h2>
				<span class="text_ru">Описание</span>
				<input type="text" name="">

				<span class="text_en">Description</span>
				<input type="text" name="">

				<br>

				<div class="sss">
					<div>
						<span>Обложка</span><br>
						<input type="file" name="">
					</div>

					<div>
						<span>Файл</span><br>
						<input type="file" name="">
					</div>
				</div>

				<div>
					<span>Ссылка elibrary</span><br>
					<input type="file" name="">
				</div>
			</div>
			<div class="mat_list">
				<h2>Список сборников материалов</h2>
				<span class="text_ru">Название</span><br>
				<textarea></textarea>

				<br>
				<span class="text_en">Name</span><br>
				<textarea></textarea>

				<br>
				<div class="sss">
					<span>Обложка</span>
					<img alt="...">

					<input type="file" name="">
				</div>
			</div>
		</div>

		<hr>

		<div class="main_photo" id="photos">
			<h2>Главная фотография</h2>
			<img alt="" src="">
			<input type="file" name="">
		</div>
		<div class="conf_photo">
			<h2>Фото конференции</h2>
			<input type="file" name="">
			<div>
				<!-- IMGS -->
			</div>
		</div>

		<hr>

		<div class="conf_video" id="videos">
			<h2>Видео конференции</h2>
			<span>Ссылка на видео из ютуб</span><br>
			<input type="text" name="">
			<br>
			<iframe width="560" height="315" src="https://www.youtube.com/embed/kdstSHeoNGA" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>

		<hr>

		<div class="partners" id="partners">
			<h2>Партнёры</h2>
			<input type="file" name="">

			<!-- IMGS -->

		</div>
	</div>


	<div id="message">
		<span>Everytihg is OK!</span>
	</div>

</div>

<script>
	const anchors = document.querySelectorAll('a[href*="#"]')
	anchors.forEach((anchor) => {
	  anchor.addEventListener('click', function (e) {
	    e.preventDefault()
	    
	    const blockID = anchor.getAttribute('href').substr(1)
	    
	    document.getElementById(blockID).scrollIntoView({
	      behavior: 'smooth',
	      block: 'start'
	    })
	  })
	})


	var msg = document.getElementById("message");

	function show_ok_message() {
		msg.style.bottom = "0px";
	}
	function hide_ok_message() {
		msg.style.bottom = "-100px";
	}
	function run_sh_cycle(starttime, time) {
		window.setTimeout(show_ok_message, starttime);
		window.setTimeout(hide_ok_message, time);
	}

	run_sh_cycle(500, 5000);

</script>