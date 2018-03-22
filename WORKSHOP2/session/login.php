<?php  
  include $_SERVER['DOCUMENT_ROOT']."/WORKSHOP2/offline_navigation/offline_header.php";
?>
<body>
   
   	<br> <br> <br> <br> <br> <br> <br> <br>
   	<h1> <center> <p class="text-success">Collab Work </p> </center> </h1>
	

<form method="post" class="form-horizontal" action="connection_post.php ">
  

  <div class="form-group">
  	<br> <br>

    <label class="control-label col-sm-5" for="email">Email:</label>
    <div class="col-sm-2">
      <input name="email" type="email" class="form-control" id="email" placeholder="Entrer votre email">
    </div>
  </div>
 
  <div class="form-group">
    <label class="control-label col-sm-5" for="pswd">Mot De Passe:</label>
    <div class="col-sm-2"> 
      <input name="pswd" type="password" class="form-control" id="pswd" placeholder="Enter password">
    </div>
  </div>
 
  <div class="form-group"> 
    <div class="col-sm-offset-5 col-sm-5">
      <div class="checkbox">
        <label><input type="checkbox"> Mémoriser</label>
      </div>
    </div>
  </div>
  
  <div class="form-group">
    <div class="col-sm-offset-5 col-sm-2">
      <button type="submit" class="btn btn-default">Se Connecter</button>
    </div>


    <div class="row"> 
     <div class="col-sm-4">Pas de compte ?
        <a href="/WORKSHOP2/Inscription.php" class="text-danger">Créer Un Compte</a> 
     </div>
  </div>
  </div>
</form>

</body>
</html>