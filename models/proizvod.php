<?php

class Proizvod{

   public $proizvodID;
   public $naziv;
   public $tipID;
   public $cena;
  
    public function __construct($proizvodID=null, $naziv=null, $tipID=null, $cena=null)
    {
        $this->proizvodID = $proizvodID;
        $this->naziv=$naziv;
        $this->tipID=$tipID;
        $this->cena=$cena;
    }

    public static function pretrazi($tip, $cena, mysqli $con)
    {
        $query = "SELECT * FROM proizvod p join tip t on p.tipID = t.tipID";
        
        if($tip != "SVI"){
            $query .= " WHERE p.tipID = " . $tip;
        }
        $query.= " ORDER BY p.cena " . $cena;


        $resultSet = $con->query($query);
        $rezultati = [];
        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }

    
    public static function vrati(mysqli $con)
    {
        $query= "SELECT * FROM proizvod p join tip t on p.tipID = t.tipID";
        $resultSet = $con->query($query);

        $rezultati = [];
        while($red = $resultSet->fetch_object()){
            $rezultati[] = $red;
        }
        return $rezultati;
    }

    public static function dodaj($naziv, $tipID, $cena, mysqli $con)
    {
        $query = "INSERT INTO proizvod VALUES(null, '$naziv' , '$tipID', '$cena')";
        return $con->query($query);
    }

    public static function izmeni($proizvodID, $naziv, $tip, $cena, mysqli $con)
    {
        $floatCena=floatval($cena);
        $query = "UPDATE proizvod SET naziv = '$naziv', tipID = '$tip', cena = '$floatCena' WHERE proizvodID = '$proizvodID'";
        return $con->query($query);
    }

    public static function obrisi($proizvodID, mysqli $con)
    {
        $query = "DELETE FROM proizvod WHERE proizvodID = $proizvodID";
        return $con->query($query);
    }
}