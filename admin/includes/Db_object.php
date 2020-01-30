<?php


class Db_object
{

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

    /**METHODS**/
    public static function instantie($result){
        $calling_class = get_called_class();
        $the_object = new $calling_class;
        foreach($result as $the_attribute => $value){
            if($the_object->has_the_attribute($the_attribute)){
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;

    }
    private function has_the_attribute($the_attribute){
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }
    public static function find_this_query($sql){
        global $database;
        $result = $database->query($sql);
        $the_object_array = array();
        while($row = mysqli_fetch_array($result)){
            $the_object_array[] = static::instantie($row);
        }
        return $the_object_array;
    }
    public static function find_all()
    {
        return static::find_this_query("SELECT * FROM " .static::$db_table . " ");
    }
    public static function find_by_id($id){

        global $database;
        $the_result_array = static::find_this_query("SELECT * FROM " .static::$db_table . " WHERE id= $id LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }
    public static function find_by_user_id($id){

        global $database;
        $the_result_array = static::find_this_query("SELECT * FROM " .static::$db_table . " WHERE user_id= $id LIMIT 1");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }
    public static function find_by_role_id($role_id){

        global $database;
        $the_result_array = static::find_this_query("SELECT * FROM " .static::$db_table . " WHERE role_id= $role_id LIMIT 1");



        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }
    public function find_rolename($rolename){
        global $database;
        $the_result_array = static::find_this_query("SELECT rolename FROM " .static::$db_table . " WHERE rolename= $rolename");

        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }

    public static function find_by_product_id($product_id){

        global $database;
        $the_result_array = static::find_this_query("SELECT * FROM " .static::$db_table . " WHERE product_id = $product_id LIMIT 1 ");


        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }
    public static function find_by_category_id($products){

        global $database;
        $the_result_array = static::find_this_query("SELECT * FROM " .static::$db_table . " WHERE category_id = ".$products->category_id ." and product_id not like ".$products->product_id);


        return !empty($the_result_array) ? $the_result_array: false;
    }

    public static function find_category_name_by_category_id($products){

        global $database;
        $the_result_array = static::find_this_query("SELECT category_name FROM " .static::$db_table . " WHERE category_id = ".$products->category_id);


        return !empty($the_result_array) ? $the_result_array: false;
    }

 /*   public static function find_by_class_id("$.static::$db_table." _id){

        global $database;
        $the_result_array = static::find_this_query("SELECT * FROM " .static::$db_table . " WHERE "$.static::$db_table." _id=" $.static::$db_table _id "LIMIT 1");



        return !empty($the_result_array) ? array_shift($the_result_array) : false;
    }*/



    public function item_exist(){
        $fields = static::$db_table_fields;
        $where ='';
        global $database;
        $sql = "Select *";
        $sql .=" From ".static::$db_table;

        foreach($fields as $fieldname){
            if($this->$fieldname) {
                $where .=static::$db_table . "." . $fieldname . " = '" . $database->escape_string($this->$fieldname) . "' AND ";
            }
        }
        $where = substr($where,0,-5);
        $sql .=" Where ".$where;
        $the_result_array = static::find_this_query($sql);
        return !empty($the_result_array) ? array_shift($the_result_array) : $this;
    }




    /*CRUD*/
//product_id
    public function save_product(){

        return isset($this->product_id) ? $this->update_product() : $this->create_product();
    }

    public function create_product(){
        global $database;
        $properties = $this->clean_properties();

        $sql = " INSERT INTO " .static::$db_table . "(" .implode(",", array_keys($properties)) . ")";
        $sql .= "VALUES('" . implode("','", array_values($properties))   . "')";

        if($database->query($sql)){
           var_dump($sql);
            $this->product_id = $database->the_insert_id();

            return $this->product_id;
        }else{
            return false   ;
        }
    }
    /*UPDATE*/
    public function update_product(){
        global $database;
        $properties = $this->clean_properties();
        $properties_assoc = array();

        foreach ($properties as $key => $value){
            $properties_assoc[] = "{$key}='{$value}'";
        }
        $sql = "UPDATE " .static::$db_table . " SET ";
        $sql .= implode(", ", $properties_assoc);
        $sql .= "WHERE id= " . $database->escape_string($this->id);


        $database->query($sql);
        return (mysqli_affected_rows($database->connection) ==1) ? true : false;

    }


    /*CREATE*/
    //crud for id
    public function create(){
        global $database;
        $properties = $this->clean_properties();

        $sql = " INSERT INTO " .static::$db_table . "(" .implode(",", array_keys($properties)) . ")";
        $sql .= "VALUES('" . implode("','", array_values($properties))   . "')";

        if($database->query($sql)){
            $this->id = $database->the_insert_id();

            return true;
        }else{
            return false   ;
        }
    }
    /*UPDATE*/
    public function update(){
        global $database;
        $properties = $this->clean_properties();
        $properties_assoc = array();

        foreach ($properties as $key => $value){
            $properties_assoc[] = "{$key}='{$value}'";
        }
        $sql = "UPDATE " .static::$db_table . " SET ";
        $sql .= implode(", ", $properties_assoc);
        $sql .= "WHERE id= " . $database->escape_string($this->id);


        $database->query($sql);
        return (mysqli_affected_rows($database->connection) ==1) ? true : false;

    }
   /* public function update_pass(){
        global $database;
        $properties = $this->clean_properties();
        $properties_assoc = array();

        foreach ($properties as $key => $value){
            $properties_assoc[] = "{$key}='{$value}'";
        }
        $sql = "UPDATE " .static::$db_table . " SET ";
        $sql .= implode(", ", $properties_assoc);
        $sql .= " WHERE user_mail= " . $database->escape_string($this->user_mail);


        $database->query($sql);
        return (mysqli_affected_rows($database->connection) ==1) ? true : false;

    }*/





    /*DELETE*/

    public function delete(){
        global $database;

        $sql = "DELETE FROM " . static::$db_table . " ";
        $sql .= "WHERE id= " . $database->escape_string($this->id);
        $sql .= " LIMIT 1";



        $database->query($sql);
        return(mysqli_affected_rows($database->connection) ==1) ? true : false;

    }

    public static function count_all(){
        global $database;
        $sql = "SELECT COUNT(*) FROM " . static::$db_table;
        $result_set = $database->query($sql);
        $row = mysqli_fetch_array(($result_set));

        return array_shift($row);
    }

    public function save(){

        return isset($this->id) ? $this->update() : $this->create();
    }


    protected function properties(){
        $properties = array();
        foreach (static::$db_table_fields as $db_field){
            if(property_exists($this,$db_field)){
                $properties[$db_field] = $this->$db_field;
            }
        }
        return$properties;
    }

    protected function clean_properties(){
        global $database;
        $clean_properties = array();
        foreach ($this->properties() as $key => $value){
            $clean_properties[$key] = $database->escape_string($value);
        }

        return $clean_properties;
    }

}