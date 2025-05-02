<?php
    echo "10 задание"."<br>";
    $arrayrand = ['a'=>1, 'b'=>2, 'c'=>3];
    echo $arrayrand[array_rand($arrayrand)]."<br>";

    echo "20 задание"."<br>";
    $array_twety = [1, 2, 3, 4, 5];
    array_splice($array_twety, 1, 2);
    foreach ($array_twety as $value) {
        echo $value." ";
    }
    echo "<br>";

    echo "30 задание"."<br>";
    $array_thirty = [1, 2, 3, 4, 5];

    if (in_array(3, $array_thirty)) echo "true"."<br>";
    else echo "false"."<br>";

    echo "40 задание"."<br>";
    $array_forty = ['1', '2', '3', '4', '5'];
    $ressult = 0;
    foreach($array_forty as $value) {
        $ressult += (int) $value**2;
    }
    echo $ressult."<br>";

    echo "50 задание"."<br>";

    $array_fifty = [1,2,3,4,5,6,7,8,9];
    $array_fifty_new = array();
    function sEven(int $num):bool{
        if ($num % 2 == 0) return true;
        else return false;
    }

    foreach($array_fifty as $value) {
        if (sEven($value)) $array_fifty_new[] = $value;
    }
    var_dump($array_fifty_new);

    echo "60 задание"."<br>";
    $array_sixty = ['Привет, ', 'мир', '!'];
    $text = implode(" ", $array_sixty)."<br>";
    echo $text;
?>