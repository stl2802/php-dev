<?php
    namespace controllers;
    use View\View;
    use Services\Db;
    use Models\Article;
    
    class ArticlesController
    {
        private $view;
        private $db;

        public function __construct()
        {
            $this->view = new View(__DIR__ . '/../../templates/');
            $this->db = new Db();
        }
        public function view(int $articleId):void
        {
            $result = $this->db->query(
                'SELECT articles.*, users.nickname AS author_nickname 
                FROM `articles` 
                JOIN `users` ON articles.author_id = users.id
                WHERE articles.id = :id;',
                [':id' => $articleId],
                Article::class 
            );
            if ($result === []) {
                return;
            }
            $this->view->renderHtml('articles/view.php', ['article' => $result[0]]);
        }
    }
?>