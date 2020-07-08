<?php
//Chaining 
class Chain
{
    protected $item_data;
    function __construct()
    {
        $this->item_data = new ArrayObject();
    }

    protected function data_update($values)
    {
        if ($values != '') {
            $this->item_data->append($values);
        }
    }

    protected function get_data()
    {
        return $this->item_data;
    }


    protected function remove_data($index)
    {
        unset($this->item_data[$index]);
    }
}

class CartChain extends Chain
{
    protected $items;
    protected $total_items;
    protected $total_quantity;
    protected $total_price;
    public $disc_items;

    function __construct()
    {
        //ovveride
        parent::__construct();
        $this->items = parent::get_data_items();
        $this->total_items = 0;
        $this->total_quantity = 0;
        $this->total_price = 0;
        $this->disc_items = 0;
    }

    //nanti dilanjutkan
}
