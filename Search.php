<?php
	require_once('Header.php');
	include_once('Connect.php');
?>
<div class="container">
        <div class="row d-flex justify-content-center align-items-center p-4">
            <div class="col-md-6">
                <div class="search">
                <form class="example1" action="Search.php">     
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
                $sql = "SELECT * FROM product WHERE `Name` LIKE ?";
                $re = $dbLink->prepare($sql);
                $valueArray =  ["%$nameP%"];
                $re->execute($valueArray);
                $row = $re->fetchAll(PDO::FETCH_BOTH);
                foreach($row as $r):
            ?>   
			<div class="col-sm-6 mb-3">
   		 		<div class="card">
     		 		<div class="card-body">
					  	<img src ="./image/<?=$r['image']?>" width="300px">
						<a href="Detail.php?ID=<?=$r['ID']?>" class ="text-decoration">
       						<h5 class="card-title"><?=$r['Name']?></h5>
						</a>
							<p class="card-text">$<?=$r['Seilling Price']?></p>
       		 				<a href="Card.php?ID=<?=$r['ID']?>" class="btn btn-primary">Add to cart</a>
                            <a href="Edit.php?ID=<?=$r['ID']?>" class="btn btn-primary">Edit</a>					
							<a href="Remove.php?ID=<?=$r['ID']?>" class="btn btn-primary">Remove</a>	                            				
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