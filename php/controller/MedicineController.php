<?php

/**
 * Created by PhpStorm.
 * User: Buddhi
 * Date: 12/27/2015
 * Time: 1:24 PM
 */

if (isset($_POST['remove'])) {
    removeMedicine($_POST['medicineId']);

    header('Location: http://localhost/PharmacyDB/adminpanel.php?option=2');
}

function removeMedicine($medicineId)
{
    $link = getConnection();
    $sql = "DELETE FROM fmedicine WHERE MedicineId='" . $medicineId . "'";

    $resultset = mysqli_query($link, $sql);
    mysqli_close($link);

    return $resultset;
}

function getRecentItems()
{
    $link = getConnection();
    $sql = "SELECT * FROM fmedicine ORDER BY RecievedOn DESC LIMIT 9";

    $resultset = mysqli_query($link, $sql);
    mysqli_close($link);

    return $resultset;
}

function getItemsListForHome()
{
    $link = getConnection();
    $sql = "SELECT * FROM fmedicine LIMIT 8";

    $resultset = mysqli_query($link, $sql);
    mysqli_close($link);

    return $resultset;
}

function getItemsListForCart()
{
    $link = getConnection();
    $sql = "SELECT * FROM fmedicine ORDER BY RecievedOn DESC LIMIT 4";

    $resultset = mysqli_query($link, $sql);
    mysqli_close($link);

    return $resultset;
}

function getItemDetailsById($medicineId)
{
    $link = getConnection();
    $sql = "SELECT * FROM fmedicine WHERE MedicineId = '" . $medicineId . "'";

    $resultset = mysqli_query($link, $sql);
    mysqli_close($link);

    $row = mysqli_fetch_assoc($resultset);
    return $row;
}

function getItemsByCategoryId($categoryId)
{
    $link = getConnection();
    $sql = "SELECT * FROM fmedicine WHERE CategoryId = '" . $categoryId . "'";

    $resultset = mysqli_query($link, $sql);
    mysqli_close($link);

    return $resultset;
}

function getAllMedicineDetails()
{
    $link = getConnection();
    $sql = "SELECT * FROM fmedicine";

    $resultset = mysqli_query($link, $sql);
    mysqli_close($link);

    return $resultset;
}
