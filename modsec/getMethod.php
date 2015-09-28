<?php
header('Content-Type: application/json');
include "control/config.php";
    
$data_points = array();
$result = mysql_query("SELECT HttpMethod, Count(*) as 'Count' FROM audit_log GROUP BY HttpMethod Order by Count");

while($row = mysql_fetch_array($result))
{
    $point = array("y" => $row['Count'] ,"name" => "'". $row['HttpMethod']. "'", "legendMarkerType" => "square");
    array_push($data_points, $point);

}
echo json_encode($data_points, JSON_NUMERIC_CHECK);

?>
