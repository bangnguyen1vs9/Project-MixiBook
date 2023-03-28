<div class="banner-two">
    <div class="banner-tow-list">
        <div class="grid">

        <ul class="banner-tow-list-menu">
            <li><a href="">Trang chủ</a></li>
            <li class="banner-tow-menu-items ">
                <a href="">Sách MixiShop</a>
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
            <h2 class="sub-title">
                GIỎ HÀNG
            </h2>
            <div class="banner-tow-texts-items">
                <a href="/" title="Quay trở về trang chủ">Trang chủ</a>
                <span aria-hidden="true">/</span>
                <span>Tất cả sản phẩm có trong giỏ hàng</span>
            </div>
        </div>
    </div>
    </div>
</div>
