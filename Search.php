<?php
	require_once('Header.php');
	include_once('Connect.php');
?>
<div class="container">
        <div class="row d-flex justify-content-center align-items-center p-4">
            <div class="col-md-6">
                <div class="search">
                <form class="example1" action="search.php">     
                <div class="input-group">
  						<input type="text" name="search" class="form-control rounded" placeholder="Search..." aria-label="Search" aria-describedby="search-addon"/>
  						<button name="btnSearch" class="btn btn-outline-primary">Search</button>
					</div>
                </form>  
                </div>
            </div>
        </div>
        <h2 class="text-primary" >Result for:</h2>    
        <div class="row">
            <?php
                $c = new Connect();
                $dbLink = $c->connectToPDO();
                if(isset($_GET['search'])){
                    $nameP = $_GET['search'];
                }else{
                    $nameP = "";
                }
                $sql = "SELECT * FROM product WHERE pname LIKE ?";
                $re = $dbLink->prepare($sql);
                $valueArray =  ["%$nameP%"];
                $re->execute($valueArray);
                $row = $re->fetchAll(PDO::FETCH_BOTH);
                foreach($row as $r):
            ?>   
			<div class="col-sm-6 mb-3">
   		 		<div class="card">
     		 		<div class="card-body">
					  	<img src ="./image/<?=$r['pimage']?>" width="300px">
						<a href="detail.php?pid=<?=$r['pid']?>" class ="text-decoration">
       						<h5 class="card-title"><?=$r['pname']?></h5>
						</a>
							<p class="card-text"><?=$r['pprice']?></p>
       		 				<a href="cart.php?pid=<?=$r['pid']?>" class="btn btn-primary">Add to cart</a>					
     		 		</div>
   				</div>
  			</div>
            <?php
                endforeach;
            ?>  
        </div>
</div>
<?php
    require_once('Footer.php');	
?>