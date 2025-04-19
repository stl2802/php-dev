<?php
    echo "10zadanie"."<br>";
    $array_ten = [ "http://site.ru", "http://site.ru/", "https://site.ru", "https://site.ru/"];
    foreach ($array_ten as $key => $value) {
        if (preg_match("/(^https)($/)/",$value)) echo $value."<br>";
    }
?>
