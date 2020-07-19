<?php

if (isset($_POST['factory'])) {
    $factory = $_POST['factory'];
    switch ($factory) {
        case 1:
            include_once('Dbfactory.php');
            $factory = new DbFactory();
            break;
        case 2:
            include_once('Mockfactory.php');
            $factory = new Mockfactory();
            break;
    }
    $item_id = 1;
    $item_dao = $factory->createItemDao();
    $item = $item_dao->findById($item_id);
    echo "ID={$item_id}の商品は{$item->getName()}です。<br>";

    $order_id = 3;
    $order_dao = $factory->createOrderDao();
    $order = $order_dao->findById($order_id);
    echo "ID={$order_id}の注文情報は次の通りです。";
    echo '<ul>';
    foreach ($order->getItems() as $item) {
        echo "<li>{$item['object']->getName()}</li>";
    }
    echo '</ul>';
}

?>

<form action="" method="POST">
    <div>
        DaoFactoryの種類：
        <input type="radio" name="factory" value="1">DbFactory
        <input type="radio" name="factory" value="2">MockFactory
    </div>
    <div>
        <input type="submit">
    </div>
</form>