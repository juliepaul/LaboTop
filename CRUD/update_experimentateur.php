<?php
	include('mise_en_page.php');
	$id = null;

	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( $id==null ) {
		header("Location: index_experimentateur.php");
	}

	if ( !empty($_POST)) {
		// keep track validation errors
		$Nom = null;
		$Prenom = null;
		$Specialite = null;
		$Mail = null;

		// keep track post values
		$Nom = $_POST['Nom'];
		$Prenom = $_POST['Prenom'];
		$Specialite = $_POST['Specialite'];
		$Mail = $_POST['Mail'];

		// validate input
		$valid = true;

		if (empty($Nom)) {
			$NomError = 'Entrer votre nom';
			$valid = false;
		}

		if (empty($Prenom)) {
			$PrenomError = 'Entrer votre prénom';
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
		else if ( !filter_var($Mail, FILTER_VALIDATE_EMAIL) ) {
			$MailError = 'Entrer une adresse mail valide';
			$valid = false;
		}

		// update data
		if ($valid) {
			$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME);
			$sql = "UPDATE Experimentateur SET Nom = '$Nom', Prenom = '$Prenom', Specialite = '$Specialite', Mail = '$Mail' WHERE Id_exp = '$id'";
			$result = mysqli_query ($base,$sql);
			if (!$result){
				echo ("Error description : " . mysqli_error($base));
			}
			mysqli_close($base);
			header ("Location: index_experimentateur.php");
			}
		} else {
			$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME);
			$sql = "SELECT * FROM Experimentateur WHERE Id_exp = '$id'";
			$result = mysqli_query($base,$sql);
			if (!$result) {
				echo ("Error description : " . mysqli_error($base));
			}
			else {
			while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
				$Nom = $row['Nom'];
				$Prenom = $row['Prenom'];
				$Specialite = $row['Specialite'];
				$Mail = $row['Mail'];
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
				<h3>Modifier l'expérimentateur <?php echo $id;?></h3>
			</div>

			<form class="form-horizontal" action="update_experimentateur.php?id=<?php echo $id?>" method="post">
				<div class="control-group <?php echo !empty($NomError)?'error':'';?>">
					<label class="control-label">Nom</label>
					<div class="controls">
						<input name="Nom" type="text" placeholder="Nom" value="<?php echo !empty($Nom)?$Nom:'';?>">
							<?php if (!empty($NomError)): ?>
								<span class="help-inline"><?php echo $NomError;?></span>
							<?php endif; ?>
					</div>
				</div>

				<div class="control group <?php echo !empty($PrenomError)?'error':'';?>">
					<label class="control-label">Prénom</label>
					<div class="controls">
					   	<input name="Prenom" type="text" placeholder="Prénom" value="<?php echo !empty($Prenom)?$Prenom:'';?>">
					     	<?php if (!empty($PrenomError)): ?>
								<span class="help-inline"><?php echo $PrenomError;?></span>
					      	<?php endif;?>
				    </div>
				</div><br>
					  <div class="control-group <?php echo !empty($SpecialiteError)?'error':'';?>">
					    <label class="control-label">Spécialité</label>
					    <div class="controls">
					      	<input name="Specialite" type="text"  placeholder="Spécialité" value="<?php echo !empty($Specialite)?$Specialite:'';?>">
					      	<?php if (!empty($SpecialiteError)): ?>
					      		<span class="help-inline"><?php echo $SpecialiteError;?></span>
					      	<?php endif;?>
						  </div>
					    </div>
					    <div class="control-group <?php echo !empty($MailError)?'error':'';?>">
					    <label class="control-label">Adresse mail</label>
					    <div class="controls">
					      	<input name="Mail" type="text"  placeholder="Adresse Mail" value="<?php echo !empty($Mail)?$Mail:'';?>">
					      	<?php if (!empty($MailError)): ?>
					      		<span class="help-inline"><?php echo $MailError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>

					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Modifier</button>
						  <a class="btn btn-primary" href="index_experimentateur.php">Retour</a>
						</div>
					</form>
				</div>
			</center>
    </div> <!-- /container -->
  </body>
</html>
