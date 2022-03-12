<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, otherwise redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
 
// Define variables and initialize with empty values
$username = $_SESSION["username"];
$email = $_SESSION["email"];

// Define variables and initialize with empty values
$firstname = $lastname = $age = $gender = $address = $pin = $sate = $mobile_no = "";
$firstname_err = $lastename_err = $age_err = $gender_err = $address_err = $pin_err = $sate_err = $mobile_no_err = "";

// Prepare a select statement
   $sql = "SELECT * FROM users_details WHERE username = '$username' and email = '$email'";
        
   $result = mysqli_query($link, $sql);
   if (mysqli_num_rows($result) === 1) {
        while($_row = mysqli_fetch_array($result))
        {
            $name = $_row['name'];
            $names = explode(" ", $name);
            $firstname = $names[0];
            $lastname = $names[1];
            $age = $_row['age'];
            $gender = $_row['gender'];
            $address = $_row['address'];
            $pin = $_row['pin'];
            $sate = $_row['state'];
            $mobile_no =  $_row['mobile_no'];  
        }
    }

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    
    // Validate firstname
    if(empty(trim($_POST["firstname"]))){
        $firstname_err = "Please enter firstname";
    } elseif(!preg_match('/^[a-zA-Z]+$/', trim($_POST["firstname"]))){
        $firstname_err = "Firstname can only contain letters";
    } else{
        $firstname = trim($_POST["firstname"]);
    }
    
    // Validate lastname
    if(empty(trim($_POST["lastname"]))){
        $lastname_err = "Please enter lastname";
    } elseif(!preg_match('/^[a-zA-Z]+$/', trim($_POST["lastname"]))){
        $lastname_err = "Lastname can only contain letters";
    } else{
        $lastname = trim($_POST["lastname"]);
    }
    
    // Validate age
    if(empty(trim($_POST["age"]))){
        $age_err = "Please enter age";
    } elseif(!preg_match('/^[0-9]+$/', trim($_POST["age"]))){
        $age_err = "Age can only contain numbers";
    } else{
        $age = trim($_POST["age"]);
    }

    // Validate gender
    if(!isset($_POST["gender"])) {
    $gender_err = " Gender field is required";
    }else{
        $gender = $_POST["gender"];
    }

    //Validate address
    if(empty(trim($_POST["address"]))){
        $address_err = "Please enter address";
    }else{
        $address = trim($_POST["address"]);
    }

     // Validate pin
    if(empty(trim($_POST["pin"]))){
        $pin_err = "Please enter pin";
    }elseif(!preg_match('/^[0-9]+$/', trim($_POST["pin"]))){
        $pin_err = "Pin can only contain numbers";
    }elseif(strlen(trim((string)($_POST["pin"]))) != 6){
        $pin_err = "Pin can only have 6 digits";
    }else{
        $pin = trim($_POST["pin"]);
    }

    // Validate state
    if(!isset($_POST["state"])){
        $state_err = "Select a state";
    }else{
        $state = $_POST["state"];
    }

    // Validate mobile_no
    if(empty(trim($_POST["mobile_no"]))){
        $mobile_no_err = "Please enter Mobile Number";
    }elseif(!preg_match('/^[0-9]+$/', trim($_POST["mobile_no"]))){
        $mobile_no_err = "Mobile Number can only contain numbers";
    }elseif(strlen(trim((string)($_POST["mobile_no"]))) != 10){
        $mobile_no_err = "Mobile Number can only have 10 digits";
    }else{
        $mobile_no = trim($_POST["mobile_no"]);
    }


   
   // Prepare a select statement
   $sql = "SELECT * FROM users_details WHERE username = '$username' and email = '$email'";
        
   $result = mysqli_query($link, $sql);
   if (mysqli_num_rows($result) === 1) {
       
        // Check input errors before inserting in database
        if(empty($firstname_err) && empty($lastename_err) && empty($age_err) && empty($gender_err) && empty($address_err) && empty($pin_err) && empty($state_err) && empty($mobile_no_err)){
        
            // Prepare an insert statement
            $sql = "UPDATE users_details SET name = ?, age = ?, gender = ?, address = ?, pin = ? , state = ?, mobile_no = ? WHERE username = ? and email = ?";
         
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "sississss", $param_name, $param_age, $param_gender, $param_address, $param_pin, $param_state, $param_mobile_no, $param_username, $param_email);
            
                // Set parameters
                $param_username = $_SESSION["username"];
                $param_name = $firstname." ".$lastname;
                $param_age = $age;
                $param_gender = $gender;
                $param_address = $address;
                $param_pin = $pin;
                $param_state = $state;
                $param_mobile_no = $mobile_no;
                $param_email = $_SESSION["email"];
            
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    header("location: welcome.php");
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
                // Close statement
                 mysqli_stmt_close($stmt);
            }
        }
        // Close connection
        mysqli_close($link);
        exit();
   }else{
        // Check input errors before inserting in database
        if(empty($firstname_err) && empty($lastename_err) && empty($age_err) && empty($gender_err) && empty($address_err) && empty($pin_err) && empty($state_err) && empty($mobile_no_err)){
        
            // Prepare an insert statement
            $sql = "INSERT INTO users_details(username, name, age, gender, address, pin, state, mobile_no, email) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
            if($stmt = mysqli_prepare($link, $sql)){
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($stmt, "ssississs", $param_username, $param_name, $param_age, $param_gender, $param_address, $param_pin, $param_state, $param_mobile_no, $param_email);
            
                // Set parameters
                $param_username = $_SESSION["username"];
                $param_name = $firstname." ".$lastname;
                $param_age = $age;
                $param_gender = $gender;
                $param_address = $address;
                $param_pin = $pin;
                $param_state = $state;
                $param_mobile_no = $mobile_no;
                $param_email = $_SESSION["email"];
            
                // Attempt to execute the prepared statement
                if(mysqli_stmt_execute($stmt)){
                    header("location: welcome.php");
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
                // Close statement
                mysqli_stmt_close($stmt);
            }
        }
        // Close connection
        mysqli_close($link);
        exit();
   }
   // Close statement
   mysqli_stmt_close($result);
 }
 ?>
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Profile</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Update Profile</h2>
        <p>Update your account details </p>
        <form id="FormId" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <table width="1100" border="0">
    <tr></tr><tr></tr><tr></tr><tr></tr><tr></tr><tr></tr> <tr></tr> <tr></tr><tr></tr><tr></tr> <tr></tr> <tr></tr>
    <tr>
        <td><font color="purple" face="Arial Black"  size="+1">UserName:</font></td>
        <td><?php echo htmlspecialchars($_SESSION["username"]); ?></td>
    </tr>
   <tr>
        <td><font color="purple" face="Arial Black"  size="+1">Firt Name:</font></td>
        <td><label for="textfield"></label>
        <input type="text" name="firstname" class="form-control <?php echo (!empty($firstname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $firstname; ?>">
        <span class="invalid-feedback"><?php echo $firstname_err; ?></span></td>
    </tr>
    <tr>
        <td><font color="purple" face="Arial Black"  size="+1">Last Name:</font></td>
        <td><label for="textfield"></label>
        <input type="text" name="lastname" class="form-control <?php echo (!empty($lastname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $lastname; ?>">
        <span class="invalid-feedback"><?php echo $lastname_err; ?></span></td>
    </tr>
    <tr>
        <td><font color="purple" face="Arial Black"  size="+1">Age:</font></td>
        <td><label for="textfield"></label>
        <input type="text" name="age" class="form-control <?php echo (!empty($age_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $age; ?>">
        <span class="invalid-feedback"><?php echo $age_err; ?></span></td>
    </tr>
    <tr>
        <td ><font color="purple" face="Arial Black"  size="+1">Gender:</font></td>
        <td><input type="radio" name="gender" class="<?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>" value="Male" <?php if(isset($_POST['gender']) && $_POST['gender']=="Male") { ?>checked<?php  } ?>> Male
        <input type="radio" name="gender" class="<?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>" value="Female" <?php if(isset($_POST['gender']) && $_POST['gender']=="Female") { ?>checked<?php  } ?>> Female
        <input type="radio" name="gender" class="<?php echo (!empty($gender_err)) ? 'is-invalid' : ''; ?>" value="Other" <?php if(isset($_POST['gender']) && $_POST['gender']=="Other") { ?>checked<?php  } ?>> Other
        <span class="invalid-feedback"><?php echo $gender_err; ?></span></td>
    </td>
    </tr>
    <tr>
        <td><font color="purple" face="Arial Black"  size="+1">Address:</font></td>
        <td><label for="textarea"></label>
        <input type="text" name="address" class="form-control <?php echo (!empty($address_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $address; ?>">
        <span class="invalid-feedback"><?php echo $address_err; ?></span></td>
    </tr>
    <tr>
        <td><font color="purple" face="Arial Black"  size="+1">Pin:</font></td>
        <td><label for="textfield2"></label>
        <input type="text" name="pin" class="form-control <?php echo (!empty($pin_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $pin; ?>">
        <span class="invalid-feedback"><?php echo $pin_err; ?></span></td>
    </tr>
    <tr>
        <td><font color="purple" face="Arial Black"  size="+1">State:</font></td>
        <td><label for="select"></label>
          <select name="state" class="form-control <?php echo (!empty($state_err)) ? 'is-invalid' : ''; ?>">
            <option value="">---Select---</option>
            <option value="Andhra Pradesh" <?php if(isset($_POST['state']) && $_POST['state']=="Andhra Pradesh") { ?>selected<?php  } ?>>Andhra Pradesh</option>
            <option value="Arunachal Pradesh" <?php if(isset($_POST['state']) && $_POST['state']=="Arunachal Pradesh") { ?>selected<?php  } ?>>Arunachal Pradesh</option>
            <option value="Assam" <?php if(isset($_POST['state']) && $_POST['state']=="Assam") { ?>selected<?php  } ?>>Assam</option>
            <option value="Bihar" <?php if(isset($_POST['state']) && $_POST['state']=="Bihar") { ?>selected<?php  } ?>>Bihar</option>
            <option value="Chhattisgarh" <?php if(isset($_POST['state']) && $_POST['state']=="Chhattisgarh") { ?>selected<?php  } ?>>Chhattisgarh</option>
            <option value="Goa" <?php if(isset($_POST['state']) && $_POST['state']=="Goa") { ?>selected<?php  } ?>>Goa</option>
            <option value="Gujarat" <?php if(isset($_POST['state']) && $_POST['state']=="Gujarat") { ?>selected<?php  } ?>>Gujarat</option>
            <option value="Haryana" <?php if(isset($_POST['state']) && $_POST['state']=="Haryana") { ?>selected<?php  } ?>>Haryana</option>
            <option value="Himachal Pradesh" <?php if(isset($_POST['state']) && $_POST['state']=="Himachal Pradesh") { ?>selected<?php  } ?>>Himachal Pradesh</option>
            <option value="Jammu & Kashmir" <?php if(isset($_POST['state']) && $_POST['state']=="Jammu & Kashmir") { ?>selected<?php  } ?>>Jammu &amp; Kashmir</option>
            <option value="Jharkhand" <?php if(isset($_POST['state']) && $_POST['state']=="Jharkhand") { ?>selected<?php  } ?>>Jharkhand</option>
            <option value="Karnataka" <?php if(isset($_POST['state']) && $_POST['state']=="Karnataka") { ?>selected<?php  } ?>>Karnataka</option>
            <option value="Kerala" <?php if(isset($_POST['state']) && $_POST['state']=="Kerala") { ?>selected<?php  } ?>>Kerala</option>
            <option value="Madhya Pradesh" <?php if(isset($_POST['state']) && $_POST['state']=="Madhya Pradesh") { ?>selected<?php  } ?>>Madhya Pradesh</option>
            <option value="Maharashtra" <?php if(isset($_POST['state']) && $_POST['state']=="Maharashtra") { ?>selected<?php  } ?>>Maharashtra</option>
            <option value="Manipur" <?php if(isset($_POST['state']) && $_POST['state']=="Manipur") { ?>selected<?php  } ?>>Manipur</option>
            <option value="Meghalaya" <?php if(isset($_POST['state']) && $_POST['state']=="Meghalaya") { ?>selected<?php  } ?>>Meghalaya</option>
            <option value="Mizoram" <?php if(isset($_POST['state']) && $_POST['state']=="Mizoram") { ?>selected<?php  } ?>>Mizoram</option>
            <option value="Nagaland" <?php if(isset($_POST['state']) && $_POST['state']=="Nagaland") { ?>selected<?php  } ?>>Nagaland</option>
            <option value="Orissa" <?php if(isset($_POST['state']) && $_POST['state']=="Orissa") { ?>selected<?php  } ?>>Orissa</option>
            <option value="Punjab" <?php if(isset($_POST['state']) && $_POST['state']=="Punjab") { ?>selected<?php  } ?>>Punjab</option>
            <option value="Rajasthan" <?php if(isset($_POST['state']) && $_POST['state']=="Rajasthan") { ?>selected<?php  } ?>>Rajasthan</option>
            <option value="Sikkim" <?php if(isset($_POST['state']) && $_POST['state']=="Sikkim") { ?>selected<?php  } ?>>Sikkim</option>
            <option value="Tamilnadu" <?php if(isset($_POST['state']) && $_POST['state']=="Tamilnadu") { ?>selected<?php  } ?>>Tamilnadu</option>
            <option value="Telangana" <?php if(isset($_POST['state']) && $_POST['state']=="Telangana") { ?>selected<?php  } ?>>Telangana</option>
            <option value="Tripura" <?php if(isset($_POST['state']) && $_POST['state']=="Tripura") { ?>selected<?php  } ?>>Tripura</option>
            <option value="Uttar Pradesh" <?php if(isset($_POST['state']) && $_POST['state']=="Uttar Pradesh") { ?>selected<?php  } ?>>Uttar Pradesh</option>
            <option value="Uttarakhand" <?php if(isset($_POST['state']) && $_POST['state']=="Uttarakhand") { ?>selected<?php  } ?>>Uttarakhand</option>
            <option value="WestBengal" <?php if(isset($_POST['state']) && $_POST['state']=="WestBengal") { ?>selected<?php  } ?>>WestBengal</option>
        </select>
        <span class="invalid-feedback"><?php echo $state_err; ?></span></td>
        </td>
    </tr>
    <tr>
        <td><font color="purple" face="Arial Black"  size="+1">Mobile No:</font></td>
        <td><label for="textfield3"></label>
        <input type="text" name="mobile_no" class="form-control <?php echo (!empty($mobile_no_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mobile_no; ?>">
        <span class="invalid-feedback"><?php echo $mobile_no_err; ?></span></td>
    </tr>
    <tr> 
        <td><font color="purple" face="Arial Black"  size="+1">Email Id:</font></td>
        <td><?php echo htmlspecialchars($_SESSION["email"]); ?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <div class="form-group">
            <td><input type="submit" class="btn btn-primary" value="Update">
            <input type="reset" class="btn btn-secondary ml-2" value="Reset" onclick="resetForm('FormId'); return false;"/>
            <input type="button" class="btn btn-secondary ml-2" value="Cancel" onclick="location.href='welcome.php'"></td>
        </div>
    </tr>
   </table>
  </form>
 </div>    
</body>
</html>
   
 
 
