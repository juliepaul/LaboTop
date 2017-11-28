<?php
include('mise_en_page.php');
	$id = null;

	if ( !empty($_GET['id'])) {
		$Id_exp	 = $_REQUEST['id'];
	}

	if ( !empty($_POST)) {
		// keep track post values
		$Id_exp = $_POST['id'];

		// delete data
	    $base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
	    $sql = "DELETE FROM Experimentateur WHERE Id_exp = $Id_exp";
		$result=mysqli_query ($base,$sql);
	  if(!$result){
 			echo("Error description: " . mysqli_error($base));
	  }
	    mysqli_close($base);
		header("Location: index_experimentateur.php");

	}
?>

<!DOCTYPE html>
<html lang="fr">

<body>
    <div class="container">
			<center>
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Supprimer l'expérimentateur <?php echo $Id_exp;?> ?</h3>
		    		</div>

	    			<form class="form-horizontal" action="delete_experimentateur.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $Id_exp;?>"/>
					  <p class="alert alert-error">ATTENTION! La suppression est définitive<br>Confirmer la suppression de l'expérimentateur ?</p>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger">Confirmer</button>
						  <a class="btn btn-primary" href="index_experimentateur.php">Annuler</a>
						</div>
					</form>
				</div>
			</center>
    </div> <!-- /container -->
  </body>
</html>
