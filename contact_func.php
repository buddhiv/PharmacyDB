<?php
/**
 * Created by PhpStorm.
 * User: Buddhi
 * Date: 12/30/2015
 * Time: 10:47 AM
 */

$headers = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= 'From: xxx <xxx>' . "\r\n";

if (isset($_POST['name'])) {
    if ($_POST['email']) {
        if (isset($_POST['message'])) {
            $message =
                "Name: " . $_POST['name'] .
                "Email: " . $_POST['email'] .
                "Message: " . $_POST['message'];

            mail('92buddhiv@gmail.com', 'Pharmacy Application User Submission', $message, $headers);

            header('Location: http://localhost/PharmacyDB/contact.php?success=true');
//            echo 'success';
        } else {
            header('Location: http://localhost/PharmacyDB/contact.php?success=false');
        }
    } else {
        header('Location: http://localhost/PharmacyDB/contact.php?success=false');
    }
} else {
    header('Location: http://localhost/PharmacyDB/contact.php?success=false');
}