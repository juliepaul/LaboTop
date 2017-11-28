<?php
	include('mise_en_page.php');
	$id = null;

	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( $id==null ) {
		header("Location: index_users.php");
	}

	$LOGIN=$_GET["id"];
	if ( !empty($_POST)) {
		// keep track validation errors
		$Nom = null;
		$Prenom = null;
		$granting = null;

		// keep track post values
		$Nom = $_POST['Nom'];
		$Prenom = $_POST['Prenom'];
		$granting = $_POST['granting'];

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

		if (empty($granting)) {
			$grantingError = 'Entrer votre rôle';
			$valid = false;
		}

		// update data
		if ($valid) {
			$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME);
			$sql = "UPDATE users SET Nom = '$Nom', Prenom = '$Prenom', granting = '$granting' WHERE LOGIN = '$LOGIN'";
			$result = mysqli_query ($base,$sql);
			if (!$result){
				echo ("Error description : " . mysqli_error($base));
			}
			$_SESSION['granting'] = $granting;
			mysqli_close($base);
			header ("Location: index_users.php");
			}
		} else {
			$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME);
			$sql = "SELECT * FROM users WHERE LOGIN = '$LOGIN'";
			$result = mysqli_query($base,$sql);
			if (!$result) {
				echo ("Error description : " . mysqli_error($base));
			}
			else {
			while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)) {
				$Nom = $row['Nom'];
				$Prenom = $row['Prenom'];
				$Specialite = $row['granting'];
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
				<h3>Modifier l'utilisateur <?php echo $id;?></h3>
			</div>

			<form class="form-horizontal" action="update_users.php?id=<?php echo $id?>" method="post">
				<div class="control-group <?php echo !empty($NomError)?'error':'';?>">
					<label class="control-label">Nom</label>
					<div class="controls">
						<input class="form-control" name="Nom" type="text" placeholder="Nom" value="<?php echo !empty($Nom)?$Nom:'';?>">
							<?php if (!empty($NomError)): ?>
								<span class="help-inline"><?php echo $NomError;?></span>
							<?php endif; ?>
					</div>
				</div>

				<div class="control group <?php echo !empty($PrenomError)?'error':'';?>">
					<label class="control-label">Prénom</label>
					<div class="controls">
					   	<input class="form-control" name="Prenom" type="text" placeholder="Prénom" value="<?php echo !empty($Prenom)?$Prenom:'';?>">
					     	<?php if (!empty($PrenomError)): ?>
								<span class="help-inline"><?php echo $PrenomError;?></span>
					      	<?php endif;?>
				    </div>
				</div><br>
					  <div class="control-group <?php echo !empty($grantingError)?'error':'';?>">
					    <label class="control-label">Rôle</label>
					    <div class="controls">
								<select class="form-control">
									<?php
									$base2 = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME);
									$stmt = $base2->prepare("SELECT name FROM roles");
									$stmt->execute();
									$stmt->bind_result($name);
									while($stmt->fetch()){
											echo "<option value=".$name.">".$name."</option>";
									}
									?>
								 </select>
					      	<?php if (!empty($grantingError)): ?>
					      		<span class="help-inline"><?php echo $grantingError;?></span>
					      	<?php endif;?>
						  </div>
					    </div>

						<br/><br/>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Modifier</button>
						  <a class="btn btn-primary" href="index_users.php">Retour</a>
						</div>
					</form>
				</div>
			</center>
    </div> <!-- /container -->
  </body>
</html>
