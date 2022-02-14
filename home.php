<?php
include 'connect.php';

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <script src="home.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>AgrixTech</title>
</head>

<body>
  <div class="container">
    <div class="m-4">
      <ul class="nav nav-tabs" id="myTab">
          <li class="nav-item">
              <a href="#Projects" class="nav-link" data-bs-toggle="tab" onclick= "showProjects()">Projects</a>
          </li>
          <li class="nav-item">
              <a href="#Farmers" class="nav-link" data-bs-toggle="tab"  onclick= "showFarmers()">Farmers</a>
          </li>
          <li class="nav-item">
              <a href="#Plants" class="nav-link" data-bs-toggle="tab" onclick= "showPlants()">Plants</a>
          </li>
      </ul>
      <div class="tab-content">
          <div class="tab-pane fade show active" id="Projects" >
              <h4 class="mt-2">All Projects  <a class="btn btn-success btn-sm" href="project.php" role="button">Ajouter un projet</a></h4>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">N°-</th>
                        <th scope="col">Nom Projet</th>
                        <th scope="col">Agriculteur</th>
                        <th scope="col">Plante</th>
                        <th scope="col">Date Prise Contact</th>
                        <th scope="col">Date Semis</th>
                        <th scope="col">Date Recolte</th>
                        <th scope="col">Etape en Cours</th>
                        <th scope="col">Localisation</th>
                        <th scope="col">Region</th>
                        <th scope="col">Pays</th>
                        <th scope="col">Superficie</th>
                        <th scope="col">Status</th>
                        <th scope="col">IsUpdate</th>
                        <th scope="col">Opérations</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php

                        $psql = "select * from \"MK\".\"Project\"";
                        $result = pg_query($con,$psql);
                        if (!$result) {
                            echo "Error: Unable to connect to Agrix";
                        }else{
                            while ($row = pg_fetch_object($result)) {
                                $id = $row->id;
                                $name= $row->name;
                                $farmer= $row->farmerid;
                                $plant= $row->plantid;
                                $datcont= $row->date_prise_contact;
                                $datsem= $row->date_semis;
                                $datrec= $row->date_recolte;
                                $step= $row->etape_courante;
                                $local= $row->localisation;
                                $region= $row->region;
                                $pays= $row->pays;
                                $supf= $row->superficy;
                                $status= $row->status;
                                $isUp= $row->isupdate;
                                echo '
                                <tr>
                                  <th scope="row">'.$id.'</th>
                                  <td>'.$name.'</td>
                                  <td>'.$farmer.'</td>
                                  <td>'.$plant.'</td>
                                  <td>'.$datcont.'</td>
                                  <td>'.$datsem.'</td>
                                  <td>'.$datrec.'</td>
                                  <td>'.$step.'</td>
                                  <td>'.$local.'</td>
                                  <td>'.$region.'</td>
                                  <td>'.$pays.'</td>
                                  <td>'.$supf.'</td>
                                  <td>'.$status.'</td>
                                  <td>'.$isUp.'</td>
                                  <td><a class="btn btn-primary btn-sm" href="updateProject.php?updateid='.$id.'" role="button">Modifier</a>
                            <a class="btn btn-danger btn-sm" href="deleteProject.php?deleteid='.$id.'" role="button">Supprimer</a></td>
                                </tr>
                                ';
                            }
                            //pg_close($con);
                        }

                        ?>
                        
                        
                </tbody>
              </table>
          </div>
          <div class="tab-pane fade" id="Farmers">
              <h4 class="mt-2">All Farmers <a class="btn btn-success btn-sm" href="farmer.php" role="button">Ajouter un agriculteur</a></h4>
                <table class="table table-striped">
                <thead>
                  <tr>
                    <tr>
                      <th scope="col">N°-</th>
                      <th scope="col">Nom</th>
                      <th scope="col">Age</th>
                      <th scope="col">Biography</th>
                      <th scope="col">email</th>
                      <th scope="col">Hold_agrix</th>
                      <th scope="col">Phone</th>
                      <th scope="col">Whatsapp</th>
                      <th scope="col">Sex</th>
                      <th scope="col">Source</th>
                      <th scope="col">Opérations</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $psql = "select * from \"MK\".\"Farmer\"";
                  $result = pg_query($con,$psql);
                  if (!$result) {
                      echo "Error: Unable to connect to Agrix";
                  }else{
                      while ($row = pg_fetch_object($result)) {
                          $id = $row->id;
                          $name= $row->name;
                          $age= $row->age;
                          $bio= $row->biography;
                          $email= $row->email;
                          $hold= $row->hold_agrix;
                          $phone= $row->phone;
                          $what= $row->whatsapp;
                          $sex= $row->sex;
                          $source= $row->source;
                          echo '
                          <tr>
                            <th scope="row">'.$id.'</th>
                            <td>'.$name.'</td>
                            <td>'.$age.'</td>
                            <td>'.$bio.'</td>
                            <td>'.$email.'</td>
                            <td>'.$hold.'</td>
                            <td>'.$phone.'</td>
                            <td>'.$what.'</td>
                            <td>'.$sex.'</td>
                            <td>'.$source.'</td>
                            <td><a class="btn btn-primary" href="updateFarmer.php?updateid='.$id.'" role="button">Modifier</a>
                            <a class="btn btn-danger" href="deleteFarmer.php?deleteid='.$id.'" role="button">Supprimer</a></td>
                          </tr>
                          ';
                      }
                      //pg_close($con);
                  }

                  ?>
                  
                  
                </tbody>
            </table>
          </div>
          <div class="tab-pane fade" id="Plants">
              <h4 class="mt-2">All Plants <a class="btn btn-success btn-sm" href="plant.php" role="button">Ajouter une plante</a></h4>
                    <table class="table table-striped">
                <thead>
                  <tr>
                    <th scope="col">N°-</th>
                    <th scope="col">Nom Plante</th>
                    <th scope="col">Type Semence</th>
                    <th scope="col">Périodicité</th>
                    <th scope="col">Opérations</th>
                  </tr>
                </thead>
                <tbody>
                  <?php

                  $psql = "select * from \"MK\".\"Plant\"";
                  $result = pg_query($con,$psql);
                  if (!$result) {
                      echo "Error: Unable to connect to Agrix";
                  }else{
                      while ($row = pg_fetch_object($result)) {
                          $id = $row->id;
                          $name= $row->name;
                          $semence= $row->type_semence;
                          $period= $row->periodicite;
                          echo '
                          <tr>
                            <th scope="row">'.$id.'</th>
                            <td>'.$name.'</td>
                            <td>'.$semence.'</td>
                            <td>'.$period.'</td>
                            <td><a class="btn btn-primary" href="updatePlant.php?updateid='.$id.'" role="button">Modifier</a>
                            <a class="btn btn-danger" href="deletePlant.php?deleteid='.$id.'" role="button">Supprimer</a></td>
                          </tr>
                          ';
                      }
                      pg_close($con);
                  }

                  ?>
                  
                </tbody>
            </table>
          </div>
      </div>
    </div>
  </div>
</body>

</html>