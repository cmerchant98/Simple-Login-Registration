<?php
include_once 'conn.php';
?>
<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<!-- title -->
<body style="background-color: mintcream ">
<div class="wrapper">
<h2>Login Form</h2>
</div>
<!-- Login image (logo) -->
<div class="imgcontainer">
    <img src="images/image2vector.svg" alt="logo" class="decal">
</div>
<!-- Form for login -->
<form action="" method="post">
    <div class="wrapper">
        <label for="Username">Username: </label>
        <input type="email" name="username" placeholder="Username" autocomplete="off" required>
        <label for="pswd">Password: </label>
        <input type="password" name="pswd" placeholder="password" autocomplete="off" id="pwd" required>
        <input type="submit" name="submit" value="Login">
        <label>
        <input type="checkbox" checked="checked" name="rememberMe"> Remember Me
        </label>
    </div>
    <div class="wrapper" style="background-color: #d3d3d3">
        <span class="pswd"><a href="forgotpass.php">Forgot password?</a></span>
    </div>
</form>
<?php
if(isset($_POST['submit'])){
    $username = trim($_POST['username']);
    //save email in the session
    $_SESSION['username'] = $username;
    $password = trim($_POST['pswd']);                                  //This section checks the password hash in the db
    $sql = "SELECT * FROM users WHERE username = '$username';";        // against the password the user has typed in
    $combine = mysqli_query($mysqli, $sql);
    $numRows = mysqli_num_rows($combine);
    if($numRows  == 1){
        $row = mysqli_fetch_assoc($combine);
        if(password_verify($password, $row['password'])){
            header('Location: dashboard.php');
            exit();
        }
        else{
            echo "Either your email or password are incorrect. Please try again.";
        }
    }
    else{
        echo "No User found";
    }
}
?>
</body>
</html>
