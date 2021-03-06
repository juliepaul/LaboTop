<?php
  include('mise_en_page.php');
 ?>

<!DOCTYPE html>
<html lang="fr">

<body>
    <div class="container">
    		<div class="row">
    			<h3>Listes des animaux</h3>
    		</div>
			<div class="row">
				<p>
					<a href="create_animal.php" class="btn btn-success">Créer</a>
				</p>

				<table class="table table-striped table-bordered">
		              <thead>
		                <tr>
		                  <th>Id_puce</th>
		                  <th>Espèce</th>
		                  <th>Sexe</th>
		                  <th>Age</th>
						  <th>Que voulez-vous faire?</th>
		                </tr>
		              </thead>
		              <tbody>
		              <?php
					  $base = mysqli_connect (MYHOST, MYUSER, MYPASS, DBNAME);
						if (mysqli_connect_errno()){
  								echo "Failed to connect to MySQL: " . mysqli_connect_error();
  						}
						$sql = 'SELECT * FROM Animaux';
						$result=mysqli_query ($base,$sql);


						if(!$result){
 							 echo("Error description: " . mysqli_error($base));
						}else{
							$nbcol=mysqli_num_fields($result);
							$nbmod=mysqli_num_rows($result);
							while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
						   		echo '<tr>';
							   	echo '<td>'. $row['Id_puce'] . '</td>';
							   	echo '<td>'. $row['Espece'] . '</td>';
							   	echo '<td>'. $row['Sexe'] . '</td>';
                  				echo '<td>'. $row['Age'] . '</td>';
							   	echo '<td width=227>';
							   	echo '<a class="btn btn-primary" href="read_animal.php?id='.$row['Id_puce'].'">Lire</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-success" href="update_animal.php?id='.$row['Id_puce'].'">Modifier</a>';
							   	echo '&nbsp;';
							   	echo '<a class="btn btn-danger" href="delete_animal.php?id='.$row['Id_puce'].'">Supprimer</a>';
							   	echo '</td>';
							   	echo '</tr>';
							}
						}
						mysqli_close($base);
					  ?>
				      </tbody>
	            </table>
    	</div>
    </div> <!-- /container -->
    <center><a href="./../intranet.php"><div class="btn btn-primary">Retourner à la page d'accueil</div></a></center>
    <br><br>
</body>
</html>
