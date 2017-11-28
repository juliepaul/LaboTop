<?php
include('mise_en_page.php');
	$N_protocole = null;

	if ( !empty($_GET['id'])) {
		$N_protocole = $_REQUEST['id'];
	}

	if ( !empty($_POST)) {
		// keep track post values
		$N_protocole = $_POST['id'];

		// delete data
		$base= mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME);
		$sql = "DELETE FROM Recherche WHERE N_protocole = '$N_protocole'";
		$result = mysqli_query ($base,$sql);
		if (!$result){
			echo("Error description: " . mysqli_error($base));
		}
		mysqli_close($base);
		header("Location: index_recherche.php");
	}
?>

<!DOCTYPE html>
<html lang="fr">
<body>
	<div class="container">
		<center>
		<div class="span10 offset1">
			<div class="row">
				<h3>Supprimer le protocole <?php echo $N_protocole;?></h3>
			</div>

			<form class="form-horizontal" action="delete_recherche.php" method="post">
				<input type="hidden" name="id" value="<?php echo $N_protocole;?>"/>
				<p class="alert alert-error">ATTENTION! La suppression est définitive<br>Confirmer la suppression du protocole ?</p>
				<div class="form-actions">
					<button type="submit" class="btn btn-danger">Confirmer</button>
					<a class="btn btn-primary" href="index_recherche.php">Annuler</a>
				</div>
			</form>
		</div>
	</center>
	</div>
</body>
</html>
