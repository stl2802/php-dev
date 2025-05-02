<?php 
    echo "5номер"."<br>";
    $count_list = file('count.txt');
    $count = (int) $count_list[0];
    file_put_contents('count.txt', $count+1);

    echo "15номер"."<br>";
    $file_list = ['1.txt', '2.txt', '3.txt'];
    foreach ($file_list as $file) {
        if (file_exists($file)) echo $file." существует"."<br>";
        else echo $file." не существует"."<br>";
    }

    echo "25номер"."<br>";
    foreach ($file_list as $file) {
        if (file_exists($file)) unlink($file);;
    }

    echo "29номер"."<br>";
    $file = file_get_contents("test.txt");
    echo $file."<br>";

    echo "18номер"."<br>";
    $fie_as_list = file("test.txt",FILE_IGNORE_NEW_LINES);
    var_dump($fie_as_list);
?>