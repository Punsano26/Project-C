<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>Add new cars now</title>
</head>

<body>


    <?php
    require '../connect.php';

    $sql_select = 'select * from car_type order by typeID';
    $stmt_s = $conn->prepare($sql_select);
    $stmt_s->execute();

    if (isset($_POST['submit'])) {

        if (!empty($_POST['crID']) && !empty($_POST['crName'])) {
            echo '<br>' . $_POST['crID'];
            //require 'connect.php'

            $uploadFile = $_FILES['imgs']['name'];
            $tmpFile = $_FILES['imgs']['tmp_name'];
            echo " upload file = " . $uploadFile;
            echo " tmp file = " . $tmpFile;
    
            $sql = "INSERT INTO procar 
            VALUES (:crID,:crName,:price,:imgs,:typeID)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':crID', $_POST['crID']);
            $stmt->bindParam(':crName', $_POST['crName']);
            $stmt->bindParam(':price', $_POST['price']);
            $stmt->bindParam(':imgs', $uploadFile);
            $stmt->bindparam(':typeID', $_POST['typeID']);
            
            echo "images =" .$uploadFile;

            $fullpath = "./images/" . $uploadFile;
            echo " fullpath = " . $fullpath;
            move_uploaded_file($tmpFile, $fullpath);

            try {
                if ($stmt->execute()):
                    $message = 'Successfully add new car';
                    // echo $stmt;
                else:
                    $message = 'Fail to add new car';
                endif;
                echo $message;
            } catch (PDOException $e) {
                echo 'Fail! ' . $e;
            }

            $conn = null;
        }

        header('location:index.php');
    }
    ?>



    <div class="container">
        <div class="row">
            <div class="col-md-4"> <br>
                <h3>ฟอร์มเพิ่มข้อมูลรถ</h3>
                <form action="addnewcar.php" method="POST" enctype="multipart/form-data">
                    
                <label for="name" class="col-sm-7 col-form-label"> รหัสของรถที่จะเพิ่ม: </label>

                    <input type="text" placeholder="Enter new car ID" name="crID"  class="form-control" require>
                    <br> 

                <label for="name" class="col-sm-7 col-form-label"> ชื่อยี่ห้อรถที่จะเพิ่ม: </label>

                    <input type="text" placeholder="car name" name="crName" class="form-control" require>
                    <br> 

                <label for="name" class="col-sm-7 col-form-label"> ราคาของรถ: </label> 

                    <input type="number" placeholder="price" name="price" class="form-control">
                    <br> 
                                   
                    แนบรูป:
                    <input type="file" name=imgs required class="form-control">
                    <br>


                <label>Selcet a car type code </label>
                    <select name="typeID" class="form-control">
                        <?php while ($cc = $stmt_s->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $cc['typeID']; ?>">
                                <?php echo $cc['nametype']; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <br>

                    <input type="submit" value="Submit" name="submit" />
                </form>
            </div>
        </div>
    </div>
</body>

</html>