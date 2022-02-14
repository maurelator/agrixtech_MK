<?php
include 'connect.php';


if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $farmer = $_POST['farmer'];
  $plant = $_POST['plant'];
  $local = $_POST['local'];
  $reg = $_POST['reg'];
  $pays = $_POST['pays'];
  $sup = $_POST['sup'];
  $stat = $_POST['stat'];
  $dpc = $_POST['dpc'];
  $dds = $_POST['dds'];
  $ddr = $_POST['ddr'];

  $psql = "INSERT INTO \"MK\".\"Project\" (name,date_prise_contact,date_semis,date_recolte,etape_courante,isupdate,localisation,pays,region,status,superficy,plantid,farmerid) VALUES('$name','$dpc','$dds','$ddr','0','false','$local','$pays','$reg','$stat','$sup','$plant','$farmer')";
  $result = pg_query($con,$psql);

  if ($result) {
    header("location:index.php");
  } else {
    echo "review your data";
  }

}

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>AgrixTech</title>
</head>

<body>
    <div class="container">
      <a class="btn btn-success btn-sm" href="index.php" role="button">Retour à l'Accueil</a><br><br>
        <!--   class="row  gy-2 gx-3 align-items-center"> -->
        <form method="post">
          <div class="col-md-4">
            <label>Nom du Projet:</label>
            <input type="text" name="name" class="form-control">
          </div><br/>
          <div class="col-md-4">
            <label>Agriculteur:</label>
            <select name="farmer">
            <?php

              $psql = "select * from \"MK\".\"Farmer\"";
              $result = pg_query($con,$psql);
                        if (!$result) {
                            echo "Error: Unable to connect to Agrix";
                        }else{
                            while ($row = pg_fetch_object($result)) {
                              $name= $row->name;
                              $id= $row->id;
                                echo '
                                <option value="'.$id.'">'.$name.'</option>';
                            }
                        }

            ?>
            </select>
          </div><br/>
          <div class="col-md-4">
            <label>Plante</label>
            <select name="plant">
            <?php

              $psql = "select * from \"MK\".\"Plant\"";
              $result = pg_query($con,$psql);
                        if (!$result) {
                            echo "Error: Unable to connect to Agrix";
                        }else{
                            while ($row = pg_fetch_object($result)) {
                              $name= $row->name;
                              $id= $row->id;
                                echo '
                                <option value="'.$id.'">'.$name.'</option>';
                            }
                        }

            ?>
            </select>
          </div><br/>
          <div class="col-md-4">
            <label>Localisation</label>
            <input type="text" name="local" class="form-control">
          </div>
          <div class="col-md-4">
            <label>Region</label>
            <input type="text" name="reg" class="form-control">
          </div>
          <div class="col-md-4">
            <label>Pays</label>
            <input type="text" name="pays" class="form-control">
          </div>
          <div class="col-md-4">
            <label>Superficie</label>
            <input type="number" name="sup" class="form-control">
          </div>
          <div class="col-md-4">
            <label>Date de Prise Contact</label>
            <input type="date" name="dpc" class="form-control">
          </div><br/>
          <div class="col-md-4">
            <label>Date de Semis</label>
            <input type="date" name="dds" class="form-control">
          </div><br/>
          <div class="col-md-4">
            <label>Date de Recolte</label>
            <input type="date" name="ddr" class="form-control">
          </div><br/>
          <div class="col-md-4">
            <label>Status</label>
            <select name="stat">
              <option value="A Jour">A jour</option>
              <option value="Pas A Jour">Ps A jour</option>
            </select>
          </div><br/>
          
          <button type="submit" name="submit" class="btn btn-primary btn-lg">Envoyer</button>
        </form>
    </div>
</body>

</html>
