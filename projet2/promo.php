<?php
$nom = $code = "";
$nomerror = $coderror = "";
$ok = false;
$table = fopen('fiches.txt', 'a+');



if (($_SERVER["REQUEST_METHOD"] == "POST")) {
    $verifie = true;



    if (empty($nomM)) {
        $nomerror = "champs requise";
        $verifie = false;
    }
    if (empty($codeM)) {
        $coderror = "champs requise";
        $verifie = false;
    }
    if (isset($_POST['valider'])) {
        
 
    if ($verifie == true) {
        $table = fopen('fiches.txt', 'a+');
        $line = fgets($table);
        $col = explode(';', $line);

        if ($col[0] == $codeM) {
            $ok = true;
        }
        if ($ok == false) {
            fwrite($table, $_POST['code']. ";" . $_POST['nom'] . ";" . $_POST['date'] . ";\n");
            fclose($table);
        } else {
            echo "deux promos ne peuvent pas avoir le meme code";
            die();
        }
    }
}
}




?>
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
                <a class="nav-link" href="#">
                    <h4>Home </h4> <span class="sr-only">(current)</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <h4> Listes des apprenants</h4>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">
                    <h4> Services </h4>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">
                    <h4> Formulaire</h4>
                </a>
            </li>
        </ul>
        <!-- <form class="form-inline my-2 my-lg-2">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->
    </div>
</nav>

<body>
    <section>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="form">

            <div class="form1">
                <input type="number" name="code" placeholder="Saisir code">
                <em>
                    <p style="color:red; font-family:italic;"> <?php echo $coderror;  ?> </p>
                </em>
                <input type="text" name="nom" placeholder="Saisir nom">
                <em>
                    <p style="color:red; font-family:italic;"> <?php echo $nomerror;  ?> </p>
                </em>
                <input type="month" name="date" placeholder="date">

                <input type="submit" name="valider"  class=" btn btn-primary" value="Ajouter promo" />
            </div>


        </form>

    </section>

</body>
<?php
/* $nomM = $_POST['nom'];
$codeM = $_POST['code'];
$dateM = $_POST['date']; */
/* if (condition) {
    # code...
} */

echo '<table class="table table-dark">
<thead>
   <tr>
      <th scope="col">code promo</th>
      <th scope="col">Nom promo</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
   </tr>
</thead>
<tbody>
  
';
for ($i=0; $i<count($table); $i++) {
    $table = fopen('fiches.txt','a+');
    $ligne = fgets($table);
    $col = explode(";", $ligne);



    echo '  <tr>';
    echo ' <td>' . $table[0] . '</td>';
    echo ' <td >' . $table[1] . '</td>';
    echo ' <td >' . $table[2] . '</td>';


    echo ' </tr>';
    $i++;
}

echo ' </tbody>
</table>';
fclose($table);
?>



<style>
    nav {
        margin-bottom: 4%;
    }

    table {
        width: 50%;
    }
 
</style>

</html>