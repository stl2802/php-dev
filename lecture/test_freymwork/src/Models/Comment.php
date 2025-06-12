<?php
namespace Models;
use Models\ActiveRecordEntity;
use Models\User;
use Models\Article;
date_default_timezone_set('Europe/Moscow');
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
    public function getTime():string
    {
        return $this->createdAt;
    }
    public function getId(): int
    {
        return $this->id;
    }
    public function setTime():void
    {
        $currentTime = date('Y-m-d H:i:s');
        $this->createdAt = $currentTime;
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