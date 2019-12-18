<?php

class Address extends Db_object
{
    /**VARIABELEN**/
    protected static $db_table = "addresses";
    protected static $db_table_fields = array('address', 'postal', 'city', 'country','user_id');

    public $address_id;

    public $address;
    public $postal;
    public $city;
    public $country;
    public $user_id;









    public function save_address()
    {
        if(self::find_by_name($this->address)){

            echo "address exists";

            return false;

        }
    }



    public static function find_by_address($address){

        global $database;
        $address = $database->escape_string($address);
        $sql = "SELECT * FROM " .self::$db_table . " WHERE ";
        $sql .= "adress = '{$address}' ";
        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }





}
?>