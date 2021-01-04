<?php

$cellphones=[
    ["Samsung", 950],
    ["Iphone", 1200],
    ["LG", 700],
    ["Xiomi", 650],
    ["Huawei", 750]
];
$discount=0.2;

// print_r($cellphones[1][1]);
// $cellphones[1][1]=$cellphones[1][1]*(1-$discount);
// print_r($cellphones);

class myclass{ //структурируют код + объединяют функции по логике + дает возможность масштабироваться
    function __construct(){//говорит классу, что будет запускаться первой; функции = методы
        // Значение: напр, подключение к базе данных; такой подход более экономичен - меньше жрет памяти
        $this->connectdb=mysqli_connect("localhost","root","","database1");
        $this->query="select * from users";
        
        // echo "Hello construct";
        $this->name="Cat";//Создали свойство (глобальная переменная), которой присвоили значение 'Hello', можно использовать в любом месте класса
    
    }
    function test(){
        // echo "Hi"; //эчо выводит на экран, функция не завершенная, память и дальше потребляет, так как функция не имеет значение
        // echo "<br>";
        // echo $this->name;
        // $this->name="dog";
        $this->querydb=mysqli_query($this->connectdb, $this->query);
        $tmparray=[];
        while($this->msqlresult=mysqli_fetch_assoc($this->querydb)){
            // print_r ($this->msqlresult);
            $tmparray[]=$this->msqlresult;//запись накапливает в tmparray каждого пользователя из базы поочереди
        };
        // print_r ($tmparray);            
        return $tmparray;
    }
    // function test2(){
    //     echo "<br>";
    //     $this->test();//this вызывает внутри функции другую функцию из класса
    //     echo "<br>";
    //     echo $this->name;
    //     return "Hello world";//ретёрн!!! заканчивает функцию (завершает функцию - код более экономичный, не висит в памяти) и возвращает значение функции, но не выводит на экран
    //}
    function cellphonesdiscount($cellphones, $discount){
        $cellphones[1][1]=$cellphones[1][1]*(1-$discount);
        return $cellphones;
    }
}

// function cellphonesdiscount($cellphones, $discount){
//     $cellphones[1][1]=$cellphones[1][1]*(1-$discount);
//     return $cellphones;
// }
// print_r(cellphonesdiscount($cellphones, $discount));

// function myfunction2(){
//     echo "Привет мир";
// };

// function myfunction($name, $surname){
//     echo "Привет, $name $surname <br>";
//     myfunction2();//можно вызвать другую функцию внутри данной
// };

// if (mysqli_connect_errno()) {
//     echo "Failed to connect to MySQL: " . mysqli_connect_error();
//     exit();
//   }
//   else {
//     echo "Connect successful<br>";
//   }   

?>