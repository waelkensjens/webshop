<?php


class Categorie extends Db_object
{
    protected static $db_table = "categories";
    protected static $db_table_fields = array('category_name');
    public $category_id;
    public $category_name;





    public static function get_all_categories(){
        global $database;
        $the_result_array = static::find_this_query("SELECT * FROM " .static::$db_table);

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }



}
$categories = new Categorie();