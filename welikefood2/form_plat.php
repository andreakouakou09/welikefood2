<?php 
include("connection_database.php");

$option = mysqli_query($conn, "SELECT * FROM typespublication");

if (isset($_POST["submit"])) {

    $titre_pub =mysqli_real_escape_string($conn, htmlspecialchars($_POST["titreplat"]));
    $typ_pub = $_POST["tpub"];
    $contenu = mysqli_real_escape_string($conn, htmlspecialchars($_POST["corps"])); 
    $img_name = $_FILES['image_pub']['name'];

    if (isset($titre_pub, $typ_pub, $contenu) && !empty($titre_pub) && !empty($titre_pub) && !empty($img_name) && !empty($contenu)) {
        
        $extension = pathinfo($img_name,PATHINFO_EXTENSION);
        $extensions_autorisees = array('jpg', 'jpeg', 'png');

        if (in_array($extension, $extensions_autorisees)) 
        {
            $img_size = $_FILES['image_pub']['size'];

            if($img_size <= 61440)
            {
                $tmpname = $_FILES['image_pub']['tmp_name'];

                /* renommer l'image */
                $radomono = rand(0, 100000);
                $rename = 'WLF'.date('Ymd').$radomono;
                $newname = $rename.'.'.$extension;

                move_uploaded_file($tmpname, 'img_upload/'.$newname);

                $sql = "INSERT INTO publication (titre, type_p, image_p, message_p) VALUES ('$titre_pub', '$typ_pub', '$newname', '$contenu')";
                
                if (mysqli_query($conn, $sql)) 
                {
                    header("location:index.php");
                }else
                {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
            }else {
                echo "Ce Fichier est trop grand";
            }
            
        } else {
            echo "Seuls les fichiers JPG, JPEG, PNG sont autorisées";
        }
        
    } else {
        echo "<script>alert('Veuillez remplir tout les champs!');</script>";
    }   

    
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
            <li><a href="#">IMAGES</a></li>
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
      <center><h1>Enregistrer des plats</h1></center>
      <form action="" method="post" enctype="multipart/form-data">

        <div class="mb-3">
          <label for="" class="form-label">Titre du plat</label>
          <input type="text" class="form-control" name="titreplat" id="" value="<?php if(isset($error)){ echo $titre_pub;} ?>">
        </div>

    <div class="mb-3">
        <label for="">Type de publication</label>
        <select class="form-select" name="tpub">
            <option disabled="" selected="">Selectionner un type de publication</option>
            <?php 
            foreach ($option as $key=>$values) { ?>
                <option value="<?php echo $values['id']; ?>"><?php echo $values['typepub']; ?></option>
            <?php } 
            ?>
            
        </select>
    </div>

    <div class="mb-3">
        <label for="formFile" class="form-label">Image</label>
        <input class="form-control" type="file" id="formFile" name="image_pub" value="<?php if(isset($error)){ echo $image_pub;} ?>">
    </div>
    
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Corps du message</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="corps" value="<?php echo $corps;?>"></textarea>
    </div>

    <button type="submit" name="submit" class="btn btn-warning">Publier</button>
</div>


</form>