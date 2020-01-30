<?php


class Voucher extends Db_object
{

    protected static $db_table = "vouchers";
    protected static $db_table_fields = array('voucher_code', 'voucherdiscount', 'voucherpercent');

    public $voucher_id;
    public $voucher_code;
    public $voucherdiscount;
    public $voucherpercent;



    public static function verify_voucher($voucher_code){
        global $database;
        $voucher_code = $database->escape_string($voucher_code);



        $sql = "SELECT * FROM " .self::$db_table . " WHERE ";
        $sql .= "voucher_code = '{$voucher_code}' AND active = '1'";
        $sql .= "LIMIT 1";
        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }
}