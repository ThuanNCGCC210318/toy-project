<?php
	require_once('Header.php');
    include_once('Connect.php');
    if(isset($_POST['Add'])){
        $c = new Connect();
        $dbLink = $c->connectToPDO();
        $proID = $_POST['Pro_ID'];
        $shopID = $_POST['Shop_ID'];
        $proName = $_POST['Pro_name'];
        $proType = $_POST['Pro_type'];
        $oriPrice = $_POST['Ori_price'];
        $seilPrice = $_POST['Seil_price'];
        $proDesc = $_POST['Pro_desc'];
        $proQua = $_POST['Pro_qua'];
        $img = str_replace('','-',$_FILES['Pro_image']['name']);
        $imgdir = './image/'; 
        $flag = move_uploaded_file($_FILES['Pro_image']['tmp_name'], $imgdir.$img);
        if($flag){
            $sql = "INSERT INTO `product`(`Shop_ID`, `Name`, `Type`, `Original Price`, `Seilling Price`, `image`, `Description`, `Quantity`) VALUES (?,?,?,?,?,?,?,?)";
            $re = $dbLink->prepare($sql);
            $valueArray = [
            $shopID, $proName, $proType, $oriPrice, $seilPrice, $img, $proDesc, $proQua
            ];
            $stmt = $re->execute($valueArray);
            if($stmt){
                echo "Conrats";
            }
        }else{
            echo "Coppy failed";
        }
    }

?>
<div class="container">
    <h2>Product Management</h2>
        <form class="form form-vertical" method="post" action="#" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="" class="form-group">Product ID: </label>
                <div class="col-sm-12">
                    <input type="text" name="Pro_ID" class="form-control" value="" placeholder="Product ID" >
                </div>
        </div>
                <form class="form form-vertical" method="post" action="#" enctype="multipart/form-data">
        <div class="row mb-3">
            <label for="" class="form-group">Shop ID: </label>
                <div class="col-sm-12">
                    <input type="text" name="Shop_ID" class="form-control" value="" placeholder="Shop ID" >
                </div>
        </div>
        <div class="row mb-3">
                <label for="" class="form-group">Product Name: </label>
                <div class="col-sm-12">
                    <input type="text" name="Pro_name" class="form-control" value="" placeholder="Product Name" >
                </div>
        </div>
        <div class="row mb-3">
                <label for="" class="form-group">Product Type: </label>
                <div class="col-sm-12">
                    <input type="text" name="Pro_type" class="form-control" value="" placeholder="Product Quantity" >
                </div>
        </div>
        <div class="row mb-3">
            <label for="" class="form-group">Origial Price: </label>
                <div class="col-sm-12">
                    <input type="text" name="Ori_price" class="form-control" value="" placeholder="Price" >
                </div>
        </div>
        <div class="row mb-3">
                <label for="" class="form-group">Seilling Price: </label>
                <div class="col-sm-12">
                    <input type="text" name="Seil_price" class="form-control" value="" placeholder="Select Date" >
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
                    <input type="text" name="Pro_desc" class="form-control" value="" placeholder="Product Description" >
                </div>
        </div>
        <div class="row mb-3">
                <label for="" class="form-group">Quantity: </label>
                <div class="col-sm-12">
                    <input type="text" name="Pro_qua" class="form-control" value="" placeholder="Quantity" >
        </div>
        <div class="row mb-3">
                    <div class="col-2 mt-3 ms-auto row">
                        <div class="d-grid col-6 auto mix">
                            <input type="submit" name="Add" value="Submit" 
                            class="btn btn-warning rounded-pill">
                        </div>
                        <div class="d-grid col-6 auto mix">
                            <input type="submit" name="btnReset" value="Reset" 
                            class="btn btn-light bg-secondary rounded-pill">
                        </div>
                    </div>
                </div>    
</div>
<?php
	require_once('Footer.php');
?>