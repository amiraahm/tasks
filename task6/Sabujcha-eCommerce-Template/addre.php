<?php $db = mysqli_connect('localhost', 'root', '') or
	die('Unable to connect. Check your connection parameters.');
mysqli_select_db($db, 'b24_ecommerce') or die(mysqli_error($db));
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="col-lg-12">
        <?php
		$rate = $_POST["rate"];
		$review = $_POST["comment"];
		$status = $_POST["status"];
		$query = "INSERT INTO `reviews` (`rate`, `status`, `comment`) 
                values('" . $rate . "','" . $status . "','" . $review . "');";
		mysqli_query($db, $query) or die('Error in updating Database');
		?>
        <script type="text/javascript">
        alert("Successfully added.");
        window.location = "index.php";
        </script>
    </div>
</body>

</html>