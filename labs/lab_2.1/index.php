<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>maksimov andrey 241-321</title>
</head>
<body>
    <?php
        $equation = "5 / 15 = x";
        $equation_1 = "5 / x = 15";
        $equation_2 = "x / 15 = 5";

        function GdeKto($left, $right): float {
            if (strlen($left) > 1) {
                if (strpos($left, "+") !== false) {
                    $left = str_replace('x', '', $left);
                    $left = str_replace('+', '', $left);
                    return (float)$right - (float)$left;
                } else if (strpos($left, "-") !== false) {
                    if (strpos($left, "-") < strpos($left, "x")) {
                        $left = str_replace('x', '', $left);
                        $left = str_replace('-', '', $left);
                        return (float)$left - (float)$right;
                    } else {
                        $left = str_replace('x', '', $left);
                        $left = str_replace('-', '', $left);
                        return (float)$left + (float)$right;
                    }
                } else if (strpos($left, "/") !== false) {
                    if (strpos($left, "/") < strpos($left, "x")) {
                        $left = str_replace('x', '', $left);
                        $left = str_replace('/', '', $left);
                        return (float)$left / (float)$right;
                    } else {
                        $left = str_replace('x', '', $left);
                        $left = str_replace('/', '', $left);
                        return (float)$left * (float)$right;
                    }
                } else if (strpos($left, "*") !== false) {
                    $left = str_replace('x', '', $left);
                    $left = str_replace('*', '', $left);
                    return (float)$right / (float)$left;
                } else {
                    if (strpos($left, "%") < strpos($left, "x")) {
                        $left = str_replace('x', '', $left);
                        $left = str_replace('%', '', $left);
                        return (float)$left / (float)$right;
                    } else {
                        $left = str_replace('x', '', $left);
                        $left = str_replace('%', '', $left);
                        return (float)$left * (float)$right;
                    }
                }
            } else {
                if (strpos($right, "+") !== false) {
                    list($num, $oper) = explode("+", $right);
                    return (float)$num + (float)$oper;
                } else if (strpos($right, "-") !== false) {
                    list($num, $oper) = explode("-", $right);
                    return (float)$num - (float)$oper;
                } else if (strpos($right, "/") !== false) {
                    list($num, $oper) = explode("/", $right);
                    return (float)$num / (float)$oper;
                } else if (strpos($right, "*") !== false) {
                    list($num, $oper) = explode("*", $right);
                    return (float)$num * (float)$oper;
                } else if (strpos($right, "%") !== false) {
                    list($num, $oper) = explode("%", $right);
                    return (float)$num % (float)$oper;
                } else {
                    return 0;
                }
            }
        }

        function Kalk($equation): float {
            $equation = str_replace(' ', '', $equation);
            list($left, $right) = explode("=", $equation);

            if (strpos($left, "x") !== false) {
                return GdeKto($left, $right);
            } else {
                return GdeKto($right, $left);
            }
        }

        echo "Результат уравнения '$equation': " . number_format(Kalk($equation), 2) . "<br>";
        echo "Результат уравнения '$equation_1': " . number_format(Kalk($equation_1), 2) . "<br>";
        echo "Результат уравнения '$equation_2': " . number_format(Kalk($equation_2), 2) . "<br>";
    ?>
</body>
</html>