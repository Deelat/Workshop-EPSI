<?php

$linkDB = mysqli_connect('localhost:3306', 'root', 'root', 'workshop');

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$dob = $_POST['dob'];
$school = $_POST['school'];
$year= $_POST['year'];
$email = $_POST['mail'];
$password = sha1($_POST['password']);

$req = 'INSERT INTO eleves (nom, prenom, ddn, ecole, annee, mail, mdp) VALUES ("'.$firstname.'", "'.$lastname.'", "'.$dob.'", "'.$school.'", "'.$year.'", "'.$email.'", "'.$password.'")';

$res = mysqli_query($linkDB, $req);

mysqli_errno($linkDB);

header('Location: /WORKSHOP2/session/login.php');
 ?>

