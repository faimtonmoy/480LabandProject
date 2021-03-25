<?php
    class Account{
        private $accountID;
        private $accountBalance;
        private static $count = 0;

        function __construct(){
            self::$count++;
            $this->accountID = self::$count;
            $this->accountBalance = 0;
            
        }

        function showAccountInfo(){
            $a= $this->accountID;
            $b= $this->accountBalance;
            echo "$a";
            echo "<br>";
            echo "$b";
            echo "<br>";
        }

        function deposit($amount){
            $d=$this->accountBalance += $amount;
            echo "Account balance is";
            echo "$d";
            echo "<br>";
        }

        function withdraw($amount){
            $e=$this->accountBalance -= $amount;
            echo "Account balance is";
            echo "$e";
            echo "<br>";
        }

        function transferMoney($ob, $amount){
            if($this->accountBalance>=$amount){
                echo "transfer was complete";
                $ob->deposit($amount);
                $this->withdraw($amount);
                echo "<br>";
                
            } else {
                echo "not enough balance";
                echo "<br>";

            }
        }

        function showInformation(){
            echo "account created so far";
            $f= self::$count;
            echo "$f";
            echo "<br>";
        }
    }

    $acc1 = new Account();
    $acc1->showAccountInfo();
    $acc1->showInformation();
    $acc2 = new Account();
    $acc2->showAccountInfo();
    $acc2->showInformation();
    $acc1->deposit(1000);
    $acc2->deposit(500);
    $acc1->showAccountInfo();
    $acc2->showAccountInfo();
    $acc1->transferMoney($acc2, 1000);
    $acc1->showAccountInfo();
    $acc2->showAccountInfo();
    $acc1->transferMoney($acc2, 500);
    $acc1->showAccountInfo();
    $acc2->showAccountInfo();


?>