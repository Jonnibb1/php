<?php
require_once("config.php");
$error="";
$sucess="";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=mysqli_real_escape_string($conn,$_POST['name']);
    $lastName=mysqli_real_escape_string($conn,$_POST['lastName']);

    $username=mysqli_real_escape_string($conn,$_POST['username']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
 
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $confirmpassword=mysqli_real_escape_string($conn,$_POST['confirm_password']);

    if(empty($FirstName) ||empty($LastName) ||empty($username) || empty($email) ||empty($password) ||empty($Confirm_password) ){
        $error='All fields are required';
    }else{
        $check_user="SELECT * FROM users WHERE usernam='$username' OR email='email'";
        $result=$conn->query($check_user);
        if($result->num_row>0){
            $error="Username or email already exist";
        }else{
            $hashed_password=md5($password);
            $confirm_hashed_password=md5($confirm_password);
            $sql="INSERT INTO users(name,lastname,username, email,password,confirm_password) VALUES ('$firstname','$lastname', '$username','$email','$hashed_password','$cofirm_hashed_password)";
            if($conn->query($sql)===TRUE){
                $sucess="Registration sucessfully !!! You can now <a herf='login.php'>Login here";
              
            }else{
                $error="Error:" . $conn->error;
            }
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <style>
        /* Background gradient for the entire page */
        body {
            background: linear-gradient(135deg,  #D8C4B6, white);
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        /* Center card with smooth edges and gradient border */
        .card {
            background-color: #fff;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 4px 10px #91AC8F;
            border: 2px solid transparent;
            background-clip: padding-box;
        }

        .card:hover {
            border-image: linear-gradient(to right,  #213555, #3E5879) 1;
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }

        /* Stylish buttons */
        .btn-primary {
            background: linear-gradient(to right,  #213555, #3E5879);
            border: none;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(to right,#213555,#3E5879);
            transform: scale(1.05);
        }

        /* Links with hover effect */
        a {
            color: #6a11cb;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        a:hover {
            color: #D8C4B6;
        }

        /* Inputs styling */
        input.form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            transition: border 0.3s ease, box-shadow 0.3s ease;
        }

        input.form-control:focus {
            border-color: #213555;
            box-shadow: 0 0 8px #91AC8F;
        }

        /* Title */
        h2 {
            color: #213555;
        }
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">
    <div class="card shadow-sm p-4" style="width: 400px;">
        <h2 class="text-center mb-4">Register</h2>
        <?php if (isset($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
        <form action="signup.php" method="POST">
            <div class="mb-3">
                <label for="First Name" class="form-label">First Name</label>
                <input type="text" id="First Name" name="name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="Lastname" class="form-label">Lastname</label>
                <input type="text" id="Lastname" name="Lastname" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" name="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="Confirm password" class="form-label">Confirm Password</label>
                <input type="password" id="Confirm password" name="password" class="form-control" required>
            </div>
            <!-- Hidden input for dynamic redirect -->
            <input type="hidden" name="redirect" value="login.php">
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
        <div class="text-center mt-3">
            <p>Already have an account? <a style="color:  #213555" href="login.php">Login here</a></p>
        </div>
    </div>
</body>
</html>
