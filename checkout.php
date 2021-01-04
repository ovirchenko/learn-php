<?php
session_start(); //Сессия запоминает пользователя на всем проекте. 
//Если пользователь сделал вход, то мы его помним, и не важно, что он нажимает.
$login=$_POST["login"];
$password=md5($_POST["password"]);

$con=mysqli_connect("localhost","root","","database1");
$query="SELECT * from users where login='$login' and password='$password'";
//echo $query;
$querydb=mysqli_query($con,$query);

if ($querydb->num_rows>0){ //то есть, если этот юзер в базе, то на него выведет запрос одну строку, тобишь больше 0
// если просто $querydb, то запрос всегда существует и не важно или юзер есть, или нету
    // echo "Вы авторизованы";
    $_SESSION["user"]=$login;
    $result=mysqli_fetch_assoc($querydb);
    $_SESSION["id"]=$result["id"];
    header("Location:userpage.php");
}
else {
    echo "Данные введены неверно";
}
?>