<?php
  class Student{
      private $name;
      private $id;
      private $cgpa;
      public function setValue($n, $i, $c)
      {
          $this->name= $n;
          $this->id=$i;
          $this->cgpa= $c;
      }
      public function getValue()
      {
          return $this->cgpa;
      }
  }
  $a= new Student();
  $b= new Student();
  $a->setValue("abcd","2017-1-60-080", 3.50);
  $b->setValue("abcde","2017-1-60-081", 3.60);
  $c= $a->getValue();
  $d= $b->getValue();
  $ans= ($c+$d)/2;
  echo "$ans";
