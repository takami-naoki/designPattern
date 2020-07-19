<?php
require_once('./Reader.php');
require_once('./CSVFileReader.php');
require_once('./XMLFileReader.php');

class ReaderFactory {

    public function create($filename) {
        $reader = $this->createReader($filename);
        return $reader;
    }

    public function createReader($filename) {
        $poscsv = stripos($filename, '.csv');
        $posxml = stripos($filename, '.xml');

        if ($poscsv !== false) {
            return new CSVFileReader($filename);
        } else if ($posxml !== false) {
            return new XMLFileReader($filename);
        } else {
            die('This filename is not supported : ' . $filename);
        }
    }

}