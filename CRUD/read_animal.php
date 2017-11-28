<?php
	include('mise_en_page.php');
	$id = null;

	if ( !empty($_GET['id'])) {
		$Id_puce = $_REQUEST['id'];
	}

	if ( $Id_puce==null ) {
		header("Location: index_animal.php");
	}
	else {

	  $base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
	  $sql = "SELECT * FROM Animaux where Id_puce = '$Id_puce'";
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
    <div class="container-fluid">
			<center>
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Informations sur l'animal <?php echo $data['Id_puce'];?></h3>
		    		</div>
	    			<div class="form-horizontal" >
					  <div class="control-group">
					    <label class="control-label">Id puce</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['Id_puce'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Espèce</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['Espece'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Sexe</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['Sexe'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Age</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['Age'];?>
						    </label>
					    </div>
					  </div>
					    <div class="form-actions">
						  <center><a class="btn btn-primary" href="index_animal.php">Retour à la page précédente</a></center>
					   </div>
					</div>
				</div>
			</center>
    </div> <!-- /container -->
  </body>
</html>
