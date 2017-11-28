<?php
	include('mise_en_page.php');
	$id = null;

	if ( !empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}

	if ( $id==null ) {
		header("Location: index_recherche.php");
	}

	if ( !empty($_POST)) {
		// keep track validation errors
		$N_protocoleError = null;
		$EquipeError = null;
		$InstitutError = null;
		$Date_etudeError = null;

		// keep track post values
		$N_protocole = $_POST['N_protocole'];
		$Equipe = $_POST['Equipe'];
		$Institut = $_POST['Institut'];
		$Date_etude = $_POST['Date_etude'];

		// validate input
		$valid = true;

		if (empty($N_protocole)) {
			$N_protocoleError = 'Entrer le numéro du protocole de recherche';
			$valid = false;
		}

		if (empty($Equipe)) {
			$EquipeError = 'Entrer le nom de l\'équipe de recherche';
			$valid = false;
		}

		if (empty($Institut)) {
			$InstitutError = 'Entrer le nom de l\'institut de recherche';
			$valid = false;
		}

		if (empty($Date_etude)) {
			$Date_etudeError = 'Entrer la date de mise en application du protocole';
			$valid = false;
		}

		// update data
		if ($valid) {
			$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME);
	    	$sql = "UPDATE Recherche SET N_protocole = '$N_protocole', Equipe = '$Equipe', Institut = '$Institut', Date_etude = '$Date_etude' WHERE Id_exp = '$id'";
			$result = mysqli_query ($base,$sql);
			if(!$result){
 				echo("Error description: " . mysqli_error($base));
		  	}
			mysqli_close($base);
			header("Location: index_recherche.php");
		}
	} else {
		$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME);
		$sql = "SELECT * FROM Recherche where Id_exp = '$id'";
		$result=mysqli_query ($base,$sql);
		if(!$result){
 				echo("Error description: " . mysqli_error($base));
		}
		else {
		while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
			$N_protocole = $row['N_protocole'];
			$Equipe = $row['Equipe'];
			$Institut = $row['Institut'];
			$Date_etude = $row['Date_etude'];
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
		    			<h3>Modifier le protocole <?php echo $id;?></h3>
		    		</div>
	    			<form class="form-horizontal" action="update_recherche.php?id=<?php echo $id?>" method="post">
					  <div class="control-group <?php echo !empty($N_protocoleError)?'error':'';?>">
					    <label class="control-label">N° protocole</label>
					    <div class="controls">
					      	<input name="N_protocole" type="text"  placeholder="N_protocole" value="<?php echo !empty($N_protocole)?$N_protocole:'';?>">
					      	<?php if (!empty($N_protocoleError)): ?>
					      		<span class="help-inline"><?php echo $N_protocoleError;?></span>
					      	<?php endif; ?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($EquipeError)?'error':'';?>">
					    <label class="control-label">Equipe</label>
					    <div class="controls">
					      	<input name="Equipe" type="text" placeholder="Equipe" value="<?php echo !empty($Equipe)?$Equipe:'';?>">
					      	<?php if (!empty($EquipeError)): ?>
					      		<span class="help-inline"><?php echo $EquipeError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($InstitutError)?'error':'';?>">
					    <label class="control-label">Institut</label>
					    <div class="controls">
					      	<input name="Institut" type="text"  placeholder="Institut" value="<?php echo !empty($Institut)?$Institut:'';?>">
					      	<?php if (!empty($InstitutError)): ?>
					      		<span class="help-inline"><?php echo $InstitutError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="control-group <?php echo !empty($DateError)?'error':'';?>">
					    <label class="control-label">Date</label>
					    <div class="controls">
					      	<input name="Date_etude" type="date"  placeholder="Date_etude" value="<?php echo !empty($Date_etude)?$Date_etude:'';?>">
					      	<?php if (!empty($Date_etudeError)): ?>
					      		<span class="help-inline"><?php echo $Date_etudeError;?></span>
					      	<?php endif;?>
					    </div>
					  </div>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-success">Modifier</button>
						  <a class="btn btn-primary" href="index_recherche.php">Retour</a>
						</div>
					</form>
				</div>
			</center>
    </div> <!-- /container -->
  </body>
</html>
