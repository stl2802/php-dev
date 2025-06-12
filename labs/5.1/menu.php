<?php
function getMenu($action, $sort) {
    $mainMenu = [
        'view' => 'Просмотр',
        'add' => 'Добавить',
        'edit' => 'Редактировать',
        'delete' => 'Удалить'
    ];
    
    $sortMenu = [
        'date' => 'По дате',
        'last_name' => 'По фамилии',
        'birth_date' => 'По возрасту',
        'id' => 'По id'
    ];
    
    $html = '<nav class="main-menu"><ul>';

    foreach ($mainMenu as $key => $title) {
        $active = ($action == $key) ? 'active' : '';
        $html .= "<li><a href='?action=$key' class='$active'>$title</a></li>";
    }
    
    $html .= '</ul>';
    

    if ($action == 'view') {
        $html .= '<ul class="sub-menu">';
        foreach ($sortMenu as $key => $title) {
            $active = ($sort == $key) ? 'active' : '';
            $html .= "<li><a href='?action=view&sort=$key' class='$active'>$title</a></li>";
        }
        $html .= '</ul>';
    }
    
    $html .= '</nav>';
    return $html;
}
?>