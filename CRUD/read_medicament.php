<?php
include('mise_en_page.php');
	$id = null;

	if ( !empty($_GET['id'])) {
		$DCI = $_REQUEST['id'];
	}

	if ( $DCI==null ) {
		header("Location: index_medicament.php");
	} else {

	  $base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
	  $sql = "SELECT * FROM Medicaments WHERE DCI = '$DCI'";
	  $result=mysqli_query ($base,$sql);
	  if(!$result){
 			echo("Error description: " . mysqli_error($base));
	  }
	  $data=mysqli_fetch_array($result,MYSQLI_ASSOC);
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
		    			<h3>Informations sur <?php echo $data['DCI'];?></h3>
		    		</div>
	    			<div class="form-horizontal" >
					  <div class="control-group">
					    <label class="control-label">DCI</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['DCI'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Nom générique</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['Nom_generique'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Principe actif</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['Principe_actif'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Forme galénique</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['Forme_galenique'];?>
						    </label>
					    </div>
					  </div>
					    <div class="form-actions">
						  <center><a class="btn btn-primary" href="index_medicament.php">Retour à la page précédente</a></center>
					   </div>
					</div>
				</div>
			</center>
    </div> <!-- /container -->
  </body>
</html>
