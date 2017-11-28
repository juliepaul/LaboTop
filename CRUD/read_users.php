<?php
include('mise_en_page.php');
	$id = null;

	if ( !empty($_GET['id'])) {
		$LOGIN = $_REQUEST['id'];
	}

	if ( $LOGIN==null ) {
		header("Location: index_users.php");
	}
	else {

	  $base = mysqli_connect (MYHOST, MYUSER, MYPASS,DBNAME);
	  $sql = "SELECT * FROM users where LOGIN = '$LOGIN'";
	  $result=mysqli_query ($base,$sql);
	  if(!$result){
 			echo("Error description: " . mysqli_error($base));
	  }else{
			$data=mysqli_fetch_array($result,MYSQLI_ASSOC);
		}
	  mysqli_close($base);
	}
?>

<!DOCTYPE html>
<html lang="fr">

<body>
    <div class="container">
			<center>
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Informations sur l'utilisateur <?php echo $data['LOGIN'];?></h3>
		    		</div>
	    			<div class="form-horizontal" >
					  <div class="control-group">
					    <label class="control-label">LOGIN</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['LOGIN'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Nom</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['Nom'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Prénom</label>
					    <div class="controls">
					      	<label class="checkbox">
						     	<?php echo $data['Prenom'];?>
						    </label>
					    </div>
					  </div>
					  <div class="control-group">
					    <label class="control-label">Rôle</label>
					    <div class="controls">
						    <label class="checkbox">
						     	<?php echo $data['granting'];?>
						    </label>
					    </div>
					  </div>
					    <div class="form-actions">
						  <center><a class="btn btn-primary" href="index_users.php">Retour à la page précédente</a></center>
					   </div>
					</div>
				</div>
			</center>
    </div> <!-- /container -->
  </body>
</html>
