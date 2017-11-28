<?php
include('mise_en_page.php');
	$id = null;

	if ( !empty($_GET['id'])) {
		$LOGIN	 = $_REQUEST['id'];
	}

	if ( !empty($_POST)) {
		// keep track post values
		$LOGIN = $_POST['id'];

		// delete data
	    $base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
	    $sql = "DELETE  FROM users WHERE Login LIKE '$LOGIN'";
		$result=mysqli_query ($base,$sql);
	  if(!$result){
 			echo("Error description: " . mysqli_error($base));
	  }
	    mysqli_close($base);
		header("Location: index_users.php");

	}
?>

<!DOCTYPE html>
<html lang="fr">

<body>
    <div class="container">
			<center>
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Supprimer l'utilisateur <?php echo $LOGIN;?> ?</h3>
		    		</div>

	    			<form class="form-horizontal" action="delete_users.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $LOGIN;?>"/>
					  <p class="alert alert-error">ATTENTION! La suppression est définitive<br>Confirmer la suppression de l'utilisateur ?</p>
					  <div class="form-actions">
						  <button type="submit" class="btn btn-danger">Confirmer</button>
						  <a class="btn btn-primary" href="index_users.php">Annuler</a>
						</div>
					</form>
				</div>
			</center>
    </div> <!-- /container -->
  </body>
</html>
