<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Document</title>
</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <img src="logo.jpg" alt="" width="5%" height="60px">
        <a class="navbar-brand" href="#" style="width:15% ">
            <h3> SONATEL ACADEMIE</h3>
        </a>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-3">

            <li class="nav-item active">
                <a class="nav-link" href="page1.php">
                    <h4>Home </h4> <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="liste.php">
                    <h4> Listes des apprenants</h4>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#promos">
                    <h4>Promos</h4>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="modifierpromo.php">
                    <h4>modifier promos</h4>
                </a>
            </li>

        </ul>

    </div>
</nav>

<body>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4">
            <form action="" method="post">
                <div class="form-group">
                    <label for="exampleFormControlInput1"></label>
                    <input type="text" class="form-control" name="code" required placeholder="Code">
                    <label for="exampleFormControlInput1"></label>
                    <input type="text" class="form-control" name="nom" required placeholder="Nom">
                    <label for="exampleFormControlInput1"></label>
                    <input type="text" class="form-control" name="prenom" required placeholder="Prenom">
                    <label for="exampleFormControlInput1"></label>
                    <select name="ndp" class="form-control">

                        <?php
                        $listep = fopen('listepromo.txt', 'ab+');

                        while (!feof($listep)) {
                            $srt = trim(fgets($listep));
                            $tab = explode(';', $srt);

                            echo " <option value=" . $tab[1] . ">" . $tab[1] . "</option>";
                        }

                        fclose($liste);
                        ?>

                    </select>
                    <label for="exampleFormControlInput1"></label>
                    <input type="date" class="form-control" name="date" required placeholder="JJ-MM-AAAA">
                    <label for="exampleFormControlInput1"></label>
                    <input type="number" class="form-control" name="tel" required placeholder="Telephone">
                    <label for="exampleFormControlInput1"></label>
                    <input type="email" class="form-control" name="email" required placeholder="name@example.com">
                    <br>
                    <button type="submit" class="btn btn-primary" name="ajouter">Ajouter</button>
                </div>
            </form>

        </div>

    </div>


    </div>
    <section id="promos">
        <span>
            <div class="photo">
                <a href="listepromo1.php">
                    <h3>Cliquer ici pour voir la promo 1</h3>
                    <img src="p3.jpg" alt="" width="40%" height="300px">
                </a>

            </div>

            <div class="photo1">
                <a href="listepromo2.php">
                    <h3>Cliquer ici pour voir la promo 2</h3>
                    <img src="p1.jpg" alt="" width="75%" height="300px">
                </a>

            </div>
        </span>

    </section>
    <?php
    $listep = fopen('listepromo.txt', 'ab+');
    while (!feof($listep)) {
        $srt = trim(fgets($listep));
        $tab = explode(';', $srt);

        // echo " <option value=" . $tab[1] . ">" . $tab[1] . "</option>";
    }

    fclose($liste);
    ?>
    <?php

    $liste = fopen('liste.txt', 'ab+');
    if (isset($_POST['ajouter'])) {
        while (!feof($liste)) {
            $srt = trim(fgets($liste));
            $tab = explode(';', $srt);
            $tab = "present";
            if ($_POST['code'] == $tab[0]) {
                echo "<h5 >le code existe deja reassayer!</h5 >";
            } else {
                $ligne = "\n" . $_POST['code'] . ';' . $_POST['nom'] . ';' . $_POST['prenom'] . ';' . $_POST['ndp'] . ';' . $_POST['date'] . ';' . $_POST['tel'] . ';' . $_POST['email'] . ';' . $tab;
                // echo $ligne;
                fwrite($liste, $ligne);
            }
        }

        fclose($liste);
    }


    $liste1 = fopen('liste1.txt', 'ab+');
    if (isset($_POST["ajouter"])) {
        while (!feof($liste1)) {
            $col = trim(fgets($liste1));
            $tab = explode(';', $col);
            $tab = "present";
            if ($_POST['code'] == $tab['alioune ndiaye']) {
                $ligne = "\n" . $_POST['code'] . ';' . $_POST['nom'] . ';' . $_POST['prenom'] . ';' . $_POST['ndp'] . ';' . $_POST['date'] . ';' . $_POST['tel'] . ';' . $_POST['email'] . ';' . $tab;
            }



            if ($_POST['code'] == $tab[0]) {
                echo "<h5 >le code existe deja reassayer!</h5 >";
            } else {
                $ligne = "\n" . $_POST['code'] . ';' . $_POST['nom'] . ';' . $_POST['prenom'] . ';' . $_POST['ndp'] . ';' . $_POST['date'] . ';' . $_POST['tel'] . ';' . $_POST['email'] . ';' . $tab;
            }
        }
        fwrite($liste1, $ligne);
    }


    
    $liste2 = fopen('liste2.txt', 'ab+');
    if (isset($_POST["ajouter"])) {
        if ($_POST['ndp'] == $tab['babacar fall']) {

            $ligne = "\n" . $_POST['code'] . ';' . $_POST['nom'] . ';' . $_POST['prenom'] . ';' . $_POST['ndp'] . ';' . $_POST['date'] . ';' . $_POST['tel'] . ';' . $_POST['email'] . ';' . $tab;
        }


        while (!feof($liste2)) {
            $col = trim(fgets($liste2));
            $tab = explode(';', $col);
            $tab = "present";


            if ($_POST['code'] == $tab[0]) {

                echo "<h5 >le code existe deja reassayer!</h5 >";
            } else {

                $ligne = "\n" . $_POST['code'] . ';' . $_POST['nom'] . ';' . $_POST['prenom'] . ';' . $_POST['ndp'] . ';' . $_POST['date'] . ';' . $_POST['tel'] . ';' . $_POST['email'] . ';' . $tab;
            }
        }
        fwrite($liste2, $ligne);
    }

    ?>

    <footer>

        <div class="card text-center">
            <div class="card-header">
                <h2> coding for better life </h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">SONATEL ACADEMIE</h5>
                <p class="card-text">premiere ecole de codage gratuite au senegal</p>
                <a href="#" class="btn btn-primary">ACCUEIL</a>
            </div>
            <div class="card-footer text-muted">
                Depuis avril 2017
            </div>
        </div>

    </footer>

</body>
<style>
    body {
        width: 100%;
    }

    .photo {
        margin-top: 0%;
        padding-left: 05%;
        padding-right: 05%;
        padding-top: 0%;
        padding-bottom: 05%;
        border-top: 10px solid skyblue;
        border-bottom: 10px solid skyblue;
        height: 400px;
        margin-left: 10%;
        margin-right: 10%;
    }

    .photo1 {
        margin-top: -30%;

        width: 40%;

        margin-left: 50%;

        height: 400px;
    }


    a {
        margin-top: 0%;
        padding-left: 05%;
        padding-right: 03%;
        padding-top: 05%;



    }

    nav {
        margin-bottom: 5%;
    }

    input {
        width: 25%;
        padding: 10px;
    }

    form {
        margin-left: 2%;
        margin-top: -10%;
        padding-bottom: 5%;


    }

    .form1 {
        padding: 1%;
    }

    .form2 {
        padding: 1%;
    }

    button {

        padding: 1%;
        margin-left: 80%;
        margin-top: -0%;

    }

    .form3 {
        padding: 1%;
        margin-top: -8%;
        margin-left: 79%;
        width: 20%;

    }

    ul {
        margin-left: 25%;

    }

    h4 {
        color: skyblue;

    }

    h3 {
        color: orange;
    }
</style>

</html>