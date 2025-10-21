<?php
include_once('connection.php');

// Get the ID and Status from the GET parameters
$id = isset($_GET['i']) ? $_GET['i'] : null;
$s = isset($_GET['s']) ? $_GET['s'] : null;

// Handle the form submission
if (isset($_POST['update'])) {
    $Id = $_POST['id'];
    $status = $_POST['status'];

    // Prepare the SQL query
    $query = "UPDATE garbageinfo SET status='$status' WHERE Id='$Id'";

    // Execute the query
    $data = mysqli_query($db, $query);

    if ($data) {
        echo "<div class='alert alert-success'><span class='fa fa-check'> Status Updated Successfully!</span></div>";  
        header("Location: http://localhost/waste-management-system/adminlogin/index.php", TRUE, 301);
        exit();
    } else {
        echo "<div class='alert alert-danger'>Failed to Update: " . mysqli_error($db) . "</div>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Status</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="styleupdate.css">  
</head>
<body><br>
<br>
    <form method="post" action="status.php" enctype="multipart/form-data">
        <div class="container contact">
            <div class="row">
                <div class="col-md-3">
                    <div class="contact-info">
                        <!-- <img src="images.jfif" alt="image" /> -->
                        <h2>Edit Status</h2>
                        <h4>Inform Users their requested complaint is handled!</h4>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="status">Status:</label>
                        <div class="col-sm-10">  
                            <input type="hidden" name="id" value="<?php echo $id; ?>" />        
                            <select class="form-control" id="status" name="status" required>
                                <option value="Pending" <?php echo $s == 'Pending' ? 'selected' : ''; ?>>Pending</option>
                                <option value="Completed" <?php echo $s == 'Completed' ? 'selected' : ''; ?>>Completed</option>
                                <option value="Invalid" <?php echo $s == 'Invalid' ? 'selected' : ''; ?>>Please do valid complaint</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">        
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" name="update" id="update" class="btn btn-success">Update Status</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
