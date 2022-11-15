<?php 
session_start();
if(isset($_SESSION["username"])){
  header("location:form_plat.php");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header id="top-nav-bar">
        <div class="search-box">
    
          <img src="image/Logo_WLF.png" alt="logo" class="logo">
    
          <div class="searchboxForm">
    
            <input type="search" name="" id="" class="form" value="nourriture">
            <div class="icon">
              <ul>
                <li><img src="image/microphone.png" alt="1"></li>
                <li><img src="image/bouton_carre.jpg" alt="2" class="cam"></li>
                <li><img src="image/loupe (2).png" alt="3"></li>
              </ul>
            </div>
    
           
    
          </div>
        </div>
        <div class="bouton-top">
          <a href="se_connecter.php" type="button" class="btn btn-light text-dark">Se Connecter</a>
          <span><img src="image/menu(1).png" alt="4"></span>
        </div>
    
        <div class="nav2">
          <ul class="navig">
            <li><a href="index.php">TOUT</a></li>
            <li><a href="form_plat.php">PUBLIER</a></li>
            <li><a href="inscription.php">S'INSCRIRE</a></li>
            <li><a href="#">VIDEOS</a></li>
            <li><a href="#">CARTES</a></li>
          </ul>
      
          <ul class="filtre">
            <li>Filtre<b class="ftlHl dropdown-toggle">Modéré</b></li>
            <li>Filtre <img src="images/télécharger.svg" alt=""></li>
          </ul>
        </div>
        
    </header>
<div class="form-signin w-100 m-auto">
  <p style="color:red;">
    <?php
      if(isset($error))
      {
        echo $error;
      }
      
    ?>
  </p>
  <p style="color:green;">
    <?php
      if(isset($success))
      {
        echo $success;
      }
      
    ?>
  </p>
  <form action="action.php" method="post">
    <h1 class="h3 mb-3 fw-normal">Veuillez vous connecter</h1>

    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" value="<?php if(isset($error)){echo $username;}?>">
      <label for="floatingInput">Nom d'utilisateur</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pwd">
      <label for="floatingPassword">Mot de passe</label>
    </div>
      
    <button class="mt-3 w-100 btn-lg btn btn-warning" type="submit" name="connecter">Se Connecter</button>

  </form>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>