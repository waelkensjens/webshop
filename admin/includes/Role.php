<?php

class Role extends Db_object
{


    public $role_id;
    public $rolename;


    /**VARIABELEN**/
    protected static $db_table = "roles";
    protected static $db_table_fields = array('role_id','rolename', 'authorisation');



















}
?>