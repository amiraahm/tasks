<?php

if ($_POST) {
    $user = $_POST['user'];
    $money = $_POST['loan'];
    $numyears = $_POST['years'];
    if ($numyears <= 3) {
        $rate = $money * 0.10;
        $rate *= $numyears;
        $result = $money + $rate;
        $total = $result / (12.0 * $numyears);
    } else {
        $rate = $money * 0.15;
        $rate *= $numyears;
        $result = $money + $rate;
        $total = $result / (12.0 * $numyears);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        #container {
            border: 12px solid #dddddf;
            border-radius: 7px;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #dddddf;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddf;
        }
    </style>
    <title>Bank</title>
</head>

<body>
    <div class="container" id="container">
        <div class="row">
            <div class="col-12 text-center h1 mt-5">
            Bank
            </div>
            <div class="col-4 offset-4 my-5">
                <form method="post">
                    <div class="poster">
                        <label name="user">User id</label>
                        <input name="user" class="form-control" required>
                    </div>
                    <div class="poster">
                        <label name="loan">Loan money</label>
                        <input name="loan" class="form-control" required>
                    </div>
                    <div class="poster">
                        <label name="years">Loan years</label>
                        <input name="years" class="form-control" required>
                    </div>
                    <br>
                    <div class="poster text-center">
                        <button name="culc" class="btn btn-outline-success btn-sm">Calculate</button>
                    </div>
                    <br>
                    <?php
                    if (isset($total)) {

                        $massage = " 
                        <table>
                        <th>User name</th>
                        <th>interest rate</th>
                        <th>Loan after interest</th>
                        <th>Monthly</th>
                        <tr>
                        <td>{$user}</td>
                        <td>{$rate}</td>
                        <td>{$result}</td>
                        <td>{$total}</td>
                        </tr>
                        </table>";
                        echo $massage;
                    }

                    ?>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</body>

</html>