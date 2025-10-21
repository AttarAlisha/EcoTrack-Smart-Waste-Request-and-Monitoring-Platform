<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login | EcoTrack</title>

    <!-- Google Fonts & CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" crossorigin="anonymous" />
</head>

<body>
    <?php require_once "controllerUserData.php"; ?>

    <!-- HEADER -->
    <header id="header">
        <div class="container">
            <div class="logo">
                <h1 class="logo"><a href="../index.html">EcoTrack</a></h1>

            </div>
            <!-- <nav id="nav">
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </nav> -->
        </div>
    </header>

    <!-- LOGIN SECTION -->
    <section id="login-section">
        <div class="login-card">
            <h2>Admin Login</h2>
            <p><b>Login with your email and password.</b></p>

            <?php if(count($errors) > 0): ?>
                <div class="alert alert-danger text-center">
                    <?php foreach($errors as $showerror){ echo $showerror; } ?>
                </div>
            <?php endif; ?>

            <form action="../adminlogin/index.php" method="POST" autocomplete="">
                <div class="form-group">
                    <input class="form-control" type="email" name="email" placeholder="Email Address" required value="<?php echo $email ?>">
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" name="password" placeholder="Password" required>
                </div>

                <div class="link forget-pass text-left">
                    <a href="forgot-password.php"><b>Forgot password?</b></a>
                </div>

                <div class="form-group">
                    <input class="form-control button" type="submit" name="login" value="Login">
                </div>
            </form>

            <div class="link mt-3">
                <a href="../login-user.php">
                    <i class="fa fa-lock" aria-hidden="true"></i> Login as User
                </a>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <p>© <strong><?php echo date('Y'); ?></strong> EcoTrack | Smart Waste Platform</p>
    </footer>

</body>
</html>
