<?php
$tittle = "Working with a date";
require "blocks/header.php";
?>

<h1 style="text-align:center">Работа с датой</h1>
<div class="container mt-20">
    <form action="" method="post">
        День: <input type="number" name="number_day" placeholder="Введите номер дня" class="form-control"> <br>
        Месяц: <input type="number" name="number_month" placeholder="Введите номер месяца" class="form-control"> <br>

        <input type="submit" value="Рассчитать дату" class="btn btn-success">
    </form>
</div>

<div class="container mt-20">
    <?php

    if (isset($_POST["number_day"])){
        if ($_POST["number_day"] == ""){
            echo "Поле 'Введите номер дня' не должно быть пустым";
            exit();
        }
        else if ($_POST["number_month"] == ""){
            echo "Введите номер месяца";
            exit();
        }
        else if ($_POST["number_day"] < 1 || $_POST["number_day"] > 31){
            echo "В месяце не может быть больше 31 дня и не может день быть отрицательным";
            exit();
        }
        else if ($_POST["number_month"] < 1 || $_POST["number_month"] > 12){
            echo "В году не может быть больше 12 месяцев и не может месяц быть отрицательным";
            exit();
        }
        echo "<h3> ", show_date($_POST["number_day"], $_POST["number_month"]), " </h3>";
    }



    function show_date($day, $month)
    {
        $months = [1 => "января", "февраля", "марта", "апреля", "мая", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"];
        return "$day " . $months["$month"];
    }
    ?>

</div>

<?php
require "blocks/footer.php";
?>