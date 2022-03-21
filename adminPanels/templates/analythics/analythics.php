<style>
	.an_table {
		border-collapse: collapse;
		width: 100%;
	}
	.an_table tr {

	}
	.an_table td {
		padding: 2px 10px;
	}
	.all_an_content {
		width: 80%;
		margin: 0 auto;

	}
	.set_date_form {
		width: 30%;
		margin: 0 auto;
	}
	.set_date_form * {
		margin-bottom: 5px;
	}
	.date_set {
		text-align: center;
	}
	.set_date_dorm__dates {
		display: grid;
		grid-template-columns: 50% 50%;
	}
</style>

<div class='all_an_content'>
	<div class='date_set'>
		<h3>Отобразить данные</h3><br>
		<form class='set_date_form' method="GET" action="analythics.php">
			<div class='set_date_dorm__dates'>
				<span>С: </span>
				<input type="date" name="date_from" value='<?=$date_from?>'>
				<span>По: </span>
				<input type="date" name="date_to" value='<?=$date_to?>'>
			</div>
			<input type="submit" value="Отобразить">
		</form>
	</div>
	<table class='an_table' border="1">
		<tr>
			<th>Имя конференции</th>
			<th>Средняя оценка</th>
			<th>Колличество оценок</th>
			<th>Просмотры конференции</th>
		</tr>
		<?=$an_rows?>
	</table>

	 <div id="visits_count" style="width: 100%; height: 400px;"></div>
	 <div id="rates_count" style="width: 100%; height: 400px;"></div>
	 <div id="mid_rate" style="width: 100%; height: 400px;"></div>

	  <script src="https://www.gstatic.com/charts/loader.js"></script>
	  <script>
	   google.load("visualization", "1", {packages:["corechart"]});
	   google.setOnLoadCallback(drawChart);
	   function drawChart() {
	    var data_visit = google.visualization.arrayToDataTable([
	     	<?=$visit_count_params?>
	    ]);

	   var data_rates = google.visualization.arrayToDataTable([
	     	<?=$rates_count_params?>
	    ]);

	    var data_mid_rate = google.visualization.arrayToDataTable([
	   	 	<?=$mid_rate_params?>
	    ]);

	    var options_visit = {'title':'Диаграмма колличества просмотров'};
	    var options_rates = {'title':'Диаграмма колличества оценок'};
	    var options_mid_rate = {'title':'Диаграмма средняя оценка'};

	    var chart1 = new google.visualization.ColumnChart(document.getElementById('visits_count'));
	    var chart2 = new google.visualization.ColumnChart(document.getElementById('rates_count'));
	    var chart3 = new google.visualization.ColumnChart(document.getElementById('mid_rate'));
	    chart1.draw(data_visit, options_visit);
	    chart2.draw(data_rates, options_rates);
	    chart3.draw(data_mid_rate, options_mid_rate);
	   }
	  </script>

</div>