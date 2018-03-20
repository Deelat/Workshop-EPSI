<?php

$linkDB = mysqli_connect('localhost', 'root', 'rootroot', 'workshop');
include("../entity/Account.php");

session_start();

if (isset($_SESSION["account"])) {
    $account = $_SESSION["account"];
    if ($account instanceof Account) {
        header('Location: ..');
        return;
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0"/>
    <title>Workshop - Connexion</title>
</head>
<body>
<div id="wrap">

    <?php
    $index = 3;
    include('../includes/navigation.php');
    ?>
    <div id="content">
        <section>
            <div>
                <div class="row">
                    <div class="span12 text-center">
                        <div class="headline m-b-0">
                            <h3>Connexion</h3>
                        </div>
                        <div class="limiter">
                            <div class="container-login100">
                                <div class="wrap-login100 p-t-85 p-b-20">
                                    <form class="login100-form validate-form" onsubmit="return validateForm()">

                                        <br>
                                        <p id="error_label" style="color:red; display:none;"></p>

                                        <div class="wrap-input100 validate-input m-t-30 m-b-35">
                                            <input id="email" class="input100" type="email" required>
                                            <span class="focus-input100" data-placeholder="Adresse email"></span>
                                        </div>
                                        <div class="wrap-input100 validate-input m-b-50">
                                            <input id="password" class="input100" type="password">
                                            <span class="focus-input100" data-placeholder="Mot de passe"></span>
                                        </div> 
                                        <div class="container-login100-form-btn">
                                            <button class="login100-form-btn">
                                                Connexion
                                            </button>
                                        </div>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</html>

