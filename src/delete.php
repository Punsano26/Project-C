<?php

if (isset($_GET['crID'])) {
    require '../connect.php';

    $query = "DELETE FROM procar WHERE crID = :crID";
    $stmt = $conn->prepare($query);
    $stmt->bindParam(':crID', $_GET['crID']);

    if ($stmt->execute()) {
        $mess = "list Deleted!!!";
       
        header('location:index.php');
    } else {
        $mess = "Failed Delete!!!";
    }

    echo $mess;
    $conn = null;

}



?>