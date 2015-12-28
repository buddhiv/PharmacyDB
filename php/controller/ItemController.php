<?php

/**
 * Created by PhpStorm.
 * User: Buddhi
 * Date: 12/27/2015
 * Time: 1:24 PM
 */

function getRecentItems()
{
    $link = getConnection();
    $sql = "SELECT * FROM fmedicine ORDER BY RecievedOn DESC LIMIT 9";

    $resultset = mysqli_query($link, $sql);
    mysqli_close($link);

    return $resultset;
}
