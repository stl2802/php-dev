<?php
    header('Content-Type: application/json');

    ini_set('display_errors', 0);
    ini_set('log_errors', 1);

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $expression = $_POST["expression"];
            $result = "";
            
            if (!preg_match('/^[\d\+\-\*\/\(\)\s]+$/', $expression)) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Это не мат выражение, пишите нормально',
                ]);
                die;
            }

            if (strlen($expression) > 100) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Слишком длинное выражение',
                ]);
                die;
            }
            
            if (substr_count($expression, '(') !== substr_count($expression, ')')) {
                echo json_encode([
                    'success' => false,
                    'message' => 'Скобки без баланса вселенной',
                ]);
                die;
            }

            function Calc($expression)  {
                $expression = preg_replace('/\s+/', '', $expression);
                while (preg_match("/\(([^()]+)\)/", $expression, $matches)){
                    $scob_vurash = Calc($matches[1]);
                    $expression = str_replace($matches[0],$scob_vurash, $expression);
                }
                while (preg_match("/(\d+)(\*|\/)(\d+)/", $expression, $matches)) {
                    if ($matches[2] === "*") {
                        $result = $matches[1] * $matches[3];
                    } else {
                        if ($matches[3] == 0) {
                            return ['success' => false,
                                    'message' => 'Делить на ноль нельзя'
                                    ];
                        }
                        $result = $matches[1] / $matches[3];
                    }
                    $expression = str_replace($matches[0], $result, $expression);
                }
        
                while (preg_match("/(\d+)([\-\+])(\d+)/", $expression, $matches ) ) {
                    $result_one = "";
                    if ( $matches[2] === "-") {
                        $result_one = $matches[1] - $matches[3];
                    }else{
                        $result_one = $matches[1] + $matches[3];
                    }
                    $expression = str_replace($matches[0], $result_one, $expression);
                }
                return $expression;
            }
            $result = Calc($expression);

            if (is_array($result)) {
                echo json_encode($result);
                die;
            }


            if (abs($result) <= PHP_INT_MAX){
                echo json_encode([
                    'success' => true,
                    'result' => $result,
                ]);
            }else{
                echo json_encode([
                    'success' => false,
                    'message' => "ТЫ КУДА ДРУЖЕ, КАКОЙ 999999999, КРИТИЧЕСКАЯ ОШИБКА ПОКИДАЙ КОРАБЛЬ",
                ]);
            }
            
    }else{
        echo json_encode([
            'success' => false,
            'result' => 'Это не пост запрос',
        ]);
    }
?>