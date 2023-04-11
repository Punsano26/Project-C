<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css">
    <link rel="stylesheet" href="../css/index.css">
    <title>CRUD sport car</title>

</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12"> <br>
                <h3>รุ่นและชื่อยี่ห้อ <a href="addnewcar.php" class="btn btn-info float-end">+เพิ่มข้อมูล</a> </h3> <br/>
                <!-- <table class="table table-striped  table-hover table-responsive table-bordered"> -->
                <table id="customerTable" class="display table table-striped  table-hover table-responsive table-bordered ">

                    <thead align="center">
                        <tr>
                            <th width="10%">รหัสของรถ</th>
                            <th width="20%">ชื่อยี่ห้อ</th>
                            <th width="15%">ราคารถ</th>
                            <th width="20%">รูปภาพ</th>
                            <th width="10%">ประเภทของรถ</th>
                            
                
                            <th width="5%">แก้ไข</th>
                            <th width="5%">ลบ</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        require '../connect.php';
                        $sql =
                            'SELECT * FROM `procar` WHERE 1';
                        $stmt = $conn->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        foreach ($result as $r) { ?>
                            <tr>
                                <td><?= $r[0] ?></td>
                                <td><?= $r[1] ?></td>
                                <td><?= $r[2] ?></td>
                                <td><img src="./images/<?= $r[3]; ?>" 
                                 
                                alt="image" 
                                onclick="enlargeImg()" id="img1" ></td>

                                <td><?= $r[4] ?></td>
                                
                                
                                
                                <td><a href="updatefrom.php?crID=<?= $r['crID'] ?>" class="btn btn-warning btn-sm">แก้ไข</a></td>
                                <td><a href="delete.php?crID=<?= $r['crID'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('ยืนยันการลบข้อมูล !!');">ลบ</a></td>
                            </tr>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#customerTable').DataTable();
        });
    </script>