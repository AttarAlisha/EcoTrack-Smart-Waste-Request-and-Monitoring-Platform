<?php 
require_once 'controllerUserData.php';
$email = $_SESSION['email'] ?? false;
$password = $_SESSION['password'] ?? false;
if(!$email || !$password){
  header('Location: login-user.php');
  exit;
}

$sql = "SELECT * FROM usertable WHERE email = '$email'";
$run_Sql = mysqli_query($con, $sql);
if($run_Sql){
    $fetch_info = mysqli_fetch_assoc($run_Sql);
    $status = $fetch_info['status'];
    $code = $fetch_info['code'];
    if($status == "verified"){
        if($code != 0){
            header('Location: reset-code.php');
        }
    } else {
        header('Location: user-otp.php');
    }
}

// Database and mail logic
error_reporting(0);
include('database.inc');
$msg = "";

if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
    $checkbox1 = $_POST['wastetype'];  
    $chk = implode(",", $checkbox1);

    $email = mysqli_real_escape_string($con,$_POST['email']);
    $status = mysqli_real_escape_string($con,$_POST['status']);
    $location = mysqli_real_escape_string($con,$_POST['location']);    
    $locationdescription = mysqli_real_escape_string($con,$_POST['locationdescription']);
    $date = $_POST['date'];

    $file = $_FILES['file']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif","tif","tiff");

    if(in_array($imageFileType,$extensions_arr)){
        move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$file);
    }

    $sql = "INSERT INTO garbageinfo(name,mobile,email,wastetype,location,locationdescription,file,date,status)
            VALUES('$name','$mobile','$email','$chk','$location','$locationdescription','$file','$date','$status')";
    
    if(mysqli_query($con,$sql)){
        $msg = '<div class="alert alert-success mt-3"><span class="fa fa-check"></span> Complain Registered Successfully! <a href="welcome.php">View Complain</a></div>';
    } else {
        $msg = '<div class="alert alert-danger mt-3"><span class="fa fa-times"></span> Failed to Register!</div>';
    }

    // Email notification
    $html = "
        <h3>New Complaint Registered</h3>
        <table border='1' cellpadding='6' cellspacing='0'>
        <tr><td><b>Name:</b></td><td>$name</td></tr>
        <tr><td><b>Mobile:</b></td><td>$mobile</td></tr>
        <tr><td><b>Email:</b></td><td>$email</td></tr>
        <tr><td><b>Waste Type:</b></td><td>$chk</td></tr>
        <tr><td><b>Location:</b></td><td>$location</td></tr>
        <tr><td><b>Description:</b></td><td>$locationdescription</td></tr>
        <tr><td><b>Image:</b></td><td>$file</td></tr>
        <tr><td><b>Date:</b></td><td>$date</td></tr>
        </table>";

    require_once('PHPMailerAutoload.php');
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->SMTPSecure = 'tls';
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->isHTML(true);
    $mail->Username = 'wastemanagement615@gmail.com';
    $mail->Password = 'pjon pvek paip qwag';
    $mail->SetFrom('no-reply@ecotrack.org');
    $mail->Subject = 'New Waste Complaint Registered';
    $mail->Body = $html;
    $mail->AddAddress('attaralisha29@gmail.com');
    $mail->SMTPOptions = array('ssl'=>array(
        'verify_peer'=>false,
        'verify_peer_name'=>false,
        'allow_self_signed'=>false
    ));
    $mail->send();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>EcoTrack - Complain Form</title>

  <!-- Favicon -->
  <link rel="icon" href="../assets/img/clients/Capture.PNG" type="image/png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Header -->
  <header id="header">
    <div class="container">
      <h1 class="logo"><a href="../user/index.html">EcoTrack</a></h1>
      <nav id="nav">
        <ul>
          <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="trash.php" class="active"><i class="fa fa-trash"></i> Complain</a></li>
          <li><a href="welcome.php"><i class="fa fa-edit"></i> View History</a></li>
          <li><a href="signup-user.php"><i class="fa fa-user-plus"></i> Signup</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Complaint Form -->
  <section id="login-section">
    <div class="complain-card">
      <h2 class="text-center mb-4">Register Your Complaint</h2>
      <?php echo $msg; ?>
      <form method="post" action="trash.php" enctype="multipart/form-data">
        <div class="form-group">
          <label>Name:</label>
          <input type="text" class="form-control" name="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
          <label>Mobile:</label>
          <input type="number" class="form-control" name="mobile" placeholder="Enter your mobile number" required>
        </div>
        <input type="hidden" name="email" value="<?php echo $_SESSION['email']; ?>">
        
        <div class="form-group">
          <label>Category:</label><br>
          <label><input type="checkbox" name="wastetype[]" value="Organic"> Organic</label>
          <label><input type="checkbox" name="wastetype[]" value="Inorganic"> Inorganic</label>
          <label><input type="checkbox" name="wastetype[]" value="Household"> Household</label>
          <label><input type="checkbox" name="wastetype[]" value="All" checked> All</label>
        </div>

        <div class="form-group">
          <label>Location:</label>
          <input type="text" class="form-control" name="location" placeholder="Enter your area/location" required>
        </div>

        <div class="form-group">
          <label>Location Description:</label>
          <textarea class="form-control" name="locationdescription" rows="4" placeholder="Enter detailed description..." required></textarea>
        </div>

        <div class="form-group">
          <label>Upload Image:</label>
          <input type="file" class="form-control" name="file" accept="image/*" required>
        </div>

        <input type="hidden" name="status" value="Pending">
        <input type="hidden" name="date" value="<?php date_default_timezone_set('Asia/Kolkata'); echo date('g:ia, l jS F Y'); ?>">

        <div class="text-center">
          <button type="submit" name="submit" class="button">Register</button>
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
