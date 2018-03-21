<!-- Affichage des categories -->
    
    <h2>Liste des forums</h2>
    <?php
        $panel = array(
                "panel-primary",
                "panel-success",
                "panel-info",
                "panel-warning",
                "panel-danger",
        );

        $req = $bdd->query('SELECT * FROM categorie_topic');

        $i = 0;
        while ($donnees = $req->fetch())
        {
            //Nombre de topics afficher sur la page d'acceuil du forum
            $cpt = 0;
    ?>

         
                <div class="container">
<!-- Affichage des panel coloré -->
                    <div class="panel <?php echo "$panel[$i]" ?> ">
                        <div class=" group-item panel-heading" >
<!-- Affichage des categories -->
                            <p>
                            <?php echo $donnees['categorie_nom'];?>
                             <!-- <span class="badge">12</span> -->
                            </p>
<!-- Voir plus -->
                             <a class="text-right" href="<?php echo "expend_categ.php?categorie=".$donnees['id_categorie']."&color=".$panel[$i]."&name=".$donnees['categorie_nom']."" ?>"  style=" font-size: 12px; color: #99ccff; padding-left:880px">Voir Plus</a>
                        </div>
                        <div class="panel-body">
                        <?php
                            $message = $bdd->query('SELECT * FROM topic WHERE id_categorie_topic ="' .$donnees['id_categorie'].'"  ');
// Affichage des topics
                            while ($topic = $message->fetch())
                            {
                                if ($cpt != 5) 
                                {
                                
                            ?>
                                <!-- <div class="jumbotron" style="background-color:#ffffcc;"> -->

                                    <button href="#" type="button" class="btn btn-default btn-block text-left" style="text-align:left; padding-left:6px">
                                        <p class="text-primary"><?php echo $topic['nom']; ?></p>
                                        <p class="font-italic" ><small>Un sujet de: <?php echo $topic['auteur']; ?> publié le <?php echo $topic['date_creation']; ?></small></p>
                                    </button>
                                <!-- </div> -->
                            <?php
                                }
                                $cpt = $cpt + 1;
                            }
                        ?>
                        </div>
                    </div>

                </div>
        <?php 
        $i = $i + 1; 
        ?>
        <?php
    	}
          ?>
