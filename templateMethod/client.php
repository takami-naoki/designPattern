<?php

require_once('ListDisplay.php');
require_once('TableDisplay.php');

$data = ['Design Pattern', 'Gang of Four', 'Template Method Sample'];
$display1 = new ListDisplay($data);
$display2 = new TableDisplay($data);

$display1->getDisplay();
echo '<hr>';
$display2->getDisplay();