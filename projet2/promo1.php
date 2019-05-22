<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <form action="" method="post">

        <input type="text" name="code" placeholder="code">
        <input type="text" name="nom" placeholder="le nom de la promo">
        <input type="month" name="date" placeholder="date">
        <input type="submit" name="valider" value="ajouter">
    </form>

    <table border="1" class="table table-dark">
               
                    
               <tr>
                   <th scope="col">code</th>
                   <th scope="col">Nom</th>
                   <th scope="col">Date</th>
                   <th scope="col">Status</th>


               </tr>
           

            <?php

            $table = fopen('fichier.txt', 'a+');


                while (!feof($table)) {
                    $ligne = fgets($table);
                    $col = explode(';', $ligne);
                   
                        $ligne1 = "\n" . $_POST['code'] . ';' . $_POST['nom'] . ';' . $_POST['date'] . ';' . $statu;
                        fwrite($table, $ligne1);
                    
          
            ?>
           

                    <tr>
                        <td> <?php echo $col[0]; ?> </td>
                        <td> <?php echo $col[1]; ?> </td>
                        <td> <?php echo $col[2]; ?> </td>
                        <td> <?php echo $col[3]; ?> </td>
                    </tr>

                   <?php
                     }
                     
                   ?> 
                </table>
              

</body>

</html>