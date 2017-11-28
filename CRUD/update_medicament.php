<?php
	include('mise_en_page.php');
	$id = null;

	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( $id==null ) {
		header("Location: index_medicament.php");
	}

	if ( !empty($_POST)) {
		// keep track validation errors
		$Nom_generiqueError = null;
		$Principe_actifError = null;
		$Forme_galeniqueError = null;

		// keep track post values
		$Nom_generique = $_POST['Nom_generique'];
		$Principe_actif = $_POST['Principe_actif'];
		$Forme_galenique = $_POST['Forme_galenique'];

		// validate input
		$valid = true;

		if (empty($Nom_generique)) {
			$Nom_generiqueError = 'Entrer le nom générique du médicament';
			$valid = false;
		}

		if (empty($Principe_actif)) {
			$Principe_actifError = 'Entrer le principe actif du médicament';
			$valid = false;
		}

		if (empty($Forme_galenique)) {
			$Forme_galeniqueError = 'Entrer la forme galénique du médicament';
			$valid = false;
		}


		// update data
		if ($valid) {
			$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME);
	    	$sql = "UPDATE Medicaments SET Nom_generique = '$Nom_generique', Principe_actif = '$Principe_actif', Forme_galenique = '$Forme_galenique' WHERE DCI = '$id'";
			$result=mysqli_query ($base,$sql);
			if(!$result){
 				echo("Error description: " . mysqli_error($base));
		  	}
			mysqli_close($base);
			header("Location: index_medicament.php");
		}
	} else {
		$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME);
	    $sql = "SELECT * FROM Medicaments where DCI = '$id'";
		$result=mysqli_query ($base,$sql);
		if(!$result){
 				echo("Error description: " . mysqli_error($base));
		}
		else {
		while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$Nom_generique = $row['Nom_generique'];
			$Principe_actif = $row['Principe_actif'];
			$Forme_galenique = $row['Forme_galenique'];
			mysqli_close($base);
		}
		}
	}
?>

<!DOCTYPE html>
<html lang="fr">

<body>
    <div class="container">
			<center>
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Modifier le médicament <?php echo $id;?></h3>
		    		</div>

	    			<form class="form-horizontal" action="update_medicament.php?id=<?php echo $id?>" method="post"> <!-- id ou DCI?? -->
					  <div class="control-group <?php echo !empty($Nom_generiqueError)?'error':'';?>">
					    <label class="control-label">Nom générique</label>
					    <div class="controls">
					      	<input name="Nom_generique" type="text"  placeholder="Nom_generique" value="<?php echo !empty($Nom_generique)?$Nom_generique:'';?>">
					      	<?php if (!empty($Nom_generiqueError)): ?>
					      		<span class="help-inline"><?php echo $Nom_generiqueError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($Principe_actifError)?'error':'';?>">
					    <label class="control-label">Principe actif</label>
					    <div class="controls">
					      	<input name="Principe_actif" type="text" placeholder="Principe_actif" value="<?php echo !empty($Principe_actif)?$Principe_actif:'';?>">
					      	<?php if (!empty($Principe_actifError)): ?>
					      		<span class="help-inline"><?php echo $Principe_actifError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($Forme_galeniqueError)?'error':'';?>">
					    <label class="control-label">Forme galénique</label>
					    <div class="controls">
					      	<input name="Forme_galenique" type="text"  placeholder="Forme galénique" value="<?php echo !empty($Forme_galenique)?$Forme_galenique:'';?>">
					      	<?php if (!empty($Forme_galeniqueError)): ?>
					      		<span class="help-inline"><?php echo $Forme_galeniqueError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Modifier</button>
						  <a class="btn btn-primary" href="index_medicament.php">Retour</a>
						</div>
					</form>
				</div>
			</center>
    </div> <!-- /container -->
  </body>
</html>
