<?php
session_start();

	// Verfier que les champs ne soit pas vides
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
	if (!is_null('email') && !is_null($_POST['pswd']))
	{
		
			$pass = $_POST['pswd'];
				
			// Connexion à la base de données

			try
			{
				$bdd = new PDO('mysql:host=localhost:3306;dbname=workshop;charset=utf8', 'root', 'root');
			}
			catch(Exception $e)
			{
			        die('Erreur : '.$e->getMessage());
			}

			// Demarage de la session
			
			$req = $bdd->prepare('SELECT * FROM eleves WHERE mail = :email');
			$req->execute(array(
				'email' => $email ));
			
			while($donnees = $req->fetch())
			{

				// Verrification du mot de passe

				$pass = sha1($pass);

				if ($pass == $donnees['mdp'])
				{
					// Démarage de la session

				    
				    $_SESSION['id'] = $donnees['id_eleve'];
				    $_SESSION['nom'] = $donnees['nom'];
				    $_SESSION['prenom'] = $donnees['prenom'];
				    $_SESSION['email'] = $donnees['mail'];
				    $_SESSION['annee'] = $donnees['annee'];
				    $_SESSION['ecole'] = $donnees['ecole'];
				    $_SESSION['naissance'] = $donnees['ddn'];

					header('Location: /forum/forum.php');
					exit();
				}
				else
				{
					header('Location: login.php');
					exit();
				}
			}
		}
	// Redirection vers connexion_error
	else
	{
		header('Location: login.php');
		exit();
	}
		


?>