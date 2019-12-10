<?php
/**
 * Created by PhpStorm.
 * User: tomen
 * Date: 4/10/2019
 * Time: 9:36
 */

class Comment extends Db_object

{
    /**VARIABELEN**/
    protected static $db_table = "comments";
    protected static $db_table_fields = array( 'photo_id', 'author', 'body');

    public $id;
    public $photo_id;
    public $author;
    public $body;



    public static function create_comment($photo_id, $author="", $body=""){
        if(!empty($photo_id) && !empty($author) && !empty($body)){
            $comment = new comment();
            $comment->photo_id = (int)$photo_id;
            $comment->author = $author;
            $comment->body = $body;

            return $comment;
        }else{
            return false;
        }
    }

    public static function find_the_comments($photo_id){
        global $database;
        $sql = 'SELECT * FROM ' .self::$db_table;
        $sql .= ' WHERE photo_id = ' . $database->escape_string($photo_id);
        $sql .= ' ORDER BY photo_id ASC';

        return self::find_this_query($sql);

    }


    public function create_comment_back(){
        global $database;
        $properties = $this->clean_properties();
        $sql = " INSERT INTO " .static::$db_table . "(" .implode(",", array_keys($properties)) . ")";
        $sql .= "VALUES('" . implode("','", array_values($properties))   . "')";
        var_dump($sql);


        if($database->query($sql)){
            $this->photo_id = $database->the_insert_id();
            return true;
        }else{
            return false   ;
        }
    }

}
?>