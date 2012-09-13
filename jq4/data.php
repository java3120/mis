<?php
$page = $_POST['page'];
$rowNum = $_POST['rows'];
if ($page == 0) {
    $page = 1;
}
if ($rowNum == 0)
{
    $rowNum = 50;
}
$rows = array();
$result = array();
$result["total"] = ceil(1001 / $rowNum);
$result["page"] = "$page";
$result["records"] = "1001";
for($i = 1; $i < 1001; $i++)
{
    if ($i == 1)
    {
    array_push($rows, array("cell"=>array("nameWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWWW".$i, "30"+$i, "黑色", "200"+$i, "10"+$i)));
    }
    else {
    array_push($rows, array("cell"=>array("name".$i, "30"+$i, "黑色", "200"+$i, "10"+$i)));
    }
}
$result["rows"] = $rows;
echo json_encode($result);
?>