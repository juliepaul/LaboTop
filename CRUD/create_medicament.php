<?php
include('mise_en_page.php');

	if ( !empty($_POST)) {
		// keep track validation errors
		$DCIError = null;
		$Nom_generiqueError = null;
		$Principe_actifError = null;
    	$Forme_galeniqueError = null;

		// keep track post values
		$DCI = $_POST['DCI'];
		$Nom_generique = $_POST['Nom_generique'];
		$Principe_actif = $_POST['Principe_actif'];
		$Forme_galenique = $_POST['Forme_galenique'];

		// validate input
		$valid = true;
		if (empty($DCI)) {
			$DCIError = 'Entrer la DCI du médicament';
			$valid = false;
		}

		if (empty($Nom_generique)) {
			$Nom_generiqueError = 'Entrer le nom générique du médicament';
			$valid = false;
		}

		if (empty($Principe_actif)) {
			$Principe_actifError = 'Enter le principe actif du médicament';
			$valid = false;
		}

		if (empty($Forme_galenique)) {
			$Forme_galeniqueError = 'Entrer la forme galénique du médicament';
			$valid = false;
		}

		// insert data
		if ($valid) {
			$base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
			$check = "SELECT count(*) FROM Medicaments WHERE DCI = '$DCI'";
			$CHECK = mysqli_query ($base,$check);
			if ($CHECK >= 1) {
				$DCIError = 'Cette DCI a déjà été saisie dans la base de données';
			}
			$sql = 	"INSERT INTO Medicaments(DCI, Nom_generique, Principe_actif, Forme_galenique) VALUES ('$DCI','$Nom_generique','$Principe_actif','$Forme_galenique')";
			$result=mysqli_query ($base,$sql);
			if(!$result){
 						 echo("Error description: " . mysqli_error($base));
			}
			mysqli_close($base);
			header("Location: index_medicament.php");
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
		    			<h3>Enregistrer un nouveau médicament</h3>
		    		</div>

	    			<form class="form-horizontal" action="create_medicament.php" method="post">
					  <div class="control-group <?php echo !empty($DCIError)?'error':'';?>">
					    <label class="control-label">DCI</label>
					    <div class="controls">
					      	<input name="DCI" type="text"  placeholder="DCI" value="<?php echo !empty($DCI)?$DCI:'';?>">
					      	<?php if (!empty($DCIError)): ?>
					      		<span class="help-inline"><?php echo $DCIError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($Nom_generiqueError)?'error':'';?>">
					    <label class="control-label">Nom générique</label>
					    <div class="controls">
					      	<input name="Nom_generique" type="text" placeholder="Nom_generique" value="<?php echo !empty($Nom_generique)?$Nom_generique:'';?>">
					      	<?php if (!empty($Nom_generiqueError)): ?>
					      		<span class="help-inline"><?php echo $Nom_generiqueError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($Principe_actifError)?'error':'';?>">
					    <label class="control-label">Principe actif</label>
					    <div class="controls">
					      	<input name="Principe_actif" type="text"  placeholder="Principe_actif" value="<?php echo !empty($Principe_actif)?$Principe_actif:'';?>">
					      	<?php if (!empty($Principe_actifError)): ?>
					      		<span class="help-inline"><?php echo $Principe_actifError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
						<div class="control-group <?php echo !empty($Forme_galeniqueError)?'error':'';?>">
					    <label class="control-label">Forme galénique</label>
					    <div class="controls">
					      	<input name="Forme_galenique" type="text"  placeholder="Forme_galenique" value="<?php echo !empty(Forme_galenique)?$Forme_galenique:'';?>">
					      	<?php if (!empty($Forme_galeniqueError)): ?>
					      		<span class="help-inline"><?php echo $Forme_galeniqueError;?></span>
					      	<?php endif; ?>
					     </div>
					  <div class="form-actions" id="inline">
						  <button type="submit" class="btn btn-success">Créer</button>
							<center><a class="btn btn-primary" href="index_medicament.php">Retour à la page précédente</a></center>
						</div>
					</form>
				</div>
			</center>
    </div> <!-- /container -->
  </body>
</html>
