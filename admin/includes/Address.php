<?php

class Address extends Db_object
{
    /**VARIABELEN**/
    protected static $db_table = "addresses";
    protected static $db_table_fields = array('street', 'number', 'city', 'country','user_id');

    public $id;
    public $username;
    public $street;
    public $number;
    public $city;
    public $country;
    public $user_id;









    public function save_adress()
    {
        if(self::find_by_name($this->adressname)){

            echo "adressname exists";

            return false;

        }
    }
    public function save_adress_and_image()
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
            if(empty($this->adress_image) || empty($this->tmp_path)){
                $this->errors[] = "File not available";
                return false;
            }

            $target_path = SITE_ROOT . DS . "admin" . DS . $this->upload_directory . DS . $this->adress_image;
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


    public static function find_by_name($adressname){

        global $database;
        $adressname = $database->escape_string($adressname);
        $sql = "SELECT * FROM " .self::$db_table . " WHERE ";
        $sql .= "adressname = '{$adressname}' ";
        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }





}
?>