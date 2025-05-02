<?php
    print("first");
    echo "<br>";
    $a = 27; 
    $b = 12;
    echo number_format(sqrt($a*$a + $b*$b),2);
    echo "<br>","17","<br>";
    $hunter = 'охотник'; 
    $wants_to = 'желает'; 
    $know = 'знать'; 
    $fizan = 'фазан'; 
    $sits = 'сидит';
    echo $hunter. " ". $wants_to. " ". $know." ". $sits." ". $fizan;
    echo "<br>","27","<br>";
    $a_27 = 2;
    $b_27= '2'; 
    $d_27 = '2a';
    $arr = array();
    $arr_oper = array();
    $arr[] = $a_27 == $b_27;
    $arr[] = $a_27 == $a_27;
    $arr[] = $b_27 == $b_27;
    $arr[] = $d_27 == $d_27;
    $arr[] = $a_27 === (int) $b_27;
    $arr_oper[] = "a_27 == b_27";
    $arr_oper[] = "a_27 == a_27";
    $arr_oper[] = "b_27 == b_27";
    $arr_oper[] = "d_27 == d_27";
    $arr_oper[] = "a_27 === (int) b_27";

    echo "<table border='1' cellpadding='10'>";
    echo "<tr><th>Действие</th><th>Результат</th></tr>";

    for ($i = 0; $i < count($arr); $i++) {
        echo "<tr>";
        echo "<td>{$arr_oper[$i]}</td>";
        echo "<td>" . ($arr[$i] ? 'true' : 'false') . "</td>";
        echo "</tr>";
    }

    echo "</table>"."<br>";
    echo "12"."<br>";
    $not_take_risks = 'Кто не рискует'; 
    $not_drink = 'не пьет'; 
    $pivo = 'шампанское';
    $ellipsis = 'тот';
    echo  "$not_take_risks $ellipsis $not_drink $pivo <br>";

    echo "38","<br>";
    $a = 7; 
    $b = '8';
    $b = (int) $b;
    echo $a++ > ++$b ? $a : $b;

    echo "<br>";
    echo "46";
    echo "<br>";
    $year = 2022; 
    $month = 3; 
    $day = 2; 
    echo sprintf("%d-%d-%d", $year, $month, $day);
?>
