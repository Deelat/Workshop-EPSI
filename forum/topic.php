<?php  include $_SERVER['DOCUMENT_ROOT']."/forum/navigation/header.php";?>

<!-- Connexion à la base de données -->
<?php  
	
	try
	{
		$bdd = new PDO('mysql:host=localhost:3306;dbname=workshop;charset=utf8', 'root', 'root');
	}
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}
	?>

	<main role="main" class="container">
		<div class="container" style="font-size: 21px;font-weight: 200;line-height: 2.1428571435;">


		 <div class="panel <?php echo $_GET['color']; ?> ">
			<div class=" group-item panel-heading" >
				<!-- Affichage des categories -->
                <p>
                <?php echo $_GET['name'];?>
                 <!-- <span class="badge">12</span> -->
                </p>
			</div>
				<?php
					$req = $bdd->query('SELECT * FROM topic WHERE id_topic="' .$_GET['article'].'" ');
					while ($topic = $req->fetch()) 
					{
					?>
						<p style="text-align:left; padding-left:6px" class="text-primary">
							Sujet: <?php echo $topic['nom']; ?>
						</p>
						<p class="font-italic" style="padding-left:800px; font-size: 13px" >Un sujet de: <?php echo $topic['auteur']; ?> publié le <?php echo $topic['date_creation']; ?></p>
						<div class="jumbotron">
		                <p style="font-size: 16px; text-align:left; padding-left:6px" class="text-left">
		                	<?php echo $topic['contenu'];?>
		                </p>

		                </div>
		                <?php  
		                	
		                	$reponse = $bdd->query('SELECT * FROM commentaire WHERE id_topic ="' .$_GET['article'].'" ');
		                	while ($commentaire = $reponse->fetch()) 
		                	{
		                		?>
					                <div class="jumbotron">
					                	<p style="padding-left:800px; font-size: 13px">De <?php echo $commentaire['auteur'];?> le <?php echo $commentaire['date_commentaire'];?></p>
					                	<p style="font-size: 16px"><?php echo $commentaire['contenu'];?></p>
					                </div>
		                	<?php
		                	}
		                ?>
					<?php
					}		  
				?>
		</div>
		<div class="panel-group">
	    <div class="panel panel-default">
	      <div class="panel-heading">
	      	<form method="post" action="reponse_post.php">
			      <div class="panel-body">
	      			<h3>Répondre</h3>

		      		 <div class="form-group">
						  <label for="contenu">Contenu de votre réponse:</label>
						  <!-- Passage des variables $_get -->
							<input type="hidden" value="<?php echo $_GET['article']?>" name="id_article" /> 
							<input type="hidden" value="<?php echo $_GET['color']?>" name="color" /> 
							<input type="hidden" value="<?php echo $_GET['name']?>" name="name" /> 

						  <textarea class="form-control" rows="5" id="contenu" name="contenu"></textarea>
					</div>
			    </div>
	      		 <button type="submit" class="btn btn-default">Répondre</button>
	      	</form>
		</div>
	</main>

<?php  include $_SERVER['DOCUMENT_ROOT']."/forum/navigation/footer.php";?>