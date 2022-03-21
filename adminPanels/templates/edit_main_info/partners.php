<style>
	.partners {
		text-align: center;
	}
	.partners_list {
		display: grid;
		grid-template-columns: 30% 30% 30%;
	}

	.partners_list_el img {
		display: block;
	}

	.partners_list_el {
		display: flex;
		flex-direction: column;
		align-items: center;
		justify-content: space-between;
		margin: 10px;
	}
</style>

<div class="partners" id="partners">
	<h1>Партнёры</h1>
	<form method="POST" enctype="multipart/form-data", action="php/actions/edit_main_info/add_partner.php">
		<input type="hidden" name="conf_id" value=<?="'".$conf_id."'"?>>
		<input required type="file" name="partner">
		<input class="add_button" type="submit" value="Добавить партнёра">
	</form>

	<div class='partners_list'>
		<?php
		foreach( $partners as $partner ) {
			print("
			<div class='partners_list_el'>
				<img alt='...' src='".$partner['logo']."'>
				<form method='POST' action='php/actions/edit_main_info/delete_partner.php'>
					<input type='hidden' name='partner_id' value='".$partner['ID_partner']."'>
					<input class='delete_button' type='submit' value='Удалить партнёра'>
				</form>
			</div>
			");
		}
		?>
	</div>

</div>