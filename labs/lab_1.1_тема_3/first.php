<?php 
    abstract class HumanAbstract{
        private $name;

        public function __construct(string $name){
            $this->name = $name;
        }

        public function getName(): string{
            return $this->name;
        }

        abstract public function getGreeting(): string;
        abstract public function getMyNameIs(): string;

        public function introduceYourself(): string{
            return $this->getGreeting() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
        }
    }
    class RussianHuman extends HumanAbstract{
        public function getGreeting(): string{
            return 'Привет';
        }
        public function getMyNameIs(): string{
            return 'Меня зовут';
        }
    }
    class EnglishHuman extends HumanAbstract{
        public function getGreeting(): string{
            return 'hellow';
        }
        public function getMyNameIs(): string{
            return 'My name is';
        }
    }

    $human1 = new RussianHuman('Иван');
    $human2 = new EnglishHuman('John');
    echo($human1->introduceYourself());
    echo "<br>";
    echo($human2->introduceYourself());
?>