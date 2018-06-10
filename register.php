<?php
include_once 'conn.php';
?>
<!DOCTYPE html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<html>
<link rel="stylesheet" href="css/style.css">
<!-- title -->
<body style="background-color: mintcream">
<h2>Register</h2>
<!-- Login image (logo) -->
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" accept-charset="UTF-8">
<div class="imgcontainer">
    <img src="images/image2vector.svg" alt="611" class="decal">
</div>
<!-- Form to Register -->
    <div class="wrapper">
        <label for="Username">Email: </label>
        <input type="email" name="username" placeholder="Username" autocomplete="off" required minlength="4">
        <label for="pswd">Password: </label>
        <input type="password" name="pswd" placeholder="Password" autocomplete="off" required minlength="8">
        <label for="cpswd">Confirm Password: </label>
        <input type="password" name="cpswd" placeholder="Confirm Password" autocomplete="off" required minlength="8">
        <button type="submit" name="submit">Register</button>
    </div>
</form>
<?php
if(isset($_POST['submit'])){

    $stmt = $mysqli->prepare('INSERT INTO users (username, password) VALUES (?, ?)');
    $stmt->bind_param('ss', $cleanEmail, $pass_hash);

    $email = $_POST['username'];                                //Password hashing uses the password default algorithm
    $password =  $_POST['pswd'];                                //Must leave sql db column varchar 255 len.
    $cPassword = $_POST['cpswd'];
    $pass_hash = password_hash($password, PASSWORD_DEFAULT);

    $cleanEmail = filter_var($_POST['username'], FILTER_SANITIZE_EMAIL);
    $password = $mysqli->real_escape_string($password);         //A bit of server-side sanitization.
    $cPassword = $mysqli->real_escape_string($cPassword);       //Sanitize what is about to be entered in your db.
}
if($password == $cPassword){
    $stmt->execute();               //Compare the Password with Confirm Password
    $stmt->close();                 //If they match insert account into db.
    header('Location: dashboard.php');
}else{
    echo 'Passwords do not match';
}
?>
</body>
</html>
