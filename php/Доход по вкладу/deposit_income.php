<?php
    $tittle = "Вычисление дохода по вкладу";
    require "blocks/header.php";
?>

<h1 style="text-align:center">Вычисление дохода по вкладу (простой процент)</h1>
<div class="container mt-20">
    <form action="" method="post">
        Сумма вклада: <input type="number" name="deposit_amount" placeholder="Введите сумму вклада" class="form-control"> <br>
        Срок вклада: <input type="number" name="period" placeholder="Введите количество месяцев" class="form-control"> <br>
        Проценты: <input type="number" name="annual_percentage" placeholder="Введите процент по вкладу" class="form-control"> <br>

        <input type="submit" value="Рассчитать доход по вкладу" class="btn btn-success">
    </form>
</div>

<div class="container mt-20">
    <?php

    if (isset($_POST["deposit_amount"])){
        if (trim($_POST["deposit_amount"]) == ""){
            echo "Поле 'Введите сумму вклада' не должно быть пустым";
            exit();
        }
        else if (trim($_POST["period"]) == ""){
            echo "Поле 'Введите количество месяцев' не должно быть пустым";
            exit();
        }
        else if (trim($_POST["annual_percentage"]) == ""){
            echo "Поле 'Введите процент по вкладу' не должно быть пустым";
            exit();
        }
        echo "<h3> Ваш доход за составляет ",
            calculation_deposit($_POST["deposit_amount"], $_POST["period"], $_POST["annual_percentage"]),  " </h3>";
    }


    function calculation_deposit($deposit_amount, $period, $annual_percentage)
    {
        return $deposit_amount * ($period / 12) * ($annual_percentage / 100) ;
    }
    ?>

</div>


<?php
require "blocks/footer.php";
?>
