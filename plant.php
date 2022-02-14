<?php
include 'connect.php';

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $period = $_POST['period'];
  $type = $_POST['typ'];

  $psql = "INSERT INTO \"MK\".\"Plant\" (name,periodicite,type_semence) VALUES('$name','$period','$type')";
  $result = pg_query($con,$psql);

  if ($result) {
    echo "Nouvelle Plante enregistré!";
  } else {
    echo "review your data";
  }
  
  pg_close($con);

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
      <a class="btn btn-success btn-sm" href="index.php" role="button">Retour à l'Accueil</a><br><br/>
        <!--   class="row  gy-2 gx-3 align-items-center"> -->
        <form method="post">
          <div class="col-md-4">
            <label>Nom de la plante: </label>
            <input type="text" name="name" class="form-control">
          </div>
          <div class="col-md-4">
            <label>Périodicité:</label>
            <input type="number" name="period" class="form-control">
          </div>
          <div class="col-md-4">
            <label>Type de semence:</label>
            <input type="text" name="typ" class="form-control">
          </div><br/>
          
          <button type="submit" name="submit" class="btn btn-primary btn-lg">Envoyer</button>
        </form>
    </div>
</body>

</html>

