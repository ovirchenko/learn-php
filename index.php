<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="stylesheet.css">
    <!-- <style>
   form {
    background: #f5f5f5; /* Цвет фона */
    width: 300px; /* Ширина формы */
    margin: auto; /* Выравниваем по центру */
    padding: 20px; /* Поля вокруг текста */
   }
   input {
    width: 100%; /* Ширина поля */
    box-sizing: border-box; /* Ширина не учитывает padding */
    margin: 10px 0; /* Отступы сверху и снизу */
    padding: 12px 0; /* Поля вокруг текста */
    border: none; /* Убираем рамку */
    border-bottom: 1px solid #ccc; /* Линия снизу */
    background: transparent; /* Прозрачный фон */
   }
   input:focus {
    outline: none; /* Убираем контур */
    border-bottom: 2px solid #1976D2; /* Синяя линия снизу */
   }
   input::placeholder {
    transition: 0.5s; /* Время трансформации */
    color: #aaa; /* Цвет подсказки */
   }
   input:focus::placeholder { 
    font-size: 10px; /* Размер шрифта */
    transform: translateY(-16px); /* Сдвигаем вверх */
   }
  </style> -->
</head>
<body>
    <?php
echo "<p>Hello world</p>";
$a="<p>The name";
echo $a;
$x=12;
echo $x;
echo "</p>";
$b = "Маше";
$c=20;
$d="лет";
echo $b." - ".$c." ".$d;
echo "</p>";
$array=["Гантели","Car","Food"];
print_r($array);
echo"</p>";
print_r($array[0]);
echo"</p>";
print_r($array[2]);
echo"</p>";
$array[0]="Тренажеры";
print_r($array);
echo"</p>";
print_r($array[0]);
echo"</p>";
$newarray=[
    ["Гантели",30],
    ["Car",10000],
    ["Food",200]
];
print_r($newarray);
echo"</p>";
echo $newarray[0][0]." - ".$newarray[0][1];
echo"</p>";
$newarray[2][0]="Juice";
print_r($newarray[2][0]);
for($i=0;$i<3;$i++){
    // $array[$i];
    // print_r("<p>".$array[$i]."</p>");
    echo "<p class='goods'>".$newarray[$i][0].'-'.$newarray[$i][1]."</p>"; // goods должны быть в одинарных, 
    // потому что они во внешних двойных кавычках

    // class можно использовать несколько раз на странице, а id только один раз

    // print_r - для выведения множества, echo - для чего-то одиничного
    // print_r($array[0]);
    // echo "<p>".$i."</p>";
}
include('includefunction.php');
    echo "<br>";
print_r ($include_array);
function sciences_list($include_array){
    for($i=0;$i<count($include_array);$i++){ //undefined variable
        echo "<p class='goods'>".$include_array[$i]."</p>";
    }
}

    ?>
     <!--Есть два метода передачи данных (обмена между страницами):
    1. GET - открытый метод, который видят все
    2. POST - закрытый метод, его видит только программист  -->
    <a href="second.php?x=Hello">Test GET</a>
    <br>
    <!-- ? - GET запрос -->
    <a href="second.php?y=10">Test GET2</a>
    <!-- 
        1.  Если на одну и ту же страницу много запросов GET, то она выглядит в зависимости, что прописано в методе GET.
        2.  print_r($_GET) работает только тот GET, по ссылке с которым перейти    
    -->
    <br>
    <a href="second.php?z=5&w=8">Test GET3</a>
    <form method=POST action="pageforpost.php">
        <input name="login" placeholder="Введите логин">
        <input name="password" type="password" placeholder="Введите пароль">
    <!-- 
       input - непарный тег  
       name - атрибут - уникальное имя для тега input
       если не указать action, то тогда форма прилетит на ту же страницу
       если не указать мethod, то будет метод GET
    -->
    <button>Send</button>
    </form>
    <br>
    <form method=POST action="postage.php">
        <input name="age" placeholder="Введите Ваш возраст">
        <button>Send</button>
    </form>
    <!-- 
       & - можно передать 2 переменные в одном запросе GET
    -->
<?php
sciences_list($include_array);

include("myclass.php");
$name='Александр';
$surname="Вирченко";
myfunction($name, $surname);
echo "<br>";
$myclass=new myclass(); //new - как бы клон/копия класса
// $myclass->test();//вызываем функцию из класса стрелочкой
// echo $myclass->test2();//меньше жрет памяти, чем вариант выше


$newcellphonePrice=$myclass->cellphonesdiscount($cellphones, $discount);
for($i=0;$i<count($newcellphonePrice);$i++){
    echo "<p>".$newcellphonePrice[$i][0]." - ".$newcellphonePrice[$i][1]." USD</p>";
    }
    
$msqlresult=$myclass->test();
// print_r($msqlresult);
?>
    <table border=1>
        <tr>
            <th>id</th>
            <th>Логин</th>
            <th>Профессия</th>
        </tr>

<?php
for($i=0;$i<count($msqlresult);$i++){
    ?>

        <tr>
            <td><?php echo $msqlresult[$i]["id"] ?></td>
            <td><?php echo $msqlresult[$i]["login"] ?></td>
            <td><?php echo $msqlresult[$i]["aboutmyself"] ?></td>
        </tr>
        <?php
    }
?>
    </table>
<?php    

// for($i=0;$i<count(cellphonesdiscount($cellphones, $discount));$i++){
//     echo "<p>".$myclass->cellphonesdiscount($cellphones, $discount)[$i][0]." - ".$myclass->cellphonesdiscount($cellphones, $discount)[$i][1];
//     }

// 4-ый вариант
// $newcellphonePrice=$myclass->cellphonesDiscount($cellphones);
// for($i=0;$i<count($newcellphonePrice);$i++){
//     echo $newcellphonePrice[$i];
//     }

//3-ий вариант
// for($i=0;$i<count($cellphones);$i++){
//         echo $myclass->cellphonesDiscount($cellphones[$i]);
//     }

//2-ой вариант
// $myclass->cellphonesDiscount($cellphones);
// for($i=0;$i<count($cellphones);$i++){
//         echo $cellphones[$i];
//     }

//1-ый вариант
// for($i=0,$i<=2,$i++){
//     echo $myclass->cellphonesDiscount($cellphones);
// }
?>

</body>
</html>