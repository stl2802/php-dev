<?php
    class Cat{
        public $name;
        private $color;
        public function __construct(string $name,string $color){
            $this->name = $name;
            $this->setColor( $color );
        }
        public function sayHellow(){
            echo "".$this->name." ". $this->getColor();
        }
        public function setColor(string $color){
            $this->color = $color;
        }
        public function getColor(){
            return $this->color;
        }
    }

    $citty = new Cat("Мурзик","Белый");
    echo ($citty->sayHellow());
?>