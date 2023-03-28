<?php
    include '../ketnoi.php';   
    $conn = MoKetNoi();
    if ($conn->connect_error) {
        echo "Không kết nối được với MySQL !!!";
        exit();
    }
    mysqli_select_db($conn, "bai12");

    if(isset($_POST['btnSave'])) {

        
        //Thêm dữ liệu cho bảng SACH
        $DataSACH="INSERT INTO SACH (MASACH,TUASACH,HINH,GIACU,GIAMOI,MANXB,MATL,MATG)".
        " VALUES ('".$_POST['txtMASACH']."','".$_POST['txtTUASACH']."','../assets/img/".$_POST['txtHINH']."','".$_POST['txtGIACU']."','".$_POST['txtGIAMOI']."','".$_POST['txtMANXB']."','".$_POST['txtMATL']."','".$_POST['txtMATG']."') ON DUPLICATE KEY UPDATE MASACH=MASACH, TUASACH=TUASACH, HINH=HINH, GIACU=GIACU, GIAMOI=GIAMOI, MANXB=MANXB, MATL=MATL, MATG=MATG";
        $results = mysqli_query($conn,$DataSACH) or die (mysqli_error($conn));
        
        //Thêm dữ liệu cho bảng LOAI
        $DataLOAI="INSERT INTO LOAI (MATL,TENTL)".
        " VALUES ('".$_POST['txtMATL']."','".$_POST['txtTENTL']."') ON DUPLICATE KEY UPDATE MATL=MATL, TENTL=TENTL";
        $results = mysqli_query($conn,$DataLOAI) or die (mysqli_error($conn));
        
        //Thêm dữ liệu cho bảng NHAXUATBAN
        $DataNHAXUATBAN="INSERT INTO NHAXUATBAN (MANXB,DICHGIA,TENNXB)".
        " VALUES ('".$_POST['txtMANXB']."','".$_POST['txtDICHGIA']."','".$_POST['txtTENNXB']."') ON DUPLICATE KEY UPDATE MANXB=MANXB, DICHGIA=DICHGIA, TENNXB=TENNXB";
        $results = mysqli_query($conn,$DataNHAXUATBAN) or die (mysqli_error($conn));

        //Thêm dữ liệu cho bảng GIOITHIEUSACH
        $DataGIOITHIEUSACH="INSERT INTO GIOITHIEUSACH (TUASACH,MOTA)".
        " VALUES ('".$_POST['txtTUASACH']."','".$_POST['txtMOTA']."') ON DUPLICATE KEY UPDATE TUASACH=TUASACH, MOTA=MOTA";
        $results = mysqli_query($conn,$DataGIOITHIEUSACH) or die (mysqli_error($conn));

        //Thêm dữ liệu cho bảng TACGIA
        $DataTACGIA="INSERT INTO TACGIA (MATG,TENTG)".
        " VALUES ('".$_POST['txtMATG']."','".$_POST['txtTENTG']."') ON DUPLICATE KEY UPDATE MATG=MATG, TENTG=TENTG";
        $results = mysqli_query($conn,$DataTACGIA) or die (mysqli_error($conn));
        

        if ($results) {
            // display a success message
            echo "Thêm dữ liệu thành công!";
        } else {
            // display an error message
            echo "Lỗi khi thêm dữ liệu: " . mysqli_error($conn);
        }
    }
    DongKetNoi($conn);
?>