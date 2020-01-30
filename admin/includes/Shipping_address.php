<?php


class Shipping_address extends Db_object
{
    protected static $db_table = "shipping_address";
    protected static $db_table_fields = array('user_id',  'address', 'postal', 'city','country');

    public $shipping_address_id;
    public $user_id;
    public $order_id;
    public $address;
    public $postal;
    public $city;
    public $country;
}