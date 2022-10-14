<?php
$title = 'final';
include_once 'layouts/header.php';

$levels = ['Bad' => 0, 'Good' => 3, 'Very Good' => 5, 'Excellent' => 10,];

$total = 0;
for ($i = 1; $i <= 5; $i++) {
    foreach ($levels as $grade => $degree) {
        if ($_SESSION['q' . $i] == $grade) {
            $total += $degree;
        }
    }
}

if ($total < 25) {
    $message = " <div class='alert alert-warning col-9 text-center' > <strong>we call you on the phone :{$_SESSION['phone']} to get problem details and your suggestions for solve it </strong>  </div> ";
} else {
    $message = " <div class='alert alert-success col-9 text-center' > <strong>Thanks A Lot for your reporter :)</strong> </div>";
}

?>

<h1 class="text-center text-warning">final Of Your reporter</h1>
<div class="col-12" style="margin: 50px 150px;">
    <table class="col-9 table table-striped table-active ">
        <thead class="thead-muted">
            <th>#</th>
            <th>Question?</th>
            <th>Answer</th>

        </thead>
        <tbody>
            <tr>
                <td>1-</td>
                <td>Are you satisfied with the level of hygiene?</td>
                <td><?= $_SESSION['q1'] ?></td>

            </tr>
            <tr>
                <td>2-</td>
                <td>Are you satisfied with the price of service?</td>
                <td><?= $_SESSION['q2'] ?></td>
            </tr>
            <tr>
                <td>3-</td>
                <td>Are you satisfied with the nursing service?</td>
                <td><?= $_SESSION['q3'] ?></td>
            </tr>
            <tr>
                <td>4-</td>
                <td>Are you satisfied with the level of the doctor?</td>
                <td><?= $_SESSION['q4'] ?></td>
            </tr>
            <tr>
                <td>5-</td>
                <td>Are you satisfied with the calmness in the hospital?</td>
                <td><?= $_SESSION['q5'] ?></td>
            </tr>
        </tbody>
    </table>
    <?php if (isset($message)) {
        echo $message;
    } ?>

</div>


<?php
include_once "layouts/scripts.php";
?>