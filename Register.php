<?php
	require_once('Header.php');
    include_once('Connect.php');
    if(isset($_POST['btnRegister'])){
        $c = new Connect();
        $dbLink = $c->connectToPDO();
        $usrname = $_POST['name'];
        $password = $_POST['password'];
        $phone = $_POST['Phone'];
        $address = $_POST['address'];

        
        $sql = "INSERT INTO `customer`(`Name`, `pass`, `Phone`, `Address`)VALUES (?,?,?,?)";
        
        $re = $dbLink->prepare($sql);
        $valueArray = [
            "$usrname", "$password", $phone, "$address"
        ];
        $stmt = $re->execute($valueArray);
        if($stmt){
            echo "Conrats";
        }else{
            echo "Failed";
        }
    }
?>

<div class="container">
    <h2 class="text-center">Member Registration</h2>
        <form id="formreg" class="formreg" name="formreg" role="form" method="post">
            <div class="row mb-3">
                <label for="" class="col-sm-1">Name: </label>
                <div class="col-sm-11">
                    <input type="text" name="name" class="form-control" value="">
                </div>
            </div>

            <div class="row mb-3">
                <label for="pwd" class="col-sm-1">Password: </label>
                <div class="col-sm-11">
                    <input type="password" name="password" class="form-control" value="" >
                </div>
            </div>                

            <div class="row mb-3">
                    <label for="" class="col-sm-1">Phone: </label>
                        <div class="col-sm-11">
                            <input type="text" name="Phone" class="form-control" value="">
                        </div>
            </div>

            <div class="row mb-3">
                <div class="row mb-3">
                <label for="pwd" class="col-sm-1">Address: </label>
                <div class="col-sm-11">                   
                    <select id="City" class="form-select" name="address">
                        <option selected value="unknow">Choose your hometown</option>
                        <option value="1">Kieng Giang</option>
                        <option value="2">Dong Thap</option>
                        <option value="3">Can Tho</option>
                    </select>
                </div>
            </div>

                <div class="row mb-3">
                    <div class="d-grid col-2 my auto">
                        <input type="submit" name="btnRegister"
                        value="Register" class="btn btn-primary">
                    </div>
                </div>
        </form>
</div>
<?php
	require_once('Footer.php');
?>