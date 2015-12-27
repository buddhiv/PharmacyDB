<?php

/**
 * Created by PhpStorm.
 * User: Buddhi
 * Date: 12/28/2015
 * Time: 1:38 AM
 */
include '../mysql_connector.php';

class CategoryController
{
    public function getCategoryDetails(){
        $sql = "SELECT * FROM category";

        $resultset = mysqli_query(getConnection(), $sql);
        return $resultset;
    }


}