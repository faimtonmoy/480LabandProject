<?php
    class Rectangle{
        private $height;
        private $width;

        function __construct($h, $w){
            $this->height = $h;
            $this->width = $w;
        }

        public function showArea(){
            $ans= $this->height * $this->width;
            echo "$ans";
            echo "<br>";
        }
    }

    $a = new Rectangle(5,7);
    $b = new Rectangle(5,10);
    $c = new Rectangle(3,7);
    $d = new Rectangle(6,9);

    
    
    $a->showArea();
    $b->showArea();
    $c->showArea();
    $d->showArea();
?>