<?php
namespace controllers;
use View\View;
use Services\Db;
use Models\Article; // Article с пространством имен
class MainController
{
    private $view;

    private $db;

    public function __construct(){
        $this->view = new View(__DIR__ . '/../../templates/');
        $this->db = new Db();
    }
    public function main():void
    {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', ['articles' => $articles]);
    }

    public function sayHello(string $name):void
    {
        $this->view->renderHtml('main/hello.php', ['name' => $name]);
    }

    public function sayBye(string $name):void
    {
        $this->view->renderHtml('main/bye.php', ['name' => $name]);
    }

    public function catchAll($route):void
    {
        http_response_code(404);
        $this->view->renderHtml('errors/404.php',[],404);
    }
}
?>