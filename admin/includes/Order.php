<?php


class Order extends Db_object
{
    protected static $db_table = "orders";
    protected static $db_table_fields = array('user_id','total', 'shipping_address_id', 'order_date', 'transactionID');
    public $id;
    public $user_id;
    public $total;
    public $shipping_address_id;
    public $order_date;
    public $transactionID;





}