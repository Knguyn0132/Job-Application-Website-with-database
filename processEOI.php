<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="description" content="Process EOI Record">
    <meta name="keywords" content="PHP, MySql">
    <title>EOI Confirmation</title>
</head>
<body>
    <?php
        function sanitise_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        require_once("settings.php");
        $conn = @mysqli_connect($host, $user, $pwd, $sql_db);
        //Create table if not exits
        $applyTableSql = "CREATE TABLE IF NOT EXISTS eoi (
            eoinumber INT AUTO_INCREMENT PRIMARY KEY,
            firstname VARCHAR(50) NOT NULL,
            lastname VARCHAR(50) NOT NULL,
            prefername VARCHAR(50),
            gender ENUM('Male', 'Female', 'Prefer Not To Say') NOT NULL,
            reference_number VARCHAR(20) NOT NULL,
            dateofbirth DATE NOT NULL,
            email_address VARCHAR(100) NOT NULL,
            phone_number VARCHAR(10) NOT NULL,
            street_address VARCHAR(100) NOT NULL,
            suburb VARCHAR(50) NOT NULL,
            postcode VARCHAR(4) NOT NULL,
            state VARCHAR(3) NOT NULL,
            skills VARCHAR(255) NOT NULL,
            otherskills TEXT,
            status ENUM('New', 'Current', 'Final') DEFAULT 'New'
        )";

        if (!$conn) {
            echo "<p>Database connection failure</p>";
        } else {
            $firstname = isset($_POST["firstname"]) ? sanitise_input($_POST["firstname"]) : "";
            $lastname = isset($_POST["lastname"]) ? sanitise_input($_POST["lastname"]) : "";
            $prefername = isset($_POST["prefername"]) ? sanitise_input($_POST["prefername"]) : "";
            $gender = isset($_POST["gender"]) ? sanitise_input($_POST["gender"]) : "";
            $reference_number = isset($_POST["referencenum"]) ? sanitise_input($_POST["referencenum"]) : "";
            $dateofbirth = isset($_POST["dob"]) ? sanitise_input($_POST["dob"]) : "";
            $email_address = isset($_POST["contactemail"]) ? sanitise_input($_POST["contactemail"]) : "";
            $phone_number = isset($_POST["phonenum"]) ? sanitise_input($_POST["phonenum"]) : "";
            $street_address = isset($_POST["streetaddress"]) ? sanitise_input($_POST["streetaddress"]) : "";
            $suburb = isset($_POST["suburb"]) ? sanitise_input($_POST["suburb"]) : "";
            $postcode = isset($_POST["postcode"]) ? sanitise_input($_POST["postcode"]) : "";
            $state = isset($_POST["state"]) ? sanitise_input($_POST["state"]) : "";
            $skills = isset($_POST["skills"]) ? implode(", ", $_POST["skills"]) : "";
            $otherskills = isset($_POST["other_skills"]) ? sanitise_input($_POST["other_skills"]) : "";

            $errors = "";
            //Validations
            if (!empty($firstname)) 
                    { 
                        if (!preg_match("/^[a-zA-Z]{1,20}$/", $firstname)) {
                            $errors .= "Only 20 alphabetic letters are allowed in your first name.<br>";}
                    } else {$errors .= "Please enter your First Name.<br> ";}

            if (!empty($lastname))   {

                if (!preg_match("/^[a-zA-Z]{1,20}$/", $lastname)) {
                    $errors .= "Only 20 alphabetic letters are allowed in your last name.<br>";
                } 
            } else {$errors .= "Please enter your Last Name.<br>";}

            if (!empty($prefername) && !preg_match("/^[a-zA-Z]{1,20}$/", $prefername)) {
                $errors .= "Only 20 alphabetic letters are allowed in your preferred name.<br>";
            }

            if (empty($gender)) {
                $errors .= "Please select gender.<br>";
            }

            if (!empty($reference_number))   {

                if (!preg_match("/^(SE228|DE129|WD303)$/", $reference_number)) {
                    $errors .= "Please enter either SE228, DE129, or WD303 for Reference Number<br>";}
                } else {$errors .= "Please enter Job reference number.<br>";}

            $format = DateTime::createFromFormat('d/m/Y', $dateofbirth);
            if (empty($dateofbirth)) {
                $errors .= "Please enter date of birth.<br>";
            } elseif (!$format) {
                $errors .= "You must enter the date of birth in the correct format: dd/mm/yyyy.<br>";
            } else {
                $now = new DateTime();
                $age = $now->diff($format)->y;
                if ($age < 15 || $age > 80) {
                    $errors .= "Your age must be between 15 and 80 years.<br>";
                }
            }

            if (empty($email_address) || !filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
                $errors .= "You must enter a valid email address.<br>";
            }

            if (!empty($phone_number))   {

                if (!preg_match("/^\d{10}$/", $phone_number)) {
                    $errors .= "You must enter a valid phone number (10 digits, no spaces or special characters).<br>";}
                }  else {$errors .= "Please enter Phone Number.<br>";}


                if (!empty($street_address))   {

                    if (!preg_match("/^[a-zA-Z]{1,40}$/", $street_address)) {
                        $errors .= "Only 40 alphabetic letters are allowed in your street address.<br>";}
                    } 
                else {$errors .= "Please enter Street Address.<br>";}

                if (isset($_POST["suburb"])) {
                    $suburb = sanitise_input($_POST["suburb"]);
                 if (empty($suburb))   {
                    $errors .= "Please enter your Suburb.<br>";}
                    elseif (!preg_match("/^[a-zA-Z]{1,40}$/", $suburb)) {
                        $errors .=  "Only 40 alphabetic letters are allowed in your suburb.<br>";
                    }
                }

            if (empty($state)) {
                $errors .= "Please select your state.<br>";
            }

            if (empty($_POST['postcode'])) {
                $errors .= "please enter your postcode.<br>";
            } elseif (!preg_match("/^\d{4}$/", $postcode)) {
                $errors .= "Exactly 4 digits in your postcode.<br>";
            }
            else {
                switch ($state) {
                    case 'NSW':
                        if (!in_array($postcode, range(1000, 2599)) && !in_array($postcode, range(2619, 2899)) && !in_array($postcode, range(2921, 2999))) {
                            $errors .= "The entered postcode isn't within the NSW region.<br>";
                        }
                        break;

                    case 'ACT':
                        if (!in_array($postcode, range(200, 299)) && !in_array($postcode, range(2600, 2618)) && !in_array($postcode, range(2900, 2920))) {
                            $errors .= "The entered postcode isn't within the ACT region.<br>";
                        }
                        break;

                    case 'VIC':
                        if (!in_array($postcode, range(3000, 3999)) && !in_array($postcode, range(8000, 8999))) {
                            $errors .= "The entered postcode isn't within the VIC region.<br>";
                        }
                        break;

                    case 'QLD':
                        if (!in_array($postcode, range(4000, 4999)) && !in_array($postcode, range(9000, 9999))) {
                            $errors .= "The entered postcode isn't within the QLD region.<br>";
                        }
                        break;

                    case 'SA':
                        if (!in_array($postcode, range(5000, 5999))) {
                            $errors .= "The entered postcode isn't within the SA region.<br>";
                        }
                        break;

                    case 'WA':
                        if (!in_array($postcode, range(6000, 6999))) {
                            $errors .= "The entered postcode isn't within the WA region.<br>";
                        }
                        break;

                    case 'TAS':
                        if (!in_array($postcode, range(7000, 7999))) {
                            $errors .= "The entered postcode isn't within the TAS region.<br>";
                        }
                        break;

                    case 'NT':
                        if (!in_array($postcode, range(800, 999))) {
                            $errors .= "The entered postcode isn't within the NT region.<br>";
                        }
                        break;

                    default:
                        $errors .= "The selected state doesn't match the expected format.<br>";
                }
            }

            if (empty($skills)) {
                $errors .= "Please select your skills.<br>";
            }

            if (!empty($otherskills) && !preg_match("/^[a-zA-Z0-9\s]+$/", $otherskills)) {
                $errors .= "Only alphanumeric characters and spaces are allowed in the Other Skills field.<br>";
            }

            if ($errors) {
                echo "<p>$errors</p>";
            } else {
                mysqli_query($conn, $applyTableSql);

                $insertQuery = "INSERT INTO eoi (
                    firstname,
                    lastname,
                    prefername,
                    gender,
                    reference_number,
                    dateofbirth,
                    email_address,
                    phone_number,
                    street_address,
                    suburb,
                    postcode,
                    state,
                    skills,
                    otherskills
                ) VALUES (
                    '$firstname',
                    '$lastname',
                    '$prefername',
                    '$gender',
                    '$reference_number',
                    STR_TO_DATE('$dateofbirth', '%d/%m/%Y'),
                    '$email_address',
                    '$phone_number',
                    '$street_address',
                    '$suburb',
                    '$postcode',
                    '$state',
                    '$skills',
                    '$otherskills'
                )";

                $result = mysqli_query($conn, $insertQuery);
                if (!$result) {
                    echo "<p>Something is wrong with ", $insertQuery, "</p>";
                } else {
                    echo "<p>Successfully added new Applicant record</p><br>
                          <a href='apply.php'>Back to Application Form</a>";
                }
            }

            mysqli_close($conn);
        }
    ?>
</body>
</html>
