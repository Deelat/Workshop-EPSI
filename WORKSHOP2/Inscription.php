<?php  
  include $_SERVER['DOCUMENT_ROOT']."/WORKSHOP2/offline_navigation/offline_header.php";
?>
<br> <br> <br> <br> 
  <body style="background-image: url('WORKSHOP2/img/header-bg.jpg')">
    <div class="container" style="width:500px; background-color:rgba(255, 255, 255, 0.5);">
      <h1>Inscription Collab Work</h1>
    <form method=post action=session/traitement-eleves.php>
      <div class="form-group">
        <label for="nomInput">Entrez votre nom :</label>
        <input class="form-control" id="nomInput" name="firstname" type="text" placeholder="Nom">
      </div>
      <div class="form-group">
        <label for="prenomInput">Entrez votre prénom :</label>
        <input id="prenomInput" class="form-control" name="lastname" type="text" placeholder="Prénom">
      </div>
      <div class="form-group">
        <label for="ddnInput">Entrez votre date de naissance :</label>
        <input class="form-control" id="ddnInput" name="dob" type="date">
      </div>
      <div class="form-group">
        <label for="emailInput">Entrez votre adresse email :</label>
        <input id="emailInput" class="form-control" name="mail" type="email" placeholder="Your email">
      </div>
      <div class="form-group">
        <label for="schoolInput">Quel est votre campus ?</label>
        <select id="schoolInput" class="form-control" name="school">
          <option>Paris</option>
          <option>Arras</option>
          <option>Lille</option>
          <option>Montpellier</option>
          <option>Brest</option>
          <option>Grenoble</option>
          <option>Lyon</option>
          <option>Nantes</option>
        </select>
      </div>
      <div class="form-group">
        <label for="anneeInput">Quel est votre année d'étude ?</label>
        <select id="anneeInput" class="form-control" name='year'>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <div class="form-group">
        <label for="mdpInput">Choisissez un mot de passe :</label>
        <input id="mdpInput" class="form-control" name="password" type="password" placeholder="Your password">
      </div>
      <button type="submit" class="btn btn-lg btn-primary" style="margin : 0 auto; width:150px; margin-top:10px; margin-bottom:20px;">Inscription</button>
    </form>
  </div>
  </body>
</html>
