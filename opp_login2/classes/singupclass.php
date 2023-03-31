<?php

class Singup extends Dbh{
    protected function user_exist($uid,$email){
    $state=$this->connect()->prepare("SELECT user_id FROM users WHERE uid= ? OR email=?");

        if(!$state->execute(array($uid,$email))){
            $state=null;
            header("location:../index.php?error=statefailed");
            exit();
        }
        $result=true;
        if($state->rowCount()==0){
            $result=false;
        }
        return $result;

    }
    protected function setUser($uid,$pwd,$email){
        $state=$this->connect()->prepare("INSERT INTO users (uid,pwd,email)
        VALUES (?,?,?)");
        $hashpass=password_hash($pwd,PASSWORD_DEFAULT);
            if(!$state->execute(array($uid,$hashpass,$email))){
                $state=null;
                header("location:../index.php?error=statefailed");
                exit();
            }
            $state=null;
        }

}
