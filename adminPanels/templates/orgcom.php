<style>
	.all_org_com {
		width: 80%;
		margin: 0 auto;
	}
	.all_content {
		text-align: center;
		width: 80%;
		margin: 0 auto;
	}

	.add_member_form  div {
		display: flex;
		margin: 10px 0;
		width: 100%;
	}
	.add_member_form div div {
		display: grid;
		width: 50%;
	}
	.wide_textarea {
		min-width: 80%;
		max-width: 80%;
	}
	.add_member_form__photo * {
		margin: 0 auto;
	}
</style>

<div class="all_org_com">
	<div class="all_content">
		<div>
			<h1>
				Добавление и редактирование оргкомитета
			</h1>
			<form class="add_member_form" method="POST" enctype="multipart/form-data" action="php/actions/orgcom/add_member.php">
				<div>
					<div>
						<span class='text_ru'>ФИО</span>
						<label><textarea required class="wide_textarea" name='name_ru'></textarea></label>
					</div>
					<div>
						<span class="text_en">Name</span>
						<label><textarea required class="wide_textarea" name='name_en'></textarea></label>
					</div>
				</div>

				<div class='add_member_form__photo'>
					<div>
						<span>Фотография</span>
						<input required type="file" name="photo">
					</div>
				</div>
				<div>
					<div>
						<span class='text_ru'>Должность</span>
						<label><textarea required class="wide_textarea" name='post_ru'></textarea></label>
					</div>
					<div>
						<span class="text_en">Post</span>
						<label><textarea required class="wide_textarea" name='post_en'></textarea></label>
					</div>
				</div>

				<div>
					<div>
						<span class='text_ru'>Ссылка</span>
						<label><textarea required class="wide_textarea" name='link_ru'></textarea></label>
					</div>
					<div>
						<span class="text_en">Link</span>
						<label><textarea required class="wide_textarea" name='link_en'></textarea></label>
					</div>
				</div>
				<input class='add_button' type="submit" value="Добавить">
			</form>
		</div>
		<hr>
		<div>
			<?php
				foreach( $member_templates as $member_t ) {
					print($member_t);
				}
			?>
		</div>
	</div>
</div>