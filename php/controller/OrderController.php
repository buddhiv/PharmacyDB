<?php
/**
 * Created by PhpStorm.
 * User: Buddhi
 * Date: 12/29/2015
 * Time: 5:15 PM
 */

if (isset($_POST['remove'])) {
    removeOrder($_POST['orderId']);

    header('Location: http://localhost/PharmacyDB/adminpanel.php?option=3');
}

function removeOrder($orderId)
{
    $link = getConnection();
    $sql = "DELETE FROM forder WHERE OrderId='" . $orderId . "'";

    $resultset = mysqli_query($link, $sql);
    mysqli_close($link);

    return $resultset;
}

function getAllOrderDetails()
{
    $link = getConnection();
    $sql = "SELECT * FROM forder";

    $resultset = mysqli_query($link, $sql);
    mysqli_close($link);

    return $resultset;
}