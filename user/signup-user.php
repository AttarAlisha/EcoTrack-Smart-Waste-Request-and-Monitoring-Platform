<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>EcoTrack - Signup</title>

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

  <!-- Signup Section -->
  <section id="login-section">
    <div class="login-card">
      <form action="signup-user.php" method="POST" autocomplete="">
        <h2>Signup Form</h2>
        <p>It's quick and easy.</p>

        <?php if(isset($errors) && count($errors) > 0): ?>
          <div class="alert alert-danger">
            <?php foreach($errors as $showerror){
              echo "<li>$showerror</li>";
            } ?>
          </div>
        <?php endif; ?>

        <div class="form-group mb-3">
          <input class="form-control" type="text" name="name" placeholder="Full Name" required value="<?php echo isset($name) ? $name : '' ?>">
        </div>
        <div class="form-group mb-3">
          <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo isset($email) ? $email : '' ?>">
        </div>
        <div class="form-group mb-3">
          <input class="form-control" type="password" name="password" placeholder="Password" required>
        </div>
        <div class="form-group mb-3">
          <input class="form-control" type="password" name="cpassword" placeholder="Confirm Password" required>
        </div>

        <div class="form-group mb-3">
          <input class="button" type="submit" name="signup" value="Signup">
        </div>

        <div class="link text-center">Already a member? <a href="login-user.php">Login here</a></div>
      </form>
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <p>&copy; Copyright <strong>EcoTrack</strong>. All Rights Reserved</p>
  </footer>
</body>
</html>
