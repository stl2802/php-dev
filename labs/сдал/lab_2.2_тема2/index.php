<!DOCTYPE html>
<html lang="en">
<?php
    header('Content-Type: text/html; charset="utf-8"');
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <main>
<!--         <button id="otckl_val">
            Отключить валидацию на стороне клиента.
        </button> -->
        <section>
            <div class="form-container">
                <div class="circle-line circle-1"></div>
                <div class="circle-line circle-2"></div>
                <div class="circle-line circle-3"></div>

            </div>
            <form  id="calculatorForm">
                <input name="expression" type="text" id="text__print" class="text__print" readonly>
                <div>
                    <input type="button" value="1" class="calc-button">
                    <input type="button" value="2" class="calc-button">
                    <input type="button" value="3" class="calc-button">
                    <input type="button" value="4" class="calc-button">
                    <input type="button" value="5" class="calc-button">
                    <input type="button" value="6" class="calc-button">
                    <input type="button" value="7" class="calc-button">
                    <input type="button" value="8" class="calc-button">
                    <input type="button" value="9" class="calc-button">
                    <input type="button" value="+" class="calc-button plus">
                    <input type="button" value="-" class="calc-button minus">
                    <input type="button" value="*" class="calc-button">
                    <input type="button" value="/" class="calc-button devided">
                    <input type="button" value="(" class="calc-button">
                    <input type="button" value=")" class="calc-button">
                    <button type="reset">C</button>
                </div>
                <button type="submit">Вычислить</button>
            </form>
        </section>
    </main>
    <div id = "skript">
        <script src="main.js" ></script>
    </div>
</body>
</html>