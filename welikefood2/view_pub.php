<?php
include("connection_database.php");
$sql = "SELECT * FROM Publication";
$res = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voir publication</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
        .col1{
            
            border: 2px solid rgb(42, 214, 42);
            border-radius: 50px;
        }
        .for1{
          margin-bottom: 100px;
        }
        button{
          border: none;
          background-color: transparent;
        }
        .comment{
          width: 830px;
          height:  80px;
          border-radius:10px;
          border-color: rgb(27, 27, 228);
          font-weight: 700;
          padding-left: 15px;
        }



        .dislike{
            background-color: white;
            width: 255px;
            padding: 0 8px 0 8px;
            position:relative;
            top: -30px;
            left: 140px;
            
        }
        .divbleu{
            height: 50px;
            width: 50px;
            padding: 20px;
            background-color: blue; 
            border-radius: 35px;
            color: white;
        }
        .divred{
            height: 50px;
            width: 50px;
            padding: 20px;
            background-color: red; 
            border-radius: 35px;
            color: white;
        }

    </style>
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
            <li><a href="se_deconnecter.php">Deconnexion</a></li>
          </ul>
        </div>
        
    </header>

<div class="container px-4">
<?php
include("connection_database.php");

 if(isset($_GET['id']))
 {
    $id_plat = mysqli_real_escape_string($conn, $_GET['id']);

    $query = "SELECT * FROM publication INNER JOIN typespublication ON typespublication.id = publication.type_p WHERE publication.id='$id_plat' "; 
    $query_run = mysqli_query($conn, $query);

    if(mysqli_num_rows($query_run) > 0)
    {
      $plat = mysqli_fetch_array($query_run);
      ?>
        <div class="row gx-3">
        <h2 class="text-center" style="color:#008518;"><?php echo $plat["typepub"]; ?></h2>
            <div class="col-6">
                <div class="p-5 col1">
                    <img src="img_upload/<?php echo $plat["image_p"]; ?>" class="img-fluid" alt="" width="430">
                </div>
            </div>

            <div class="col-6">
                <div class="p-4 ">
                    <p style="color:#3551ec;"><?php echo $plat["titre"]; ?></p>
                    <p style="color:#00000;"><?php echo $plat["message_p"]; ?></p>
                    <p style="color:#596ce5;"><?php echo $plat["dateheure"]; ?></p>
                </div>
            </div>
        </div>


        <div class="dislike">
            <a href="javascript:void(0)" class="" style="text-decoration:none;">
                <span class="divbleu" id="like_loop_<?php echo $plat["id"]; ?>"><?php echo $plat["like_p"]; ?></span>
                <img src="image/like.png" width="50" class="img-fluid" alt="like" onclick="like_update('<?php echo $plat['id']; ?>')">
            </a>

            <a href="javascript:void(0)" class="" style="text-decoration:none;">
                <img src="image/dislike.png" width="50" class="img-fluid" alt="dislike" onclick="dislike_update('<?php echo $plat['id']; ?>')">
                <span class="divred" id="dislike_loop_<?php echo $plat["id"]; ?>"><?php echo $plat["dislike_p"]; ?></span>
            </a>
        </div>
    <?php
    }
}
?>


<form action="" method="post" class="for1">
    <input type="text" name="comm" class="comment" placeholder="Commentaire....">
    <button name="submit" class="">
        <img src="image/comment(2).png" class="">
    </button>
</form>

<?php 

  if(isset($_GET["id"]) && isset($_POST["comm"]))
  {
    $id= $_GET["id"];
    $commentai =  addslashes($_POST["comm"]);
    $sql = "INSERT INTO commentaire (comment, id_publication) VAlUES ('$commentai', '$id')";

    if(mysqli_query($conn, $sql))
    {
      echo "<script>alert('Succès')</script>";
    }else{
      echo "error: ". $sql . "<br>" .mysqli_error($conn);
    }
    header("refresh:0");
  }
  mysqli_close($conn);
?>
        
</div>

        



<script>
  function like_update(id){
    var cur_count=jQuery('#like_loop_'+id).html();
    cur_count++;
    jQuery('#like_loop_'+id).html(cur_count);
    jQuery.ajax({
        url:'update_count.php',
        type:'post',
        data:'type=like&id='+id,
        success:function(result){

        }
    });
  }

  function dislike_update(id){
    var cur_count=jQuery('#dislike_loop_'+id).html();
    cur_count++;
    jQuery('#dislike_loop_'+id).html(cur_count);
    jQuery.ajax({
        url:'update_count.php',
        type:'post',
        data:'type=dislike&id='+id,
        success:function(result){
            
        }
    });
  }
    
</script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
        </body>
        </html>