<style>
	.settings_form {
		display: grid;
		width: 50%;
		margin: 0 auto 10px;
		grid-template-columns: 50% 50%;
	}
</style>

<div class='all_an_content'>
	<form class="settings_form" method="GET" action="analythics_cur_conf.php">
		<input type="hidden" name="ID" value="<?=$_GET['ID']?>">
		<span>Колличество точек</span><input required type="number" name="count" min='0'>
		<span>Расстояние между днями</span><input required type="number" name="distance" min="1">
		<input type="submit" name="" value="Отобразить">
	</form>
	<div id="visits_count" style="width: 100%; height: 400px;"></div>
	  <script src="https://www.gstatic.com/charts/loader.js"></script>
	  <script>
	   google.load("visualization", "1", {packages:["corechart"]});
	   google.setOnLoadCallback(drawChart);
	   function drawChart() {
	    var data_visit = google.visualization.arrayToDataTable([
	     	<?=$visit_count_params?>
	    ]);

	    var options_visit = {'title':'Диаграмма колличества просмотров'};

	    var chart1 = new google.visualization.LineChart(document.getElementById('visits_count'));

	    chart1.draw(data_visit, options_visit);
	   }
	</script>

</div>