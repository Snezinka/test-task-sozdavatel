<?php
$tittle = "Working with a date";
require "blocks/header.php";
?>

<h1 style="text-align:center">Расчет угла по стрелкам часов</h1>
<div class="container mt-20">
    <form action="" method="post">
        Часы: <input type="number" name="hour" placeholder="Введите часы" class="form-control"> <br>
        Минуты: <input type="number" name="minute" placeholder="Введите минуты" class="form-control"> <br>

        <input type="submit" value="Рассчитать угол" class="btn btn-success">
    </form>
</div>

    <div class="container mt-20">
        <?php

        if (isset($_POST["hour"])){
            if ($_POST["hour"] == ""){
                echo "Поле 'Введите часы' не должно быть пустым";
                exit();
            }
            else if ($_POST["minute"] == ""){
                echo "Поле 'Введите минуты' не должно быть пустым";
                exit();
            }
            else if ($_POST["hour"] < 0 || $_POST["hour"] > 24){
                echo "В сутках может быть не более 24 часов и не может час быть отрицательным";
                exit();
            }
            else if ($_POST["minute"] < 0 || $_POST["minute"] > 60){
                echo "В часе не может быть больше 60 минут и не может минута быть отрицательной";
                exit();
            }
            echo "<h3> Малый угол между стрелками часов равен ", calculate_angle($_POST["hour"], $_POST["minute"]), " </h3>";
        }



        function calculate_angle($hour, $minute)
        {
            $angle = abs(360 / 12 * $hour - 360 / 60 * $minute);
            if ($angle > 180) {
                $angle = 360 - $angle;
            }
            return $angle;
        }
        ?>

    </div>

<?php
require "blocks/footer.php";
?>