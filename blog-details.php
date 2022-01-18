<?php

	session_start();
	include "probnik/podcl.php";
	include "probnik/class.php";
	include "head.php";
	include "indexVivod.php";
	include "connect.php";
?>
<!DOCTYPE html>
<html lang="ru">
<?php
	if($_GET["id"]){
		$_SESSION["id_konf_blog_detalic"] = $_GET["id"];
		// echo "<script> alert('".$_SESSION['lang']."')</script>";
	  }
	$blogBD = mysqli_query($connect,"SELECT * FROM `conferences` WHERE `ID_conf` = ".$_SESSION["id_konf_blog_detalic"]);
	$row = mysqli_fetch_assoc($blogBD);
	$name = $row['Name_conf_'.$_SESSION["lang"]];
	$inforow = $row['info_'.$_SESSION["lang"]];
	$playbill = $row ['playbill'];
	$idyear = $row ['ID_year'];
	$year = mysqli_query($connect,"SELECT `year` FROM `years` WHERE `ID_year` = $idyear ");
	$roww = mysqli_fetch_assoc($year);
	$yearname = $roww['year'];
	if($row['main_photo']!=""){
		$mainPhoto ="/adminPanels/".$row['main_photo'];
	}
	else{
		$mainPhoto = "/img/logo/logo3.png";
	}
	$plakonfexplode=explode(PHP_EOL,$inforow);
	foreach($plakonfexplode as $key => $value){
		if($value!=''){
			$info.="<p class='otstyp'>$value</p>";
		}
	}
?>
<main>
	<?php	include "navigation.php";?>
	<body>
	<section class='main-banner'>
        <div class='container text-center '>
            <h2><?=name('conf')." ".$yearname." ".name('year')?></h2>
        </div>
	</section>
	<section class='blog_area single-post-area blog-mar'>
        <div class='container'>
            <div class='row'>
                <div class='col-lg-12 posts-list'>
                    <div class='single-post'>
                        <div class='feature-img img__feature'>
                            <img class='card-img img_conf_detalic' src="<?=$mainPhoto?>">
                        </div>
						<div class='blog_details jojo blog_details__conf'>
							<h2 class= 'text-center'><?=$name?></h2>
              				<p class='otstyp'><?=$info?></p>
							<?php if ($playbill!=''){
							echo "<h3 class='text-center'>программа конференции</h3> 
							  		<a href='/adminPanels/".$playbill."' download ><p class='text-center'>Скачать</p></a>";
							}?>
						</div>
              		</div>
					<div class="commit">
						<?php
							feedback();
						?>
					</div>				
					<?php
						speakers();
					?>
					
				</div>
			</div>
		</div>
	</section>
	<section class='last-photo-konf'>
        <div class='container'>
			<?php video ();?>
		</div>
        <div class='container blog-insert'>
			<?php photoconf ();?>
		</div>
	</section>
	<!— Yandex.Metrika counter —>
<script type="text/javascript" >
(function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
(window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

ym(86243536, "init", {
clickmap:true,
trackLinks:true,
accurateTrackBounce:true,
webvisor:true
});
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/86243536" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!— /Yandex.Metrika counter —>
</body>
</main>
<footer>
	<?php
		include("footer.php");
	?>
</footer>
</html>