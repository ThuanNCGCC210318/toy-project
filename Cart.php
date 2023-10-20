<?php
include_once("Header.php");
include_once("Connect.php");
$c = new Connect();
$dbLink = $c->ConnectToPDO();
if(isset($_SESSION ['user_name'])){

    $user_id = $_SESSION ['user_name'];

    if(isset($_GET['product_id'])){
        $p_id = $_GET['product_id'];
        $sqlSelect = "SELECT product_id FROM `card` WHERE customer_id = ? AND product_id = ?";
        $re = $dbLink->prepare($sqlSelect);
        $re->execute(array("$user_id", "$p_id"));

        if($re->rowCount() == 0){
            $query = "INSERT INTO `card`(customer_id, product_id, pCount, date) VALUES (?,?,1,CURDATE())";
        }else{
            $query = "UPDATE `card` SET pCount = pCount + 1 WHERE customer_id = ? AND product_id = ?";
        }
        $stmt = $dbLink->prepare($query);
        $stmt->execute(array("$user_id", "$p_id"));
    }else if(isset($_GET['del_id'])){
        $cart_del = $_GET['del_id'];
        $query = "DELETE FROM `card` WHERE ID = ?";
        $stmt = $dbLink->prepare($query);
        $stmt->execute(array("$cart_del"));
    }
    $sqlSelect = "SELECT * FROM `card` c, product p WHERE c.product_id = p.ID and customer_id = ?";
    $stmt1 = $dbLink->prepare($sqlSelect);
    $stmt1->execute(array($user_id));
    $rows = $stmt1->fetchAll(PDO::FETCH_BOTH);
}else{
    header("Location: Login.php");
}
?>
<div class="container">
    <h1 class="fw-bold mb-0 text black">Shopping cart</h1>
    <h6 class="mb-0 text-muted"><?=$stmt1->rowCount()?> itemt(s)</h6>
    <table class="table">
        <tr>
            <th>Productname</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Action</th>
        </tr>
    <?php
    foreach($rows as $row){
        ?>
        <tr>
            <td><?=$row['Name']?></td>
            <td> <input id="forml" min="0" name="Quantity" value="<?=$row['pCount']?>" type="number"
            class="form-control form-control-sm" /></td>
            <td><h6 class="mb-0"><span>&#8363;</span><?php echo $row['pCount'] * $row['Seilling Price']; ?></h6></td>
            <td><a href="cart.php?del_id=<?=$row['ID']?>" class="text-muted text-decoration-none bi bi-x-square-fill"></a></td>
        </tr>
    <?php
    }
    ?>
    </table>
        <hr class="my-4">

        <div class="pt-5">
            <h6 class="mb-0">
                <a href="Home.php" class="text-body">
                <i class="fas fa-long-arrow-alt-left me-2"></i>Back to stop</a>
            </h6>
        </div>
</div>
