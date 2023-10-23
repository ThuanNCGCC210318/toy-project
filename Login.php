<?php
session_start();
require_once('Header.php');
require_once('Connect.php');
if(isset($_POST['btnLogin'])){ //Kiểm tra nút bấm
    if(isset($_POST['txtPass'])&&isset($_POST['txtPhone'])){
        $pwd = $_POST['txtPass'];
        $phone = $_POST['txtPhone'];
        $c = new Connect();
        $dblink = $c->connectToPDO();
        $sql = "SELECT * FROM customer WHERE phone = ? AND pass = ?";
        $stmt = $dblink->prepare($sql);
        $re = $stmt->execute(array("$phone","$pwd"));
        $numrow = $stmt->rowCount();
        $row = $stmt->fetch(PDO::FETCH_BOTH);
        if ($numrow == 1){
            echo "Login successfully";
            $_SESSION["user_name"] = $row['Name'];
            header("Location: index.php");
            exit;
        }else{
            echo "Something is wrong with your info<br>";
        }
    } else {
        echo "Please enter your info<br>";
    }
}
?>

<!DOCTYPE html>
<html>
<body>
    <div class="container">
        <h2 class="text-center text-primary " >Login your account</h2>
        <form method="post">
            <div class="row mt-3 mb-2 col-6 mx-auto">
                <label for="txtEmail" class="col-sm-2">Phone: </label>
                <div class="col-sm-6">
                    <input type="text" id="txtPhone" name="txtPhone" class="form-control" required><br><br>
                </div>
            </div>

            <div class="row mt-1 mb-2 col-6 mx-auto">
                <label for="txtPass" class="col-sm-2">Password:</label>
                <div class="col-sm-6">
                    <input type="password" id="txtPass" name="txtPass" class="form-control" required><br><br>
                </div>
            </div class="row mb-3">
            <div class="row mb-3">
                    <div class="col-8 ms-auto row">
                        <div class="d-grid col-4 auto mix">
                            <button type="submit" name="btnLogin" class="btn btn-primary">Login</button>
                        </div>
        </form>
    </div>

</body>
</html>
<?php
require_once('Footer.php');
?>
