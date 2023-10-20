<?php
	require_once('Header.php');
	include_once('Connect.php');
	$c = new Connect();
	$dbLink = $c->ConnectToMySQL();
	$sql = 'SELECT * FROM product';
	$re=$dbLink->query($sql);
	if($re->num_rows>0){
?>
<div class="container">
	<h2 class="pd-2 mt-2 border-bottom text-primary">Hot product title></h2>
	<div class="row d-flex justify-content-center align-items-center p-2">
            <div class="col-md-8">
                <div class="search">
                <form class="example1" action="search.php">     
					<div class="input-group mb-3">
  						<input type="text" name="search" class="form-control rounded" placeholder="Search..." aria-label="Search" aria-describedby="search-addon"/>
  						<button name="btnSearch" class="btn btn-outline-primary">search</button>
					</div>
                </form>  
            </div>
        </div>
			<div class="row">
<?php
			while($row=$re->fetch_assoc()){
?>
			<div class="col-sm-6 mb-3 ">
   		 		<div class="card">
     		 		<div class="card-body">
					  	<img src ="./image/<?=$row['image']?>" width="300px">
						<a href="detail.php?ID=<?=$row['ID']?>" class ="text-decoration">
       						<h5 class="card-title"><?=$row['Name']?></h5></a>
							<p class="card-text">$<?=$row['Seilling Price']?></p>
       		 				<a href="Cart.php?ID=<?=$row['ID']?>" class="btn btn-primary">Add to cart</a>
							<a href="Edit.php?ID=<?=$row['ID']?>" class="btn btn-primary">Edit</a>					
							<a href="Remove.php?ID=<?=$row['ID']?>" class="btn btn-primary">Remove</a>					
					
     		 		</div>
   				</div>
  			</div>
<?php
		}
	}
?>
	</div>	
</div>
<?php
require_once('Footer.php');	
?>	

