<?php

if (isset($_POST['crID'])) {
    require '../connect.php';

    $P_id = $_POST['crID'];
    $P_name = $_POST['crName'];
    $P_DOB = $_POST['price'];
    $typeID = $_POST['typeID'];
    

    echo 'crID = ' . $P_id;
    echo 'crName = ' . $P_name;
    echo 'price = ' . $P_DOB;
    echo 'typeID = ' . $typeID;
   
    $uploadFile = $_FILES['imgs']['name'];
    $tmpFile = $_FILES['imgs']['tmp_name'];
    echo " upload file = " . $uploadFile;
    echo " tmp file = " . $tmpFile;

    $fullpath = "./images/" . $uploadFile;
    echo " fullpath = " . $fullpath;
    move_uploaded_file($tmpFile, $fullpath);

    
    $stmt = $conn->prepare(
        'UPDATE  procar SET crID = :crID, crName = :crName, price = :price, imgs = :imgs, typeID = :typeID WHERE crID=:crID'
    );
    $stmt->bindparam(':crName',$_POST['crName']);
    $stmt->bindparam(':price',$_POST['price']);
    
    $stmt->bindparam(':crID', $_POST['crID']);
    $stmt->bindparam(':imgs', $uploadFile);
    $stmt->bindparam(':typeID',$_POST['typeID']);
    $stmt->execute();

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->rowCount() >= 0) {
        echo '
        <script type="text/javascript">
        
        $(document).ready(function(){
        
            swal({
                title: "Success!",
                text: "Successfuly update customer information",
                type: "success",
                timer: 2500,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index.php";
              });
        });
        
        </script>
        ';
    }
    $conn = null;
}
?>