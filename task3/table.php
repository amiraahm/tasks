<?php
echo "<h1>Dynamic table</h1>";
echo "<hr/>";

$header = array(
    "a" => "ID",
    "b" => "Name",
    "c" => "Age",
    "g" => 'genders',
);
$body = [
    'id' => 1,
    'name' => 'Amira',
    'age' => 21,
    'genders' => 'f'
];

echo "<table border='2'>";
echo "<tr>";

foreach ($header as $item) {
    echo "<td>" . $item . "</td>";
}
echo "</tr>";
if ($body['genders'] == 'f') {
    $body['genders'] = 'female';
} else {
    $body['genders'] = 'Male';
}
for ($x = 0; $x < 4; $x++) {
    echo '<tr>';
    foreach ($body as $details) {
        echo "<td>" . $details . "</td>";
    }
    echo "</tr>";
}
echo "</table>";