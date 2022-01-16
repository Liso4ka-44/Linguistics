<?php
session_start();
include "probnik/podcl.php";
include "probnik/class.php";

?>
<!DOCTYPE html>
<html lang="en">
<?php
  include "head.php";
  include "connect.php";
  include "indexVivod.php";
  if($_GET["year"]){
    $_SESSION["yearr"] = $_GET["year"];
    // echo "<script> alert('".$_SESSION['lang']."')</script>";
  }
  
  
  $yearBD = mysqli_query($connect,"SELECT * FROM `years` WHERE `ID_year` =".$_SESSION["year"]);
  while(($row = mysqli_fetch_assoc($yearBD)) != false){
    $confYear = $row["year"];
}
?>

<body>
  <?php
  include "navigation.php";
  ?>
  <main>
  <section class='main-banner'>
    <div class='container text-center'>
      <h2><?=name('conf')." ".$confYear." ".name('year')?></h2>
    </div>
  </section>
  <section class="section-konf ">
      <div class="container">
        <div class="row">
          <div class="konf-size ro-konf">
                <?php
                
                  archive();
                ?>
           </div>
        </div>
      </div>
  </section>
</main>
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
<footer>
	<?php
		include("footer.php");
	?>
</footer>
</html>