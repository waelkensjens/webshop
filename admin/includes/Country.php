<?php


class Country extends Db_object
{
    protected static $db_table = "countries";
    protected static $db_table_fields = array('country_code', 'country_name');

    public $country_id;
    public $country_code;
    public $country_name;



}