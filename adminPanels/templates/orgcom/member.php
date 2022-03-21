<style>
	.member_info .wide_textarea {
		max-width: 50%;
		min-width: 50%;
		height: 1.2em;
	}
	.member_info__photo {
		display: grid;
		grid-template-columns: 40% 60%;
		width: 50%;
		margin: 0 auto;
		justify-content: space-around;
		align-items: center;
	}

	.member_info__photo img {
		display: block;
		width: 80%;
	}

	.member_info form {
		margin-bottom: 10px;
	}
</style>

<div class="member_info list_el">
	<form method="POST" action="php/actions/orgcom/edit_member.php">
		<div>
			<input type="hidden" name="memb_id" value=<?="'".$memb_id."'"?>>

			<span class="text_ru">ФИО</span>
			<br>
			<label><textarea required class='wide_textarea' name="name_ru"><?=$name_ru?></textarea></label>
			<input class="submit_button" type="submit" value="">
		</div>
	</form>
	<form method="POST" action="php/actions/orgcom/edit_member.php">
		<div>
			<input type="hidden" name="memb_id" value=<?="'".$memb_id."'"?>>
			
			<span class="text_en">Name</span>
			<br>
			<label><textarea required class='wide_textarea' name="name_en"><?=$name_en?></textarea></label>
			<input class="submit_button" type="submit" value="">
		</div>
	</form>

	<form method="POST" action="php/actions/orgcom/edit_member.php">
		<div>
			<input type="hidden" name="memb_id" value=<?="'".$memb_id."'"?>>
			
			<span class="text_ru">Должность</span>
			<br>
			<label><textarea required class='wide_textarea' name="post_ru"><?=$post_ru?></textarea></label>
			<input class="submit_button" type="submit" value="">
		</div>
	</form>
	<form method="POST" action="php/actions/orgcom/edit_member.php">
		<div>
			<input type="hidden" name="memb_id" value=<?="'".$memb_id."'"?>>
			
			<span class="text_en">Post</span>
			<br>
			<label><textarea required class='wide_textarea' name="post_en"><?=$post_en?></textarea></label>
			<input class="submit_button" type="submit" value="">
		</div>
	</form>

	<div class='member_info__photo'>
		<img src=<?="'".$photo_src."'"?>>
		<form method="POST" enctype="multipart/form-data" action="php/actions/orgcom/edit_member.php">
			<input type="hidden" name="memb_id" value=<?="'".$memb_id."'"?>>
			
			<span>Фото</span>
			<input required type="file" name="new_photo">
			<input class="submit_button" type="submit" value="">
		</form>
	</div>

	<form method="POST" action="php/actions/orgcom/edit_member.php">
		<div>
			<input type="hidden" name="memb_id" value=<?="'".$memb_id."'"?>>
			
			<span class="text_ru">Ссылка</span>
			<br>
			<label><textarea required class='wide_textarea' name='link_ru'><?=$link_ru?></textarea></label>
			<input class="submit_button" type="submit" value="">
		</div>
	</form>
	<form method="POST" action="php/actions/orgcom/edit_member.php">
		<div>
			<input type="hidden" name="memb_id" value=<?="'".$memb_id."'"?>>
			
			<span class="text_en">Link</span>
			<br>
			<label><textarea required class='wide_textarea' name='link_en'><?=$link_en?></textarea></label>
			<input class="submit_button" type="submit" value="">
		</div>
	</form>

	<form method="POST" action="php/actions/orgcom/delete_member.php">
		<div>
			<input type="hidden" name="memb_id" value=<?="'".$memb_id."'"?>>

			<input class="delete_button" type="submit" value="Удалить представителя">
		</div>
	</form>

</div>
<hr>