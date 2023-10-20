<?php
require_once('Header.php');
include_once('Connect.php');
$c = new Connect();
$blink = $c->ConnectToMySQL();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['Pro_ID'];
    $product_name = $_POST['Pro_name'];
    $product_type = $_POST['Pro_type'];
    $original_price = $_POST['Ori_price'];
    $selling_price = $_POST['Seil_price'];
    $image_url = $_FILES['Pro_image']['name']; 
    $description = $_POST['Pro_desc'];
    $quantity = $_POST['Pro_qua'];

    
    $imgdir = './image/';
    $flag = move_uploaded_file($_FILES['Pro_image']['tmp_name'], $imgdir . $image_url);

    $sql = "UPDATE product SET 
            `Name` = '$product_name',
            `Type` = '$product_type',
            `Original Price` = '$original_price',
            `Seilling Price` = '$selling_price',
            `image` = '$image_url',
            `Description` = '$description',
            `Quantity` = '$quantity'
            WHERE ID = $product_id";

    if ($blink->query($sql) === true) {
        echo "Update Successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $blink->error;
    }
}

$product_id = $_GET['ID']; // 
$sql = "SELECT * FROM product WHERE ID = $product_id";
$result = $blink->query($sql);
$row = $result->fetch_assoc();
?>
<div class="container">
    <h2>Product Management</h2>
    <form class="form form-vertical" method="post" action="#" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="" class="form-group">Product ID: </label>
            <div class="col-sm-12">
                <input type="text" name="Pro_ID" class="form-control" value="<?= $row['ID'] ?>" placeholder="Product ID" readonly>
            </div>
        </div>
        <div class="row mb-3">
            <label for="" class="form-group">Product Name: </label>
            <div class="col-sm-12">
                <input type="text" name="Pro_name" class="form-control" value="<?= $row['Name'] ?>" placeholder="Product Name">
            </div>
        </div>
        <div class="row mb-3">
            <label for="" class="form-group">Product Type: </label>
            <div class="col-sm-12">
                <input type="text" name="Pro_type" class = "form-control" value="<?= $row['Type'] ?>" placeholder="Product Type">
            </div>
        </div>
        <div class="row mb-3">
            <label for="" class="form-group">Original Price: </label>
            <div class="col-sm-12">
                <input type="text" name="Ori_price" class="form-control" value="<?= $row['Original Price'] ?>" placeholder="Original Price">
            </div>
        </div>
        <div class="row mb-3">
            <label for="" class="form-group">Selling Price: </label>
            <div class="col-sm-12">
                <input type="text" name="Seil_price" class="form-control" value="<?= $row['Seilling Price'] ?>" placeholder="Selling Price">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-12">
                <div class="form-group">
                    <label for="image-vetical">Image</label>
                    <input type="file" name="Pro_image" id="Pro_image" class="form-control" value="">
                </div>
            </div>
        </div>
        <div class="row mb-3">
            <label for="" class="form-group">Product Description: </label>
            <div class="col-sm-12">
                <input type="text" name="Pro_desc" class="form-control" value="<?= $row['Description'] ?>" placeholder="Product Description">
            </div>
        </div>
        <div class="row mb-3">
            <label for="" class="form-group">Quantity: </label>
            <div class="col-sm-12">
                <input type="text" name="Pro_qua" class="form-control" value="<?= $row['Quantity'] ?>" placeholder="Quantity">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-2 mt-3 ms-auto row">
                <div class="d-grid col-6 auto mix">
                    <input type="submit" name="Edit" value="Update" class="btn btn-warning rounded-pill">
                </div>
                <div class="d-grid col-6 auto mix">
                    <input type="submit" name="btnReset" value="Reset" class="btn btn-light bg-secondary rounded-pill">
                </div>
            </div>
        </div>