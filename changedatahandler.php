<?php
session_start();
// print_r($_POST);
if (!empty($_SESSION["user"]) && $_POST["password"]==$_POST["password_confirm"]){
    
    $login=$_SESSION["user"];
    $password=$_POST["password"];
    $query="UPDATE users SET password='$password' WHERE login='$login'";
    // $result3=mysqli_fetch_assoc($querydb3);
    include("condb.php");
    echo "Данные обновлены";
}

else {
    header("Location: aut.php");
}
?>