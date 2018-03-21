<?php
			// Affichage des topics
			$req = $bdd->query('SELECT * FROM topic');

			while ($donnees = $req->fetch())
			{
	?>
				<p>
					<button type="button" class="btn btn-primary btn-block">
						<?php echo $donnees['nom']; ?>
						<?php echo " de "?>
						<?php echo $donnees['auteur']; ?>
					</button>
					<p>
						<?php echo $donnees['contenu']; ?>
					</p>
				</p><?php
			}

?>