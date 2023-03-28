<div class="banner">
<!-- <div class="grid"> -->
    <div id="Slider">
        <div class="aspect-ration-169">
            <img src="./assets/img/ms_banner_img2.jpg" alt="">
            <img src="./assets/img/ms_banner_img3.jpg" alt="">
            <img src="./assets/img/backgr2.png" alt="">
        </div>
        <div class="dot-conteiner">
            <div class="dot active"></div>
            <div class="dot"></div>
            <div class="dot"></div>
        </div>
    </div>

    <div class="grid">
        <ul class="banner-list-menu">
            <li><a href="./index.php">Trang chủ</a></li>
            <li class="banner-list-menu-items">
                <a href="!#">Sách MixiShop></a>
                    <ul class="banner-menu-items">
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
                        <li>
                            <?php 
                                $sql = "SELECT * FROM SACH
                                JOIN GIOITHIEUSACH ON SACH.TUASACH = GIOITHIEUSACH.TUASACH
                                JOIN LOAI ON SACH.MATL = LOAI.MATL
                                JOIN NHAXUATBAN ON SACH.MANXB = NHAXUATBAN.MANXB
                                JOIN TACGIA ON SACH.MATG = TACGIA.MATG AND TENTL='Sách Thiếu Nhi'
                                ";
                                    $ketqua = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                                    $dong=mysqli_fetch_array($ketqua);
                                    echo "<a href='./collections.php?id=".$dong['MASACH']."'>
                                            Kinh Điển
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
        
    </div>

            <!-- </div> -->
</div> 