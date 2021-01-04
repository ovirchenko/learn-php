<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
session_start();

if (!empty($_SESSION["user"])){
    echo "Здравствуйте, ".$_SESSION["user"]."<a href='userexit.php'><button>Выход</button></a>";

    // $con=mysqli_connect("localhost","root","","database1");
    // $id=$_SESSION["id"];
    // $query="SELECT * from balance_user where id_login='$id' ";
    // $querydb=mysqli_query($con,$query);
    // $result=mysqli_fetch_assoc($querydb);
    
    $id=$_SESSION["id"];
    $query="SELECT * from balance_user where id_login='$id' ";
    
    include("condb.php");
    $result=mysqli_fetch_assoc($querydb);
    
    echo "<br>Your balance is ".$result["balance"]." uah.";
    echo "<br>Your discount is ".$result["discount"]." uah.";
    echo "<br>";
    include("myclass.php");
    $myclass = new myclass();
        $mysqlresult = $myclass->test();
?>

        
        <table border=1>
            <tr>
                <th>ID</th>
                <th>Имя</th>
                <th>Пол</th>
                <th>Город</th>
            </tr>
<?php
        for($i=0;$i<count($mysqlresult);$i++){
?>
            <tr>
                <td><?php echo $mysqlresult[$i]['id']?></td>
                <td><?php echo $mysqlresult[$i]['username']?></td>
                <td><?php echo $mysqlresult[$i]['gender']?></td>
                <td><?php echo $mysqlresult[$i]['city']?></td>
            </tr>
<?php        
        }
?>
        </table>

    <br>
    <a href="changedata.php"><button>Обновить личные данные</button></a>
<?php        
        }

else {
    header("Location: aut.php");
}

?>

</body>
</html>
