<?php
/**
 * Created by PhpStorm.
 * User: Neo_
 * Date: 12/29/15
 * Time: 9:41 AM
 */


function addMedicineToCart($medicineId, $quantity)
{

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $wasFound = false;
    $i = 0;
    $connection = getConnection();
    $result = mysqli_query($connection, "SELECT * FROM fstock WHERE MedicineId='$medicineId'");
    $existQuantity = 0;
    while ($row = mysqli_fetch_array($result)) {
        $availableQuantity = $row['Quantity'];
        $existQuantity += $availableQuantity;
    }
    if ($existQuantity >= $quantity) {
        if (!isset($_SESSION["cart_array"]) || count($_SESSION["cart_array"]) < 1) {
            $_SESSION["cart_array"] = array(0 => array("medicineId" => $medicineId, "quantity" => $quantity));
        } else {
            foreach ($_SESSION["cart_array"] as $each_medicine) {
                $i++;
                while (list($key, $value) = each($each_medicine)) {
                    if ($key == "medicineId" && $value == $medicineId) {
                        array_splice($_SESSION["cart_array"], $i - 1, 1, array(array("medicineId" => $medicineId, "quantity" => $quantity)));
                        $wasFound = true;
                    }
                }
            }
            if ($wasFound == false) {
                array_push($_SESSION["cart_array"], array("medicineId" => $medicineId, "quantity" => $quantity));
            }
        }
        return true;
    } else {
        return false;
    }
}


if (isset($_POST['clearCart'])) {
    clearCart();
} else if (isset($_POST['removeItemFromCart'])) {
    removeItemFromCart($_POST['removeItemFromCart']);
}

function clearCart()
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    unset($_SESSION["cart_array"]);
    header("location: ../../cart.php");
}

function removeItemFromCart($index)
{
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    if (count($_SESSION['cart_array']) <= 1) {
        unset($_SESSION['cart_array']);
    } else {
        unset($_SESSION["cart_array"]["$index"]);
        sort($_SESSION["cart_array"]);
    }
    header("location: ../../cart.php");
}