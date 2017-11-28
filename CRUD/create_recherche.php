<?php
include('mise_en_page.php');

	if ( !empty($_POST)) {
		// keep track validation errors
		$Id_expError = null;
		$DCIError = null;
		$N_protocoleError = null;
		$EquipeError = null;
		$InstitutError = null;
		$Date_EtudeError = null;

		// keep track post values
		$Id_exp = $_POST['Id_exp'];
		$DCI = $_POST['DCI'];
		$N_protocole = $_POST['N_protocole'];
		$Equipe = $_POST['Equipe'];
		$Institut = $_POST['Institut'];
		$Date_etude = $_POST['Date_etude'];

		// validate input
		$valid = true;
		if (empty($Id_exp)) {
			$Id_expError = 'Entrer votre identifiant expérimentateur';
			$valid = false;
		}

		if (empty($DCI)) {
			$DCIError = 'Entrer la DCI du médicament';
			$valid = false;
		}

		if (empty($N_protocole)) {
			$N_protocoleError = 'Entrer le numéro du protocole';
			$valid = false;
		}

		if (empty($Equipe)) {
			$EquipeError = 'Entrer le nom de l\'équipe de recherche';
			$valid = false;
		}

		if (empty($Institut)) {
			$InstitutError = 'Entrer le nom de votre institut';
			$valid = false;
		}

		if (empty($Date_etude)) {
			$Date_etudeError = 'Entrer la date de mise en application du protocole';
			$valid = false;
		}

		// insert data
		if ($valid) {
			$base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME);
			$sql = "INSERT INTO Recherche (Id_exp, DCI, N_protocole, Equipe, Institut, Date_etude) VALUES ('$Id_exp','$DCI','$N_protocole','$Equipe','$Institut','$Date_etude')";
			$result = mysqli_query($base,$sql);
			if (!$result){
				echo ("Erreur : " . mysqli_error($base));
			}
			mysqli_close($base);
			header ("Location: index_recherche.php");
		}
	}
?>

<html lang="fr">

<body>
	<div class="container">
		<center>
		<div class="span10 offset1">
			<div class="row">
				<h3>Enregistrer un nouveau protocole</h3>
			</div>

			<form class="form-horizontal" action="create_recherche.php" method="post">
				<div class="control-group <?php echo !empty($Id_expError)?'error':'';?>">
					<label class="control-label">Id expérimentateur</label>
					<div class="controls">
						<input name="Id_exp" type="number" min="0" placeholder="Id_exp" value="<?php echo !empty($Id_exp)?$Id_exp:'';?>">
						<?php if (!empty(Id_expError)): ?>
							<span class="help-inline"><?php echo $Id_expError;?></span>
						<?php endif; ?>
					</div>
				</div>

				<div class="control-group <?php echo !empty($DCIError)?'error':'';?>">
					<label class="control-label">DCI</label>
					<div class="controls">
						<input name="DCI" type="text" placeholder="DCI" value="<?php echo !empty($DCI)?$DCI:'';?>">
						<?php if (!empty($DCIError)): ?>
							<span class="help-inline"><?php echo $DCIError;?></span>
						<?php endif; ?>
					</div>
				</div>

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
				      	<input name="Equipe" type="text"  placeholder="Equipe" value="<?php echo !empty(Equipe)?$Equipe:'';?>">
				      	<?php if (!empty($EquipeError)): ?>
				      		<span class="help-inline"><?php echo $EquipeError;?></span>
				      	<?php endif; ?>
				    </div>
				</div>

				<div class="control-group <?php echo !empty($InstitutError)?'error':'';?>">
				    <label class="control-label">Institut</label>
				    <div class="controls">
				      	<input name="Institut" type="text"  placeholder="Institut" value="<?php echo !empty($Institut)?$Institut:'';?>">
				      	<?php if (!empty($InstitutError)): ?>
				      		<span class="help-inline"><?php echo $InstitutError;?></span>
				      	<?php endif; ?>
				    </div>
				</div>

				<div class="control-group <?php echo !empty($Date_etudeError)?'error':'';?>">
				    <label class="control-label">Date</label>
				    <div class="controls">
				      	<input name="Date_etude" type="date"  placeholder="Date_etude" value="<?php echo !empty($Date_etude)?$Date_etude:'';?>">
				      	<?php if (!empty($Date_etudeError)): ?>
				      		<span class="help-inline"><?php echo $Date_etudeError;?></span>
				      	<?php endif; ?>
					</div>
				</div>

			</div>
			<div class="form-actions" id="inline">
				<button type="submit" class="btn btn-success">Créer</button>
				<center><a class="btn btn-primary" href="index_recherche.php">Retour à la page précédente</a></center>
			</div>
			</form>
		</div>
	</div>
</center>
</body>
</html>
