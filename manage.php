<?php
session_start();
if (isset($_SESSION["id"]) && isset($_SESSION["name"])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <title>SPOTIFREE | MANAGE</title>
  <link rel="stylesheet" href="styles/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

  <!--HEADER-->
  <?php include_once "navbar.inc"; ?>

  <h1 id='manage_head'>EOI Management</h1>
  <div class="manage">
    <h2>List All EOIs</h2>
    <form action="manage.php" method="GET" class="form-style"> 
      <input type="hidden" name="action" value="list_all"> 
      <input type="submit" class="button" value="List All">
    </form>
    <hr>
    <h2>List EOIs For A Particular Position</h2>
    <form action="manage.php" method="GET" class="position-form form-style">
      <input type="hidden" name="action" value="list_by_position">
      <label for="Job_Reference">Job Reference:</label>
      <input type="text" name="Job_Reference" id="Job_Reference" class="input-field"><br>
      <input type="submit" class="button" value="Search">
    </form>
    <hr>
    <h2>List EOIs For A Particular Applicant</h2>
    <form action="manage.php" method="GET" class="form-style">
      <input type="hidden" name="action" value="list_by_applicant">
      <label for="First_Name">First Name:</label>
      <input type="text" name="First_Name" id="First_Name" class="input-field">
      <br>
      <label for="Last_Name">Last Name:</label>
      <input type="text" name="Last_Name" id="Last_Name" class="input-field">
      <br>
      <input type="submit" class="button" value="Search">
    </form>
    <hr>
    <h2>Delete EOIs With A Specified Job Reference Number</h2>
    <form action="manage.php" method="GET" class="form-style">
      <input type="hidden" name="action" value="delete_by_position">
      <label for="Job_Reference_delete">Job Reference:</label>
      <input type="text" name="Job_Reference" id="Job_Reference_delete" class="input-field"><br>
      <input type="submit" class="button danger" value="DELETE">
    </form>
    <hr>
    <h2>Change The Status Of An EOI</h2>
    <form action="manage.php" method="GET" class="form-style">
      <input type="hidden" name="action" value="change_status">
      <label for="eoi_number">EOI Number:</label>
      <input type="text" name="eoi_number" id="eoi_number" class="input-field">
      <br>
      <label for="status">Status:</label>
      <select name="status" id="status" class="input-field">
        <option value="New">New</option>
        <option value="Current">Current</option>
        <option value="Final">Final</option>
      </select>
      <br>
      <input type="submit" class="button" value="CHANGE">
    </form>
    <p><a href='logout.php' class='logout_button'>LOGOUT</a></p>
  </div>

  <?php
     require_once("settings.php");
     $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
         if (!$conn) {
         
         echo "<p>Database connection failure</p>";
         exit();
     }

     function sanitizeInput($input) {
      $input = trim($input); 
      $input = stripslashes($input); 
      $input = htmlspecialchars($input); 
      return $input;
  }


  if (isset($_GET['action'])) {
    $query = sanitizeInput($_GET['action']);
    $firstname = isset($_GET["First_Name"]) ? sanitizeInput($_GET["First_Name"]) : "";
    $lastname = isset($_GET["Last_Name"]) ? sanitizeInput($_GET["Last_Name"]) : "";
    $reference_number = isset($_GET["Job_Reference"]) ? sanitizeInput($_GET["Job_Reference"]) : "";
    $eoi_number = isset($_GET["eoi_number"]) ? sanitizeInput($_GET["eoi_number"]) : "";
    $status = isset($_GET["status"]) ? sanitizeInput($_GET["status"]) : "";

    if ($query == "list_all") {
        $sql = "SELECT * FROM eoi"; //list all
    } elseif ($query == "list_by_position") {
        if (!empty($reference_number)) {
            $sql = "SELECT * FROM eoi WHERE reference_number = '$reference_number'"; //list by reference number
        } else {
            exit("<p>Please provide a job reference number.</p>");
        }
    } elseif ($query == "list_by_applicant") {
        if (!empty($firstname) && !empty($lastname)) {
            $sql = "SELECT * FROM eoi WHERE firstname = '$firstname' AND lastname = '$lastname'"; //list by name
        } else {
            exit("<p>Please provide both first name and last name.</p>");
        }
    } elseif ($query == "delete_by_position") {
        if (!empty($reference_number)) {
            $sql = "DELETE FROM eoi WHERE reference_number = '$reference_number'";
            if (mysqli_query($conn, $sql)) {
                echo "EOIs with job reference '$reference_number' have been deleted successfully."; //delete by reference number
                $resetSql = "ALTER TABLE eoi AUTO_INCREMENT = 1";
                mysqli_query($conn, $resetSql);
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            exit();
        } else {
            exit("<p>Please provide a job reference number to delete.</p>");
        }
    } elseif ($query == "change_status") {
        if (!empty($eoi_number) && !empty($status)) {
            $sql = "UPDATE eoi SET status = '$status' WHERE eoinumber = $eoi_number"; //update status
            if (mysqli_query($conn, $sql)) {
                echo "EOI with EOInumber '$eoi_number' has been updated successfully."; 
            } else {
                echo "Error: " . mysqli_error($conn);
            }
            exit();
        } else {
            exit("<p>Please provide both EOI number and status to change.</p>");
        }
    } else {
        exit("<p>Invalid action.</p>");
    }

    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<table class='eoi_table'>
              <tr>
              <th>EOInumber</th>
              <th>First Name</th>
              <th>Last Name</th>
              <th>Prefer Name</th>
              <th>Gender</th>
              <th>Job Reference Number</th>
              <th>Date of Birth</th>
              <th>Email Address</th>
              <th>Phone Number</th>
              <th>Street Address</th>
              <th>Suburb</th>
              <th>Postcode</th>
              <th>State</th>
              <th>Skills</th>
              <th>Other skills</th>
              <th>Status</th>
              </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                  <td>{$row['eoinumber']}</td>
                  <td>{$row['firstname']}</td>
                  <td>{$row['lastname']}</td>
                  <td>{$row['prefername']}</td>
                  <td>{$row['gender']}</td>
                  <td>{$row['reference_number']}</td>
                  <td>{$row['dateofbirth']}</td>
                  <td>{$row['email_address']}</td>
                  <td>{$row['phone_number']}</td>
                  <td>{$row['street_address']}</td>
                  <td>{$row['suburb']}</td>
                  <td>{$row['postcode']}</td>
                  <td>{$row['state']}</td>
                  <td>{$row['skills']}</td>
                  <td>{$row['otherskills']}</td>
                  <td>{$row['status']}</td>
                  </tr>";
        }

        echo "</table>";

        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }
  }

  mysqli_close($conn);
  ?>
	

  <!--FOOTER-->
  <?php include_once "footer.inc"; ?>
</body>
</html>
<?php 
} else {
     header("Location: login.php?error");
     exit();
}
?>