<?php
header('Content-Type: application/json');
include "control/config.php";

$data_points = array();
$result = mysql_query("SELECT SourceIP, COUNT(*) AS 'Count' FROM audit_log GROUP BY SourceIP ORDER BY Count");

while($row = mysql_fetch_array($result))
{
    $point = array("y" => $row['Count'], "label" => $row['SourceIP']);
    array_push($data_points, $point);

}

echo json_encode($data_points, JSON_NUMERIC_CHECK);
?>
