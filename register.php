<?php
include 'connect.php';

if (isset($_POST['submit'])) {
  $user = $_POST['user'];
  $pwd = $_POST['pwd'];
  $cpwd = $_POST['cpwd'];

  if (isset($_POST['user'])&&isset($_POST['pwd'])&&isset($_POST['cpwd'])) {
    if ($pwd==$cpwd) {
      $psql = "INSERT INTO \"MK\".\"User\"(username,password) VALUES('$user','$pwd')";
      $result = pg_query($con,$psql);
      if ($result) {
        echo '<p class="small fw-bold mt-2 pt-1 mb-0" style="color:green;">Un nouvel utlilisateur enregistrer!!'.$user.'</p>';
      } else {
        echo '<p class="small fw-bold mt-2 pt-1 mb-0" style="color:red;">Ce username existe deja!'.$user.'</p>';
      }
      pg_close($con);
      
    } else{
      echo '<p class="small fw-bold mt-2 pt-1 mb-0" style="color:red;">Veuillez bien confirmer votre mot de passe</p>';
    }
  } else {
    echo '<p class="small fw-bold mt-2 pt-1 mb-0" style="color:red;">Veuillez remplir tous les champs!!!</p>';
  }
  

}

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>AgrixTech</title>
</head>

<body>
  <div class="container">
    <h2 style="color:green;text-align: center;">Bienvenue sur AgrixTech</h2>
  </div>
  <section class="vh-100"><br><br>
  <div class="container">
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <h2>Login</h2><br>
        <form method="post">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label">Username</label>
            <input type="text" name="user" class="form-control form-control-lg"
              placeholder="Enter a Username" />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="pwd" class="form-control form-control-lg"
              placeholder="Enter password" />
          </div>

          <div class="form-outline mb-3">
            <label class="form-label">Confirm Password</label>
            <input type="password" name="cpwd" class="form-control form-control-lg"
              placeholder="Enter password" />
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="submit" class="btn btn-success btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Save</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Possedez vous deja un compte? <a href="login.php"
                class="link-primary">Login</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  
</section>
</body>

</html>