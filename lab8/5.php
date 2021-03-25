<?php
 class Box{
     private $length;
     private $height;
     private $width;
     function __construct($l, $h, $w)
     {
       $this->length= $l;
       $this->height= $h;
       $this->width= $w;
     }
     public function getArea()
     {
         $area= $this->length* $this->height *$this->width;
         echo "$area";
         echo "<br>";
     }

 }
 $b= new Box(5,5,5);
 $b->getArea();
 ?>