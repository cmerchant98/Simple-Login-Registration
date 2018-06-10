<?php
include_once 'conn.php';

if(!isset($_SESSION))
{
    header('Location: login.php');
    exit;
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/style.css">
<title>Dashboard</title>
<html>
<div id="navbar">
    <a href="#purchases">My Purchases</a>
    <a href="#settings">Settings</a>
    <a href="#friendsList">My Friends</a>
    <a href="#logout" style="text-align: right">Logout</a>
</div>
<head>
    <div class="body">
        <h2>Welcome back <?php echo $username ?></h2>
        <p>Lorem ipsum dolor sit amet, ex invidunt recusabo forensibus has. Ex nulla honestatis eos, enim dicat dolorum quo ei.
            Sit eu iusto interpretaris, ut atqui habemus principes vix, his fugit errem ridens in. Decore fierent sed at, dicunt dissentiunt an mel.
            Sit sumo elitr cu, sint propriae mel an. An quodsi apeirian menandri has, nam singulis omittantur no.
            Qui erat vivendum no, pri et omnes numquam. At discere delectus vix, sed dolores corrumpit definitionem no.
            Wisi labitur vivendo ut pro, mel ei solum senserit maluisset.
            Saepe oporteat te est, an per nullam noluisse. Has ne affert everti, te prompta lucilius mel, semper fabulas volumus eam in.
            Tritani sanctus his no, no oratio viderer lobortis mei. </p>
    </div>
</head>
<body>
<div class="newBody">
    <h3 style="align-content: center">More Information</h3>
    <p>Lorem ipsum dolor sit amet, ex invidunt recusabo forensibus has. Ex nulla honestatis eos, enim dicat dolorum quo ei.
        Sit eu iusto interpretaris, ut atqui habemus principes vix, his fugit errem ridens in. Decore fierent sed at, dicunt dissentiunt an mel.
        Sit sumo elitr cu, sint propriae mel an. An quodsi apeirian menandri has, nam singulis omittantur no.
        Qui erat vivendum no, pri et omnes numquam. At discere delectus vix, sed dolores corrumpit definitionem no.
        Wisi labitur vivendo ut pro, mel ei solum senserit maluisset.
        Saepe oporteat te est, an per nullam noluisse. Has ne affert everti, te prompta lucilius mel, semper fabulas volumus eam in.
        Tritani sanctus his no, no oratio viderer lobortis mei. </p>
</div>

</body>
<script src="js/stickynav.js"></script>
</html>
