<?php
    namespace controllers;
    use View\View;
    use Models\Article;
    
    class ArticlesController
    {
        private $view;
        private $db;
        public function __construct()
        {
            $this->view = new View(__DIR__ . '/../../templates/');
        }
        public function view(int $articleId)
        {
            $article = Article::getById($articleId);
            if ($article === null) {
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            $this->view->renderHtml('articles/view.php', ['article' => $article]);
        }
    }
?>