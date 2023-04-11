<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <title>Update data sport car </title>
</head>

<body>

  <?php
  require '../connect.php';

  $sql_select_list = "SELECT * FROM car_type";
  $stmt_c = $conn->prepare($sql_select_list);
  $stmt_c->execute();
  echo "crID = " . $_GET['crID'];

  if (isset($_GET['crID'])) {
    // $sql_select_menu = 'SELECT * FROM procar WHERE crID=? AND typeID=?';
    // $stmt = $conn->prepare($sql_select_menu);
    // $params = array($_GET['crID'],$_GET['typeID']);
    // $stmt->execute($params);
    $sql_select_menu = 'SELECT * FROM procar WHERE crID=?';
    $stmt = $conn->prepare($sql_select_menu);
    $stmt->execute([$_GET['crID']]);
    echo "get = " . $_GET['crID'];
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
  }
  ?>


  <div class="container">
    <div class="row">
      <div class="col-md-7"> <br>
        <h3>ฟอร์มแก้ไข ข้อมูสินค้ารถซุปเปอร์คาร์</h3>
        <form action="update.php" method="POST" enctype="multipart/form-data">
          <input type="hidden" name="crID" value="<?= $result['crID'] ?>">

          <label for="name" class="col-sm-7 col-form-label"> รหัสของรถที่จะแก้ไข: </label>

          <input type="text" name="crID"  class="form-control" required value="<?= $result['crID'] ?>">
                    

          <label for="name" class="col-sm-7 col-form-label"> ชื่อยี่ห้อรถที่จะแก้ไข: </label>

          <input type="text" name="crName" class="form-control" required value="<?= $result['crName'] ?>">


          <label for="name" class="col-sm- col-form-label"> ราคา: </label>

          <input type="number" name="price" class="form-control" required value="<?= $result['price'] ?>">

          <label for="name" class="col-sm-5 col-form-label"> ภาพของรถ: </label>

          <input type="file" name="imgs" class="form-control" required value="<?= $fullpath['imgs'] ?>">
          <br>
          <label>Selcet edit old car type code </label>
          <select name="typeID" >
                        <?php while ($cc = $stmt_c->fetch(PDO::FETCH_ASSOC)) { ?>
                            <option value="<?php echo $cc['typeID']; ?>">
                                <?php echo $cc['nametype']; ?>
                            </option>
                        <?php } ?>
                    </select>
          <br>
          <br> <button type="submit" value="Submit" name="submit" class="btn btn-primary">แก้ไขข้อมูล</button>
            
            
                    

          
        </form>
      </div>
    </div>
  </div>

</body>