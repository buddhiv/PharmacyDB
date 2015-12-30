<?php
/**
 * Created by PhpStorm.
 * User: Buddhi
 * Date: 12/28/2015
 * Time: 4:59 PM
 */

if (file_exists('../mysql_connector.php')) {
    include '../mysql_connector.php';
}
if (isset($_POST['remove'])) {
    removeStock($_POST['stockId']);

    header('Location: http://localhost/PharmacyDB/adminpanel.php?option=4');
}

function removeStock($stockId)
{
    $link = getConnection();
    $sql = "DELETE FROM fstock WHERE StockId='" . $stockId . "'";

    $resultset = mysqli_query($link, $sql);
    mysqli_close($link);

    return $resultset;
}

function isItemInStock($medicineid)
{
    $link = getConnection();
    $sql = "SELECT Quantity FROM fstock WHERE MedicineId = '" . $medicineid . "'";
    $totalQuantity = 0;
    $resultset = mysqli_query($link, $sql);

    $quantity = "OUT OF STOCK";
    if ($resultset != null) {
        while ($row = mysqli_fetch_array($resultset)) {
            $availableQuantity = $row['Quantity'];
            $totalQuantity += $availableQuantity;
        }
    }
    if ($totalQuantity > 0) {
        $quantity = "IN STOCK";
    }
    return $quantity;
}

function getAllStockDetails()
{
    $link = getConnection();
    $sql = "SELECT * FROM fstock";

    $resultset = mysqli_query($link, $sql);
    mysqli_close($link);

    return $resultset;
}