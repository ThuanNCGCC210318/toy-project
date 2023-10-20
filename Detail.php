<?php
require_once('Header.php');
require_once('Connect.php');
?>

<div class="container px-4 py-5"> 

    <?php
    if(isset($_GET['ID'])):
        $pid = $_GET['ID'];
        require_once 'Connect.php';
        $conn = new Connect(); 
        $db_link= $conn->connectToPDO();
        $sql = "select * from product where ID = ?";
        $stmt = $db_link->prepare($sql);
        $stmt->execute(array($pid)); 
        $re = $stmt->fetch(PDO::FETCH_BOTH);
    ?>

    <h2><?=$re['Name']?></h2>

    <ul style="list-style-type:none;" class="list-group">
        <li class="list-group-item"><img src ="./image/<?=$re['image']?>" width="300px"></li> 
        <li class="list-group-item">Price: $<?=$re['Seilling Price']?></li> 
        <li class="list-group-item">Quantity: <?=$re['Quantity']?></li>
        <li class="list-group-item">Description: <?=$re['Description']?></li>
    </ul>

    <form action="Cart.php" method="GET"> 
        <div class="col-lg-9">
            <input type="hidden" name="ID" value="<?=$pid?>">
            <input type="submit" class="btn btn-primary shop-button" name="btnAdd" value="Add to cart"/> 
        </div>
    </form>

    <?php else: ?>

    <h2>Nothing to show</h2>

    <?php endif; ?>

</div>

<?php
require_once('Footer.php');
?>