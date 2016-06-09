<!DOCTYPE html> 
<?php
    if (!isset($_COOKIE["log"]))
  	  header("Location: index.php");

	$css = "style/monthly.css"; 
	$header = "Accueil"; 
	include('include/header.php'); 
	include('include/main.php'); 
?>


<main class="mdl-layout__content">
  <div class="mdl-grid demo-content">
      <h3>Planning</h3>
      
      <div class="mdl-shadow--2dp mdl-cell mdl-cell--12-col mdl-grid" >
  		    <div class="monthly" id="mycalendar"></div>
  	  </div>
      <h3>Gérer ses formations</h3>
      <?php
        // récupération des formations
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpassword = $_SERVER['SERVER_NAME'] == 'gagf.mypix.ovh' ? 'Sq$pcA9e!!' : 'root';
        $dbname = 'gagf' ;
      
        $bdd = new PDO("mysql:host=$dbhost;dbname=$dbname", "$dbuser", "$dbpassword");
        $sql = "SELECT A.FORMATION_INTITULE, B.FD_DATE_DEBUT, B.FD_DATE_FIN FROM FORMATION A INNER JOIN FORMATION_DATE B ON A.FORMATION_ID = B.FD_FORMATION";
        foreach  ($bdd->query($sql) as $row) {
          print $row[0] . "\t";
          print  $row[1] . "\t";
          print $row[2] . "<br/>";
        }

      ?>
  </div>
</main>

<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/monthly.js"></script>
<script type="text/javascript">
<<<<<<< Updated upstream
	$(window).load( function() {
		$('#mycalendar').monthly();
	});
</script>
<script>
    $(window).load( function() {
        $('#mycalendar').monthly({
          mode: 'event',
          xmlUrl: 'events.xml'
        });
    });
</script>




<?php include('include/footer.php'); ?>