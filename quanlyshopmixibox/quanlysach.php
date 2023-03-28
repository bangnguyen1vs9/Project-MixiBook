<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUẢN LÝ SÁCH</title>
    <link rel="stylesheet" href="../assets/css/resets.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.2.0-web/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <!-- <link rel="stylesheet" href="../assets/img/"> -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    
    <div class="appQLS">
    <div><a href="../index.php" class="vetrangchu">Về Trang chủ</a></div>

        
        <!-- <div class="grid"> -->
        <table class="table-list-QL" cellspacing="0" cellpadding="0">
        <caption>DANH SÁCH QUẢN LÝ SÁCH SHOP MIXIBOOK</caption>
        <tr class="list-items">
            <th class="items-text">MÃ SÁCH</th>
            <th class="items-text">LOẠI SÁCH</th>
            <th class="items-text">TÊN SÁCH</th>
            <th class="items-text">HÌNH ẢNH</th>
            <th class="items-text">GIÁ CŨ</th>
            <th class="items-text">GIÁ MỚI</th>
            <!-- <th class="items-text">TÊN TÁC GIẢ</th>
            <th class="items-text">DỊCH GIẢ</th>
            <th class="items-text">MÔ TẢ SÁCH</th> -->
            <th></th>
        </tr>
        <?php
            include '../ketnoi.php';
            $conn = MoKetNoi();
            if ($conn->connect_error) {
                echo "Không kết nối được với MySQL !!!";
            }
            mysqli_select_db($conn, "bai12");
            $conn=mysqli_connect("localhost", "root", "","bai12");
            $sql = "SELECT * FROM SACH
                    JOIN GIOITHIEUSACH ON SACH.TUASACH = GIOITHIEUSACH.TUASACH
                    JOIN LOAI ON SACH.MATL = LOAI.MATL
                    JOIN NHAXUATBAN ON SACH.MANXB = NHAXUATBAN.MANXB
                    JOIN TACGIA ON SACH.MATG = TACGIA.MATG;";
            $result = mysqli_query($conn, $sql);
            //in ra danh sách dữ liệu
            while ($row = mysqli_fetch_assoc($result)) {
                $MASACH = $row['MASACH'];
                $TUASACH = $row['TUASACH'];
                $HINH = $row['HINH'];
                $GIACU = $row['GIACU'];
                $GIAMOI = $row['GIAMOI'];
                $MANXB = $row['MANXB'];
                $MATL = $row['MATL'];
                $MATG = $row['MATG'];
                
                $MOTA = $row['MOTA'];
                $TENTL = $row['TENTL'];

                $TENTG = $row['TENTG'];
                $DICHGIA = $row['DICHGIA'];
                
                $TENNXB = $row['TENNXB'];
        ?>
        <tr class="list-items">
            <td class="item-text"><?php echo $MASACH ?></td>
            <td class="item-text"><?php echo $TENTL ?></td>
            <td class="item-text"><?php echo $TUASACH ?></td>
            <td class="item-text"><?php echo $HINH ?></td>
            <td class="item-text"><?php echo $GIACU ?></td>
            <td class="item-text"><?php echo $GIAMOI ?></td>
            <!-- <td class="item-text"><?php echo $TENTG ?></td>
            <td class="item-text"><?php echo $DICHGIA ?></td>
            <td class="item-text"><?php echo $MOTA ?></td> -->
            <td>
                <a href="xulyxoa.php?idMS=<?php echo $MASACH; ?>">Xóa</a>
                <a href="suadulieu.php?idMS=<?php echo $MASACH; ?>">Sửa</a>
            </td>
        </tr>
        <?php
            }
            // DongKetNoi($conn);
        ?>
        <tr>
            <td colspan="10" align="center">
                <button type="button" class="themmoi" onclick="myFunction()">THÊM MỚI</button>
            </td>
        </tr>
    </table>
    <script>
        function myFunction(){
            location.replace("./themmoidulieu.php");//điều hướng tới trang thêm mới dữ liệu
        }
    </script>
        </div>
    </div>
</body>
</html>