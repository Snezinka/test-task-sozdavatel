<?php
$tittle = "Calculator";
require "blocks/header.php";
?>

<h1 style="text-align:center">Простейший калькулятор</h1>
<div class="container ">
    <form action="" method="post">
        <input type="number" name="first_number" placeholder="Введите первое число" >
        <select name="action">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="%">%</option>
        </select>
        <input type="number" name="second_number" placeholder="Введите второе число"> <br> <br>

        <input type="submit" value="Выполнить действие" class="btn btn-success">
    </form>
</div>

    <div class="container">
        <?php
        if (isset($_POST["first_number"])){
            if ($_POST["first_number"] == ""){
                echo "Поле 'Введите первое число' не должно быть пустым";
                exit();
            }
            else if ($_POST["second_number"] == ""){
                echo "Поле 'ВВведите второе число' не должно быть пустым";
                exit();
            }
            echo "<h3> Результат: ", calculate($_POST["first_number"], $_POST["second_number"], $_POST["action"]), " </h3>";

        }
        function calculate($first_number, $second_number, $action){
            $result = 0;
            switch ($action) {
                case '+':
                    $result = $first_number + $second_number;
                    break;
                case '-':
                    $result = $first_number - $second_number;
                    break;
                case '*':
                    $result = $first_number * $second_number;
                    break;
                case '/':
                    $result = $first_number / $second_number;
                    break;
                case '%':
                    $result = $first_number % $second_number;
                    break;
            }
            return $result;
        }
        ?>
    </div>

<?php
require "blocks/footer.php";
?>