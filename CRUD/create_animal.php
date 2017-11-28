<?php
	include('./../mise_en_page.php');

	if ( !empty($_POST)) {
		// keep track validation errors
		$Id_puceError = null;
		$EspeceError = null;
		$SexeError = null;
    $AgeError = null;

		// keep track post values
		$Id_puce = $_POST['Id_puce'];
		$Espece = $_POST['Espece'];
		$Sexe = $_POST['Sexe'];
		$Age = $_POST['Age'];

		// validate input
		$valid = true;
		if (empty($Id_puce)) {
			$Id_puceError = 'Entrer l\'identifiant de l\'animal';
			$valid = false;
		}

		if (empty($Espece)) {
			$EspeceError = 'Entrer l\'espèce de l\'animal';
			$valid = false;
		}

		if (($Sexe!=0) and ($Sexe!=1)) {
			$SexeError = 'Entrer le sexe de l\'animal';
			$valid = false;
		}

		if (empty($Age)) {
			$AgeError = 'Entrer l\'âge de l\'animal';
			$valid = false;
		}

		// insert data
		if ($valid) {
			$base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
			$sql = 	"INSERT INTO Animaux(Id_puce, Espece, Sexe, Age) VALUES ('$Id_puce','$Espece','$Sexe','$Age')";
			$result=mysqli_query ($base,$sql);
			if(!$result){
 							 echo("Error description: " . mysqli_error($base));
			}
			mysqli_close($base);
			header("Location: index_animal.php");
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
		    			<h3>Enregistrer un nouvel animal</h3>
		    		</div>

	    			<form class="form-horizontal" action="create_animal.php" method="post">
					  <div class="control-group <?php echo !empty($Id_puceError)?'error':'';?>">
					    <label class="control-label">Id puce</label>
					    <div class="controls">
					      	<input name="Id_puce" type="text"  placeholder="Id_puce" value="<?php echo !empty($Id_puce)?$Id_puce:'';?>">
					      	<?php if (!empty($Id_puceError)): ?>
					      		<span class="help-inline"><?php echo $Id_puceError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($EspeceError)?'error':'';?>">
					    <label class="control-label">Espèce</label>
					    <div class="controls">
					      	<input name="Espece" type="text" placeholder="Espece" value="<?php echo !empty($Espece)?$Espece:'';?>">
					      	<?php if (!empty($EspeceError)): ?>
					      		<span class="help-inline"><?php echo $EspeceError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($SexeError)?'error':'';?>">
					    <label class="control-label">Sexe</label>
					    <div class="controls">
					      	<input name="Sexe" type="number" min="0" max="1"  placeholder="Sexe" value="<?php echo !empty($Sexe)?$Sexe:'';?>">
					      	<?php if (!empty($SexeError)): ?>
					      		<span class="help-inline"><?php echo $SexeError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
						<div class="control-group <?php echo !empty($AgeError)?'error':'';?>">
					    <label class="control-label">Age</label>
					    <div class="controls">
					      	<input name="Age" type="text"  placeholder="Age" value="<?php echo !empty(Age)?$Age:'';?>">
					      	<?php if (!empty($AgeError)): ?>
					      		<span class="help-inline"><?php echo $AgeError;?></span>
					      	<?php endif; ?>

					  </div>
					  <div class="form-actions" id="inline">
						  <button type="submit" class="btn btn-success">Créer</button>
							<center><a class="btn btn-primary" href="index_animal.php">Retour</a></center>
						</div>
					</form>
				</div>
			</center>
    </div> <!-- /container -->
  </body>
</html>
