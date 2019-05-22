<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<section>
        <form action="" method="post" class="form">

            <div class="form1">
                <input type="number" name="code" placeholder="Saisir code">
                
                <input type="text" name="nom" placeholder="Saisir nom">
              
                </em>
                <input type="month" name="date" placeholder="date">

                <input type="submit" name="valider"  class=" btn btn-primary" value="Ajouter promo" />
            </div>


        </form>

    </section>
<table>

<tr>
      <th scope="col">code promo</th>
      <th scope="col">Nom promo</th>
      <th scope="col">Date</th>
      <th scope="col">Status</th>
   </tr>

   <?php
   

$table = fopen('fiches.txt','ab+');
while (!feof ($table)) {

    $lign=fgets($table);
    $col= explode(";",$lign);
    $statu="present";
    $liste= $_POST['code'].";".$_POST['nom'].";".$_POST['date'].";".$statu;
    fwrite($table,$liste."\n");
    echo $col[0];




   ?>

   <tr>
       <td><?php echo $col[0];?></td>
       <td><?php echo $col[1];?></td>
       <td><?php echo $col[2];?></td>
       <td><?php echo $col[3];?></td>

   </tr>
   <?php

}
fclose($table);
?>
</table>


</body>
</html>