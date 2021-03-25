<?php
class Rectangle{
    private $height;
    private $width;
    public function setWidth($w)
    {
       $this->width=$w;
    }
    public function setHeight($h)
    {
     $this->height= $h;
    }
    public function getWidth()
    {
        return $this->width;

    }
    public function getHeight()
    {
        return $this->height;
    }
    public function showArea()
    {
         $ans= $this->width* $this->height;
         echo "$ans";
        
    }

}

$a= new Rectangle();
$b= new Rectangle();
$c= new Rectangle();
$d= new Rectangle();

$a->setWidth(7);
$a->setHeight(5);
$a->showArea();
echo"<br>";
$b->setWidth(10);
$b->setHeight(5);
$b->showArea();
echo"<br>";
$c->setWidth(7);
$c->setHeight(3);
$c->showArea();
echo"<br>";
$d->setWidth(9);
$d->setHeight(6);
$d->showArea();

?>