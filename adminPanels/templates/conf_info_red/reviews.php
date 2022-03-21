<style>
	.add_feedback_form {
		display: flex;
		flex-direction: column;
	}
	.add_feedback_form div {
		display: flex;
		flex-direction: column;
	}
	.add_feedback_form .add_button {
		width: 20%;
		margin: 20px auto 0;
	}
	.conf_feedback__rating {
		width: 10%;
		margin: 0 auto;
	}
</style>

<h2 id="conf_feedback">Отзывы</h2>
<span class="info_text"><img src="img/icon/warning.png"> если отзыв был добавлен ранее на английском, он уже имеется в списке</span>
<br>
<form class='add_feedback_form' method="POST" action="php/actions/conf_info_red/add_review.php">
	<input type="hidden" name="conf_id" value=<?="'".$conf_info['ID_conf']."'"?>>
	<input type='hidden' name='suffix' value=<?="'".$suffix."'"?>>
	<div>
		<span>ФИО</span>
		<label><textarea required class='wide_textarea' name='name'></textarea></label>
	</div>
	<div>
		<span>Должность</span>
		<label><textarea required class='wide_textarea' name='position'></textarea></label>
	</div>
	<div>
		<span>Оценка</span>
		<input class='conf_feedback__rating' required type="number" name="rating" min="0" max="5" value="5">
	</div>
	<div>
		<span>Текст отзыва</span>
		<textarea class="editor" name='text'></textarea>
	</div>
	<input class="add_button" type="submit" value="Добавить отзыв" >
</form>

<hr>

<style>
	.reviews_list__el {
		display: flex;
		flex-direction: column;
	}
</style>

<div class='reviews_list'>
	<?php 
		foreach($reviews as $review) {
			print("
				<div class='reviews_list__el list_el'>
					<form method='POST' action='php/actions/conf_info_red/edit_review.php'>
						<input type='hidden' name='id_feedback' value='".$review['ID_feedback']."'>
						<input type='hidden' name='suffix' value='".$suffix."'>
						<div>
							<span>ФИО</span>
							<br>
							<label><textarea class='wide_textarea' name='name'>".$review['Name_feedback_'.$suffix]."</textarea></label>
							<input class='submit_button' type='submit' value=''>
						</div>
						 
						<div>
							<span>Должность</span>
							<br>
							<label><textarea class='wide_textarea' name='position'>".$review['post_'.$suffix]."</textarea></label>
							<input class='submit_button' type='submit' value=''>
						</div>
						
						<div>
							<span>Оценка</span>
							<input type='number' name='rating' min='0' max='5' value='".$review['rating']."'>
							<input class='submit_button' type='submit' value=''>
						</div>

						<div>
							<span>Текст отзыва</span>
							<textarea class='editor' name='text'>".$review['feedback_'.$suffix]."</textarea>
							<input class='submit_button' type='submit' value=''>
						</div>
					</form>
					<form method='POST' action='php/actions/conf_info_red/delete_review.php'>
						<input type='hidden' name='id_feedback' value='".$review['ID_feedback']."'>
						<input class='delete_button' type='submit' value='Удалить отзыв'>
					</form>
				</div>
				
				<div class='mid_separator'></div>
			");
		}
	?>
</div>