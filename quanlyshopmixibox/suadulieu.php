<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SỬA DỮ LIỆU</title>
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
        }
    ?>
    <form action="xulysua.php" method="post" class="appQLS">
        <table class="table-list-QL">
            <caption>SỬA DỮ LIỆU SÁCH</caption>
            <tr class="list-items-one">
                <td>MÃ SÁCH</td>
                <td><input type="text" class="inputthemdulieusach" id="txtMASACH" name="txtMASACH" value="<?php echo $MASACH ?>"></td>
            </tr>
            <tr class="list-items-one">
                <td>TỰA SÁCH</td>
                <td><input type="text" class="inputthemdulieusach" id="txtTUASACH" name="txtTUASACH" value="<?php echo $TUASACH ?>"></td>
            </tr>

            <tr class="list-items-one">
                <td>HÌNH ẢNH</td>
                <td>
                    <input type="file" class="inputthemdulieusach" id="txtHINH" name="txtHINH" value="<?php echo $HINH ?>" >
                </td>
            </tr>
            <tr class="list-items-one">
                <td>GIÁ MỚI</td>
                <td><input type="number" class="inputthemdulieusach" id="txtGIAMOI" name="txtGIAMOI" value="<?php echo $GIAMOI ?>"></td>
            </tr>
            <tr class="list-items-one">
                <td>GIÁ CŨ</td>
                <td><input type="number" class="inputthemdulieusach" id="txtGIACU" name="txtGIACU" value="<?php echo $GIACU ?>"></td>
            </tr>
            <tr class="list-items-one">
                <td>MÃ NHÀ XUẤT BẢN</td>
                <td><input type="text" class="inputthemdulieusach" id="txtMANXB" name="txtMANXB" value="<?php echo $MANXB ?>"></td>
            </tr>
            <tr class="list-items-one">
                <td>MÃ THỂ LOẠI</td>
                <td><input type="text" class="inputthemdulieusach" id="txtMATL" name="txtMATL" value="<?php echo $MATL ?>"></td>
            </tr>
            <tr class="list-items-one">
                <td>MÃ TÁC GIẢ</td>
                <td><input type="text" class="inputthemdulieusach" id="txtMATG" name="txtMATG" value="<?php echo $MATG ?>"></td>
            </tr>


            <tr class="list-items-one">
                <td>MÔ TẢ SÁCH</td>
                <td><input type="text" class="inputthemdulieusach" id="txtMOTA" name="txtMOTA" value="<?php echo $MOTA ?>"></td>
            </tr>


            <tr class="list-items-one">
                <td>TÊN THỂ LOẠI</td>
                <td><input type="text" class="inputthemdulieusach" id="txtTENTL" name="txtTENTL" value="<?php echo $TENTL ?>"></td>
            </tr>


            <tr class="list-items-one">
                <td>DỊCH GIẢ</td>
                <td><input type="text" class="inputthemdulieusach" id="txtDICHGIA" name="txtDICHGIA" value="<?php echo $DICHGIA ?>"></td>
            </tr>
            <tr class="list-items-one">
                <td>TÊN NHÀ XUẤT BẢN</td>
                <td><input type="text" class="inputthemdulieusach" id="txtTENNXB" name="txtTENNXB" value="<?php echo $TENNXB ?>"></td>
            </tr>


            <tr class="list-items-one">
                <td>TÊN TÁC GIẢ</td>
                <td><input type="text" class="inputthemdulieusach" id="txtTENTG" name="txtTENTG" value="<?php echo $TENTG ?>"></td>
            </tr>
             
            <tr class="list-items-one">
                <td colspan="2" align="center">
                    <input type="submit" name="btnSave" class="inputthemdulieusach" id="btn" value="SAVE">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>