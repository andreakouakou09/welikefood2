<?php 

include("connection_database.php");

function getPublication($tpub)
{
    global $conn;
    $req ="SELECT * FROM publication where type_p =".$tpub." ";
    $result = mysqli_query($conn,$req);
    return $result;
}
?>