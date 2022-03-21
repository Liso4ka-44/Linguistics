<div class="all_blocks">
	<?=$shortcuts_template?>
	<div class="red_fields">
		<div class="data_red" name="dates">
			<form method="POST" action="php/actions/edit_main_info/edit_date.php">
				<h1>Дата конференции</h1>
				<span>от </span>
				<input type="date" name="begin_date" value=<?= "'".$begin_date."'"?>>
				<span> до </span>
				<input type="date" name="end_date" value=<?= "'".$end_date."'"?>>
				<input type="hidden" name="date_id" value=<?="'".$mdid."'"?>>
				<input class="submit_button" type="submit" name="sub_conf" value="">
			</form>
		</div>

		<?=$important_dates_template?>

		<hr>

		<?=$programs_info_letters_template?>
		

		<hr>

		<?=$mats_template?>
		
		<hr>

		<?=$photos_template?>

		<hr>

		<?=$videos_template?>

		<hr>

		<?=$partners_template?>
	</div>

</div>

<script>
	enableSmoothScroll();
</script>