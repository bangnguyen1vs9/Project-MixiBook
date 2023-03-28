<?php 
    session_start();
?>
<!-- --------------HEADEER------------------ -->
<?php 
    // session_start();
    include './header.php';
    include './navbar.php';
    include './banner-one.php';
?>


        

        <!-- CONTENT-1 -->
        <div class="content-1">
            <div class="grid">
                <div class="content-text-top">
                    <h2 id="sach-moi" class="sub-title">
                        <a href="#sach-moi">SÁCH MỚI PHÁT HÀNH</a>
                    </h2>
                    <p class="desc">Sách MixiBook mới phát hành. Mời bạn đọc.</p>
                </div>
                <!-- <div class="grid__row"> -->
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
                                    JOIN TACGIA ON SACH.MATG = TACGIA.MATG
                                    ";

                    $ketqua = mysqli_query($conn,$sql) or die(mysqli_error($conn));
                    echo "<div class='grid__row'>";  
                    for($i=1;$i<=15;$i++)
                    // while ($dong = mysqli_fetch_array($ketqua))
                    {
                        $dong=mysqli_fetch_array($ketqua);
                        if ($dong) {
                            echo "<div class='grid__column-20'>
                                    <a href='./muasanpham.php?id=".$dong['MASACH']."' class='buy-item'>      
                                        <div class='list-sanpham-texts'>
                                            <img src='".$dong['HINH']."' class='image'> 
                                            <div class='item-texts'>
                                                <h3 class='sub-title'>".$dong['TUASACH']."</h3>
                                                <div class='gia-sp'>
                                                    <p class='desc'>".number_format($dong['GIAMOI'])."<sub>đ</sub></p>
                                                    <p class='desc'>".number_format($dong['GIACU'])."<sub>đ</sub></p>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>";
                        }
                    }

                    echo "</div>";
                ?>
            </div>
        </div>
        <hr>
        


<?php 
    include'./footer.php';
    // mysqli_close($conn);
?>