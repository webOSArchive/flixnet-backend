<?php
include "../../database.php";
$conn = connectDB();

$take = 10;
if (isset($_GET["take"]) && is_numeric($_GET["take"]))
    $take = (int)$_GET["take"];
if ($take > 100)
    $take = 100;
$skip = 0;
if (isset($_GET["skip"]) && is_numeric($_GET["skip"]))
    $skip = (int)$_GET["skip"];
    
header('Content-Type: application/json');
if (!isset($_GET["skip"]))
    $sql = "SELECT * FROM tbl_movies ORDER BY RAND() LIMIT " . $take;
else
    $sql = "SELECT * FROM tbl_movies LIMIT " . $take . " OFFSET " . $skip;

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($result);
?>