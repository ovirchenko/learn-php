<?php

function dbtojson(){
    $query = "SELECT * FROM tovars";
    include('condb.php');
    $temparr=[];
    while($resultdb = mysqli_fetch_assoc($querydb)){
        $temparr[]=$resultdb;//после названия переменной необходимы []
        }
    return json_encode(array('products' => $temparr));
}

if (!empty($_GET)){
    $newtovarname=$_GET["Name"];
    $newtovarprice=$_GET["Price"];
    $newtovardescription=$_GET["Description"];
    $query = "INSERT INTO tovars (Name, Price, Description) 
                VALUES ('$newtovarname', '$newtovarprice', '$newtovardescription')";
    include('condb.php');
    echo dbtojson();
        // $newtovar=[$newtovarname, $newtovarprice, $newtovardescription];

        // $arr = array(["Soap", "25", "10"],["Bag", "100", "15"],["Pen", "15", "13"]);
        // array_push($arr, $newtovar);//добавить массив к существующему массиву
        // // print_r($arr);

        // $payment = array();

        // // {
        // //     "id":1,
        // //     "price":123 //объект в JavaScript
        // // }

        // foreach($arr as $row) {
        //     $payment[] = array(
        //         'Name' => $row[0],
        //         'Price' => $row[1],
        //         'Quantity' => $row[2],
        //     );
        // }

        // print json_encode(array('payment' => $payment));

        //API - объект: {"payment":[{"Name":"Soap","Price":"25","Quantity":"10"},{"Name":"Bag","Price":"100","Quantity":"15"},{"Name":"Pen","Price":"15","Quantity":"13"}]}
        //API - посредник, позволяет обмениваться информацией в виде строки между сайтами
        //можно получать инфо с базы данных, которая может лежать на другом сайте
        //позволяет передавать инфо между разными языками программирования: JAVA => PHP - объединяет языки
    }
else {
    echo dbtojson();
    }    

?>
