<?php 
    session_start();
    include'./header.php';
    include'./navbar.php';
    // include'./banner-two.php';
?>
<!-- ================   BANNER-TOW=====CHƯA THÊM ĐC CSDL -->
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
                TÌM KIẾM
            </h2>
            <div class="banner-tow-texts-items">
                <a href="/" title="Quay trở về trang chủ">Trang chủ</a>
                <span aria-hidden="true">/</span>
                <span>Tìm Kiếm</span>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- ========================SẢN PHẨM TÌM KIẾM=================== -->
<?php              
    $tim="";
    if(isset($_POST['btntim']))
    {
        // include'ketnoi.php';
        // $conn = MoKetNoi();
        // if($conn->connect_errno)
        // {
        //     echo"Không kết nối được MySQL";
        // }
        // mysqli_select_db($conn,"bai12");
        $tim=$_POST['txtsearch'];
        $truyvan="SELECT * FROM SACH AS S, LOAI AS L WHERE S.MATL=L.MATL and TUASACH like '%$tim%' ";
        $ketqua = mysqli_query($conn,$truyvan) or die(mysqli_error($conn));
        $sl = mysqli_num_rows($ketqua);
        $sodong=$sl/1;
        echo "<div class='grid'>
        <div class='grid__row'>";
        for($i=1;$i<=$sodong;$i++)
        {
            $noidung=mysqli_fetch_array($ketqua);
            echo "
                    <div class='grid__column-20'>
                        <a href='./muasanpham.php?id=".$noidung['MASACH']."' class='buy-item'>      
                            <div class='list-sanpham-texts'>
                                <img src='".$noidung['HINH']."' class='image'> 
                                <div class='item-texts'>
                                    <h3 class='sub-title'>".$noidung['TUASACH']."</h3>
                                    <div class='gia-sp'>
                                        <p class='desc'>".number_format($noidung['GIAMOI'])."<sub>đ</sub></p>
                                        <p class='desc'>".number_format($noidung['GIACU'])."<sub>đ</sub></p>
                                    </div>
                                </div>
                            </div>
                        </a>
            </div>";				
        }
        echo "</div></div>";
    }
?>