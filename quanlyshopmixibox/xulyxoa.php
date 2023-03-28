<?php
include '../ketnoi.php';
$conn = MoKetNoi();
if ($conn->connect_error) {
    echo "Không kết nối được với MySQL !!!";
}
mysqli_select_db($conn, "bai12");
if(isset($_GET['idMS'])){
    $MASACH = $_GET['idMS'];
    $sql = "DELETE FROM SACH WHERE MASACH = '$MASACH'";
    $result = mysqli_query($conn, $sql);
    if ($result){
        echo "Xóa dữ liệu thành công";
    } else {
        echo "Xóa dữ liệu thất bại";
    }
}
DongKetNoi($conn);
?>
