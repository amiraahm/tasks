<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    header('Location:Subscribe.php');
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $_SESSION['username'] = $_POST['user'];
    $_SESSION['members_count'] = $_POST['members_count'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <style>
        label{
            font-size: 20px;
        }
    </style>
    <title>family club</title>
</head>

<body>
    <div class="container" id="container">
        <div class="row">
            <div class="col-12 text-center h1 mt-5">
                <div class="discribe">
                    <img src="club.png" width="50%" height="50%" id="icon" alt="User Icon" />
                </div>
            </div>
            <div class="col-12  h5 mt-5">
                <form method="POST" action="Result.php">
                <?php
                $item = $_SESSION['members_count'];
                for ($i = 1; $i <= $item; $i++) {
                ?>
                    <h4 style="color:green " align="left">person <?= $i ?></h4>
                    <input type="text" name="member_name[<?=$i?>]" placeholder="writer your name">
                    <br>
                    <input type="checkbox" id="sport1" name="football[<?=$i?>]" value="<?=$i?>">
                    <label for="sport1"> tennis <b>30 $</b></label><br>
                    <input type="checkbox" id="sport2" name="swimming[<?=$i?>]" value="<?=$i?>">
                    <label for="sport2"> art <b>80 $</b></label><br>
                    <input type="checkbox" id="sport3" name="volley_ball[<?=$i?>]" value="<?=$i?>">
                    <label for="sport3"> basketball <b>120 $</b></label><br>
                    <input type="checkbox" id="sport4" name="others[<?=$i?>]" value="<?=$i?>">
                    <label for="sport4"> Others <b>150 $</b></label><br>
                <?php } ?>
                <input type="submit" class="discribe" value="Check Price">
                </form>
            </div>
        </div>



</body>

</html>