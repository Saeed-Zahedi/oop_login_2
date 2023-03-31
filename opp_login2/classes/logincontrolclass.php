<?php

class loginControll extends Login{
    private $uid;
    private $pwd;

    
    public function __construct($uid,$pwd){
        $this->uid=$uid;
        $this->pwd=$pwd;

   }

   public function login_user(){
    if($this->is_empty()){
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    $this->getUser($this->uid,$this->pwd);
   }

    private function is_empty(){
        $result=false;
        if(empty($this->uid)||empty($this->pwd)){
        $result=true;
        }
        return $result; 
    }

}