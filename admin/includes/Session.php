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




    // update shop cart
    public static function update_cart($id,$qty){
        $shop_cart = array();
        for ($i=0;$i<sizeof($id);$i++){
            $item = array();
            array_push($item,$id[$i]);
            array_push($item,$qty[$i]);
            array_push($shop_cart, $item);
        }
        return $shop_cart;
    }

    // delete shop cart item
    public static function delete_cart_product(){
        for($i=0;$i<sizeof($_SESSION['shop_cart']);$i++){
            if ($_SESSION['shop_cart'][$i][0] == $_GET['id']){
                if (sizeof($_SESSION['shop_cart']) == 1){
                    unset($_SESSION['shop_cart']);
                    $_SESSION['shop_cart'] = array();
                    break;
                }
                else{
                    if($i == 0){
                        array_shift( $_SESSION['shop_cart']);
                        break;
                    }else{
                        array_splice( $_SESSION['shop_cart'],intval([$i]),1);
                        break;
                    }
                }

            }
        }
        return $_SESSION['shop_cart'];
    }

    //count shop cart items
    public static function count_shop_items(){
        if (!empty($_SESSION['shop_cart'])){
            return count($_SESSION['shop_cart']);
        }
        else{
            return 0;
        }
    }

    //clear session variables ($weight $total_price $shop_cart $delivery $order)
    public static function payed(){
        $_SESSION['weight'] = array();
        $_SESSION['total_price'] = array();
        $_SESSION['shop_cart'] = array();
        $_SESSION['delivery'] = array();
        $_SESSION['order'] = array();
    }



}
$session = new Session();