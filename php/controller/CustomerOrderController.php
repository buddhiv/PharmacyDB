<?php
/**
 * Created by PhpStorm.
 * User: Neo_
 * Date: 12/29/15
 * Time: 6:46 PM
 */
include '../mysql_connector.php';


if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (isset($_POST['addOrder'])) {
    addOrder($_POST['username'], $_POST['password']);
}


function addOrder($userName, $password)
{
    if ($userName == $_SESSION['custName'] && $password==$_SESSION['custPassword']) {
        $connection = getConnection();
        $cartTotal = 0;
        foreach ($_SESSION["cart_array"] as $each_medicine) {
            $medicineId = $each_medicine['medicineId'];
            $result = mysqli_query($connection,"SELECT * FROM fmedicine WHERE MedicineId='$medicineId'");
            $unitPrice = 0;
            while ($row = mysqli_fetch_array($result)) {
                $unitPrice = $row["Price"];
            }
            $amount = $unitPrice * $each_medicine['quantity'];
            $cartTotal = $cartTotal + $amount;
        }


        $customerId = $_SESSION['customerId'];

        // Insert Data to Order Table
        $results = mysqli_query($connection,"INSERT INTO fcustomerorder (CustomerId,Date,amount) VALUES ('$customerId',now(),'$cartTotal')");
        $orderId = $connection->insert_id;

        //Insert Data to Order Detail Table
        foreach ($_SESSION["cart_array"] as $each_medicine) {
            $medicineId = $each_medicine['medicineId'];
            $result = mysqli_query($connection,"SELECT * FROM fmedicine WHERE MedicineId='$medicineId'");
            $unitPrice = 0;
            while ($row = mysqli_fetch_array($result)) {
                $unitPrice = $row["Price"];
            }
            $quantity = $each_medicine['quantity'];

            mysqli_query($connection,"INSERT INTO fcustomerorderdetails VALUES ('$orderId','$medicineId','$quantity','$unitPrice')") ;

        }

        // Change data in Item Table
        foreach ($_SESSION["cart_array"] as $each_medicine) {
            $medicineId = $each_medicine['medicineId'];
            $quantity = $each_medicine['quantity'];

            $result = mysqli_query($connection,"SELECT * FROM fstock WHERE MedicineId='$medicineId'");
            while ($row = mysqli_fetch_array($result)) {
                $availableQuantity = $row['Quantity'];
                $stockId = $row['StockId'];
                if($availableQuantity>$quantity){
                    mysqli_query($connection,"UPDATE fstock SET Quantity=Quantity-$quantity WHERE StockId='$stockId'");
                    break;
                }
                mysqli_query($connection,"UPDATE fstock SET Quantity=0 WHERE StockId='$stockId'");
                $quantity = $quantity - $availableQuantity;
            }
        }
        unset($_SESSION["cart_array"]);
        $connection->close();
        header('Location: http://localhost/PharmacyDB/index.php');
    }else{
        header('Location: http://localhost/PharmacyDB/checkout.php');
    }


}