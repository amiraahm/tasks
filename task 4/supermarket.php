<?php
$massage = "";
$product_detils = [[]];
$head = ['Product Name', 'Price', 'Quantities', 'Sub total'];

if (isset($_POST['user_details'])) {
    $user = $_POST['user'];
    $place = $_POST['place'];
    $product = $_POST['product'];
    $massage .= "<table>";
    for ($j = 1; $j < 4; $j++) {
        $massage .= "<th>";
        $massage .= $head[$j - 1];
        $massage .= "</th>";
    }
    for ($i = 1; $i <= $product; $i++) {
        $massage .= "<tr>";
        for ($j = 0; $j < 3; $j++) {
            $massage .= "
            <td>
            <input name='value[{$i}][$head[$j]]' class='form-control' required>
            </td>";
        }  
        $massage .= "</tr>";
    }

    $massage .= "</table>
    <button name='order_bill' class='btn btn-outline-success btn-sm'>Receipt</button>
    ";
}
if (isset($_POST['order_bill'])) {
    $res_table='';
    $total=0;
    $discount=0;
    $place='';
    $res_table .= "<table>";
    for ($j = 1; $j <= 4; $j++) {
        $res_table .= "<th>";
        $res_table .= $head[$j - 1];
        $res_table .= "</th>";
    }
    for ($i = 1; $i <= $_POST['product']; $i++) {
        $res_table .= "<tr>";
        for ($j = 0; $j < 3; $j++) {
            $res_table .= "
            <td>
            {$_POST['value'][$i][$head[$j]]} 
            </td>";
        }
        $res=$_POST['value'][$i][$head[1]]*$_POST['value'][$i][$head[2]];
        $total+=$res;
        $res_table .= "
        <td>
        $res
        </td>";
        $res_table .= "</tr>";
    }
    $res_table.="</table>";
    if($total<3000 && $total>1000){
       $discount=$total*0.10;
    }else if($total<4500){
        $discount=$total*0.15;
    }else{
        $discount=$total*0.20;
    }
    $totalAfter=$total-$discount;
    if($_POST['place']=='0')
    $place='Aswan';
    else if($_POST['place']=='30')
    $place='Luxur';
    else if($_POST['place']=='50')
    $place='Alex';
    else
    $place='Other';
    $net_total=$totalAfter+intval($_POST['place']);
    $check="<table>
    <tr>
    <th>Client Name</th>
    <td>{$_POST['user']}</td>
    </tr>
    <tr><th>place</th>
    <td>{$place}</td>
    </tr>
    <tr><th>Total</th>
    <td>{$total} EGP</td>
    </tr>
    <tr><th>Discount</th>
    <td>{$discount} EGP</td>
    </tr>
    <tr><th>Total after discount</th>
    <td>{$totalAfter} EGP</td>
    </tr>
    <tr><th>Delivery</th>
    <td>{$_POST['city']} EGP</td>
    </tr>
    <tr><th>Net Total</th>
    <td>{$net_total} EGP</td>
    </tr>
    </table>";

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" rel="stylesheet" />

    <title>SuperMarket</title>
    <style>
        #poster {
            position: fixed;
            max-width: 20%;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        table {
            width: 500px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-7">
                <div class="col-xs-12" id="poster">
                    <div class=" offset-4 my-5">

                        <form method="post">
                            <div class="groups">
                                <label name="user">Enter UserName:</label>
                                <input name="user" class="form-control " value="<?= $_POST['user'] ?? "" ?>" required>
                            </div>
                            <div class="groups">
                                <label name="city">Enter City:</label>

                                <?php if(isset($_POST['place'])){?>
                                <select name="place" class="form-control" id="city">
                                    <option <?=  $_POST['place'] == '0' ? 'selected="selected"' : ''  ?> value="0">Aswan</option>
                                    <option <?=  $_POST['place'] == '30' ? 'selected="selected"' : '' ?> value="30">Luxur</option>
                                    <option <?=  $_POST['place'] == '50' ? 'selected="selected"' : '' ?> value="50">Alex</option>
                                    <option <?=  $_POST['place'] == '100' ? 'selected="selected"' : '' ?> value="100">Other</option>

                                </select>
                                <?php } 
                                else{?>
                                <select name="place" class="form-control" id="place">
                                    <option value="0">Aswan</option>
                                    <option value="30">Luxur</option>
                                    <option  value="50">Alex</option>
                                    <option  value="100">Other</option>

                                </select>
                                <?php }?>

                            </div>
                            <div class="groups">
                                <label name="product">Enter Number of products:</label>
                                <input name="product" class="form-control " value="<?= $_POST['product'] ?? "" ?>" required>
                            </div>
                            <br>
                            <div class="groups text-center">
                                <button name="user_details" class="btn btn-outline-success btn-sm">Enter Products</button>
                            </div>
                            <br>
                            <?php
                            echo $massage;
                            ?>
                        </form>
                         <?php 
                         if(isset($res_table)){
                         echo $res_table;
                         echo '<br>';
                         echo $check;
                         }
                         ?>
                    </div>


                </div>

            </div>
            <div class="col-xs-5" id="main">
                <img src="logosuper.jpg" width="600" height="600">
            </div>
        </div>
    </div>
</body>

</html>