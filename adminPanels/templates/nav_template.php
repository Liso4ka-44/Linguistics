<div class="shortcuts">
	<?php 
		foreach( $chapters as $chapter ) {
			print("
				<a class='shortcuts' href='#".$chapter[0]."'>".$chapter[1]."</a><br>
			");
		}
	?>
</div>