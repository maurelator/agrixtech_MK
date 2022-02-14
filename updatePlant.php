<?php
include 'connect.php';

$id = $_GET['updateid'];
$sql = "SELECT * FROM \"MK\".\"Plant\" WHERE id=$id";
$fetch = pg_query($con,$sql);
$row = pg_fetch_object($fetch);
$name = $row->name;
$period = $row->periodicite;
$type = $row->type_semence;


if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $period = $_POST['period'];
  $type = $_POST['typ'];

  $psql = "UPDATE \"MK\".\"Plant\" SET id=$id,name='$name',periodicite='$period',type_semence='$type' WHERE id=$id";

  $result = pg_query($con,$psql);

  if ($result) {
    echo "Plante mis à jour!";
  } else {
    echo "review your data";
  }
}

  pg_close($con);

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
      <a class="btn btn-success btn-sm" href="home.php" role="button">Retour à l'Accueil</a><br><br/>
        <!--   class="row  gy-2 gx-3 align-items-center"> -->
        <form method="post">
          <div class="col-md-4">
            <label>Nom de la plante: </label>
            <input type="text" name="name" class="form-control" value=<?php echo $name;?>>
          </div>
          <div class="col-md-4">
            <label>Périodicité:</label>
            <input type="number" name="period" class="form-control" value=<?php echo $period;?>>
          </div>
          <div class="col-md-4">
            <label>Type de semence:</label>
            <input type="text" name="typ" class="form-control" value=<?php echo $type;?>>
          </div><br/>
          
          <button type="submit" name="submit" class="btn btn-primary btn-lg">Update</button>
        </form>
    </div>
</body>

</html>

