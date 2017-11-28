<?php
include('mise_en_page.php');

	$Id_puce = null;

	if ( !empty($_GET['id'])) {
		$Id_puce = $_REQUEST['id'];
	}

	if ( !empty($_POST)) {
		// keep track post values
		$Id_puce = $_POST['id'];

		// delete data
	    $base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
	    $sql = "DELETE FROM Animaux WHERE Id_puce = '$Id_puce'";
		$result=mysqli_query ($base,$sql);
	  if(!$result){
 			echo("Error description: " . mysqli_error($base));
	  }
	    mysqli_close($base);
		header("Location: index_animal.php");
	}
?>

<!DOCTYPE html>
<html lang="fr">

<body>
    <div class="container">
				<center>
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Supprimer l'animal <?php echo $Id_puce;?></h3>
		    		</div>

	    			<form class="form-horizontal" action="delete_animal.php" method="post">
	    			  <input type="hidden" name="id" value="<?php echo $Id_puce;?>"/>
					  <p class="alert alert-error">ATTENTION ! La suppression est définitive<br>Confirmer la suppression du médicament ?</p>

						<div class="form-actions" id="inline">
						  <button type="submit" class="btn btn-danger">Confirmer</button>
						  <a class="btn btn-primary" href="index_animal.php">Annuler</a>
						</div>
					</form>
				</center>
				</div>

    </div>
  </body>
</html>
