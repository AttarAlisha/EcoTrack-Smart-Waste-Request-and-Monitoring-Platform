

<!DOCTYPE html>
<html lang="en">
<head> 
  <meta charset="UTF-8">
  <title>Admin Dashboard | EcoTrack</title>

  <!-- Bootstrap & jQuery -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.min.css" rel="stylesheet">

  <style>
  @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

  /* RESET */
  * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: "Poppins", sans-serif;
  }

  /* BACKGROUND */
  html, body {
    background: linear-gradient(135deg, #E6F4EA, #DFF6E0, #F7FFF4);
    background-size: cover;
    height: 100%;
    width: 100%;
    overflow-x: hidden;
  }

  /* NAVBAR */
  .navbar {
    background-color: #2E8B57 !important;
    border: none;
    border-radius: 0;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
  }
  .navbar-brand span {
    color: #fff;
    font-weight: 700;
    margin-left: 10px;
    letter-spacing: 0.5px;
  }
  .navbar-inverse .navbar-nav > li > a {
    color: #F0FFF0 !important;
    font-weight: 600;
    display: flex;
    align-items: center;
    gap: 6px;
    transition: 0.3s ease;
  }
  .navbar-inverse .navbar-nav > li > a:hover {
    color: #FFD700 !important;
  }
  .logo1 {
    border-radius: 50%;
  }

  /* SIDEBAR */
  .side-nav {
    background-color: #2E8B57;
    position: fixed;
    top: 50px;
    left: 0;
    width: 220px;
    height: 100%;
    padding-top: 30px;
    box-shadow: 3px 0 8px rgba(0,0,0,0.1);
  }
  .side-nav li a {
    color: #F0FFF0 !important;
    padding: 12px 22px;
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
    border-radius: 0 25px 25px 0;
    transition: background 0.3s ease, transform 0.2s;
  }
  .side-nav li a i {
    color: #FFD700;
  }
  .side-nav li a:hover {
    background: #45B649 !important;
    color: #fff !important;
    transform: translateX(5px);
  }

  /* MAIN PAGE */
  #page-wrapper {
    margin-left: 240px;
    padding: 30px;
    background: #F0FFF0; /* soft faint green */
    min-height: 100vh;
  }

  .dashboard-card {
    background: #fff;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    animation: fadeIn 0.5s ease;
    overflow-x: auto;
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(15px); }
    to { opacity: 1; transform: translateY(0); }
  }

  /* TITLE */
  .page-title {
    color: #2E8B57;
    font-weight: 700;
    text-align: center;
    margin-bottom: 25px;
  }

  /* TABLE */
  .table {
    border-radius: 10px;
    overflow: hidden;
    background: #fff;
    box-shadow: 0 3px 8px rgba(0,0,0,0.08);
    width: 100%;
  }
  .table-header {
    background: #2E8B57;
    color: white;
    font-weight: 600;
    font-size: 15px;
  }
  .table th, .table td {
    vertical-align: middle !important;
    font-size: 14px;
    padding: 10px 8px;
  }
  .table-hover tbody tr:hover {
    background: #E9F7EF;
  }

  /* BUTTONS */
  .btn-success {
    background-color: #45B649;
    border: none;
  }
  .btn-success:hover {
    background-color: #2E8B57;
  }
  .btn-danger {
    background-color: #E74C3C;
    border: none;
  }
  .btn-danger:hover {
    background-color: #C0392B;
  }

  /* FOOTER */
  footer {
    background: #2E8B57;
    color: #F0FFF0;
    text-align: center;
    padding: 12px 0;
    font-size: 0.9rem;
  }
  footer strong {
    color: #FFD700;
  }

  /* RESPONSIVE */
  @media (max-width: 991px) {
    .side-nav {
      position: relative;
      width: 100%;
      height: auto;
      top: 0;
      padding: 10px 0;
      display: flex;
      justify-content: center;
    }
    .side-nav li {
      display: inline-block;
      margin: 0 10px;
    }
    #page-wrapper {
      margin-left: 0;
      padding: 15px;
    }
    .dashboard-card {
      padding: 20px;
    }
    .page-title {
      font-size: 22px;
    }
  }
  </style>
</head>

<body>
  <div id="wrapper">
    <!-- NAVBAR -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a class="navbar-brand" href="../index.php">
          <i class="fas fa-user-shield"></i>Admin User
          <!-- <span>EcoTrack Admin</span> -->
       </a>
      </div>

      <!-- Top Menu Items -->
      <!-- <ul class="nav navbar-right top-nav">           
        <li><a href="#"><i class="fas fa-user-shield"></i>Admin User</a></li>
      </ul> -->

      <!-- Sidebar -->
      <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
          <li><a href="http://localhost/waste-management-system/index.html"><i class="fas fa-tachometer-alt"></i> Dashboard</a></li>
          <li><a href="http://localhost/waste-management-system/index.html"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
        </ul>
      </div>
    </nav>

    <!-- MAIN CONTENT -->
    <div id="page-wrapper">
      <div class="dashboard-card">
        <h1 class="page-title">Welcome Admin!</h1>

        <!-- Data Table -->
        <div class="table-responsive">
          <table class="table table-striped table-hover table-bordered text-center">
            <thead class="table-header">
              <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Date</th>
                <th>Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Waste Category</th>
                <th>Location</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
                <th>Update Status</th>
              </tr>
            </thead>
            <tbody>
            <?php
              include("connection.php");
              $hostForImage ="http://localhost/waste-management-system/phpGmailSMTP/upload/";
              $query = "select * from garbageinfo";
              $data = mysqli_query($db,$query);
              $total = mysqli_num_rows($data);

              if($total != 0){
                while($result = mysqli_fetch_assoc($data)){
                  echo "
                  <tr>
                    <td>".$result['Id']."</td>
                    <td><a href='".$hostForImage.$result['file']."'><img src='".$hostForImage.$result['file']."' height='80' width='80' class='img-thumbnail'/></a></td>
                    <td>".$result['date']."</td>
                    <td>".$result['name']."</td>
                    <td>".$result['mobile']."</td>
                    <td>".$result['email']."</td>
                    <td>".$result['wastetype']."</td>
                    <td>".$result['location']."</td>
                    <td>".$result['locationdescription']."</td>
                    <td>".$result['status']."</td>
                    <td><a href='admindelete.php?i=$result[Id]' class='btn btn-danger btn-sm'>Delete</a></td>
                    <td><a href='status.php?i=$result[Id]&s=$result[status]' class='btn btn-success btn-sm'>Update</a></td>
                  </tr>";
                }
              }
            ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- FOOTER -->
  <footer>
    <p>© <strong><?php echo date('Y'); ?></strong> EcoTrack | Admin Panel</p>
  </footer>

  <script>
  $(function(){
    $('[data-toggle="tooltip"]').tooltip();
  });
  </script>
</body>
</html>
