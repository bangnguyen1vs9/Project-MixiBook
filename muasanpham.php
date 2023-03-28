<?php 
    session_start();
    include'./header.php';
    include'./navbar.php';
    // include'./banner-two.php';
?>
<div class="banner-two">
    <div class="banner-tow-list">
        <div class="grid">
        <ul class="banner-tow-list-menu">
            <li><a href="./index.php">Trang chủ</a></li>
            <li class="banner-tow-menu-items">
                <a href="#!">Sách MixiShop</a>
                <ul class="banner-two-menu-items">
                        <li>
                            <?php 
                                include 'ketnoi.php';
                                $conn=MoKetNoi();
                                if($conn->connect_error)
                                {
                                    echo "không kết nối được MySQL";
                                }
                                mysqli_select_db($conn,"bai12");
                                $sql = "SELECT * FROM SACH
                                JOIN GIOITHIEUSACH ON SACH.TUASACH = GIOITHIEUSACH.TUASACH
                                JOIN LOAI ON SACH.MATL = LOAI.MATL
                                JOIN NHAXUATBAN ON SACH.MANXB = NHAXUATBAN.MANXB
                                JOIN TACGIA ON SACH.MATG = TACGIA.MATG AND TENTL='Phi Hư Cấu'
                                ";
                                    $ketqua = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                    $dong=mysqli_fetch_array($ketqua);
                                    echo "<a href='./collections.php?id=".$dong['MASACH']."'>
                                            Phi Hư Cấu
                                        </a>";
                            ?>
                        </li>
                        <li>
                            <?php 
                                // include 'ketnoi.php';
                                // $conn=MoKetNoi();
                                // if($conn->connect_error)
                                // {
                                //     echo "không kết nối được MySQL";
                                // }
                                // mysqli_select_db($conn,"bai12");
                                $sql = "SELECT * FROM SACH
                                JOIN GIOITHIEUSACH ON SACH.TUASACH = GIOITHIEUSACH.TUASACH
                                JOIN LOAI ON SACH.MATL = LOAI.MATL
                                JOIN NHAXUATBAN ON SACH.MANXB = NHAXUATBAN.MANXB
                                JOIN TACGIA ON SACH.MATG = TACGIA.MATG AND TENTL='Sách Thiếu Nhi'
                                ";
                                    $ketqua = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                    $dong=mysqli_fetch_array($ketqua);
                                    echo "<a href='./collections.php?id=".$dong['MASACH']."'>
                                            Sách Thiếu Nhi
                                        </a>";
                            ?>
                        </li>
                    </ul>
            </li>
            <li><a href="">Blog</a></li>
            <li><a href="">Giới thiệu về MixiShop</a></li>
            <li><a href="">Hệ thống hiệu sách</a></li>
            <li><a href="">Hình thức thanh toán</a></li>
        </ul>
        <div class="banner-tow-list-texts">
        <?php
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                // Tiếp tục xử lý thông tin sản phẩm với $id đã lấy được
                } else {
                echo "Không tìm thấy sản phẩm";
                }
            $index = "SELECT * FROM SACH
                            JOIN GIOITHIEUSACH ON SACH.TUASACH = GIOITHIEUSACH.TUASACH
                            JOIN LOAI ON SACH.MATL = LOAI.MATL
                            JOIN NHAXUATBAN ON SACH.MANXB = NHAXUATBAN.MANXB
                            JOIN TACGIA ON SACH.MATG = TACGIA.MATG
                            AND MASACH = '$id'";
            $ketqua = mysqli_query($conn,$index) or die(mysqli_error($conn));
            $dong=mysqli_fetch_array($ketqua); 
            echo '<h2 class="sub-title">'.$dong['TENTL'].'</h2>
                    <div class="banner-tow-texts-items">
                        <a href="./index.php">Trang chủ</a>
                        <span aria-hidden="true">/</span>
                        <span>'.$dong['TENTL'].'</span>
                    </div>';
            ?>
            
        </div>
    </div>
    </div>
</div>
<div class="muasanpham">
    <div class="grid">
        <?php
            $truyvan = "SELECT * FROM SACH
            JOIN GIOITHIEUSACH ON SACH.TUASACH = GIOITHIEUSACH.TUASACH
            JOIN LOAI ON SACH.MATL = LOAI.MATL
            JOIN NHAXUATBAN ON SACH.MANXB = NHAXUATBAN.MANXB
            JOIN TACGIA ON SACH.MATG = TACGIA.MATG AND MASACH = '$id'"; // truy vấn lấy thông tin sản phẩm
            $ketqua = mysqli_query($conn,$truyvan) or die(mysqli_error($conn));
            $noidung = mysqli_fetch_array($ketqua);
            $tuasach = $noidung['TUASACH'];
            $hinhanh = $noidung['HINH'];
            $tacgia = $noidung['TENTG'];
            $dichgia = $noidung['DICHGIA'];
            $mota = $noidung['MOTA'];
            $giacu = $noidung['GIACU'];
            $giamoi = $noidung['GIAMOI'];
            $tennhaxuatban = $noidung['TENNXB'];
        ?>

        <div class="muasanpham-list">
            <div class="grid__column-40">
                <div class="product-detail__left">
                    <img src="<?php echo $hinhanh ?>" alt="<?php echo $tuasach ?>">
                </div>
            </div>
            <div class="grid__column-60">
                <div class="product-detail__right">
                    <h1 class="sub-title"><?php echo $tuasach ?></h1>
                    <div class="product-detail__right-list">
                        <p class="desc-tg">Tác giả: <?php echo $tacgia ?></p>
                        <span>|</span>
                        <p class="desc-tg">Dịch giả: <?php echo $dichgia ?></p>
                        <span>|</span>
                        <p class="desc-tg"><?php echo $tennhaxuatban ?></p>
                        <span>|</span>
                    </div>
                    <div class="product-detail__right-list-gia">
                        <p class="giamoi"><?php echo number_format($giamoi, 0, ',', '.') ?><sup><u>đ</u></sup></p>
                        <p class="giacu"><?php echo number_format($giacu, 0, ',', '.') ?><sup><u>đ</u></sup></p>
                    </div>
                    <div class="product-detail__right-list-thongtin">
                        <p class="noidung">Đang cập nhật nội dung cho sản phẩm</p>
                        <p class="noidung"><i class="fa fa-phone item-phone"></i>Hỗ trợ giờ hành chính: <a href="tel:0865476228" class="lienhe">0865476228</a></p>
                    </div>
                    
                    <?php
                    if ($noidung) {
                        echo "<div class='product-detail__right-list-btn'>
                                    <a href='./them.php?sachchon=".$noidung['MASACH']."' class='buy-item'>THÊM VÀO GIỎ HÀNG</a>
                                    </div>";
                    }
                    ?>
                </div>
            </div>
            <!-- <a href='./muangay.php?sachchon=$tuasach' class='buy-item>MUA NGAY</a> -->
        </div>
        <div class="product-detail__description-bottom">
            <h3 class="sub-title">GIỚI THIỆuSÁCH</h3>
            <p class="desc"><?php echo $mota ?></p>
        </div>
    </div>
</div>

<?php 
    include'./footer.php';
?> --

