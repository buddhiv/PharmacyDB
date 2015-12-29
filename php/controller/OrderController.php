<?php
/**
 * Created by PhpStorm.
 * User: Buddhi
 * Date: 12/29/2015
 * Time: 5:15 PM
 */

function getAllOrderDetails()
{
    $link = getConnection();
    $sql = "SELECT * FROM forder";

    $resultset = mysqli_query($link, $sql);
    mysqli_close($link);

    return $resultset;
}