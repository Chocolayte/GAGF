<!DOCTYPE html> 
<?php
  if (!isset($_COOKIE["log"]))
	header("Location: index.php");

	$css = "style/monthly.css"; 
	include('include/header.php'); 
	include('include/main.php'); 
?>

<div class="mdl-grid demo-content">
    <div class="demo-charts mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" >
		<div class="monthly" id="mycalendar"></div>
	</div>
</div>

<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/monthly.js"></script>
<script type="text/javascript">
	$(window).load( function() {
		$('#mycalendar').monthly();
	});
</script>

<?php include('include/footer.php'); ?>
