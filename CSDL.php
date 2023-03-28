<?php 
//     function MoKetNoi()
// {
//     $dbhost="localhost";
//     $dbuser="root";
//     $dbpass="";
//     $conn=mysqli_connect($dbhost,$dbuser,$dbpass);
//     return $conn;
// }
// function DongKetNoi($conn)
// {
//     $conn->close();
// }
include 'ketnoi.php' ;
$conn=MoKetNoi();
if($conn->connect_error)
{
    echo "không kết nối được MySQL";
}
//Tạo database NGUOIDUNG
$sql="CREATE DATABASE IF NOT EXISTS Bai12";
if(mysqli_query($conn,$sql))
{
    echo "Thành công tạo database Bai12 rồi nha";
}
else
{
    echo "không tạo được database Bai12 ".mysqli_error($conn);
}
//chọn mở database QUANLYPHIM
    mysqli_select_db($conn,"Bai12");
//Tạo bảng PHIM
$NGUOIDUNG = "CREATE TABLE IF NOT EXISTS NGUOIDUNG (
    TENDANGNHAP varchar(20) NOT NULL,
    MATKHAU varchar(255) NOT NULL,
    HOTEN varchar(255) NOT NULL,
    DIACHI varchar(255) NOT NULL,
    SDT int(10) default 0,
    EMAIL varchar (255) NOT NULL,
    PHANLOAI varchar (20) default 'user',
    PRIMARY KEY (TENDANGNHAP,SDT))";
$results = mysqli_query($conn,$NGUOIDUNG)or die (mysqli_error($conn));
$DataNGUOIDUNG="INSERT INTO NGUOIDUNG (TENDANGNHAP,MATKHAU,HOTEN,DIACHI,SDT,EMAIL,PHANLOAI)".
                "VALUES ('admin123', 'admin123', 'Nguyễn Hữu Bằng', '123 acb', 1234567890, '123a@','admin')";
$results = mysqli_query($conn,$DataNGUOIDUNG) or die(mysqli_errno($conn));




$TACGIA = "CREATE TABLE IF NOT EXISTS TACGIA (
    MATG varchar(20) primary key,
    TENTG nvarchar(200) not null)";
$results = mysqli_query($conn,$TACGIA)or die (mysqli_error($conn));

$NXB = "CREATE TABLE IF NOT EXISTS NHAXUATBAN (
    MANXB varchar(20) primary key,
    DICHGIA varchar(200) not null,
    TENNXB nvarchar(200) not null)";
$results = mysqli_query($conn,$NXB)or die (mysqli_error($conn));

$SACH = "CREATE TABLE IF NOT EXISTS SACH (
    MASACH varchar(20) primary key,
    TUASACH nvarchar(200) not null,
    HINH varchar(200) not null,
    GIAMOI int(86) default 0,
    GIACU int(86) default 0,
    MANXB varchar(20) not null,
    MATL varchar(20) not null,
    MATG varchar(20) not null)";
$results = mysqli_query($conn,$SACH)or die (mysqli_error($conn));
$GIOITHIEUSACH = "CREATE TABLE IF NOT EXISTS GIOITHIEUSACH (
    TUASACH varchar(200) primary key,
    MOTA varchar(20000) not null)";
