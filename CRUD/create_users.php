<?php
	include('mise_en_page.php');

	if ( !empty($_POST)) {
		// keep track validation errors
		$LOGINError = null;
		$MDPError = null;
		$NomError = null;
		$PrenomError = null;
		$grantingError = null;

		// keep track post values
		$LOGIN = $_POST['LOGIN'];
		$MDP = $_POST['MDP'];
		$Nom = $_POST['Nom'];
		$Prenom = $_POST['Prenom'];
		$granting = $_POST['granting'];

		// validate input
		$valid = true;
		if (empty($LOGIN)) {
			$LOGINError = 'Entrer le login';
			$valid = false;
		}

		if (empty($MDP)) {
			$MDPError = 'Entrer le mot de passe';
			$valid = false;
		}

		if (empty($Nom)) {
			$NomError = 'Entrer le nom';
			$valid = false;
		}

		if (empty($Prenom)) {
			$PrenomError = 'Enter le prenom';
			$valid = false;
		}

		if (empty($granting)) {
			$grantingError = 'Entrer le rôle de l\'utilisateur';
			$valid = false;
		}

		// insert data
		if ($valid) {
			$base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
			$MDP = sha1($MDP);
			$sql = 	"INSERT INTO users(Login, MDP, Nom, Prenom, Granting) VALUES ('$LOGIN', '$MDP','$Nom','$Prenom','$granting')";
			$result=mysqli_query ($base,$sql);
			if(!$result){
 							 echo("Error description: " . mysqli_error($base));
			}
			mysqli_close($base);
			header("Location: index_users.php");
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
		    			<h3>Enregistrer un nouvel utilisateur</h3>
		    		</div>

	    			<form class="form-horizontal" action="create_users.php" method="post">
					  <div class="control-group <?php echo !empty($LOGINError)?'error':'';?>">
					    <label class="control-label">LOGIN</label>
					    <div class="controls">
					      	<input name="LOGIN" type="text" placeholder="LOGIN" value="<?php echo !empty($LOGIN)?$LOGIN:'';?>">
					      	<?php if (!empty($LOGINError)): ?>
					      		<span class="help-inline"><?php echo $LOGINError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
						<form class="form-horizontal" action="create_users.php" method="post">
						<div class="control-group <?php echo !empty($MDPError)?'error':'';?>">
							<label class="control-label">Mot de passe</label>
							<div class="controls">
									<input name="MDP" type="password" placeholder="MDP" value="<?php echo !empty($MDP)?$MDP:'';?>">
									<?php if (!empty($MDPError)): ?>
										<span class="help-inline"><?php echo $MDPError;?></span>
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
						<div class="control-group <?php echo !empty($grantingError)?'error':'';?>">
					    <label class="control-label">Rôle</label>
					    <div class="controls">
					      	<input name="granting" type="text"  placeholder="granting" value="<?php echo !empty($granting)?$granting:'';?>">
					      	<?php if (!empty($grantingError)): ?>
					      		<span class="help-inline"><?php echo $grantingError;?></span>
					      	<?php endif; ?>
					    </div> <br />


					  </div>
					  <div class="form-actions" id="inline">
						  <button type="submit" class="btn btn-success">Créer</button>
							<center><a class="btn btn-primary" href="index_users.php">Retour à la page précédente</a></center>
						</div>
					</form>
				</div>
			</center>
    </div> <!-- /container -->
  </body>
</html>
