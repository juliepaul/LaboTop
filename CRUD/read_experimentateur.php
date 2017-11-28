<?php
include('mise_en_page.php');
	$id = null;

	if ( !empty($_GET['id'])) {
		$Id_exp = $_REQUEST['id'];
	}

	if ( $Id_exp==null ) {
		header("Location: index_experimentateur.php");
	}
	else {

	  $base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
	  $sql = "SELECT * FROM Experimentateur where Id_exp = $Id_exp";
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
		    			<h3>Informations sur l'expérimentateur <?php echo $data['Id_exp'];?></h3>
		    		</div>
	    			<div class="form-horizontal" >
					  <div class="control-group">
					    <label class="control-label">Id expérimentateur</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['Id_exp'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Nom</label>
					    <div class="controls">
					      	<label class="inline_form">
						     	<?php echo $data['Nom'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Prénom</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['Prenom'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Spécialité</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['Specialite'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Adresse mail</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['Mail'];?>
						    </label>
					    </div>
					  </div>
					    <div class="form-actions">
						  <center><a class="btn btn-primary" href="index_experimentateur.php">Retour à la page précédente</a></center>
					   </div>
					</div>
				</div>
			</center>
    </div> <!-- /container -->
  </body>
</html>
