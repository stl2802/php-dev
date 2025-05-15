<?php
namespace Models;
use Models\ActiveRecordEntity;
use Models\User;
use Models\Comment;
class Article extends ActiveRecordEntity
{
    protected $name;
    protected $text;
    protected $authorId;
    protected $createdAt;
    public function getName(): string
    {
        return $this->name;
    }
    public function getText(): string
    {
        return $this->text;
    }
    protected static function getTableName(): string
    {
        return 'articles';
    }
    public function getAuthor(): User
    {
        return User::getById($this->authorId);
    }
    public function setName(string $newName):void{
        $this->name = $newName;
    }
    public function setText(string $newText):void{
        $this->text= $newText;
    }
    public function setAuthor(User $author): void
    {
    $this->authorId = $author->getId();
    }
    public function getAllComments():array{
        return Comment::getAll(static::getTableName(),$this->id);
    }
}
?>