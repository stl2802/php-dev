<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>
<body>
    <main>
        <section class="gt-h">
            <div class="gt-h__wrapper">
                <?php 
                $headers = get_headers("https://httpbin.org/post");
                echo "<textarea>";
                var_dump($headers);
                echo "</textarea>";
                ?>
            </div>
        </section>
    </main>
    <footer>
        <div class="footer__wrapper">
            <div>
                <p>
                    Задание для самостоятельной работы
                </p>
            </div>
            <div>
                <a href="https://github.com/stl2802/php-dev.git" target="_blank">ссылка на гит</a>
            </div>
        </div>
        <p>Максимов Андрей </p> <p><?php echo date("M/Y"); ?></p>
    </footer>
</body>
</html>