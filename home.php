<?php

session_start();
$por = "";

if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
if (isset($_COOKIE["userB"]))
    {
        $por="Ulogovani ste kao: " . $_COOKIE["userB"];
    }


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Coffee shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    </head>
    
    <body>

    <section class="section" id="pretraga" style="padding-top: 50px">
        <div class="container" style="margin-top: 20px">
            <div class="row">
                <div class="col-lg-4 offset-lg-4 text-center">
                    <div class="section-heading">
                        <img src="assets/css/logo.png" style="width: 90%; margin: auto">
                        <h5 id="por" style="color:white; font-weight: 400;"><i><?= $por; ?></i></h5>
                        <br>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 offset-lg-3 text-center">
            <button id="btnDodajForma" type="button" class="btn btn-success" style="background-color: #6a483e; width: 30%;" data-toggle="modal" data-target="#dodajForma">Dodaj u meni</button>
            <button id="btnIzmeniForma" type="button" class="btn btn-success" style="background-color: #6a483e; width: 30%" data-toggle="modal" data-target="#izmeniForma">Izmeni meni</button>
            <button id="btnObrisiForma" type="button" class="btn btn-success" style="background-color: #6a483e; width: 30%" data-toggle="modal" data-target="#obrisiForma">Obrisi iz menija</button>
            <br><br>
            <i><h6 id="uspesno" style="color:white;"></h6></i>
        </div>
        
        <div class="row" style="width:35%; margin:auto; margin-top: 0%;">
            <label for="tip-P" style="color:white;">Tip</label>
            <select class="form-control" id="tip-P" onchange="pretraga()"></select>
            <label for="cena-P" style="color:white;">Cena</label>
            <select class="form-control" id="cena-P" onchange="pretraga()">
                <option value="asc">Prvo jeftiniji proizvodi</option>
                <option value="desc">Prvo skuplji proizvodi</option>
            </select>
        </div>


        <br><br>

        <div class="tab" id="tabela" style="padding-top: 10px; width: 50%; margin: auto; text-align: center;"></div>
    </section>

<!-------------------------------------------- DODAJ --------------------------------------------------->

    <div class="modal fade" id="dodajForma" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 565px;">
                <div class="modal-header" style="background-color:#DFA878">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container form">
                        <form action="#" method="post" id="dodajForm">
                            <h2 style="color: black; text-align: center; width: 500px;"><i>Dodaj u meni</i></h2>
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="naziv-D">Naziv</label>
                                        <input type="text" id="naziv-D" class="form-control">
                                        
                                        <label for="tip-D">Tip</label>
                                        <select name="tip-D" id="tip-D" style="border: 1px solid black" class="form-control">
                                        </select>

                                        <label for="cena-D">Cena</label>
                                        <input type="number" class="form-control" id="cena-D">
                                    </div>
                                </div>
                                <div class="col-md-4" style="width: 90%; margin: auto; margin-top: 10px;">
                                    <br>
                                    <button id="btnDodaj" type="button" class="btn btn-success btn-block" style="background-color: #6a483e;" onclick="dodaj()">Dodaj</button>
                                    <br><br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!------------------ IZMENI -------------------------------->

    <div class="modal fade" id="izmeniForma" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 565px;">
                <div class="modal-header" style="background-color:#DFA878">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container form">
                        <form action="#" method="post" id="izmeniForm">
                            <h2 style="color: black; text-align: center; width: 500px;"><i>Izmeni meni</i></h2>
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="proizvod-I">Proizvod</label>
                                        <select name="proizvod-I" id="proizvod-I" style="border: 1px solid black" class="form-control"> </select><br><br>

                                        <label for="naziv-I">Naziv</label>
                                        <input type="text" id="naziv-I" class="form-control">
                                        
                                        <label for="tip-I">Tip</label>
                                        <select name="tip-I" id="tip-I" style="border: 1px solid black" class="form-control">
                                        </select>

                                        <label for="cena-I">Cena</label>
                                        <input type="number" class="form-control" id="cena-I">

                                    </div>
                                </div>
                                <div class="col-md-4" style="width: 90%; margin: auto; margin-top: 10px">
                                    <br>
                                    <button id="btnIzmeni" type="button" class="btn btn-success btn-block" style="background-color: #6a483e;" onclick="izmeni()">Izmeni</button>
                                    <br><br>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!----------------------------------- OBRISI -------------------------------------------------------->

    <div class="modal fade" id="obrisiForma" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content" style="width: 565px;">
                <div class="modal-header" style="background-color:#DFA878">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="container form">
                        <form action="#" method="post" id="obrisiForm">
                            <h2 style="color: black; text-align: center; width: 500px;"><i>Obrisi iz menija</i></h2>
                            <div class="row" style="color: black;">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label for="proizvod-O">Proizvod</label>
                                        <select name="proizvod-O" id="proizvod-O" style="border: 1px solid black" class="form-control"> </select>
                                    
                                    </div>
                                    <div class="col-md-4"  style="width: 90%; margin: auto; margin-top: 10px">
                                        <br>
                                        <button id="btnObrisi" type="button" class="btn btn-success btn-block" style="background-color: #6a483e;" onclick="obrisi()">Obrisi</button>
                                        <br><br>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="assets/js/jquery-2.1.0.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
 
 

    <script>
        
    </script>

  </body>
</html>