<?php

/**
 * Created by PhpStorm.
 * User: Buddhi
 * Date: 12/27/2015
 * Time: 1:24 PM
 */

include 'mysql_connector1.php';

function getRecentItems(){
    $link = getConnection();
    $sql = "SELECT * FROM fmedicine ORDER BY RecievedOn DESC LIMIT 9";

    $resultset = mysqli_query($link, $sql);

    return $resultset;
}
