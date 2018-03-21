<?php
$id_sondage = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

$link = mysqli_connect('localhost', 'root', 'rootroot', 'workshop');

$req = "SELECT * FROM sondage WHERE id_sondage = ".$id_sondage;
$res = mysqli_query($link, $req);

$sondage = mysqli_fetch_row($res);

$req_option = "SELECT choix, nb_votes FROM optn_sondage WHERE id_sondage = ".$id_sondage;
$result = mysqli_query($link, $req_option);

if (mysqli_errno($link)) {
  die(mysqli_error($link));
}

$option = mysqli_fetch_all($result, MYSQLI_ASSOC);

 ?>
 <link rel="stylesheet" href="../../css/bootstrap.min.css">

 <form class="form-group" method=post action=vote_sondage.php>
   <p><?php echo $sondage[3]; ?></p>
   <?php foreach ($option as $value) { ?>
     <div class="form-check">
     <?php if ($sondage[1] == 'choixUnique'){ ?>

       <input class="form-check-input" type="radio" name="choixSondage" id="choixSondage">
     <?php } ?>
     <?php if ($sondage[1] == 'choixMult'){ ?>
       <input type=checkbox, class=form-check-input, name=choixSondage>
     <?php } ?>
     <label for="choixSondage" class="form-check-label"><?php echo $value['choix'];?></label>

   </div>
   <?php } ?>
   <button class="btn btn-primary" type="submit">Voter</button>
 </form>
