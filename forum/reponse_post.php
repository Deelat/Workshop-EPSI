<?php  
session_start();
	// Connexion à la base de données
	try
	{
		$bdd = new PDO('mysql:host=localhost:3306;dbname=workshop;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}
	$auteur = $_SESSION['nom'] . " " . $_SESSION['prenom'];
	$req = $bdd->prepare('INSERT INTO commentaire(id_topic, auteur, contenu, date_commentaire)
		VALUES
		(:id_topic, :auteur, :contenu, :date_commentaire)');
	$req->execute(array(
	'id_topic' => $_POST['id_article'],
	'auteur' => $auteur,
	'contenu' => $_POST['contenu'],
	'date_commentaire' => date("Y-m-d H:i:s")
	));

    header('Location: topic.php?article='.$_POST['id_article'].'&color='.$_POST['color'].'&name='.$_POST['name'].'');		

?>