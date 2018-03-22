<nav class=" fixed-top navbar-inverse navbar-expand-md">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="forum.php">Collab Work</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="forum.php">Home</a></li>
      <li class="active"><a href="/forum/forum.php">Forum</a></li>
    </ul>
    <!-- Dropdown -->
      <ul class="navbar-nav navbar-right">
       
        <div class="dropdown">
          
          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
            <?php
            echo $_SESSION['nom'];
            echo " ";
            echo $_SESSION['prenom'];
            ?>
           <span class="caret"></span> </button>

          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Voir mon profil</a></li>
            <li class="divider"></li>
            <li><a class="dropdown-item" href="/forum/navigation/deconnexion.php">Deconnexion</a></li>
          </ul>

        </div>
        
      </ul>
    <form class="navbar-form navbar-left" action="/action_page.php">
      
      
    </form>
  </div>
</nav>