<script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>

<style>
	#comment_form {
		margin: 0 auto;
		width: 100%;
		text-align: center;
		overflow: auto;

	}
	#comment_form form {
		border-radius: 30px;
		background: linear-gradient(#66409205, #66409230);
		margin: 0 auto;
		margin-top: 20px;
		padding: 10px;
		width: 50%;
	}
	#comment_form table {
		margin: 0 auto;
	}
	#comment_form table td {
		padding: 5px;
	}
	.ck-content {
		min-height: 400px;
	}
	#comment_form h3 {
		margin-bottom: 20px;
	}
	#comment_form .sub_button {
		cursor: pointer;
		background: #94b;
		border: none;
		color: white;
		padding: 5px;
		transition: all .3s;
	}

	#comment_form .sub_button:hover {
		background: #649;
	}

	/* STARS RATING STYLE */

	.rating {
		position: relative;
		display: inline-block;
		font-size: 40px;
	}
	.rating::before {
		content: "★★★★★";
		display: block;
	}
	.rating__items {
		position: absolute;
		width: 100%;
		height: 100%;
		top: 0;
		left: 0;
		display: flex;
		flex-direction: row-reverse;
		overflow: hidden;
	}
	.rating__item {
		position: absolute;
		width: 0%;
		height: 0%;
		opacity: 0;
		visibility: hidden;
		top: 0;
		left: 0;
	}

	.rating__lable {
		flex: 0 0 20%;
		height: 100%;
		cursor: pointer;
		color: lightgrey;
	}

	.rating__lable::before {
		content: "★";
		display: block;
		transition: color 0.3s ease 0s;
	}

	.rating__item:checked,
	.rating__item:checked ~ .rating__lable {
		color: yellow;
	}

	.rating__lable:hover,
	.rating__lable:hover ~ .rating__lable,
	.rating__lable:checked ~ .rating__lable:hover {
		color: #FFFF4F;
	}

</style>

<div id="comment_form">
	<form method="POST" action="actions/add_feedback.php">
		<h3><?=$form_text_leave_feedback?></h3>
		<input required type="hidden" name="conf_id" value=<?="'".$conf_id."'"?>>
		<input required type="hidden" name="user_id" value=<?="'".$user_id."'"?>>
		<table>
			<tr>
				<td>
					<span><?=$form_text_language?></span>	
				</td>
				<td>
					<select required size="1" name="suffix">
						<option value="ru">Ru</option>
						<option value="en">En</option>
					</select>	
				</td>
			</tr>
			<tr>
				<td>
					<span><?=$form_text_post?></span>
				</td>
				<td>
					<input class='textinput' required type="text" name="position">
				</td>
			</tr>
			<tr>
				<td>
					<span><?=$form_text_rating?></span>
				</td>
				<td>
					<div class="rating">
						<div class="rating__items">
							<input id="rating_5" type="radio" class="rating__item" name="rating" value="5">
							<label for="rating_5" class="rating__lable"></label>
							<input id="rating_4" type="radio" class="rating__item" name="rating" value="4">
							<label for="rating_4" class="rating__lable"></label>
							<input id="rating_3" type="radio" class="rating__item" name="rating" value="3">
							<label for="rating_3" class="rating__lable"></label>
							<input id="rating_2" type="radio" class="rating__item" name="rating" value="2">
							<label for="rating_2" class="rating__lable"></label>
							<input id="rating_1" type="radio" class="rating__item" name="rating" value="1">
							<label for="rating_1" class="rating__lable"></label>
						</div>
					</div>
				</td>
			</tr>
		</table>
		<p><?=$form_text_feedback?></p>
		<textarea class="editor" name="text"></textarea>
		<br>
		<input class="sub_button" type="submit" value=<?="'".$form_text_leave_feedback."'"?>>
	</form>
	<script>
    	var editors_list = document.querySelectorAll('.editor');
    	editors_list.forEach( el => ClassicEditor.create( el ) );
    </script>
</div>