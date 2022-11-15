<?php
    include("connection_database.php");
    $type = $_POST['type'];
    $id = $_POST['id'];

    if ($type=='like') {
        $sql = "update publication set like_p=like_p+1 where id=$id";
    } else {
        $sql = "update publication set dislike_p=dislike_p+1 where id=$id";
    }
    
    
    $res = mysqli_query($conn, $sql);

?>