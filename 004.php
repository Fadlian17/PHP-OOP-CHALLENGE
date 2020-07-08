<?php
//method chain
class Chain
{

    public $itemChain = array();
    public $price;

    function addItem($data)
    {
        $addData = json_decode($data, true);
        array_push($this->itemChain, $addData);
    }

    function removeItem($data)
    {
        $item_id = json_decode($data, true);
        for ($i = 0; $i < count($this->itemChain); $i++) {
            if ($this->itemChain[$i]["item_id"] == $item_id["item_id"]) {
                unset($this->itemChain[$i]);
                $this->itemChain = array_values($this->itemChain);
            }
        }
    }

    function addDiscount()
    {
        $total = 0;
        for ($i = 0; $i < count($this->itemChain); $i++) {
            $total += $this->itemChain[$i]["price"] * $this->itemChain[$i]["quantity"] / 2;
        }
        $this->price = $total;
    }

    function totalItems()
    {
        echo count($this->itemChain);
    }

    function totalQuantity()
    {
        $total = 0;
        for ($i = 0; $i < count($this->itemChain); $i++) {
            $total += $this->itemChain[$i]["quantity"];
        }
        echo $total;
    }

    function totalPrice()
    {
        echo $this->price;
    }

    function showAll()
    {
        var_dump($this->itemChain);
    }

    function checkout()
    {
        $dataJson = json_encode($this->itemChain, JSON_PRETTY_PRINT);
        $open_file = fopen("./json/output.json", "a+");
        fwrite($open_file, $dataJson);
        $this->itemChain = null;
    }
}

$chain = new Chain();
$chain->addItem('{"item_id":1,"price":30000,"quantity":3}');
$chain->addItem('{"item_id":2,"price":1000, "quantity":3}');
$chain->addItem('{"item_id":3,"price":5000, "quantity":2}');
$chain->removeItem('{"item_id": 2}');
$chain->addItem('{ "item_id": 4, "price": 400, "quantity": 6 }');
$chain->addDiscount('50%');
$chain->totalItems();
echo "\n";
$chain->totalQuantity();
echo "\n";
$chain->totalPrice();
echo "\n";
$chain->showAll();
$chain->checkout();
