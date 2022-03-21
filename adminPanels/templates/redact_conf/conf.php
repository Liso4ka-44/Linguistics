<style type="text/css">
	.conf_div {
		border: 1px solid grey;
		border-radius: 10px;
		margin-bottom: 10px;
		padding: 5px;
	}
	.redact_div {
		display: flex;
		flex-direction: column;
		height: 0.2em;
		overflow: hidden;
		transition: all .2s;
	}
	.redact_div div {
		display: flex;
		justify-content: space-between;
		margin-bottom: 5px;
	}
	.conf_div a {
		text-decoration: none;
	}
	.ru_red_href {
		color: blue;
		cursor: pointer;
	}
	.en_red_href {
		color: red;
	}
	.red_main {
		color: #222;
	}
	.del_conf {
		color: #600;
		cursor: pointer;
	}
	.conf_data {
		cursor: pointer;
	}
	.arrow_image {
		float: right;
		margin-right: 5px;
		margin-top: 5px;
		transition: all .2s;
	}
	.clickable_conf {
		cursor: pointer;
	}

</style>

<div class='conf_div'>
	<div class='clickable_conf' onclick='showhide(<?=$conf_id?>)'>
		<span class='conf_data'>Дата конференции <?=$conf_date?></span>
		<img class='arrow_image' id='img_<?=$conf_id?>' src="img/icon/down.svg">
	</div>
	<div class='redact_div' id=<?="'".$conf_id."'"?>>
		<div>
			<span>Выберите язык редактирования</span>
			<div>
				<a class='ru_red_href' href=<?="'red_info.php?ID=".$conf_id."&lang=ru'"?>>RU</a>
				<span>/</span>
				<a class='en_red_href' href=<?="'red_info.php?ID=".$conf_id."&lang=en'"?>>EN</a>
			</div>
		</div>
		<div>
			<a class='red_main' href=<?="'MIR.php?ID=".$conf_id."'"?>>Редактировать общую информацию</a>
			<span class='del_conf' href="" onclick="submit_delete(<?= $conf_id ?>)">Удалить конференцию</span>
		</div>
	</div>
</div>

<script>
	var a = document.querySelectorAll(".redact_div").forEach( el => el.style.height = "0.2em" );
	function showhide(id) {
		var hb = document.getElementById(id);
		var img = document.getElementById("img_"+id)
		if( hb.style.height == "0.2em" ) {
			hb.style.height = "55px";
			img.style.transform = "scaleY(-1)";
		} else {
			hb.style.height = "0.2em";
			img.style.transform = "scaleY(1)";
		}
	}
</script>