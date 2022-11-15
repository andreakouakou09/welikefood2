<?php  
$output = '';  
$video_id = '';  
sleep(1);  
include("connection_database.php"); 
$sql = "SELECT * FROM publication WHERE id > ".$_POST['last_video_id']." LIMIT 10";  
$result = mysqli_query($conn, $sql);  
if(mysqli_num_rows($result) > 0)  
{  
     while($row = mysqli_fetch_array($result))  
     {  


      echo "titre:".$row['titre']."<br>";
          /*$video_id = $row["id"];  
          $output .= '  
               <tbody>  
               <tr>  
                    <td>'.$row["titre"].'</td>  
               </tr></tbody>'; */ 
     }  
     /*$output .= '  
               <tbody><tr id="remove_row">  
                    <td><button type="button" name="btn_more" data-vid="'. $video_id .'" id="btn_more" class="btn btn-success form-control">more</button></td>  
               </tr></tbody>  
     ';  
     echo $output; */ 
}  
?>


    