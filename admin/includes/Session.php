<?php
/**
 * Created by PhpStorm.
 * User: tomen
 * Date: 4/10/2019
 * Time: 14:54
 */

class Session
{
    private $signed_in = false;
    public $user_id;
    public $role_id;






    public function is_admin($user){

        $this->role_id = $_SESSION['role_id'] = $user->role_id;

    }



    //automatisch starten van een session
    function __construct()
    {
        session_start();
        $this->visitor_count();
        $this->check_the_login();
        $this->check_message();
    }




    public function visitor_count(){
        if(isset($_SESSION['count'])){
            return $this->count = $_SESSION['count']++;
        }else{
            return $_SESSION['count'] = -1;
        }
    }

    public function is_signed_in(){
        return $this->signed_in;
    }

    public function login($user){
        $this->is_signed_in();
        if($user){
            $this->user_id = $_SESSION['user_id'] = $user->id;
            $this->signed_in = true;

        }

    }



    public function logout(){
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;
    }
    private function check_the_login(){
        if(isset($_SESSION['user_id'])){
            $this->user_id =$_SESSION['user_id'];
            $this->signed_in = true;
        }else{
            unset($this->user_id);
            $this->signed_in = false;
        }
    }

    public function message($msg =""){
        if(!empty($msg)){
            $_SESSION['message'] = $msg;
        }else{
            return $this->message;
        }
    }
    private function check_message(){
        if(isset($_SESSION['message'])){
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        }else{
            $this->message = "";
        }
    }
}
$session = new Session();