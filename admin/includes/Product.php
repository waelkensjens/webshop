<?php


class  Product extends Db_object

{
    protected static $db_table = "products";
    protected static $db_table_fields = array('product_name','caption' , 'description','prijs', 'category_id','EAN', 'release_date','dev','publisher');
    public $product_id;
    public $product_name;
    public $caption;
    public $description;
    public $prijs;
    public $category_id;
    public $specs_id;
    public $EAN;
    public $release_date;
    public $dev;
    public $publisher;
    public $classname = 'product';


    public $tmp_path;
    public $upload_directory = 'assets'. DS .'images'.DS.'products';
    public $image_placeholder = 'http://place-hold.it/900x900&text=image';
    public $errors = array();
    public $upload_errors_array = array(
        UPLOAD_ERR_OK => "There is no error",
        UPLOAD_ERR_INI_SIZE => "The uploaded file exceeds the upload max filesize from php.ini",
        UPLOAD_ERR_FORM_SIZE => "The uploaded file exceeds MAX_FILE_SIZE in php.ini for html form",
        UPLOAD_ERR_NO_FILE => "No file uploaded",
        UPLOAD_ERR_PARTIAL => "The file was partially uploaded",
        UPLOAD_ERR_NO_TMP_DIR => "Missing a temporary folder",
        UPLOAD_ERR_CANT_WRITE => "Failed to write to disk",
        UPLOAD_ERR_EXTENSION => "A php extension stopped your upload"
    );






    public function picture_path(){
        return $this->upload_directory.DS.$this->filename;
    }


    public function image_path_and_placeholder(){
        return empty($this->product_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->product_image;
    }



    public function set_file_product($file){
        if(empty($file) || !$file || !is_array($file)){
            $this->errors[]= "No file uploaded";
            return false;
        }elseif($file['error'] !=0){
            $this->errors[] = $this->upload_errors_array[$file['error']];
            return false;
        }else{
            $this->product_image = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type = $file['type'];
            $this->size = $file['size'];


        }
    }


    public function save_product_and_image(){



            if($this->id){
                move_uploaded_file($this->tmp_path);
                $this->update();
                unset($this->tmp_path);
                return true;
            }else {
                if (!empty($this->errors)) {
                    return false;
                }
                if (empty($this->product_image) || empty($this->tmp_path)) {
                    $this->errors[] = "File not available";
                    return false;
                }

                $target_path = SITE_ROOT . DS . "admin" . DS . $this->upload_directory . DS . $this->product_image;
                if (file_exists($target_path)) {
                    $this->update();
                    return true;
                }
                if (move_uploaded_file($this->tmp_path, $target_path)) {

                    if ($this->create()) {

                        unset($this->tmp_path);
                        return true;
                    }
                } else {
                    $this->errors[] = "This folder has no write rights";
                    return false;
                }

            }
    }


    public static function find_by_productname($name){

        global $database;
        $the_result_array = static::find_this_query("SELECT * FROM " .static::$db_table . " WHERE product_name Like '%$name%' LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }


    public static function find_the_category_products($category_id){
        global $database;
        $sql = "SELECT * FROM ".self::$db_table;
        $sql .= " WHERE category_id = " . $database->escape_string($category_id);
        $sql .= " ORDER BY category_id ASC";
        return self::find_this_query($sql);
    }
    public function delete_product(){
        global $database;

        $sql = "DELETE FROM " . static::$db_table . " ";
        $sql .= "WHERE product_id= " . $database->escape_string($this->product_id);
        $sql .= " LIMIT 1";



        $database->query($sql);
        return(mysqli_affected_rows($database->connection) ==1) ? true : false;

    }

    public function find_by_price($minPriceOut,$maxPriceOut){
        global $database;
        $sql = "SELECT * from ".static::$db_table." WHERE price BETWEEN ".$minPriceOut." AND ".$maxPriceOut;
        $result = $database->query($sql);
        $result = mysqli_fetch_all($result);
        if(!empty($result)){
            return $result;
        }else{
            return $result = 0;
        }
    }

    public static function minPrice(){
        global $database;
        $sql = "Select MIN(price) From ".static::$db_table;
        $the_result_array = $database->query($sql);
        $the_result_array = mysqli_fetch_array($the_result_array);
        return array_shift($the_result_array);
    }

    public static function maxPrice(){
        global $database;
        $sql = "Select MAX(price) From ".static::$db_table;
        $the_result_array = $database->query($sql);
        $the_result_array = mysqli_fetch_array($the_result_array);
        return array_shift($the_result_array);
    }

}