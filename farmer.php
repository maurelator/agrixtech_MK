<?php
include 'connect.php';

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

  $psql = "INSERT INTO \"MK\".\"Farmer\" (name,email,phone,whatsapp,sex,age,biography,hold_agrix,source) VALUES('$name','$email','$phone','$wha','$sex','$age','$bio','$agrix','$src')";
  $result = pg_query($con,$psql);

  if ($result) {
    echo "Nouvel Agriculteur enregistré!";
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
            <input type="text" name="name" class="form-control">
          </div>
          <div class="col-md-4">
            <label>Phone:</label>
            <input type="tel" name="phone" class="form-control">
          </div>
          <div class="col-md-4">
            <label>Whatsapp:</label>
            <input type="tel" name="wha" class="form-control">
          </div>
          <div class="col-md-4">
            <label>Email:</label>
            <input type="email" name="email" class="form-control">
          </div><br/>
          <div class="col-md-4">
            <label>Sexe:</label>
            <select name="sex" id="sex">
              <option value="M">Homme</option>
              <option value="F">Femme</option>
            </select>
          </div><br/>
          <div class="col-md-4">
            <label>Age:</label>
            <input type="number" name="age" class="form-control">
          </div><br/>
          <div class="col-md-4">
            <label>Hold_Agrix</label>
            <input type="checkbox" name="agrix" value="true">
          </div><br/>
          <div class="col-md-4">
            <label>Biographie:</label>
            <input type="text" name="bio" class="form-control"/>
          </div><br/>
          <div class="col-md-4">
            <label>Source:</label>
            <input type="text" name="src" class="form-control">
          </div><br/>
          
          <button type="submit" name="submit" class="btn btn-primary btn-lg">Envoyer</button>
        </form>
    </div>
</body>

</html>

