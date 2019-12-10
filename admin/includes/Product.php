<?php


class Product extends Db_object
{
    protected static $db_table = "products";
    protected static $db_table_fields = array('product_name','product_image', 'caption' , 'description','prijs', 'category_id');
    public $id;
    public $product_name;
    public $product_image;
    public $caption;
    public $description;
    public $prijs;
    public $category_id;


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





    public function picture_path(){
        return $this->upload_directory.DS.$this->filename;
    }

    public function delete_product(){
        if($this->delete()){
            $target_path = SITE_ROOT.DS.'admin'. DS . $this->picture_path();
            return unlink($target_path) ? true : false;
        }else{
            return false;
        }

    }
    public function image_path_and_placeholder(){
        return empty($this->product_image) ? $this->image_placeholder : $this->upload_directory.DS.$this->product_image;
    }

    public function save_product_and_image()
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
            if(empty($this->product_image) || empty($this->tmp_path)){
                $this->errors[] = "File not available";
                return false;
            }

            $target_path = SITE_ROOT . DS . "admin" . DS . $this->upload_directory . DS . $this->product_image;
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



    public static function find_by_productname($name){

        global $database;
        $the_result_array = static::find_this_query("SELECT * FROM " .static::$db_table . " WHERE product_name Like '% $name%' LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }
}
