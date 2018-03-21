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
	<div class="container">
	<!-- Affichage des panel coloré -->
	    <div class="panel <?php echo $_GET['color']; ?> ">
	        <div class=" group-item panel-heading" >
	        	<!-- Affichage des categories -->
                            <p>
                            <?php echo $_GET['name'];?>
                             <!-- <span class="badge">12</span> -->
                            </p>
	        	<?php
                            $message = $bdd->query('SELECT * FROM topic WHERE id_categorie_topic ="' .$_GET['categorie'].'"  ');
// Affichage des topics
                            while ($topic = $message->fetch())
                            {
                            ?>
	                            <button href="#" type="button" class="btn btn-default btn-block text-left" style="text-align:left; padding-left:6px">
	                                        <p class="text-primary"><?php echo $topic['nom']; ?></p>
	                                        <p class="font-italic" ><small>Un sujet de: <?php echo $topic['auteur']; ?> publié le <?php echo $topic['date_creation']; ?></small></p>
	                            </button>
	                            <?php
	                            }
	                        ?>
	        </div>
	    </div>
	</div>
</div>

<?php  include $_SERVER['DOCUMENT_ROOT']."/forum/navigation/footer.php";?>