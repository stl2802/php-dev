<?php
    namespace controllers;
    use View\View;
    use Models\Article;
    use Models\User;
    use Models\Comment;
    
    class CommentsController
    {
        private $view;
        private $db;
        public function __construct()
        {
            $this->view = new View(__DIR__ . '/../../templates/');
        }
        public function edit(int $commentId): void
        {
            $comment = Comment::getById($commentId);
            if ($comment === null) {
                $this->view->renderHtml('errors/404.php', [], 404);
                return;
            }
            if (!empty($_POST)){
                $comment->setText($_POST['Text']);
                $comment->setTime();
                $comment->save();
                preg_match('~^articles/(\d+)~',$_GET['route'],$matches);
                header('Location: http://localhost/polikek/lecture/test_freymwork/www/articles/' . $matches[1].'#comment__'.$comment->getId());
                exit;
            }
            $this->view->renderHtml('articles/comment_edit.php', ['comment' => $comment]);
        }
        public function add(int $articleId):void
        {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                header('Location: http://localhost/polikek/lecture/test_freymwork/www/articles/' . $articleId);
                exit;
            }
            $text = trim($_POST['text'] ?? '');
            if (empty($text)) {
                $_SESSION['error'] = 'Текст комментария не может быть пустым';
                header('Location: /articles/' . $articleId);
                exit;
            }

            $author = User::getById(1);
            $comment = new Comment();
            $comment->setText($text);
            $comment->setArticlesId($articleId);
            $comment->setAuthor($author);

            if ($comment->save()) {
            $_SESSION['success'] = 'Комментарий успешно добавлен';
            } else {
                $_SESSION['error'] = 'Ошибка при сохранении комментария';
            }

            header('Location: http://localhost/polikek/lecture/test_freymwork/www/articles/' . $articleId);
            exit;
        }
        public function delete(int $commentId):void
        {
            preg_match('~^articles/(\d+)~',$_GET['route'],$matches);
            $comment = Comment::getById($commentId);
            $comment->delete();
            header('Location: http://localhost/polikek/lecture/test_freymwork/www/articles/' . $matches[1]);
            exit;
        }
    }
?>