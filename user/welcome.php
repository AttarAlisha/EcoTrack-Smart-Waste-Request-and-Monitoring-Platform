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
} else {
    header('Location: login-user.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>EcoTrack - Your Complaint History</title>

  <!-- Favicon -->
  <link rel="icon" href="../assets/img/clients/Capture.PNG" type="image/png">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <!-- Bootstrap & FontAwesome -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css">

  <!-- Custom Style -->
  <style>
    body {
      font-family: "Poppins", sans-serif;
      background: linear-gradient(135deg, #A8E6CF, #DCEDC1, #FFD3B6);
      background-size: 300% 300%;
      animation: gradientShift 15s ease infinite;
      margin: 0;
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    @keyframes gradientShift {
      0% { background-position: 0% 50%; }
      50% { background-position: 100% 50%; }
      100% { background-position: 0% 50%; }
    }

    /* HEADER */
    #header {
      width: 100%;
      background: #2E8B57;
      padding: 15px 0;
      position: sticky;
      top: 0;
      z-index: 1000;
    }
    #header .container {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    #header .logo a {
      color: #fff;
      font-weight: 700;
      font-size: 1.4rem;
      text-decoration: none;
    }
    #nav ul {
      list-style: none;
      display: flex;
      gap: 25px;
      margin: 0;
    }
    #nav a {
      color: #fff;
      text-decoration: none;
      font-weight: 600;
      font-size: 15px;
      transition: color 0.3s ease;
    }
    #nav a:hover, #nav a.active {
      color: #FFD700;
    }

    /* TABLE SECTION */
    .content-section {
       flex: 1;
        padding: 40px 20px;
        margin-top: 30px;
        max-width: 95%;        /* NEW: allows table to expand more */
        margin-left: auto;
        margin-right: auto;
    }

    .content-section h2 {
      text-align: center;
      font-weight: 700;
      color: #2E8B57;
      margin-bottom: 20px;
    }

    .table {
      width: 100%;            /* Make table occupy full width */
      min-width: 1200px;      /* Ensures large width on desktop */
    }

    table {
      background: #fff;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        overflow: hidden;
        width: 100%;  
    }

    th {
      background: #2E8B57;
      color: white;
      text-align: center;
      padding: 12px;
    }

    td {
      text-align: center;
      vertical-align: middle;
      padding: 10px;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    img {
      border-radius: 8px;
    }

    .btn {
      border-radius: 20px;
      padding: 5px 15px;
      font-size: 0.9rem;
    }

    /* FOOTER */
    footer {
      background: #2E8B57;
      color: #F0FFF0;
      text-align: center;
      padding: 12px 0;
      font-size: 0.9rem;
      margin-top: auto;
    }
    footer strong {
      color: #FFD700;
    }
  </style>
</head>

<body>

  <!-- HEADER -->
  <header id="header">
    <div class="container">
      <h1 class="logo"><a href="../user/index.html">EcoTrack</a></h1>
      <nav id="nav">
        <ul>
          <li><a href="index.html"><i class="fa fa-home"></i> Home</a></li>
          <li><a href="trash.php"><i class="fa fa-trash"></i> Complain</a></li>
          <li><a href="welcome.php" class="active"><i class="fa fa-edit"></i> View History</a></li>
          <li><a href="signup-user.php"><i class="fa fa-user-plus"></i> Signup</a></li>
        </ul>
      </nav>
    </div>
  </header>

  <!-- CONTENT SECTION -->
  <section class="content-section container">
    <h2>Your Complaint History</h2>
    <div class="table-responsive">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Date</th>
            <th>Name</th>
            <th>Mobile</th>
            <th>Email</th>
            <th>Waste Type</th>
            <th>Location</th>
            <th>Description</th>
            <th>Image</th>
            <th>Status</th>
            <th colspan="2">Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include("connection.php");
          $sessionEmail = $_SESSION['email'];
          $hostForImage ="http://localhost/waste-management-system/user/upload/";
          $query = "SELECT * FROM garbageinfo WHERE email = '$sessionEmail'";
          $data = mysqli_query($db,$query);
          $total = mysqli_num_rows($data);

          if($total != 0) {
            while($result = mysqli_fetch_assoc($data)) {
              echo "
                <tr>
                  <td>{$result['date']}</td>
                  <td>{$result['name']}</td>
                  <td>{$result['mobile']}</td>
                  <td>{$result['email']}</td>
                  <td>{$result['wastetype']}</td>
                  <td>{$result['location']}</td>
                  <td>{$result['locationdescription']}</td>
                  <td><a href='{$hostForImage}{$result['file']}'><img src='{$hostForImage}{$result['file']}' height='80' width='80'/></a></td>
                  <td>{$result['status']}</td>
                  <td><a href='delete.php?i={$result['Id']}' class='btn btn-danger btn-sm'>Delete</a></td>
                  <td><a href='update.php?i={$result['Id']}&n={$result['name']}&mbl={$result['mobile']}&em={$result['email']}&wt={$result['wastetype']}&lo={$result['location']}&lod={$result['locationdescription']}&f={$result['file']}&d={$result['date']}' class='btn btn-success btn-sm'>Edit</a></td>
                </tr>
              ";
            }
          } else {
            echo "<tr><td colspan='11' class='text-center text-muted'>No complaints registered yet.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>

  <!-- FOOTER -->
  <footer>
    <p>&copy; Copyright <strong>EcoTrack</strong>. All Rights Reserved</p>
  </footer>

</body>
</html>
