<?php
include_once('connection.php');

$id = $_GET['i'];
$n = $_GET['n'];
$mbl = $_GET['mbl'];
$em = $_GET['em'];
$wt = $_GET['wt'];
$lo = $_GET['lo'];
$lod = $_GET['lod'];
$f = $_GET['f'];
$d = $_GET['d'];

if(isset($_POST['update'])){
    $id= $_POST['id'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $checkbox1 = $_POST['wastetype'];  
    $chk = implode(",", $checkbox1);

    $location = $_POST['location'];    
    $locationdescription = $_POST['locationdescription'];
    $date = $_POST['date'];

    $file = $_FILES['file']['name'];
    $target_dir = "upload/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $extensions_arr = array("jpg","jpeg","png","gif","tif","tiff");

    if(in_array($imageFileType, $extensions_arr)){
        move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$file);
    }

    $query = "UPDATE garbageinfo SET name='$name', mobile='$mobile', email='$email', wastetype='$chk', location='$location', locationdescription='$locationdescription', file='$file', date='$date' WHERE Id='$id'";
    $data = mysqli_query($db, $query);

    if($data){
        header("Location: welcome.php");
        exit();
    } else {
        $error = "Failed to Update!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Edit Complaint - EcoTrack</title>

<!-- Favicon -->
<link rel="icon" href="../assets/img/clients/Capture.PNG" type="image/png">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<!-- Bootstrap -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">

<!-- Custom CSS -->
<link rel="stylesheet" href="styleupdate.css">
</head>

<body>
  <!-- Header -->
  <header id="header">
    <div class="container">
      <h1 class="logo"><a href="../user/index.html">EcoTrack</a></h1>
      <nav id="nav">
        <ul>
          <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="update.php" class="active"><i class="fa fa-edit"></i> Edit Complaint</a></li>
          <li><a href="welcome.php"><i class="fa fa-eye"></i> View History</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- Update Form -->
  <section id="login-section">
    <div class="complain-card">
      <h2 class="text-center mb-4">Edit Your Complaint</h2>
      <?php if(isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
      <form method="post" action="update.php" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        
        <div class="form-group">
          <label>Name:</label>
          <input type="text" class="form-control" name="name" required value="<?php echo $n; ?>">
        </div>

        <div class="form-group">
          <label>Mobile:</label>
          <input type="number" class="form-control" name="mobile" required value="<?php echo $mbl; ?>">
        </div>

        <input type="hidden" name="email" value="<?php echo $em; ?>">

        <div class="form-group">
          <label>Category:</label><br>
          <?php
          $types = explode(",", $wt);
          $all_types = ["Organic", "Inorganic", "Household", "All"];
          foreach($all_types as $type){
              $checked = in_array($type, $types) ? "checked" : "";
              echo "<label><input type='checkbox' name='wastetype[]' value='$type' $checked> $type</label> ";
          }
          ?>
        </div>

        <div class="form-group">
          <label>Location:</label>
          <input type="text" class="form-control" name="location" required value="<?php echo $lo; ?>">
        </div>

        <div class="form-group">
          <label>Location Description:</label>
          <textarea class="form-control" name="locationdescription" rows="4" required><?php echo $lod; ?></textarea>
        </div>

        <div class="form-group">
          <label>Upload Image:</label>
          <input type="file" class="form-control" name="file" accept="image/*">
          <small>Current File: <?php echo $f; ?></small>
        </div>

        <input type="hidden" name="date" value="<?php echo date('g:ia, l jS F Y'); ?>">

        <div class="text-center">
          <button type="submit" name="update" class="button">Update</button>
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
