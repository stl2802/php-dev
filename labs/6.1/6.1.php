<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <main>
    <script src="6.1.js"></script>
    <?php
        echo "задание 1". "<br>";
        date_default_timezone_set('Europe/Moscow');
        session_start();

        if (!isset($_SESSION['test'])) {
            $_SESSION['test'] = 'test';
        }else {
            echo $_SESSION['test'] . "<br>";
        }

        echo "задание 2"."<br>"."перенаправит на другую страницу по нажатию на кнопку"."<br>";
        $_SESSION["namber_two"] = "exersize_two";
    ?>
    <a href="6.1_другая_страница.php">перенаправить</a><br>
    <?php
        echo "задание 3". "<br>";
        if (!isset($_SESSION["количество_перезаходов"])){
            $_SESSION["количество_перезаходов"] = "0";
            print("еще не перезаходили");
        }else{
            $_SESSION["количество_перезаходов"] = (int) $_SESSION["количество_перезаходов"] + 1;
            print($_SESSION["количество_перезаходов"]);
        }

        echo "<br>"."задание 4 это и будет index.php". "<br>";
    ?>
    <form action="6.1.php" method="get">
        <label>
            Страна
            <input type="text" name="country">
        </label>
        <button type="submit">submit</button>
    </form>
    <a href="test.php">ссылка на test.php</a>
    <?php
        if (isset($_GET["country"])){
            $_SESSION["country"] = $_GET["country"];
        }

        echo "задание 5". "<br>";
        if (!isset($_SESSION["time_enter"])){
            $_SESSION["time_enter"] = time();
        }else{
            $time_enter = new DateTime("@" . $_SESSION["time_enter"]);  // Преобразуем timestamp в DateTime
            $current_time = new DateTime();
            $interval = $time_enter->diff($current_time);
            print($interval->format('%d дней %h часов %i минут %s секунд'));
        }

        echo "<br>"."задание 6". "<br>";
        ?>
        <form action="6.1.php" method="get">
            <label>
                email<br>
                <input type="email" name="email">
            </label>
            <button type="submit">submit</button>
        </form>
        <?php
            $email = "";
            if (isset($_GET["email"])){
                $_SESSION["email"] = $_GET["email"];
                $email = $_SESSION["email"];
            }
        ?>
        <form action="#">
            <label>
                <input type="text" name="name_1">
            </label>
            <label>
                <input type="text" name="sername_1">
            </label>
            <label>
                <input type="text" name="password_1">
            </label>
            <label>
                <input type="text" name="email" value="<?php echo $email ?>">
            </label>
        </form>
        <?php
            echo "<br>"."задание 7". "<br>";
            if (!isset($_COOKIE["test"])){
                setcookie('test', '123', time() + 3600, '/');
            }else{
                echo $_COOKIE["test"]."<br>";
            }
            echo "<br>"."задание 8". "<br>";
            setcookie('test', '', time() - 3600, '/');
            echo "<br>"."задание 9"."<br>";
            $number_of_entered = isset($_COOKIE["number_entered"]) ? (int)$_COOKIE["number_entered"] : 0;
            $number_of_entered++;
            setcookie('number_entered', "$number_of_entered", time() + 3600, '/');
            echo "Вы посетили наш сайт " . $_COOKIE["number_entered"] . " раз!";
            echo "<br>"."задание 10"."<br>";
        ?>
        <section>
            <form action="6.1.php" method="get">
                <label>
                    <input type="date" name="bersday">
                </label>
                <button type="submit">submit</button>
            </form>
        </section>
        <?php
        if (isset($_GET["bersday"]) && !isset($_COOKIE["bersday"])) {
            $bersday = htmlspecialchars($_GET["bersday"]);
            setcookie('bersday', $bersday, time() + 3600 * 24 * 365, '/');
        } else if (isset($_COOKIE["bersday"])) {
            try {
                $bersday = new DateTime($_COOKIE["bersday"]);
                $current_time = new DateTime();

                $birthday_formatted = $bersday->format('Y-m-d');
                $current_time_formatted = $current_time->format('Y-m-d');

                if ($birthday_formatted == $current_time_formatted) {
                    $birthday_this_year = new DateTime($bersday->format('Y') . '-' . $bersday->format('m') . '-' . $bersday->format('d'));
                    $interval = $bersday->diff($current_time);
                    echo "🎉🎉🎉 Поздравляю, Тебе" . $interval->format('%y') . " лет! 🎉🎉🎉";
                }
            } catch (Exception $e) {
                echo "Ошибка при обработке даты: " . $e->getMessage();
            }
        }
        ?>
    </main>
</body>
</html>


