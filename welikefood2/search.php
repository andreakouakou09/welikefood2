<?php
    require('myfunction.php');
    
    $result= getPublication($_POST['selected_depart']);

    while($row = mysqli_fetch_array($result)){
    ?>
    <a class="col" href="view_pub.php?id=<?php echo $row['id']; ?>" style="text-decoration: none; color:black;">
            <div class="card h-100">
            <img src="img_upload/<?php echo $row['image_p']; ?>" class="card-img-top carding"  alt="...">
                <div class="card-body">
                    <p class="card-text"><?php echo substr($row['message_p'], 0, -10); ?></p>
                    <p>publié le : <?php echo $row['dateheure']?></p>
                </div>
            </div>
        </a>
    <?php
        }
    
    mysqli_close($conn);

    ?>