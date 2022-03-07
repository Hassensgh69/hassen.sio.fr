<!DOCTYPE html>
<html>
<head>
	<title>Infodev</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="polereseau.css">
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
<div class="polereseau">
	<h1> Le pole reseau </h1>
	<br>
	<p>L'entreprise s'est dotée d'une équipe technique réseau (une ingénieure et 9 techniciens) susceptible d'intervenir pour l'installation et le dépannage de système d'exploitation de type Windows Server et Professionnel, Novell Netware et Linux (Red Hat, Debian). Le tableau suivant résume les compétences du pôle réseau :</p>


   <?php //La partie php qui permet de se connecter a la BDD et d'accèder au données.
				$servername = 'localhost'; //Déclaration variable pour enregistré le nom du serveur.
				$username = 'root'; //Déclaration variable pour enregistré l'username.
				$dbname= 'infodev'; //Déclaration variable pour enregistré le nom de la bdd
				$password = ''; //Déclaration variable pour enregistré le mot de passe du username
				$sql= "select CompetencePole, descriptionCompetence from pole where intitulePole = 'Réseau'"; //Commande SQL qui va nous permettre de récupérer des données précises.

				//Conexxion a la bdd avec création d'execption en cas d'erreur de connexion
				try{
					$pdo = new PDO("mysql:host=$servername;dbname=infodev", $username, $password); //Connexion via PDO 
					$stmt = $pdo->query($sql);

					//Création de l'exception avec le texte "Erreur"
					if($stmt === false){
   					 die("Erreur");
   					}	
				}catch (PDOException $e){
					die("Erreur");
				}

			?>
			<table>
				<thead>
					<!-- Création du tableau explicatif -->
					<tr> 
						<!--  Création des colonnes  -->
    					<th>Compétence</th> 
    					<th>Description</th>
  					</tr>
  				</thead>
  				<tbody>
  					<?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) : // ?>
  					<tr>
  						<!-- Je vais créer des cellules et insérer mes donnnées récupérer de BDD avec la balise <td> -->
  						<td><?php echo htmlspecialchars($row['CompetencePole']); ?></td>
  						<td><?php echo htmlspecialchars($row['descriptionCompetence']); ?> </td>
  					</tr>
  				<?php endwhile; ?>
  				</tbody>
			</table>
		</div>
</body>
</html>