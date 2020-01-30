<?php


class Coupon extends Db_object
{

    protected static $db_table = "coupons";
    protected static $db_table_fields = array('coupon_code', 'coupondiscount', 'couponpercent');

    public $coupon_id;
    public $coupon_code;
    public $coupondiscount;
    public $couponpercent;





    public static function check_coupon($coupon_code){
        global $database;
        $the_result_array= static::find_this_query("SELECT * FROM " .static::$db_table . " WHERE coupon_code Like '%$coupon_code%' LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }


    public static function verify_coupon($coupon_code){
        global $database;
        $coupon_code = $database->escape_string($coupon_code);



        $sql = "SELECT * FROM " .self::$db_table . " WHERE ";
        $sql .= "coupon_code = '{$coupon_code}' AND active = '1'";
        $sql .= "LIMIT 1";
        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }
}