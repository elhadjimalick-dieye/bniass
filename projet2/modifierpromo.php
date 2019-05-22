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
            <div class="col-lg-10">


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
                                <a class="nav-link" href="#">
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
                                <a class="nav-link" href="modification.php">
                                    <h4>modifier apprenant</h4>
                                </a>
                            </li>

                        </ul>

                    </div>
                </nav>
            </div>

        </div>
        <div class="row">
        <p><em><h2>modification possible a partir du code </h2></em></p>

            <div class="col-lg-4"></div>
            <div class="col-lg-4">

                <form action="" method="post">
                    <div class="form-group">
                        <label for="exampleFormControlInput1"></label>
                        <input type="text" class="form-control" required name="code" placeholder="Code">
                        <label for="exampleFormControlInput1"></label>
                        <input type="text" class="form-control" required name="nom" placeholder="Nom">
                        <label for="exampleFormControlInput1"></label>
                        <input type="month" class="form-control" required name="mois" placeholder="Mois">
                        <label for="exampleFormControlInput1"></label>
                        <input type="number" class="form-control" required name="app" placeholder="Nombre d'apprenants">
                        <label for="exampleFormControlInput1"></label>
                        <input type="number" class="form-control" required name="an" placeholder="Mois" min="1900" max="2099" step="1" value="2019" />


                        <br>
                        <button type="submit" name="modifier" class="btn btn-success">Modifier </button>
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
                            <th scope="col">Mois</th>
                            <th scope="col">Nombre D'apprenants</th>
                            <th scope="col">Années</th>


                        </tr>
                    </thead>
                    <?php
                    $listes = fopen('listepromo.txt', 'ab+');
                    if (isset($_POST['modifier'])) {
                        while (!feof($listes)) {
                            $ligne = trim(fgets($listes));
                            $tab = explode(';', $ligne);

                            if ($tab[1] == $_POST['nom']) {
                                $ligne = $_POST['code'] . ';' . $_POST['nom'] . ';' . $_POST['mois'] . ';' . $_POST['app'] . ';' . $_POST['an'];
                            } else {
                                $ligne = $ligne;
                            }
                            $modif = $modif . $ligne . "\n";
                        }
                        fclose($listes);

                        $listes = fopen('listepromo.txt', 'w+');
                        fwrite($listes, trim($modif));
                        fclose($listes);
                    }
                    $listes = fopen('listepromo.txt', 'ab+');
                    while (!feof($listes)) {
                        $ligne = trim(fgets($listes));
                        $tab = explode(';', $ligne); ?>
                        <tbody>
                            <tr >
                                <th scope="row"> <?php echo $tab[0]; ?> </th>
                                <td> <?php echo $tab[1]; ?> </td>
                                <td> <?php echo $tab[2]; ?></td>
                                <td><?php echo $tab[3]; ?></td>
                                <td scope="col"> <?php echo $tab[4]; ?> </td>
                            </tr>
                        </tbody>
                    <?php
                }


                fclose($listes); ?>
                </table>
            </div>
        </div>
    </div>

    <?php


    ?>
</body>
<style>
    ul {
        margin-left: 15%;

    }

    h4 {
        color: skyblue;

    }

    h3 {
        color: orange;
    }
    thead{
        background-color: grey;
        color: white;
    }
    h2 {
margin-left: 30%;
color: skyblue;
    }
</style>

</html>