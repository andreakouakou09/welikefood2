<?php 
include("connection_database.php");

$option = mysqli_query($conn, "SELECT * FROM typespublication");



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/js/all.min.js" integrity="sha512-naukR7I+Nk6gp7p5TMA4ycgfxaZBJ7MO5iC3Fp6ySQyKFHOGfpkSZkYVWV5R7u7cfAicxanwYQ5D1e17EfJcMA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="css/style.css">
    <style>
              /*caroussel*/
.swiper {
  width: 100%;
  height:  20%;
}

  .swiper-slide {   
    font-size: 18px;
    background: #fff;
    border-radius: 50px;   
    border: 0.5px solid skyblue;
     width: 100px;
    height: 50px;
    margin-left: 10px;      
  }

/*fin caroussel*/

		.div_text_scroll {
			font-size: 15px;
			width: 100px;
			margin-left: 50px;
      margin-right: 30px;
      margin-top: -30px;
		}
		.img_scroll {
			width: 30px;
			height: 35px;
			border-radius: 50%;
      padding-top: 10px;
      margin-left: 5px;
		}
    </style>
</head>
<body>
    <header id="top-nav-bar">
        <div class="search-box">
    
          <img src="image/Logo_WLF.png" alt="logo" class="logo">
    
          <div class="searchboxForm">
    
            <input type="search" name="" id="" class="form" value="">
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
          <a href="#" type="button" class="btn btn-light text-dark">Se Connecter</a>
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
            <li>Type de publication 
             <div id="filters">
              <select class="" name="tpub" id="depart_dropdown">
                <option disabled="" selected="">---Selectionner---</option>
                <?php 
              
                foreach ($option as $key=>$values) { ?>
                    <option value="<?php echo $values['id']; ?>"><?php echo $values['typepub']; ?></option>
                <?php } 
                ?>
            
              </select>
             </div>  
            <!--<b class="ftlHl dropdown-toggle">Modéré</b>-->
          </li>
            <li><img src="image/filtre.png"></li>
          </ul>
        </div>
        
    </header>

    <section id="premier" style="position: relative;">
    <div class="swiper mySwiper">
      <div class="swiper-wrapper">
          <?php
              $req = "SELECT * FROM publication INNER JOIN typespublication ON typespublication.id = publication.type_p";
             
              $result = mysqli_query($conn, $req);

              if(mysqli_num_rows($result) > 0){
              while($srol = mysqli_fetch_assoc($result)){
          ?>

        <div class="swiper-slide">
          <img class="img_scroll" src="img_upload/<?php echo $srol['image_p']; ?>" alt="image">
          <div class="div_text_scroll"><?php echo $srol['titre']; ?><br>  <b><?php echo $srol['typepub']; ?></b></div>
        </div>
        
        <?php
          }
          }
      
        ?>
        
      </div>
  </div>
  


  <!-- les fleches -->
  <div class="swiper-button-next" style="height: 80px;width: 50px; position: absolute; color: black; background-color: transparent;font-weight: bold;margin-top: -40px;margin-right:0;"></div>

  <div class="swiper-button-prev" style="height: 80px;width: 50px; position: absolute; color: black; background-color: transparent;font-weight: bold;margin-top: -40px;"></div>
  

</section>



    <div class="container-fluid">

        <div class="row row-cols-1 row-cols-md-5 g-2" id="publication_div">
        <?php
          $video_id = $row["id"]; ?>
        </div>
        
        <br>
        <div id="remove_row">
        <button type="button" class="btn btn-outline-success form-control" name="button_more" id="btn_more" data-vid="<?php echo $video_id; ?>">Voir plus ...</button>
      </div>
    </div>

    
    <script type="text/javascript">

          var swiper = new Swiper(".mySwiper", {
            slidesPerView: 10,
            spaceBetween: 2,
            slidesPerGroup: 10,
            loop: true,
            loopFillGroupWithBlank: true,
            pagination: {
              el: ".swiper-pagination",
              clickable: true,
            },
            navigation: {
              nextEl: ".swiper-button-next",
              prevEl: ".swiper-button-prev",
            },
          });


          $(document).ready(function(){
            $(document).on('click', '#btn_more', function(){
              var last_video_id = $(this).data("vid");
              $("#btn_more").html("Loading....");
              $.ajax({
                url:"load_data.php",
                method:"POST",
                data: {last_video_id:last_video_id},
                dataType:"text",
                success:function(data)
                {
                  if(data != '')
                  {
                    $('#remove_row').remove();
                    $('#publication_div').append(data);
                  }else{
                    $('#btn_more').html("No Data");
                  }
                }
              });
            });
          });


          $(document).ready(function(){
            $("#publication_div").load("allrecord.php");
            $("#depart_dropdown").change(function(){

              var selected=$(this).val();
              $("#publication_div").load("search.php",{selected_depart: selected});

            });
          });
    </script>
</body>
</html>