<?php

require_once('ItemDao.php');
require_once('DbItemDao.php');
require_once('Item.php');

class DbItemDao implements ItemDao {

    private $item;
    public function __construct() {
        $fp = fopen('item_data.txt', 'r');
        // $dummy = fgets($fp, 4096);

        $this->item = array();
        while ($buffer = fgets($fp, 4096)) {
            $item_id = trim(substr($buffer, 0, 10));
            $item_name = trim(substr($buffer, 10));

            $item = new Item($item_id, $item_name);
            $this->items[$item->getId()] = $item;
        }
        fclose($fp);
    }

    public function findById($item_id) {
        if (array_key_exists($item_id, $this->items)) {
            return $this->items[$item_id];
        } else {
            return null;
        }
    }

}