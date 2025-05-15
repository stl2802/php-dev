<?php
namespace Models;
use Models\ActiveRecordEntity;
use Models\User;
use Models\Article;
class Comment extends ActiveRecordEntity
{
    protected $id;
    protected $authorId;
    protected $articlesId;
    protected $text;
    protected $createdAt;
    protected static function getTableName(): string
    {
        return 'comments';
    }
    
    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }
    public function getArticle(): Article
    {
        return Article::getById($this->articlesId);
    }
    public function getText(): string
    {
        return $this->text;
    }
    public function setText(string $newText):void {
        $this->text = $newText;
    }
    public function setAuthor(User $author):void{
        $this->authorId = $author->getId();
    }
    public function setArticlesId(int $id):void
    {
        $this->articlesId = $id;
    }
}
?>