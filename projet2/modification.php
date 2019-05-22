<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-1"></div>


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

                   

                    </ul>

                </div>
            </nav>


        </div>

    </div>
    <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-11">
            <p><em><h2>modification possible a partir du code </h2></em></p>
            <form action="" method="post">
                <div class="form-group"><br>

                    <div class="row">
                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="code" placeholder="Code"><br>
                            <input type="text" class="form-control" name="nom" placeholder="Nom"><br>
                            <input type="text" class="form-control" name="prenom" placeholder="Prenom"><br>
                        </div>

                        <div class="col-lg-3">
                            <input type="text" class="form-control" name="ndp" placeholder="Nom de la Promo"><br>
                            <input type="date" class="form-control" name="date" placeholder="JJ-MM-AAAA"><br>

                            <input type="number" class="form-control" name="tel" placeholder="Telephone"><br>
                        </div>
                        <div class="col-lg-3">
                            <input type="email" class="form-control" name="email" placeholder="name@example.com"><br>
                            <div class="col-lg-3">
                                <button type="submit" name="modifier" class="btn btn-primary">Modifier </button>
                            </div>
                        </div>
                    </div>
            </form>

        </div>
        <div class="col-lg-4"></div>
    </div>
    <div class="row">
        <div class="col-lg-1"></div>
        <div class="col-lg-10">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Code</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Promo</th>
                        <th scope="col">Date de Naissance</th>
                        <th scope="col">Telephone</th>
                        <th scope="col">Email</th>

                        <th scope="col"> Statu</th>
                    </tr>
                </thead>

                <?php

                $liste = fopen('liste.txt', 'ab+');
                if (isset($_POST['modifier'])) {
                    while (!feof($liste)) {
                        $srt = trim(fgets($liste));
                        $tab = explode(';', $srt);
                        if ($_POST['nom'] == $tab[1]) {
                            $tab = "present";
                            $ligne = $_POST['code'] . ';' . $_POST['nom'] . ';' . $_POST['prenom'] . ';' . $_POST['ndp'] . ';' . $_POST['date'] . ';' . $_POST['tel'] . ';' . $_POST['email'] . ';' . $tab . "\n";
                        } else {
                            $ligne = $srt;
                        }
                        $modif = $modif . $ligne . "\n";
                    }
                    fclose($liste);

                    $liste = fopen('liste.txt', 'w+');
                    fwrite($liste, trim($modif));
                    fclose($liste);
                }
                $liste = fopen('liste.txt', 'ab+');
                while (!feof($liste)) {
                    $srt = trim(fgets($liste));
                    $tab = explode(';', $srt); ?>

                    <tbody>
                        <tr>
                            <th scope="row"> <?php echo $tab[0]; ?> </th>
                            <td><?php echo $tab[1]; ?> </td>
                            <td><?php echo $tab[2]; ?> </td>
                            <td><?php echo $tab[3]; ?> </td>
                            <td><?php echo $tab[4]; ?> </td>
                            <td><?php echo $tab[5]; ?> </td>
                            <td><?php echo $tab[6]; ?> </td>
                            <!--                                 <td scope="col"> <a href=""> <button class="btn btn-info "> <?php echo $tab[7]; ?> </button></a> </td>
     -->
                        </tr>
                    </tbody>

                <?php
            }
            fclose($liste);

            ?>

            </table>
        </div>
    </div>

    </div>


</body>
<style>
    form {
        width: 100%;
        margin-left: 10%;

    }

    input {
        width: 100%;
    }

    ul {
        margin-left: 25%;

    }

    h3 {
        color: orange;
    }

    h4 {
        color: skyblue;

    }
    h2 {
margin-left: 30%;
color: skyblue;
    }
</style>

</html>