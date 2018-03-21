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
				$bdd = new PDO('mysql:host=localhost:3306;dbname=**********;charset=utf8', 'root', 'root');
			}
			catch(Exception $e)
			{
			        die('Erreur : '.$e->getMessage());
			}

			// Demarage de la session
			
			$req = $bdd->prepare('SELECT id, nom, prenom, email, date_inscription, pass, ban FROM membres WHERE email = :email');
			$req->execute(array(
				'email' => $email ));
			
			while($donnees = $req->fetch())
			{


				if ($donnees['ban'] == 1)
				{
					echo "Impossible de vous connecter vous avez été bloqué";
					exit();
				}
				// Verrification du mot de passe

				$hash = $donnees['pass'];

				if (password_verify($pass, $hash))
				{
					// Démarage de la session

				    
				    $_SESSION['id'] = $donnees['id'];
				    $_SESSION['nom'] = $donnees['nom'];
				    $_SESSION['prenom'] = $donnees['prenom'];
				    $_SESSION['email'] = $donnees['email'];
				    $_SESSION['date'] = $donnees['date_inscription'];

					header('Location: /Base/site/compte/compte.php');
					exit();
				}
				else
				{
					header('Location: /Base/site/connexion/error/connexion_mdperror.php');
					exit();
				}
			}
		}
	// Redirection vers connexion_error
	else
	{
		header('Location: /Base/site/connexion/error/connexion_videerror.php');
		exit();
	}
		


?>