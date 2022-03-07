<!DOCTYPE html>
<html>
<head>
	<title>Infodev</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="poledeveloppement.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<header></header>
  <ul>
  <li><a href="infodev.php">Accueil</a></li>
    <li><a href="Presentation.php">Presentation</a></li>
  <li><a href="polereseau.php">Le pole reseau</a></li>
  <li><a href="poledeveloppement.php">Le pole developpement</a></li>
  <li><a href="contact.php">Nous contacter</a></li>
  <li style="float:right"><a class="active" href="Mention.php">Mention legal</a></li>
</ul>
<div class="poledeveloppement">
	<h1> Le pole developpement </h1>
	<br>
	<p> L'entreprise dispose d'une équipe de développeurs (un ingénieur et 6 développeurs) chargée de développer de nouvelles applications ou de proposer des progiciels. Le tableau suivant résume les compétences du pôle développement :</p>
	
<?php 
				$servername = 'localhost'; 
				$username = 'root'; 
				$dbname= 'infodev'; 
				$password = ''; 
				$sql= "select CompetencePole, descriptionCompetence from pole where intitulePole = 'développement'";
				try{
					$pdo = new PDO("mysql:host=$servername;dbname=infodev", $username, $password); //Connexion via PDO 
					$stmt = $pdo->query($sql);

					
					if($stmt === false){
   					 die("Erreur");
   					}	
				}catch (PDOException $e){
					die("Erreur");
				}

			?>
			<table>
				<thead>
					
					<tr> 
						
    					<th>Compétence</th> 
    					<th>Description</th>
  					</tr>
  				</thead>
  				<tbody>
  					<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : // ?>
  					<tr>
  					
  						<td><?php echo htmlspecialchars($row['CompetencePole']); ?></td>
  						<td><?php echo htmlspecialchars($row['descriptionCompetence']); ?> </td>
  					</tr>
  				<?php endwhile; ?>
  				</tbody>
			</table>
		</div></body>
</html>