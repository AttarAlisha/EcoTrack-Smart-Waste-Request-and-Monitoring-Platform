<?php require_once "controllerUserData.php"; ?>
<?php
if(!isset($_SESSION['info']) || $_SESSION['info'] == false){
    header('Location: login-user.php');  
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>EcoTrack - Password Changed</title>

  <!-- Favicon -->
  <link rel="icon" href="../assets/img/clients/Capture.PNG" type="image/png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">

  <!-- Custom Style -->
  <link rel="stylesheet" href="login.css">
</head>

<body>
  <!-- Header -->
  <header id="header">
    <div class="container">
      <h1 class="logo"><a href="../user/index.html">EcoTrack</a></h1>
      <nav id="nav">
        <ul>
          <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="trash.php"><i class="fa fa-trash"></i> Complain</a></li>
          <li><a href="welcome.php"><i class="fa fa-edit"></i> View History</a></li>
          <li><a href="signup-user.php"><i class="fa fa-user-plus"></i> Signup</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Password Changed Section -->
  <section id="login-section">
    <div class="login-card">
      <?php if(isset($_SESSION['info'])): ?>
        <div class="alert alert-success text-center">
          <?php echo $_SESSION['info']; unset($_SESSION['info']); ?>
        </div>
      <?php endif; ?>

      <form action="login-user.php" method="POST">
        <div class="form-group mb-3">
          <input class="button" type="submit" name="login-now" value="Login Now">
        </div>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; Copyright <strong>EcoTrack</strong>. All Rights Reserved</p>
  </footer>
</body>
</html>
