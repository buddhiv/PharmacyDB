<?php
/**
 * Created by PhpStorm.
 * User: Neo_
 * Date: 12/28/15
 * Time: 3:14 PM
 */

session_start();
session_destroy();
header('Location: http://localhost/PharmacyDB/index.php');

?>