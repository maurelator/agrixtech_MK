<?php
include 'connect.php';

$id = $_GET['updateid'];
$sql = "SELECT * FROM \"MK\".\"Farmer\" WHERE id=$id";
$fetch = pg_query($con,$sql);
$row = pg_fetch_object($fetch);
$name = $row->name;
$email = $row->email;
$phone = $row->phone;
$wha = $row->whatsapp;
$sex = $row->sex;
$age = $row->age;
$bio = $row->biography;
$agrix = $row->hold_agrix;
$src = $row->source;

if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $wha = $_POST['wha'];
  $sex = $_POST['sex'];
  $age = $_POST['age'];
  $bio = $_POST['bio'];
  if (isset($_POST['agrix'])) {
    $agrix = $_POST['agrix'];
  } else {
    $agrix = 'false';
  }
  $src = $_POST['src'];

  $psql = "UPDATE \"MK\".\"Farmer\" SET id=$id,name='$name',email='$email',phone='$phone',whatsapp='$wha',sex='$sex',age='$age',biography='$bio',hold_agrix='$agrix',source='$src' WHERE id=$id";

  $result = pg_query($con,$psql);

  if ($result) {
    echo "Agriculteur mis à jour!";
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
      <a class="btn btn-success btn-sm" href="index.php" role="button">Retour à l'Accueil</a><br><br>
        <!--   class="row  gy-2 gx-3 align-items-center"> -->
        <form method="post">
          <div class="col-md-4">
            <label>Nom: </label>
            <input type="text" name="name" class="form-control" value=<?php echo $name;?>>
          </div>
          <div class="col-md-4">
            <label>Phone:</label>
            <input type="tel" name="phone" class="form-control" value=<?php echo $phone;?>>
          </div>
          <div class="col-md-4">
            <label>Whatsapp:</label>
            <input type="tel" name="wha" class="form-control" value=<?php echo $wha;?>>
          </div>
          <div class="col-md-4">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value=<?php echo $email;?>>
          </div><br/>
          <div class="col-md-4">
            <label>Sexe:</label>
            <select name="sex" id="sex"  value=<?php echo $sex;?>>
              <option value="M">Homme</option>
              <option value="F">Femme</option>
            </select>
          </div><br/>
          <div class="col-md-4">
            <label>Age:</label>
            <input type="number" name="age" class="form-control"  value=<?php echo $age;?>>
          </div><br/>
          <div class="col-md-4">
            <label>Hold_Agrix</label>
            <input type="checkbox" name="agrix" value="true"  value=<?php echo $agrix;?>>
          </div><br/>
          <div class="col-md-4">
            <label>Biographie:</label>
            <input type="text"  class="form-control" value=<?php echo $bio;?>>
          </div><br/>
          <div class="col-md-4">
            <label>Source:</label>
            <input type="text" name="src" class="form-control"  value=<?php echo $src;?>>
          </div><br/>
          
          <button type="submit" name="submit" class="btn btn-primary btn-lg">Update</button>
        </form>
    </div>
</body>

</html>

