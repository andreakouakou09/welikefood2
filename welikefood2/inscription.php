<?php 

include 'connection_database.php';

if(isset($_POST["submit"])){

    $nom = mysqli_real_escape_string($conn, strtolower($_POST["nom"])) ;
    $prenom = mysqli_real_escape_string($conn, strtolower($_POST["prenom"]));
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $motdepasse = mysqli_real_escape_string($conn,  $_POST["motdepasse"]);
    $cmotdepasse = mysqli_real_escape_string($conn, $_POST["cmotdepasse"]);

    if(empty($nom)){

        $error = "Nom est requis";
        
    }elseif(!ctype_alpha($nom) ) {

        $error = "Nom ne peut contenir que des caracteres alphanumerique( a-z)";
    }
    elseif(empty($prenom)){

        $error = "Prenom est requis";

    }elseif(empty($username)){

        $error = "Nom d'utilisateur est requis";

    }elseif(empty($motdepasse)){

        $error = "le mot de passe est requis";

    }elseif($motdepasse != $cmotdepasse){

        $error = "le mot de passe ne correspond pas";

    }elseif(strlen($username) <3 || strlen($username) >30){

        $error = "Le nom d'utilisateur doit être entre 3 et 30 caractères";

    }elseif(strlen($motdepasse) <4 ){

        $error = "Le mot de passe doit être au moins 6 caractères";

    }else{
        $pass = md5($motdepasse);
        
        $sql = "INSERT INTO owner (nom, prenom, username, motdepasse) VALUES ('$nom', '$prenom', '$username', '$pass')";
        $q = mysqli_query($conn, $sql);
        if($q){
            $success = "Votre compte a été crée avec succès!";
        }else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        mysqli_close($conn);
    }
} ?>



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
        <div class="container">
    <div class="row content">

        <p style ="color:red;">
            <?php 
            if(isset($error)){
                echo $error;
            }
             ?>
        </p>
        <p style ="color:green;">
            <?php 
            if(isset($success)){
                echo $success;
            }
             ?>
        </p>

        <div class="col-md-6 mb-3">
            <img src="image/image1.jpg" class="img-fluid" alt="banner_inscription">
        </div>
        <div class="col-md-6">
            <h3 class="mb-3">Inscrivez-vous pour un nouveau compte</h3>

            <form action="" method="post" class="row g-3">
            <div class="col-md-6">
                <label for="nom">Nom</label>
                <input type="text" class="form-control" name="nom" id="" value="<?php if(isset($error)){ echo $nom;} ?>">
            </div>
            <div class="col-md-6">
                <label for="prenom">Prenom</label>
                <input type="text" class="form-control" name="prenom" id="" value="<?php if(isset($error)){ echo $prenom;} ?>">
            </div>
            <div class="col-md-12">
                <label for="">Nom d'utilisateur</label>
                <input type="text" class="form-control" name="username" id="" value="<?php if(isset($error)){ echo $username;} ?>">
            </div>
            <div class="col-md-12">
                <label for="motdepasse">Mot de passe </label>
                <input type="password" class="form-control" name="motdepasse" id="">
            </div>
            <div class="col-md-12">
                <label for="cmotdepasse">Confirmation de mot de passe</label>
                <input type="password" class="form-control" name="cmotdepasse" id="">
            </div>
            <button type="submit" name="submit" class="btn btn-warning">Soumettre</button>
        </form>
        </div>
    </div>
</div>


    

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>