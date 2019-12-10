<?php

class User extends Db_object
{
    /**VARIABELEN**/
    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name','user_mail','user_image','role_id');

    public $id;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_mail;
    public $user_image;
    public $role_id;
    public $tmp_path;
    public $upload_directory = 'assets'. DS .'images'.DS.'users';
    public $image_placeholder = 'http://place-hold.it/400x400&text=image';





    public static function verify_user($username, $password){
        global $database;
        $username = $database->escape_string($username);
        $password = $database->escape_string($password);


        $sql = "SELECT * FROM " .self::$db_table . " WHERE ";
        $sql .= "username = '{$username}' AND password = '{$password}' OR user_mail = '{$username}'";
        $sql .= "AND password = '{$password}' ";
        $sql .= "LIMIT 1";
        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }




    public function image_path_and_placeholder(){
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->user_image;
    }



    public function set_file($file){
        $timestamp = date(' Y-m-d H-i-s ');
        if(empty($file) || !$file || !is_array($file)){
            $this->errors[]= "No file uploaded";
            return false;
        }elseif($file['error'] !=0){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        }else{
            $this->user_image =  $timestamp  . basename($file['name']) ;
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];


        }
    }

    public function save_user()
    {
        if(self::find_by_name($this->username)){

            echo "username exists";

            return false;

        }
    }
    public function save_user_and_image()
    {


     if($this->id){
            move_uploaded_file($this->tmp_path);
            $this->update();
            unset($this->tmp_path);
            return true;
        }else{
            if(!empty($this->errors))
            {
                return false;
            }
            if(empty($this->user_image) || empty($this->tmp_path)){
                $this->errors[] = "File not available";
                return false;
            }

        $target_path = SITE_ROOT . DS . "admin" . DS . $this->upload_directory . DS . $this->user_image;
            if(file_exists($target_path)){
                $this->update();
                return true;
            }
            if(move_uploaded_file($this->tmp_path, $target_path)){
                if($this->create()){
                    unset($this->tmp_path);
                    return true;
                }
            }
            else{
                $this->errors[]= "This folder has no write rights";
                return false;
            }

        }
    }


    public static function find_by_name($username){

        global $database;
        $username = $database->escape_string($username);
        $sql = "SELECT * FROM " .self::$db_table . " WHERE ";
        $sql .= "username = '{$username}' ";
        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function find_by_mail($user_mail){
        global $database;
        $user_mail = $database->escape_string($user_mail);
        $sql = "SELECT * FROM " .self::$db_table . " WHERE ";
        $sql .= "user_mail = '{$user_mail}' ";
        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }



}
?>