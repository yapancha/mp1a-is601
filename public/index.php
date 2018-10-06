
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<?php
/**
 * Yash Panchal
 * IS 601
 * Mini project 1
 * Dynamincally read any CSV file and display it in a bootstrap table
 */

main::startWith("example.csv");

class main{
    public static function startWith($filename){
        processCsv::readCSV($filename);

    }
}

class processCsv{
    public static function readCSV($filename){
        $file = fopen($filename,"r");

        while (!feof($file)){
             print_r(fgetcsv($file));
        }
    }

}

class data{

}

class dataFactory{

}