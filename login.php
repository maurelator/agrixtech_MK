<?php
include 'connect.php';

if (isset($_POST['submit'])) {
  $user = $_POST['user'];
  $pwd = $_POST['pwd'];

  $psql = "SELECT * FROM \"MK\".\"User\" WHERE username='$user' AND password='$pwd'";
  $result = pg_query($con,$psql);

  if (pg_num_rows($result)==1) {
    session_start();
    $_SESSION['auth']='true';
    header('location:index.php');
  } else {
    echo '<p style="color:red;">Username Or Password Incorrect</p>';
  }

  pg_close($con);
  

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
    <h2 style="color:green;text-align: center;">Bienvenue sur AgrixTech</h2>
  <section class="vh-100"><br>
  <div class="container">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="https://borgenproject.org/wp-content/uploads/5366744359_d0ce558637_z.jpg" class="img-fluid"
          alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        <h2>Login</h2><br>
        <form method="post">
          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label">Username</label>
            <input type="text" name="user" autocomplete="off" class="form-control form-control-lg"
              placeholder="Enter a Username" />
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="pwd" class="form-control form-control-lg"
              placeholder="Enter password" />
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <button type="submit" name="submit" class="btn btn-success btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="register.php"
                class="link-primary">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  
</section>
</body>

</html>