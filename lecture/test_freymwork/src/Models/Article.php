<?php
namespace Models;
class Article {
    private $id;
    private $name;
    private $text;
    private $authorId;
    private $createdAt;
    private $authorNickname;
    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreToCamelCase($name);
        $this->$camelCaseName = $value;
    }
    private function underscoreToCamelCase(string $source): string
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }
    
    public function getId(): int
    {
        return $this->id;
    }
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
}
?>