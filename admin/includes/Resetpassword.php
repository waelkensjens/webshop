<?php
class Resetpassword extends Db_object
{

    protected static $db_table = "resetpasswords";
    protected static $db_table_fields = array('code', 'user_mail');

    public $code;
    public $user_mail;


    public static function verify_mail($user_mail)
    {
        global $database;
        $user_mail = $database->escape_string($user_mail);


        $sql = "SELECT user_mail FROM " . self::$db_table . " WHERE ";
        $sql .= "user_mail = '{$user_mail}'";
        $sql .= "LIMIT 1";
        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }

    public static function verify_code($code)
    {
        global $database;

        $code = $database->escape_string($code);


        $sql = "SELECT code FROM " . self::$db_table . " WHERE ";
        $sql .= "code = '{$code}'";
        $sql .= "LIMIT 1";
        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function verify_mail_by_code($code)
    {
        global $database;

        $code = $database->escape_string($code);


        $sql = "SELECT user_mail FROM " . self::$db_table . " WHERE ";
        $sql .= "code = '{$code}'";
        $sql .= "LIMIT 1";
        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;


    }
    public static function delete_code($code)
    {
        global $database;

        $sql = "DELETE FROM " . static::$db_table . " ";
        $sql .= "WHERE code= '{$code}'";
        $sql .= " LIMIT 1";


        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }





}