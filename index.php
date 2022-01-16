<?php
include "probnik/podcl.php";
include "probnik/class.php";
?>
<!DOCTYPE html>
<html lang="ru">
  <meta charset="utf-8" />
    <?php	
	    include "connect.php";
	    include "head.php";
	    include "indexVivod.php";
    ?>
	<body>
    	<?php 
			include "navigation.php";
		?>
		<main>
    	<section class="main-banner baner" id = "aboutf">
			<div class="container text-center">
				<h1><?php echo name('title_f') ?></h1>
				<h2><?php echo name('title_s') ?></h2>
			</div>
		</section>
    	<section class="section-mgimo-linguistics">
			<div class="container">
				<div class="row">
					<div class="application">
						<div class="application_body">
							<div class="application_icon">
								<img src="/img/application/application_icon.png" alt="">
							</div>
							<div class="application_button">
								<a href = " https://forms.gle/tMsnyhTz18S3xnt26" class = "application__participation">
								<?php echo name('application_f') ?>
								</a>
								<a href = "https://forms.gle/TG3TjqcY5uMXquP78" class = "application__publication">
								<?php echo name('application_s') ?>
								</a>
							</div>
						</div>
					</div>
					<div class="text-mgimo-linguistics">
						<div class="about-ico" >
						<h2><?php echo name('title_conference')?></h2>
							<img src="img/home/section-style.png" alt="">
						</div>
						<p>
						<?php echo name('info_conference')?>
						</p>
					</div>
				</div>
			</div>
		</section>

		<section class="anons mb-5 pb-5"  id = "newconf">
 		   <div class="container">
 		     <div class="anons-title" >
			  	<h1><?php echo name('announcement_title_f')?></h1>
 		       <h1><?php echo name('announcement_title_s')?></h1>
 		       <img src="img/home/section-style.png" alt="">
 		     </div>
 		     <div class="row ">
 		       <div class="col-xl-10 offset-xl-1 ">
 		         <div class="scheduleTab">
 		             <?php 
					  	anonsDate(); 
					  ?>
 		         </div>
 		       </div>
 		     </div>
 		   </div>
 		</section>
		<section class = "contaption__anons">
			<div class="container">
				<div class="contaption__anons__body">
					<div class="contaption__title">
						<?php
							contaption__title();
						?>
					</div>
					<div class="contaption__spaeks">
						
						<?php
							contaption__spaeks();
						?>
						<div class = "contaption__link">
							<a class="button" href="#" id = "contaption__link">Читать ещё</a>
						</div>
					</div>
					<div class="contaption__keyDate">
						<?php
							contaption__keyDate();
						?>
					</div>
				</div>
				<div id="spic" class="popup spic">
					<div class="popup__body">
						<div class="popup__content speak__window">
							<a href="#" class="popup__close">X</a>
							<div class="popup__text__spaek">
								<h2 class = "popup__text__spaek__h2"></h2>
								<p class = "popup__text__spaek__p"></p>
								<p>Подробнее: <a class = "popup__text__spaek__a" href=""></a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class='orgcom' id = "orgcom">
		  	<div class='container'>
		  		<div class='orgcom-title'>
			  		<h2><?php echo name('orgcomitet')?></h2>
					<img src='img/home/section-style.png'>
				</div>
				<div class='row org-block'>
				<?php 
					orgcomitet();
				?>
				</div>
			</div>
		</section>

		<section class="section-mgimo-linguistics">
			<div class="container">
				<div class="row">
					<div class="text-mgimo-linguistics">
					<h2><?php echo name('title_faculty')?></h2>
						</br>
						<p><?php echo name('faculty_inf')?></p>
					</div>
					<div class="row mt-5 button-center">
						<div class="col-12 ">
						<a class="button mr-3 mb-2 text-center" href="<?php echo name('faculty_link')?>"><?php echo name('but_more')?></a>
						</div>
					</div>
				</div>
			</div>
		</section>
		<section class="about" id = "about">
  			<div class="container">
				<div class="about-ico" >
				<h2><?php echo name('facprog_titl')?></h2>
					<img src="img/home/section-style.png" alt="">
				</div>
  		    	<div class="row">
  		      		<div class="col-lg-6 align-self-center mb-5 mb-lg-0 block-programm">
  		        		<div class="programm" >
						  <h3><?php echo name('f_prog')?></h3>
							<div class="programm-size">
							<p class="h4 mb-3" ><?php echo name('f_prog_text')?>
							</div>
						</div>
						<div class="row mt-5">
							<div class="col-12 text-center">
								<a class="button mr-3 mb-2" href="http://pk.odin.mgimo.ru/bakalavriat/pmk.html"><?php echo name('but_more')?></a>
							</div>
						</div>
  		    		</div>	   
  		      		<div class="col-lg-6 align-self-center mb-5 mb-lg-0 block-programm">
						<div class="programm">
  		        			<h3><?php echo name('s_prog')?></h3>
							<div class="programm-size">
  		        	    		<p class="h4  mb-3" ><?php echo name('s_prog_text')?></p></div>
						</div>
						<div class="row mt-5 end__div__info">
							<div class="col-12 text-center">
								<a class="button mr-3 mb-2" href="http://pk.odin.mgimo.ru/master/pslt.html"><?php echo name('but_more')?></a>
							</div>
						</div>
  		    		</div>
  				</div>
  			</div>
  		</section>
		
		<section class='last-photo-konf'>
            <div class='container olollo'>
                <div class='last-photo-konf-title '>
                	<h2><?php echo name('last_ph')?></h2>
                	<img src='img/home/section-style.png' >
                </div>
				<div class='container blog-insert'>
                <div class='row no-gutters '>
					<?php lastPHOTO (); ?>
				</div></div>
			</div>
		</section>
		<section class='last-conf '>
			<div class='container last-conf-block '>
        		<div class='slide last-conf-block-title'>
        			<h2><?php echo name('last_conf')?></h2>
        			<div class='owl-theme owl-carousel blogCarousel pb-xl-1'>
						<?php listLASTconf (); ?>
					</div>
				</div>
			</div>
		</section>
		<section id = "contact">
			<div class="contact-banner">
				<div class="text-center cart__baner">
					<h2><?php echo name('where')?></h2>
				</div>
			</div>
			<div class="container">
				<div class="location">
				<h3><?php echo name('address')?></h3>
				<p><?php echo name('address_text')?></p>
				<h3><?php echo name('phone')?></h3>
				<p><?php echo name('phone_text')?></p>
				<?php
					echo "<iframe class='navig' src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1124.7402058766709!2d37.276506772104455!3d55.68063499655889!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54a6e50a4b7d1%3A0x473923d9854e9fa9!2z0J7QtNC40L3RhtC-0LLRgdC60LjQuSDRhNC40LvQuNCw0Lsg0JzQk9CY0JzQniDQnNCY0JQg0KDQvtGB0YHQuNC4!5e0!3m2!1sru!2sru!4v1621584194016!5m2!1s".$_SESSION["lang"]."!2sru' loading='lazy'></iframe>";
				?>
				
				
				</div>
				
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

</body>
</html>