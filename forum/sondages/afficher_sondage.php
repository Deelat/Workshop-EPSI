<?php
$id_sondage = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

$link = mysqli_connect('localhost', 'root', 'rootroot', 'workshop');

$req = "SELECT * FROM sondage WHERE id_sondage = ".$id_sondage;
$res = mysqli_query($link, $req);

$sondage = mysqli_fetch_row($res);

$req_option = "SELECT id_optn, choix, nb_votes FROM optn_sondage WHERE id_sondage = ".$id_sondage;
$result = mysqli_query($link, $req_option);

if (mysqli_errno($link)) {
  die(mysqli_error($link));
}

$option = mysqli_fetch_all($result, MYSQLI_ASSOC);

 ?>
 <link rel="stylesheet" href="../../css/bootstrap.min.css">


 <form class="form-group" method="post" action="vote_sondage.php">
   <p><?php echo $sondage[3]; ?></p>
   <?php foreach ($option as $value) { ?>
     <div class="form-check">
     <?php if ($sondage[1] == 'choixUnique'){ ?>
       <input class="form-check-input" type="radio" value=<?php echo $value['id_optn'];?> name="id_option" id="choixSondage">
     <?php } ?>
     <?php if ($sondage[1] == 'choixMult'){ ?>
       <input class="form-check-input" type="checkbox" value=<?php echo $value['id_optn'];?> name="id_option" id="choixSondage">
     <?php } ?>
     <label for="choixSondage" class="form-check-label"><?php echo $value['choix'];?></label>
   </div>
   <?php } ?>
   <input value=<?php echo $sondage[0];?> name="id_sondage" hidden>
   <br>
   <button class="btn btn-primary" type="submit">Voter</button>
 </form>
