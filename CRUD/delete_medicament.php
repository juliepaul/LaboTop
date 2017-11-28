<?php
include('mise_en_page.php');
	$DCI = null;

	if ( !empty($_GET['id'])) {
		$DCI = $_REQUEST['id'];
	}

	if ( !empty($_POST)) {
		// keep track post values
		$DCI = $_POST['id'];

		// delete data
	    $base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
	    $sql = "DELETE FROM Medicaments WHERE DCI = '$DCI'";
		$result=mysqli_query ($base,$sql);
	  if(!$result){
 			echo("Error description: " . mysqli_error($base));
	  }
	    mysqli_close($base);
		header("Location: index_medicament.php");

	}
?>

<!DOCTYPE html>
<html lang="fr">

<body>
    <div class="container">
			<center>
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Supprimer le médicament <?php echo $DCI;?></h3>
		    		</div>

	    			<form class="form-horizontal" action="delete_medicament.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $DCI;?>"/>
					  <p class="alert alert-error">ATTENTION! La suppression est définitive<br>Confirmer la suppression du médicament ?</p>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger">Confirmer</button>
						  <a class="btn btn-primary" href="index_medicament.php">Annuler</a>
						</div>
					</form>
				</div>
			</center>
    </div> <!-- /container -->
  </body>
</html>
