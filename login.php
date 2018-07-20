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
if(isset($_POST['submit'])) {

    $password = trim($_POST['pwd']);
    $username = trim($_POST['username']);
    $stmt = $mysqli->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->bind_param("s", $_POST['username']);
    $stmt->execute();
    $result = $stmt->get_result();
    $numRows = $result->num_rows;
    if ($numRows === 1) {
        while ($row = $result->fetch_assoc()) {
            if (password_verify($password, $row['pwd'])) {
                header('Location: dashboard.php');
                $stmt->close();
                $mysqli->close();
            } else {
                echo "Your username or password do not match";
            }
        }
    }
}
?>
</body>
</html>
