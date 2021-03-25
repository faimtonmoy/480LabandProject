<?php
class Calculator{
    private $myValue;

    public function setValue($v)
    {
        $this->myValue= $v;
    }
    public function square()
    {
        $ans1= $this->myValue* $this->myValue;
        echo"$ans1";
        echo "<br>";
    }
    public function qube()
    {
        $ans2= $this->myValue* $this->myValue*$this->myValue;
        echo "$ans2";
        echo "<br>";
    }
}
$c= new Calculator();
$c-> setValue(500.00);
$c-> square();
$c-> qube();
?>