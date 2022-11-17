<?php
    require_once "components/db_connect.php";
    require_once "components/file_upload.php";
    $error = false;
    $fname = $lname = $date_of_birth = $email = $pass = $picture ="";
    $fnameError = $uploadError = $errMSG = $dateError = $emailError = $passError = $picError = "";

    if(isset($_POST['btn-signup'])){

        $fname = ($_POST['fname']);
        $fname = trim($fname);  // removes all the empty spaces and takes the value
        $fname = strip_tags($fname);   // removes all the html tags 
        $fname = htmlspecialchars($fname); // it converts into html entities

        $lname = ($_POST['lname']);
        $lname = trim($lname);  
        $lname = strip_tags($lname);  
        $lname = htmlspecialchars($lname); 

        $date_of_birth = ($_POST['date_of_birth']);
        $date_of_birth = trim($date_of_birth);  
        $date_of_birth = strip_tags($date_of_birth);  
        $date_of_birth = htmlspecialchars($date_of_birth); 

        $email = ($_POST['email']);
        $email = trim($email);  
        $email = strip_tags($email);  
        $email = htmlspecialchars($email); 

        $pass = ($_POST['pass']);
        $pass = trim($pass);  
        $pass = strip_tags($pass);  
        $pass = htmlspecialchars($pass); 

        $uploadError = "";
        $picture = file_upload($_FILES['picture']);

        // checking if name fields are filled or empty
        if (empty($fname)||empty($lname)){
            $error = true ;
            $fnameError = "Please enter your name and surname";
        } elseif(strlen($fname) < 3 || strlen($lname) < 3) {
            $error = true;
            $fnameError = "Name and Surname must have more than 3 characters";
        } elseif(!preg_match("/^[a-zA-z]+$/",$fname) || !preg_match("/^[a-zA-z]+$/",$lname) ) {
            $error = true;
            $fnameError = "Name and Surname must contain only letters and no spaces";
        }
        
        // checking date of birth input
        if(empty($date_of_birth)){
            $error = true;
            $dateError = "Please Enter your date of birth"; 
        }

        // checking email input
        if(empty($email)){
            $error = true;
            $emailError = "Please Enter your E-mail address"; 
        } elseif (!filter_var($email , FILTER_VALIDATE_EMAIL)) {
            $error = true;
            $emailError = "Please Enter valid E-mail";
        } else {
        // Checking if the email is already registered or not
        $query = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($connect,$query);
        $count = mysqli_num_rows($result);
        if($count != 0 ){
            $error = true;
            $emailError = "Provided Email is already used";
            }
        }

        // checking the password input
        if(empty($pass)){
            $error = true;
            $emailError = "Please enter the password";
        }elseif(strlen($pass) < 8){
            $error = true;
            $emailError = "Password must have at least 8 characters";
        }

        
        // securing password with hash
        $pass = hash('sha256',$pass);


        //Inserting user information to database
        if (!$error) {
            $query = "INSERT INTO users (first_name, last_name, password, date_of_birth, email, picture) 
            VALUES ('$fname', '$lname','$pass','$date_of_birth', '$email', '$picture->fileName')";
            $res = mysqli_query($connect, $query);
    
            if ($res) {
                $errTyp = "success";
                $errMSG = "Successfully registered, you may login now";
                $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
            } else {
                $errTyp = "danger";
                $errMSG = "Something went wrong, try again later...";
                $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
            }
        }
    }

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration System</title>
    <?php require_once 'components/boot.php' ?>
</head>

<body>
    <div class="container py-5 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <div class="col-12 col-lg-9 col-xl-7">
                <div class="card shadow-2-strong card-registration" style="border-radius: 15px;">
                    <div class="card-body p-4 p-md-5">
                        <h3 class="mb-4 pb-2 pb-md-0 mb-md-5">Registration Form</h3>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" enctype="multipart/form-data">
                            <?php
                            if (isset($errMSG)) {
                            ?>
                                <div class="alert alert-<?php echo $errTyp ?>">
                                    <p><?php echo $errMSG; ?></p>
                                    <p><?php echo $uploadError; ?></p>
                                </div>
                            <?php
                            }
                            ?>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="fname" class="form-control" placeholder="First name" maxlength="50" value="<?php echo $fname ?>" />
                                        <span class="text-danger"> <?php echo $fnameError; ?> </span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input type="text" name="lname" class="form-control" placeholder="Surname" maxlength="50" value="<?php echo $lname ?>" />
                                        <span class="text-danger"> <?php echo $fnameError; ?> </span>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-4 d-flex align-items-center">
                                    <div class="form-outline datepicker w-100">
                                        <input class='form-control' type="date" name="date_of_birth" value="<?php echo $date_of_birth ?>" />
                                        <span class="text-danger"> <?php echo $dateError; ?> </span>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-outline">
                                        <input class='form-control' type="file" name="picture">
                                        <span class="text-danger"> <?php echo $picError; ?> </span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-2 pb-2">
                                    <div class="form-outline">
                                        <input type="email" name="email" class="form-control" placeholder="Enter Your Email" maxlength="40" value="<?php echo $email ?>" />
                                        <span class="text-danger"> <?php echo $emailError; ?> </span>

                                    </div>
                                </div>
                                <div class="col-md-12 mb-4 pb-2">
                                    <div class="form-outline">
                                        <input type="password" name="pass" class="form-control" placeholder="Enter Password" maxlength="15" />
                                        <span class="text-danger"> <?php echo $passError; ?> </span>
                                    </div>

                                </div>
                            </div>
                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary btn-lg btn-block" style="width:100%" name="btn-signup">Register</button>
                            </div>
                            <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="index.php" class="fw-bold text-body"><u>Login here</u></a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>