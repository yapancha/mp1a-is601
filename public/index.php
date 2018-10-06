
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
        $isKey = true;

        while(! feof($file)) {
            $data = fgetcsv($file);

            if($isKey){
                $keys = $data;
                $isKey = false;
            }
            $all[] = dataFactory::createData($data);

        }
        fclose($file);

        return $all;
    }

}

class data{
    public function __construct(Array $data){

    }

}

class dataFactory{
    public static function createData($data){
        $data = new data($data);

        return $data;
    }
}