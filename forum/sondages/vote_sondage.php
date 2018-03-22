<?php
$link = mysqli_connect( 'localhost', 'root', 'rootroot', 'workshop');

$req = "SELECT nb_votes FROM optn_sondage WHERE id_optn = '".$_POST['id_option']."'";
$res = mysqli_query($link, $req);
$nb_votes = mysqli_fetch_row($res);
$nb_votes = $nb_votes[0];
$nb_votes = (int)$nb_votes + 1;

$req = "UPDATE optn_sondage SET nb_votes = ".$nb_votes." WHERE id_optn = ".$_POST['id_option'];
$res = mysqli_query($link, $req);
