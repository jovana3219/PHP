<?php

class Zaposleni{

    public $zaposleniID;
    public $username;
    public $password;

    public function __construct($zaposleniID=null,$username=null,$password=null)
    {
        $this->zaposleniID = $zaposleniID;
        $this->username=$username;
        $this->password=$password;
    }

    public static function login($zaposleni, mysqli $con)
    {
        $query = "SELECT * FROM zaposleni WHERE username='$zaposleni->username' and password='$zaposleni->password'";
        return $con->query($query);
    }

}

