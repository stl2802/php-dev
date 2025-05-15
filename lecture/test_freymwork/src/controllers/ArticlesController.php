<?php
    namespace controllers;
    use View\View;
    use Models\Article;
    use Models\User;
    use Models\Comment;
    
    class ArticlesController
    {
        private $view;
        private $db;
        public function __construct()
        {
            $this->view = new View(__DIR__ . '/../../templates/');
        }
        public function view(int $articleId):void
        {
            $article = Article::getById($articleId);
            if ($article === null) {
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            $comments = $article->getAllComments();
            $this->view->renderHtml('articles/view.php', ['article' => $article,'comments' => $comments]);

            $reflector = new \ReflectionObject($article);
            $properties = $reflector->getProperties();
            $propertiesNames = [];
            foreach ($properties as $property) {
                $propertiesNames[] = $property->getName();
            }
        }
        public function edit(int $articleId): void
        {
            $article = Article::getById($articleId);
            if ($article === null) {
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            if (!empty($_POST)){
                $article->setName($_POST['ArticleName']);
                $article->setText($_POST['ArticleText']);
                $article->save();
                header("Location: http://localhost/polikek/lecture/test_freymwork/www/");
                exit;
            }
            $this->view->renderHtml('articles/edit.php', ['article' => $article]);
        }
        public function add():void
        {
            $author = User::getById(1);
            $article = new Article();
            $article->setAuthor($author);
            $article->setName('Новое имя статьи');
            $article->setText('Новый текст статьи');
            $article->save();
            header("Location: http://localhost/polikek/lecture/test_freymwork/www/");
        }
        public function delete(int $articleId):void
        {
            $article = Article::getById($articleId);
            if ($article === null) {
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            $comments = $article->getAllComments();
                        foreach($comments as $comment){
                $comment->delete();
            }
            $article->delete();

            header("Location: http://localhost/polikek/lecture/test_freymwork/www/");
        }
    }
?>