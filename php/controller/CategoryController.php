<?php

/**
 * Created by PhpStorm.
 * User: Buddhi
 * Date: 12/28/2015
 * Time: 1:38 AM
 */

function getCategoryDetails()
{
    $link = getConnection();
    $sql = "SELECT * FROM fcategory";

    $resultset = mysqli_query($link, $sql);
    mysqli_close($link);

    return $resultset;
}

function getCategoryName($categoryid)
{
    $link = getConnection();
    $sql = "SELECT Title FROM fcategory WHERE CategoryId = '" . $categoryid . "'";

    $resultset = mysqli_query($link, $sql);
    mysqli_close($link);

    $row = mysqli_fetch_assoc($resultset);
    return $row['Title'];

}
