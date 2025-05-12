<?php
namespace Models;
use Models\ActiveRecordEntity;
class Article extends ActiveRecordEntity
{
    protected $name;
    protected $text;
    protected $authorId;
    protected $createdAt;
    private $authorNickname;
    public function getName(): string
    {
        return $this->name;
    }
    public function getText(): string
    {
        return $this->text;
    }
    public function getAuthor():string {
        return $this->authorNickname;
    }
    protected static function getTableName(): string
    {
        return 'articles';
    }
}
?>