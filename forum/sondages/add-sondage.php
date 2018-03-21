<?php
session_start();

$link = mysqli_connect('localhost', 'root', 'rootroot', 'workshop');

$nb_choix=filter_var($_POST['nbchoix'], FILTER_SANITIZE_STRING);
$titre = filter_var($_POST['titre'],FILTER_SANITIZE_STRING);
$time = date("Y-m-d H:i:s");

$req = "INSERT INTO sondage (nb_choix, titre, auteur, date_time) VALUES ('".$nb_choix."', '".$titre."', '".session_id()."', '".$time."')";
var_dump($req);

$res = mysqli_query($link, $req);
$query = "SELECT id_sondage FROM sondage WHERE titre = '".$titre."' AND date_time = '".$time."';";
$result = mysqli_query($link, $query);
$id_sondage = mysqli_fetch_row($result);
var_dump($id_sondage);

for ($i=1; $i <= $_POST['nlignes']; $i++) {
$titre = filter_var($_POST['option'.$i], FILTER_SANITIZE_STRING);
$req = "INSERT INTO optn_sondage (choix, id_sondage) VALUES ('".$titre."', '".$id_sondage[0]."')";

$res = mysqli_query($link, $req);
}
var_dump($res);
if (mysqli_errno($link)) {
  die(mysqli_error($link));
}
?>
