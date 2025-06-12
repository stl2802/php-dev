<?php
require_once __DIR__.'\config.php';
require_once __DIR__.'\menu.php'; 

$action = $_GET['action'] ?? 'view';
$page = (int)($_GET['page'] ?? 1);
$sort = $_GET['sort'] ?? 'date';
$id = $_GET['id'] ?? null;

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Записная книжка</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?= getMenu($action, $sort) ?>
    
    <div class="content">
        <?php
            switch ($action) {
                case 'view':
                    require __DIR__.'\viewer.php';
                    break;
                case 'add':
                    require __DIR__.'\add.php';
                    break;
                case 'edit':
                    require __DIR__.'\edit.php';
                    break;
                case 'delete':
                    require __DIR__.'\delete.php';
                    break;
                default:
                    echo "Страница не найдена";
            }
        ?>
    </div>
</body>
</html>