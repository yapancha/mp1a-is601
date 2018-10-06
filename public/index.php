
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
        $data = processCsv::readCSV($filename);
        html::makeTable($data);
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
            $all[] = dataFactory::createData($keys,$data);

        }
        fclose($file);

        return $all;
    }
}

class data{
    public function __construct(Array $keys=null, Array $vals = null){
        $record = array_combine($keys,$vals);
        foreach ($record as $key => $value){
            $this->createProperty($key,$value);
        }
    }
    public function createProperty($key, $value){
        $this->{$key} = $value;
    }
}

class dataFactory{
    public static function createData(Array $keys = null, Array $vals = null){

        $data = new data($keys, $vals);
        return $data;
    }
}

class html{
    public static function makeTable($data){
        $isHeader = true;
        foreach ($data as $line){
            if($isHeader){
                self::makeHeader($line);
                $isHeader = false;
            }else{
                self::makeRow($line);
            }
        }
    }


    public static function makeHeader($data){
        $str = "<table class=\"table table-striped\"><thead><tr>";

        foreach ($data as $val){
            $str.= "<th>".$val."</th>";
        }
        $str.= "</tr></thead>";
        echo $str;
    }

    public static function makeRow($data){
        $str = "<tr>";
        foreach ($data as $val){
            $str.= "<td>".$val."</td>";
        }
        $str .= "</tr>";
        echo $str;
    }
}

class sys{
    public static function printRow($str){
        echo $str;
    }
}