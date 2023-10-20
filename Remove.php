<?php
include_once("Header.php");
include_once("Connect.php");
$c = new Connect();
$dbLink = $c->ConnectToPDO();
if(isset($_GET['ID'])){
    $p_id = $_GET['ID'];
    $sqlSelect = "DELETE FROM `product` WHERE ID = ?";
    $re = $dbLink->prepare($sqlSelect);
    $re->execute(array("$p_id"));
}
header("Location: index.php");
?>