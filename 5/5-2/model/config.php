<?php

 class BD
{
    public $dsn = 'mysql:host=localhost;dbname=loftPHP;charset=utf8';
    private $user='root';
    private $password='';
    public $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
     
     
    public function pdo()
    {
        return $pdo = new PDO($this->dsn, $this->user, $this->password,$this->opt);
    } 
    
     public function tryBD()
     {
         try {
             $this->pdo = null;
         } catch (PDOException $e) {
             print "Error!: " . $e->getMessage() . "<br/>";
             die();
         }
     }
}
