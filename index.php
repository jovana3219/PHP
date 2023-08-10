<?php

require "baza.php";
require "models/zaposleni.php";

$uspesno= "";

session_start();

if(isset($_POST['user']) && isset($_POST['pass'])){
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    
    $zaposleni = new Zaposleni(1, $user, $pass);
    $rez = Zaposleni::login($zaposleni, $con);
    
    if($rez->num_rows==1){
        $_SESSION['user_id'] = $zaposleni->zaposleniID;
        setcookie("userB", $user, time() + 2 * 24 * 60 * 60);
        header('Location: home.php');
        exit();
    }else{
        $uspesno = "Pokusajte ponovo!";
    }
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Coffee shop</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>

    <div class="login-form">
        <div class="main-div">
            <div class="container" style="margin-top: 20px; margin-bottom: -50px;">
                <div class="row">
                    <div class="col-lg-4 offset-lg-4 text-center">
                        <div class="section-heading">
                            <img src="assets/css/logo.png" style="width: 90%; margin: auto">
                        </div>
                    </div>
                </div>
            </div>
            <form method="post" action="">
                <br><br><br><br>
                <br>
                <div class="container" style="width: 30%; margin: auto; background-color: #ece6e6; border-radius: 7%">
                    <br>
                    <center><h5><?= $uspesno; ?></h5></center>

                    <label class="user">Korisničko ime</label>
                    <input type="text" name="user" class="form-control" required>
                    <br>

                    <label for="pass">Lozinka</label>
                    <input type="pass" name="pass" class="form-control" required>
                    <br>

                    <button type="submit" class="btn btn-primary" style="background-color: #6a483e; width: 80%; margin-left: 10%; margin-top:5%; border-radius: 8%; border: 1px #80da62;" name="submit">Login</button>
                    <br><br>
                </div>
            </form>
        </div>
    </div>

    <br>

</body>
</html>