$results = mysqli_query($conn,$GIOITHIEUSACH)or die (mysqli_error($conn));
$DataGIOITHIEUSACH="INSERT INTO GIOITHIEUSACH (TUASACH,MOTA)".
                    "VALUES ('CHUYỆN CON MÈO DẠY HẢI ÂU BAY','Cô hải âu Kengah bị nhấn chìm trong váng dầu, thứ chất thải nguy hiểm mà những con người xấu xa bí mật đổ ra đại dương. Với nỗ lực đầy tuyệt vọng, cô bay vào bến cảng Hamburg và rơi xuống ban công của con mèo mun, to đùng, mập ú Zorba. Trong phút cuối cuộc đời, cô sinh ra một quả trứng và con mèo mun hứa với cô sẽ thực hiện ba lời hứa chừng như không tưởng với loài mèo: Không ăn quả trứng. Chăm sóc cho tới khi nó nở. Dạy cho con hải âu bay. Lời hứa của một con mèo cũng là trách nhiệm của toàn bộ mèo trên bến cảng, bởi vậy bè bạn của Zorba bao gồm ngài mèo Đại Tá đầy uy tín, mèo Secretario nhanh nhảu, mèo Einstein uyên bác, mèo Bốn Biển đầy kinh nghiệm đã chung sức giúp nó hoàn thành trách nhiệm. Tuy nhiên, việc chăm sóc, dạy dỗ một con hải âu đâu phải chuyện đùa, sẽ có hàng trăm rắc rối nảy sinh và cần có những kế hoạch đầy linh hoạt được bàn bạc kỹ càng Chuyện con mèo dạy hải âu bay là kiệt tác dành cho thiếu nhi của nhà văn Chi Lê nổi tiếng Luis Sepúlveda, tác giả của cuốn Lão già mê đọc truyện tình đã bán được 18 triệu bản khắp thế giới. Tác phẩm không chỉ là một câu chuyện ấm áp, trong sáng, dễ thương về loài vật mà còn chuyển tải thông điệp về trách nhiệm với môi trường, về sự sẻ chia và yêu thương cũng như ý nghĩa của những nỗ lực, “Chỉ những kẻ dám mới có thể bay”. Cuốn sách mở đầu cho mùa hè với minh họa dễ thương, hài hước là món quà dành cho mọi trẻ em và người lớn.'),".
                    "('7 CHÚ THỎ CAU CÓ','Bảy chú nhỏ đáng yêu thức dậy với tâm trạng tồi tệ... Có lẽ nào ta đã lạc vào nhà của bảy chú lùn cau có? Nhưng rồi đến một ngày, mẹ mới là người cáu kỉnh ở đây! Bảy chú nhỏ đã bày những kế gì để đuổi tâm trạng tồi tệ đi vậy. Một cuốn sách tranh ngọt ngào về các mà những em bé chăm sóc mẹ của mình, dành cho mọi gia đình.')"
                    ;
                    $results = mysqli_query($conn,$DataGIOITHIEUSACH) or die (mysqli_error($conn));

$LOAI = "CREATE TABLE IF NOT EXISTS LOAI (
    MATL varchar(20) primary key,
    TENTL nvarchar(200) not null)";
$results = mysqli_query($conn,$LOAI)or die (mysqli_error($conn));
$DataLOAI="INSERT INTO LOAI (MATL,TENTL)". 
            "VALUES ('PHC','Phi Hư Cấu'),".
            "('STN','Sách Thiếu Nhi')"
            ;
$results = mysqli_query($conn,$DataLOAI) or die (mysqli_error($conn));

$DataNHAXUATBAN="INSERT INTO NHAXUATBAN (MANXB,DICHGIA,TENNXB)". 
            "VALUES ('XB01','Phương Uyên','Nhà xuât bản văn học'),".
            "('XB02','Hoàng My','Nhà xuât bản trẻ'),".
            "('XB03','Lưu Thị Hương Thanh','Nhà xuất bản văn học'),".
            "('XB04','Bảo Bình','Nhà xuất bản trẻ')";
$results = mysqli_query($conn,$DataNHAXUATBAN) or die (mysqli_error($conn));

$DataTACGIA="INSERT INTO TACGIA (MATG,TENTG)". 
            "VALUES ('TG01','Luis Sepúlveda '),".
            "('TG02','Estelle Meens, Sylvie de Mathuisieulx'),".
            "('TG03','Sophie Lamoureux (Biên soạn)'),".
            "('TG04','Esther Lekanne, Pierre Winters'),".
            "('TG05','Nguyễn Trọng Hoài'),".
            "('TG06','Nhiều tác giả')";
$results = mysqli_query($conn,$DataTACGIA) or die (mysqli_error($conn));

$DataSACH = "INSERT INTO SACH (MASACH, TUASACH, HINH, GIAMOI, GIACU, MANXB, MATL, MATG) 
             VALUES 
             ('STN01', 'CHUYỆN CON MÈO DẠY HẢI ÂU BAY', './assets/img/chuyenconmeodayhaiaubay.jpg', 39200, 49000, 'XB01', 'STN', 'TG01'),
             ('VH02', '7 CHÚ THỎ CAU CÓ', './assets/img/7chuthocauco.jpg', 47200, 59000, 'XB02', 'PHC', 'TG02')";
$results = mysqli_query($conn, $DataSACH) or die(mysqli_error($conn));


// DongKetNoi($conn);
?>