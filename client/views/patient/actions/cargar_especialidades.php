<?php
include_once '../../../../server/database/conection.php';

$sql = "SELECT DISTINCT specialty FROM doctors";
$result = $conn->query($sql);

$options = "";
while ($row = $result->fetch_assoc()) {
    $options .= "<option value='{$row['specialty']}'>{$row['specialty']}</option>";
}

echo $options;
?>
