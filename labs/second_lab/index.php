<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Приветствие</title>
    <style>
        
html{
    background-color: black;
    color: aliceblue;
    font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
}

a{
    text-decoration: none;
    color: inherit;
}

.header__wrapper {
    display: flex;
    justify-content: flex-start;
    margin-bottom: 12%;
}

.header__wrapper > h1{
    margin-left: 18%;
    font-weight: 500;
}

img {
    height: 10%;
    width: 10%;
}

.section{
    margin-bottom: 22%;
}
.section__wrapper{
    display: flex;
    flex-wrap: wrap; 
    justify-content: center;
    font-size: 1.3rem;
    color: aquamarine;
}

.section__a{
    margin-left: 45%;
}

.section__a{
    background-color: rgb(6, 6, 88);
    cursor:default;
}

.footer__wrapper > div{
    display: flex;
    justify-content: center;
    font-size: 2rem;
}

.section__a:hover{
    background-color: blueviolet;
    transform: scale(1.2);
    -webkit-transform: scale(1.2);
    -moz-transform: scale(1.2);
    -ms-transform: scale(1.2);
    -o-transform: scale(1.2);
}

form{
    display: grid;
    grid-template-columns: 1fr 1fr;
    grid-template-rows: 1fr 1fr 1fr 1fr;
}
.name{
    grid-column: 1;
    grid-row: 1;
}
.email{
    grid-row: 1;
    grid-column: 2;
}
.type{
    grid-row: 2;
    grid-column: 1;
}

.text{
    grid-row: 3;
    grid-column: 1/3;
    width: 100%;
}
.text > textarea{
    width: 100%;
}

.otvet{
    grid-row: 2;
    grid-column: 2;
}
.b_sabm{
    grid-row: 4;
    grid-column: 1/3;
    height: 2.5rem;
    width: 50%;
    font-size: 70%;
    margin-left: 25%;
}
    </style>
</head>
<body>
    <header>
        <div class="header__wrapper">
            <img src="https://static.tildacdn.com/tild6162-3938-4539-b030-343364343938/1643631757_29-papik-.jpg"><h1>Максимов Андрей лабораторная работа 2 "Feedback form"</h1>
        </div>
    </header>
    <main>
        <section class="section">
            <div class="section__wrapper">
                    <form action="https://httpbin.org/post" method="post">
                        <label class="name">
                            Имя пользователя<br>
                            <input type="text" required name="text">
                        </label>
                        <label class="email">
                            e-mail пользователя<br>
                            <input type="email" required name="email">
                        </label>
                        <label class="type">
                            Тип обращения
                            <select required name="type_call">
                                <option>
                                    Жалоба
                                </option>
                                <option>
                                    Предложение
                                </option>
                                <option>
                                    Благодарность
                                </option>
                            </select>
                        </label>
                        <label class="text">
                            Текст обращения<br>
                            <textarea required name="text">
                            </textarea>
                        </label>
                        <label class="otvet">
                            Вариант ответа<br>
                            Email
                            <input type="checkbox" value="e-mail" name="email">
                            SMS
                            <input type="checkbox" value="смс" name="sms">
                        </label >
                        <input type="submit"class="b_sabm">
                    </form>
            </div>
            <a href="second_peper.php" class="section__a">
                Ссылка на 2 страничку
            </a>
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