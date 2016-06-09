<!DOCTYPE html> 
<?php
if (!isset($_COOKIE["log"]))
	header("Location: index.php");

$css = "style/statistiques.css";
$css2 = "style/monthly.css";
$header = "Statistiques";
include('include/header.php'); 
include('include/main.php'); 
?>

<div class="mdl-grid">
	<div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
		<div id="dual_y_div" style="max-with:50%"></div>
	</div>
	<div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">	
		<table class="responstable">
			<tbody>
				<tr>  
				<th >Statistique</th>  
				<th width="70">Valeur</th>
				</tr>
				<tr>
				<td>Nombre de formateurs inscrits</td>
				<td>33</td>
				</tr>
				<tr>
				<td>Nombre de formateurs validés</td>
				<td>28</td>
				</tr>
				<tr>
				<td>Prix moyen d'une journée de formation</td>
				<td>210 €</td>
				</tr>
				<tr>
				<td>Ratio d'actions de formations acceptées</td>
				<td>91%</td>
				</tr>
				<tr>
				<td>Nombre de participants à des actions groupées</td>
				<td>8</td>
				</tr>
				<tr>
				<td>Nombre d'actions de formations proposées</td>
				<td>12</td>
				</tr>
			</tbody>
		</table>
	</div>
	<div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">
		<div id="chart_div" style="max-with:50%"></div>
	</div>
	<div class="mdl-cell mdl-cell--6-col mdl-cell--12-col-tablet mdl-cell--12-col-phone">	
		<div id="piechart" style="max-with:50%"></div>
	</div>
</div>

<br><br><br>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {'packages':['corechart','bar']});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
	var data = google.visualization.arrayToDataTable([
	  ['Entreprise', 'Chiffre d\'affaire'],
	  ['Alstom',     11],
	  ['Itron',      2],
	  ['Meta 4',  2],
	  ['PSA', 2],
	  ['Google',    7]
	]);

	var options = {
		title: 'Chiffre d\'affaire par client (en milliers d\'euros)',
		pieSliceText:'value-and-percentage',
		backgroundColor: 'transparent',
		colors: ['rgb(48,85,122)', 'rgb(69,122,176)', 'rgb(111,154,198)', 'rgb(168,194,220)', 'rgb(199,216,233)']
	};

	var chart = new google.visualization.PieChart(document.getElementById('piechart'));
	chart.draw(data, options);
  }
</script>
<script type="text/javascript">
  google.charts.setOnLoadCallback(drawStuff);

  function drawStuff() {
	var data = new google.visualization.arrayToDataTable([
	  ['Mois', 'Individuelles', 'Groupées'],
	  ['Janvier', 7, 0],
	  ['Février', 7, 2],
	  ['Mars', 8, 1],
	  ['Avril', 6, 4],
	  ['Mai', 9, 5],
	  ['Juin', 12, 9]
	]);

	var options = {
	  colors: ['rgb(48,85,122)', 'rgb(136,0,21)'],
	  width: 500,
	  height: 500,
	  titleTextStyle: { bold: true, color: 'black' },
	  chart: { title: 'Formations par mois'},
	  backgroundColor: 'transparent'
	};
	

  var chart = new google.charts.Bar(document.getElementById('dual_y_div'));
  chart.draw(data, google.charts.Bar.convertOptions(options));

};
</script>
<script type="text/javascript">
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Mois', 'Individuelles', 'Groupées'],
		  ['Janvier', 7000, 0],
		  ['Février', 7000, 2000],
		  ['Mars', 8000, 1000],
		  ['Avril', 6000, 4000],
		  ['Mai', 9000, 5000],
		  ['Juin', 12000, 9000]
        ]);

        var options = {
          title: 'Chiffre d\'affaire par mois',
		  colors: ['rgb(48,85,122)', 'rgb(136,0,21)'],
		  titleTextStyle: { bold: true, color: 'black' },
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0},
		  width: 500,
		  height: 500,
		  areaOpacity: 0.8,
		  backgroundColor: 'transparent'
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
</script>

<?php include('include/footer.php'); ?>
