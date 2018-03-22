<?php
$link = mysqli_connect('localhost', 'root', 'rootroot', 'workshop');

$query = "SELECT * FROM optn_sondage WHERE id_sondage = ".$_GET['id'];
$result = mysqli_query($link, $query);
$res_poll = mysqli_fetch_all($result);

$nb_votes = 0;
foreach ($res_poll as $value) {
  $nb_votes += $value[2];
}


$query = "SELECT titre FROM sondage WHERE id_sondage = ".$_GET['id'];
$result = mysqli_query($link, $query);
$titre = mysqli_fetch_row($result)[0];

?>

<link rel="stylesheet" href="../../css/bootstrap.min.css">
<p><?php echo $titre; ?></p>
<?php foreach ($res_poll as $value) {
   $progress = ($value[2] / $nb_votes) * 100; ?>
      <p><?php echo $value[1]." : ".$value[2];?></p>

  <div class="progress">
    <div class="progress-bar" role="progressbar" style="width:<?php echo $progress.'%';?>" aria-valuenow=<?php echo ".$value[2]."; ?> aria-valuemin="0" aria-valuemax=<?php echo ".$nb_votes.";?>></div>
</div>
<?php } ?>
