<?php  
	
	
	// Connexion à la base de données
	try
	{
		$bdd = new PDO('mysql:host=localhost:3306;dbname=workshop;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}

	$auteur = $_SESSION['nom'] + $_SESSION['prenom'];
	$req = $bdd->prepare('SELECT id_categorie FROM categorie_topic WHERE categorie_nom = :categorie');
	$req->execute(array(
		'categorie' => $_POST['categorie']
	));
	while($donnees = $req->fetch())
	{
		$id_categorie =  $donnees['id_categorie'];
	}
	// Demarage de la session

			$insert = $bdd->prepare('INSERT INTO topic(nom, auteur,contenu, date_creation, id_categorie_topic)
				VALUES 
				(:nom, :auteur, :contenu, :date_creation, :categorie)');
			$insert->execute(array(
			'nom' => $_POST['sujet'],
			'auteur' => $auteur,
			'contenu' => $_POST['contenu'],
			'date_creation' => date("Y-m-d H:i:s"),
			'categorie' => $id_categorie
			));
	
	header('Location: forum.php');

?>

