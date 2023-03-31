<?php

class singupControll extends Singup{
    private $uid;
    private $pwd;
    private $pwdRepeat;
    private $email;
    
    public function __construct($uid,$pwd,$pwdRepeat,$email){
        $this->uid=$uid;
        $this->pwd=$pwd;
        $this->pwdRepeat=$pwdRepeat;
        $this->email=$email;
   }

   public function singUpUser(){
    if($this->is_empty()){
        header("location: ../index.php?error=emptyinput");
        exit();
    }
    if($this->is_username_valid()){
        header("location: ../index.php?error=username");
        exit();
    }
    if(!$this->is_email_valid()){
        header("location: ../index.php?error=email");
        exit();
    }
    if(!$this->pwdMatch()){
        header("location: ../index.php?error=passwordMatch");
        exit();
    }
    if($this->is_username_email_token()){
        header("location: ../index.php?error=Tokenusernameoremail");
        exit();
    }
    $this->setUser($this->uid,$this->pwd,$this->email);
   }

    private function is_empty(){
        $result=false;
        if(empty($this->uid)||empty($this->pwd||empty($this->pwdRepeat)||empty($this->email))){
        $result=true;
        }
        return $result; 
    }
    private function is_username_valid(){
        $result=true;
        if(!preg_match('/^[a-zA-Z0-9]$/',$this->uid)){
            $result=false;
        }
        return $result;
    }
    private function is_email_valid(){
        $re=true;
        if(!filter_var($this->email,FILTER_VALIDATE_EMAIL)){
            $re=false;
        }
        return $re;
    }
    private function pwdMatch(){
        $re=false;
        if($this->pwd===$this->pwdRepeat){
            $re=true;
        }
        return $re;
    }
    private function is_username_email_token(){
        $re=false;
        if($this->user_exist($this->uid,$this->email)){
            $re=true;
        }
        return $re;
    }
   

}