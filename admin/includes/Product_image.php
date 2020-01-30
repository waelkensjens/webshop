<?php


class Product_image extends Db_object
{

    protected static $db_table = "product_images";
    protected static $db_table_fields = array('product_id', 'image_name');
    public $id;
    public $product_id;
    public $image_name;
//    public $name;
//    public $type;
//    public $size;
//    public $tmp_name;
//    public $error;


    public $tmp_path;
    public $upload_directory = 'admin'.DS.'assets' . DS . 'images' . DS . 'products';
    public $upload_directory_back = 'assets' . DS . 'images' . DS . 'products';
    public $image_placeholder = 'http://place-hold.it/900x900&text=image';

    public function picture_path()
    {
        return $this->upload_directory . DS . $this->image_name;
    }


    public function image_path_and_placeholder()
    {
        return empty($this->image_name) ? $this->image_placeholder : $this->upload_directory . DS . $this->image_name;
    }

    public function image_path_and_placeholder_back()
    {
        return empty($this->image_name) ? $this->image_placeholder : $this->upload_directory_back . DS . $this->image_name;
    }

    public function set_file_product($file)
    {


        if (empty($file) || !$file || !is_array($file)) {
            $this->errors[] = "No file uploaded";
            return false;
        } elseif ($file['error'] != 0) {
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        } else {

            //  $this->image_name = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];


        }

    }

    public static function show_front_image_name_by_product_id($product_id)
    {


        global $database;

        $product_id = $database->escape_string($product_id);


        $sql = "SELECT image_name FROM " . self::$db_table . " WHERE ";
        $sql .= "product_id = '{$product_id}'";
        $sql .= "AND image_name LIKE '%0%'";
        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;


    }

    public static function show_screenshots_by_product_id($product_id,$x){
        global $database;

        $product_id = $database->escape_string($product_id);


        $sql = "SELECT image_name FROM " . self::$db_table . " WHERE ";
        $sql .= "product_id = '{$product_id}'";
        $sql .= "AND image_name LIKE '%-$x%'";
        $the_result_array = self::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }


    public static function find_the_product_photos($product_id)
    {
        global $database;
        $sql = "SELECT * FROM " . self::$db_table;
        $sql .= " WHERE product_id = " . $database->escape_string($product_id);
        $sql .= " ORDER BY product_id ASC";
        return self::find_this_query($sql);
    }
    public static function show_all_image_by_product_id($product_id)
    {

        global $database;

        $product_id = $database->escape_string($product_id);


        $sql = "SELECT * FROM " . self::$db_table . " WHERE ";
        $sql .= "product_id = '{$product_id}'";

        $the_result_array = self::find_this_query($sql);


        return $the_result_array;

    }

    public function save_product_and_image()
    {

        $target_path = SITE_ROOT . DS . "admin" . DS . $this->upload_directory . DS . $this->image_name;

        if ($this->id) {
            move_uploaded_file($this->tmp_path, $target_path);
            $this->update_product();
            unset($this->tmp_path);
            return true;
        } else {
            if (!empty($this->errors)) {
                return false;
            }
            if (empty($this->image_name) || empty($this->tmp_path)) {
                $this->errors[] = "File not available";
                return false;
            }

            if (move_uploaded_file($this->tmp_path, $target_path)) {

                if ($this->create_product()) {

                    unset($this->tmp_path);
                    return true;
                }
            } else {
                $this->errors[] = "This folder has no write rights";
                return false;
            }

        }
    }


    public function save_product_image()
    {
        if ($this->id) {
            $this->update();
        } else {
            $this->create();
            return true;
        }
    }

    public function delete_product_image()
    {
        if ($this->delete()) {
        } else {
            return false;
        }
    }

//I wrote a quick function that would convert the $_FILES array to the cleaner (IMHO) array.

    public static function reArrayFiles($file_post) {

        $file_ary = array();
        $file_count = count($file_post['name']);
        $file_keys = array_keys($file_post);

        for ($i=0; $i<$file_count; $i++) {
            foreach ($file_keys as $key) {
                $file_ary[$i][$key] = $file_post[$key][$i];
            }
        }

        return $file_ary;
    }

}

$image = new product_image();