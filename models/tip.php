<?php

class Tip {

    public $tipID;
    public $nazivTipa;

    public function __construct($tipID=null,$nazivTipa=null)
    {
        $this->tipID = $tipID;
        $this->nazivTipa=$nazivTipa;
    }

    public static function vrati(mysqli $con)
    {
        $sql = "SELECT * FROM tip";
        $resultSet = $con->query($sql);
        $rezultati = [];

        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }

}

