<?php
	include('mise_en_page.php');

	if ( !empty($_POST)) {
		// keep track validation errors
		$Id_expError = null;
		$NomError = null;
		$PrenomError = null;
    	$SpecialiteError = null;
	    $MailError = null;

		// keep track post values
		$Id_exp = $_POST['Id_exp'];
		$Nom = $_POST['Nom'];
		$Prenom = $_POST['Prenom'];
		$Specialite = $_POST['Specialite'];
		$Mail = $_POST['Mail'];

		// validate input
		$valid = true;
		if (empty($Id_exp)) {
			$Id_expError = 'Entrer votre identifiant expérimentateur';
			$valid = false;
		}

		if (empty($Nom)) {
			$NomError = 'Entrer votre nom';
			$valid = false;
		}

		if (empty($Prenom)) {
			$PrenomError = 'Enter votre prenom';
			$valid = false;
		}

		if (empty($Specialite)) {
			$SpecialiteError = 'Entrer votre spécialité';
			$valid = false;
		}

		if (empty($Mail)) {
			$MailError = 'Entrer votre adresse mail';
			$valid = false;
		}
		else if ( !filter_var($Mail,FILTER_VALIDATE_EMAIL) ) {
			$MailError = 'Entrer une adresse mail valide';
			$valid = false;
		}

		// insert data
		if ($valid) {
			$base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
			$sql = 	"INSERT INTO Experimentateur(Id_exp, Nom, Prenom, Specialite, Mail) VALUES ('$Id_exp','$Nom','$Prenom','$Specialite','$Mail')";
			$result=mysqli_query ($base,$sql);
			if(!$result){
 							 echo("Error description: " . mysqli_error($base));
			}
			mysqli_close($base);
			header("Location: index_experimentateur.php");
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
		    			<h3>Enregistrer un nouvel experimentateur</h3>
		    		</div>

	    			<form class="form-horizontal" action="create_experimentateur.php" method="post">
					  <div class="control-group <?php echo !empty($Id_expError)?'error':'';?>">
					    <label class="control-label">Id expérimentateur</label>
					    <div class="controls">
					      	<input name="Id_exp" type="number" min="0" placeholder="Id_exp" value="<?php echo !empty($Id_exp)?$Id_exp:'';?>">
					      	<?php if (!empty($Id_expError)): ?>
					      		<span class="help-inline"><?php echo $Id_expError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($NomError)?'error':'';?>">
					    <label class="control-label">Nom</label>
					    <div class="controls">
					      	<input name="Nom" type="text" placeholder="Nom" value="<?php echo !empty($Nom)?$Nom:'';?>">
					      	<?php if (!empty($NomError)): ?>
					      		<span class="help-inline"><?php echo $NomError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($PrenomError)?'error':'';?>">
					    <label class="control-label">Prénom</label>
					    <div class="controls">
					      	<input name="Prenom" type="text"  placeholder="Prenom" value="<?php echo !empty($Prenom)?$Prenom:'';?>">
					      	<?php if (!empty($PrenomError)): ?>
					      		<span class="help-inline"><?php echo $PrenomError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
						<div class="control-group <?php echo !empty($SpecialiteError)?'error':'';?>">
					    <label class="control-label">Spécialité</label>
					    <div class="controls">
					      	<input name="Specialite" type="text"  placeholder="Specialite" value="<?php echo !empty($Specialite)?$Specialite:'';?>">
					      	<?php if (!empty($SpecialiteError)): ?>
					      		<span class="help-inline"><?php echo $SpecialiteError;?></span>
					      	<?php endif; ?>
					    </div> <br />
							<div class="control-group <?php echo !empty($MailError)?'error':'';?>">
						    <label class="control-label">Adresse mail</label>
						    <div class="controls">
						      	<input name="Mail" type="text"  placeholder="Mail" value="<?php echo !empty($Mail)?$Mail:'';?>">
						      	<?php if (!empty($MailError)): ?>
						      		<span class="help-inline"><?php echo $MailError;?></span>
						      	<?php endif; ?>
						    </div>
						  </div>

					  </div>
					  <div class="form-actions" id="inline">
						  <button type="submit" class="btn btn-success">Créer</button>
							<center><a class="btn btn-primary" href="index_experimentateur.php">Retour à la page précédente</a></center>
						</div>
					</form>
				</div>
			</center>
    </div> <!-- /container -->
  </body>
</html>
