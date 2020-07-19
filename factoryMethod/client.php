<?php
require_once('ReaderFactory.php');

// $filename = 'music.csv';
$filename = 'music.xml';
$factory = new ReaderFactory();
$data = $factory->create($filename);
$data->read();
$data->display();