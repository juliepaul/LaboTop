<?php
include('mise_en_page.php');
	$id = null;

	if ( !empty($_GET['id'])) {
		$N_protocole = $_REQUEST['id'];
	}

	if ( $N_protocole==null ) {
		header("Location: index_recherche.php");
	} else {

	  $base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
	  $sql = "SELECT * FROM Recherche where N_protocole = '$N_protocole'";
	  $result=mysqli_query ($base,$sql);
	  if(!$result){
 			echo("Error description: " . mysqli_error($base));
	  }
	  $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
	  mysqli_close($base);
	}
?>

<!DOCTYPE html>
<html lang="fr">

<body>
    <div class="container">
			<center>
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Informations protocole <?php echo $row['N_protocole'];?></h3>
		    		</div>
	    			<div class="form-horizontal" >
					  <div class="control-group">
					  <div class="control-group">
					    <label class="control-label">N° protocole</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $row['N_protocole'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Equipe</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $row['Equipe'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Institut</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $row['Institut'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Date</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $row['Date_etude'];?>
						    </label>
					    </div>
					  </div>
					    <div class="form-actions">
						  <center><a class="btn btn-primary" href="index_recherche.php">Retour à la page précédente</a></center>
					   </div>
					</div>
				</div>
			</center>
    </div> <!-- /container -->
  </body>
</html>
