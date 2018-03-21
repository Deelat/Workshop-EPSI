<?php  include $_SERVER['DOCUMENT_ROOT']."/forum/navigation/header.php";?>
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
	?>

<div class="jumbotron">
<main role="main" class="container">

    
    	<br>

      <div class="container">
  
        <!-- Formulaire -->

        <h2>Forum</h2>
        <h4>Rajoutez un topic</h4>
        <br>
        <form method="post" action="forum_post.php">
	    	<div class="form-group">
	        	<label for="sujet">Sujet:</label>
	        	<input type="sujet" class="form-control" id="sujet" placeholder="Entrez le titre de votre topic" name="sujet">
	    	</div>
	    	<div class="form-group">
				<label for="sel1">Categorie :</label>
				<select class="form-control" id="categorie" name="categorie">
					<?php 
						$req = $bdd->query('SELECT * FROM categorie_topic');
    					while ($donnes = $req->fetch())
    					{
    				?>
    						<option><?php echo $donnes['categorie_nom'] ?></option>

    						<?php
    					}
					 ?>
				</select>
			</div>

          	<div class="form-group">
			  <label for="contenu">Contenu de votre topic:</label>
			  <textarea class="form-control" rows="5" id="contenu" name="contenu"></textarea>
			</div>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
        <br><br>
      </div>

      <div class="container">

		<?php 
		include $_SERVER['DOCUMENT_ROOT']."/forum/categories.php";?>
        
      </div>
    </div>
    </main>
   
</main>

<?php  include $_SERVER['DOCUMENT_ROOT']."/forum/navigation/footer.php";?>
<?php  