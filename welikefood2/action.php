<?php 
/*
include("connection_database.php"); 

if(isset($_POST["submit"])){
    $nom = mysqli_real_escape_string($conn, $_POST["nom"]);
    $prenom = mysqli_real_escape_string($conn, $_POST["prenom"]);
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $motdepasse = mysqli_real_escape_string($conn, $_POST["motdepasse"]);
}
$sql = "INSERT INTO Owner (nom, prenom, username, motdepasse) VALUES ('$nom', '$prenom', '$username', '$motdepasse')";

if (mysqli_query($conn, $sql)){
    echo "New record created successfully";
}else{
    echo "Error: ".$sql. "<br>" .mysqli_error($conn);
}

mysqli_close($conn);*/
?>

<?php 
session_start();

include("connection_database.php");

if (isset($_POST["connecter"])) {
  $username = mysqli_real_escape_string($conn, $_POST["username"]);  
  $pwd = mysqli_real_escape_string($conn, $_POST["pwd"]); 
  $pass = md5($pwd);


  if (empty($username) || empty($pwd)) {
    $error = "Les deux champs sont obligatoires";
  }else {

    $sql = "SELECT username, motdepasse FROM owner WHERE username='$username' AND motdepasse='$pass'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) >0) {
      header("location:index.php");
      $_SESSION["username"] = $username;

    } else {
      echo "Les données sont invalides";
    }
  }
}
?>
