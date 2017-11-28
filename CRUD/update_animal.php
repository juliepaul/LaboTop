<?php
	include('mise_en_page.php');
	$id = null;

	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( $id==null ) {
		header("Location: index_animal.php");
	}

	if ( !empty($_POST)) {
		// keep track validation errors
		$EspeceError = null;
		$SexeError = null;
		$AgeError = null;

		// keep track post values
		$Espece = $_POST['Espece'];
		$Sexe = $_POST['Sexe'];
		$Age = $_POST['Age'];

		// validate input
		$valid = true;

		if (empty($Espece)) {
			$EspeceError = 'Entrer le nom d\'espèce de l\'animal';
			$valid = false;
		}

		if (empty($Sexe)) {
			$SexeError = 'Entrer le sexe de l\'animal';
			$valid = false;
		}

		if (empty($Age)) {
			$AgeError = 'Entrer l\'âge de l\'animal';
			$valid = false;
		}


		// update data
		if ($valid) {
			$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME);
	    	$sql = "UPDATE Animaux SET Espece = '$Espece', Sexe = '$Sexe', Age = '$Age' WHERE Id_puce = '$id'";
			$result=mysqli_query ($base,$sql);
			if(!$result){
 				echo("Error description: " . mysqli_error($base));
		  	}
			mysqli_close($base);
			header("Location: index_animal.php");
		}
	} else {
		$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME);
	    $sql = "SELECT * FROM Animaux where Id_puce = '$id'";
		$result=mysqli_query ($base,$sql);
		if(!$result){
 				echo("Error description: " . mysqli_error($base));
		}
		else {
		while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$Espece = $row['Espece'];
			$Sexe = $row['Sexe'];
			$Age = $row['Age'];
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
		    			<h3>Modifier l'animal <?php echo $id;?></h3>
		    		</div>

	    			<form class="form-horizontal" action="update_animal.php?id=<?php echo $id?>" method="post">
					  <div class="control-group <?php echo !empty($EspeceError)?'error':'';?>">
					    <label class="control-label">Espèce</label>
					    <div class="controls">
					      	<input name="Espece" type="text"  placeholder="Espece" value="<?php echo !empty($Espece)?$Espece:'';?>">
					      	<?php if (!empty($EspeceError)): ?>
					      		<span class="help-inline"><?php echo $EspeceError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($SexeError)?'error':'';?>">
					    <label class="control-label">Sexe</label>
					    <div class="controls">
					      	<input name="Sexe" type="number" min="0" max="1" placeholder="Sexe" value="<?php echo !empty($Sexe)?$Sexe:'';?>">
					      	<?php if (!empty($SexeError)): ?>
					      		<span class="help-inline"><?php echo $SexeError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($AgeError)?'error':'';?>">
					    <label class="control-label">Age</label>
					    <div class="controls">
					      	<input name="Age" type="text"  placeholder="Age" value="<?php echo !empty($Age)?$Age:'';?>">
					      	<?php if (!empty($AgeError)): ?>
					      		<span class="help-inline"><?php echo $AgeError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Modifier</button>
						  <a class="btn btn-primary" href="index_animal.php">Retour</a>
						</div>
					</form>
				</div>
			</center>
    </div>
  </body>
</html>
