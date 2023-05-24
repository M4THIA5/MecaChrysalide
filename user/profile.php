<?php 
session_start();
require('../core/functions.php');
require('../conf.inc.php');
include('../template/head.php');
include('../template/navbar.php');
redirectIfNotConnected();
?>

<h1> MON PROFILE </h1>

<?php

	$connect = connectDB();
	$queryPrepared = $connect->prepare("SELECT id, nom, prenom, email, anniversaire, telephone, dateInscription FROM ".DB_PREFIX."utilisateur WHERE email=:email" );
    $queryPrepared->execute(["email"=>$_SESSION["email"]]);
	$myUser = $queryPrepared->fetchAll();
?>

<table class="table">
		<thead>
			<tr>
				<th>Id</th>
				<th>Prénom</th>
				<th>Nom</th>
				<th>Email</th>
				<th>Date de naissance</th>
                <th>Téléphone</th>
				<th>Date d'inscription</th>
			</tr>
		</thead>
		<tbody>
		<?php

			foreach($myUser as $profile){
				echo "<tr>";

				echo "<td>".$profile["id"]."</td>";
				echo "<td>".$profile["prenom"]."</td>";
				echo "<td>".$profile["nom"]."</td>";
				echo "<td>".$profile["email"]."</td>";
				echo "<td>".$profile["anniversaire"]."</td>";
				if(empty($profile["telephone"])){
					echo "<td> Ajouter un numéro de téléphone </td>";
				}else{
					echo "<td>".$profile["telephone"]."</td>";
				}
				echo "<td>".$profile["dateInscription"]."</td>";

				echo "</tr>";
			}
		?>
		</tbody>
	</table>

	<a class="btn btn-primary" href="profileModify.php" role="button">Modifier le compte</a>

<?php include('../template/footer.php'); ?>