<?php

/**
 * Created by PhpStorm.
 * User: Buddhi
 * Date: 12/28/2015
 * Time: 1:38 AM
 */
include 'mysql_connector1.php';

function getCategoryDetails()
{
    $link = getConnection();
    $sql = "SELECT * FROM fcategory";

    $resultset = mysqli_query($link, $sql);

    return $resultset;
}
