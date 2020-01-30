<?php


class Order_detail extends Db_object
{
    protected static $db_table = "orderdetails";
    protected static $db_table_fields = array('order_id', 'product_id', 'quantity', 'price');

    public $id;
    public $order_id;
    public $product_id;
    public $quantity;
    public $price;


    public function create_order_detail(){
        $this->create();
    }

}