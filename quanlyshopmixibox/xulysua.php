<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QUẢN LÝ LOẠI SÁCH</title>
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

if(isset($_POST["btnSave"]))
{
    $MASACH = $_POST['txtMASACH'];
    $TUASACH = $_POST['txtTUASACH'];
    $HINH = $_POST['txtHINH'];
    $GIACU = $_POST['txtGIACU'];
    $GIAMOI = $_POST['txtGIAMOI'];
    $MANXB = $_POST['txtMANXB'];
    $MATL = $_POST['txtMATL'];
    $MATG = $_POST['txtMATG'];
    
    $MOTA = $_POST['txtMOTA'];
    $TENTL = $_POST['txtTENTL'];

    $TENTG = $_POST['txtTENTG'];
    $DICHGIA = $_POST['txtDICHGIA'];
            
    $TENNXB = $_POST['txtTENNXB'];

    $sql = "UPDATE SACH SET TUASACH='$TUASACH', HINH='../assets/img/".$HINH."', GIACU='$GIACU', GIAMOI='$GIAMOI', MANXB='$MANXB', MATL='$MATL', MATG='$MATG' WHERE MASACH='$MASACH';";
    $sql .= "UPDATE LOAI SET MATL='$MATL',TENTL='$TENTL';";
    $sql .= "UPDATE GIOITHIEUSACH SET TUASACH='$TUASACH',MOTA='$MOTA';";
    $sql .= "UPDATE TACGIA SET MATG='$MATG',TENTG='$TENTG';";
    $sql .= "UPDATE NHAXUATBAN SET MANXB='$MANXB',DICHGIA='$DICHGIA',TENNXB='$TENNXB'";

    $result = mysqli_multi_query($conn, $sql);

    if ($result){
        echo "<a href='../index.php' class='vetrangchu'>VỀ TRANG CHỦ</a>";
        echo "Sửa dữ liệu thành công";
    } else {
        echo "Sửa dữ liệu thất bại";
    }
}
?>

</body>