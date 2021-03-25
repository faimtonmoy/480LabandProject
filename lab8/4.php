<?php
 class Circle{

    private $radius;

    public function setRadius($r)
    {
        $this->radius= $r;
    }
    public function area()
    {
        $pi= 3.1416;
        $area= $pi*$this->radius*$this->radius;
        echo "$area";
        echo "<br>";
    }
    public function cumferance()
    {
        $pi= 3.1416;
        $circumferance= 2*$pi*$this->radius;
        echo "$circumferance";
        echo "<br>";
    }
 }

 $c= new Circle();

 $c->setRadius(5);
 $c->area();
 $c->cumferance();
 ?>
