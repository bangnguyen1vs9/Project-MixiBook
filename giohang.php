<?php 
    session_start();
    include'./header.php';
    include'./navbar.php';
    include'./banner-two.php';
?>
<div class="giohang">
    <div class="grid">
            <form action="giohang.php" method="post">
                <table align="center" class="table-giohang">
                    <caption>
                        DANH SÁCH CÁC MẶT HÀNG CÓ TRONG GIỎ HÀNG
                    </caption>
                    <tr class="gh-tieude">
                        <th class="tieude-items">MÃ SÁCH</th>
                        <th class="tieude-items">TỰA SÁCH</th>
                        <th class="tieude-items">GIÁ SÁCH</th>
                        <th class="tieude-items">SỐ LƯỢNG</th>
                        <th class="tieude-items">THÀNH TIỀN</th>
                        <th></th>
                    </tr>
                    <?php
                        // include'ketnoi.php';
                        // $conn=MoKetNoi();
                        // if($conn->connect_error)
                        // {
                        //     echo "Không kết nối được với MySQL";
                        // }
                        // mysqli_select_db($conn,'bai12');
                        $danhsach=$_SESSION['giohang'];
                        $tongtien=0;
                        $truyvan = "SELECT * FROM SACH
                        JOIN GIOITHIEUSACH ON SACH.TUASACH = GIOITHIEUSACH.TUASACH
                        JOIN LOAI ON SACH.MATL = LOAI.MATL
                        JOIN NHAXUATBAN ON SACH.MANXB = NHAXUATBAN.MANXB
                        JOIN TACGIA ON SACH.MATG = TACGIA.MATG
                        ";
                        $ketqua = mysqli_query($conn,$truyvan) or die (mysqli_error($conn));
                        $n = mysqli_num_rows($ketqua);
                        for($i=0;$i<$n;$i++)
                        {
                            $dong=mysqli_fetch_array($ketqua);
                            if(isset($danhsach[$dong['MASACH']]))
                            {
                                echo "<tr class=''>
                                    <td class='text-items'>".$dong['MASACH']."</td>
                                    <td class='text-items'>".$dong['TUASACH']."</td>
                                    <td class='text-items'>".number_format($dong['GIAMOI'], 0, ',', '.')." <sup><u>đ</u></sub></td>
                                    <td class='text-items'>".$danhsach[$dong['MASACH']]."</td>
                                    <td class='text-items'>".number_format($dong['GIAMOI'] *$danhsach[$dong['MASACH']], 0, ',', '.')." <sup><u>đ</u></sub></td>
                                    <td class='text-items'>
                                    <form method='post' action=''>
                                        <input type='hidden' name='remove_item' value='".$dong['MASACH']."'/>
                                        <input type='submit' name='remove' value='Xóa'/>
                                    </form>
                                </td>
                                </tr>";
                                if (isset($_POST['remove'])) {
                                    $remove_item = $_POST['remove_item'];
                                    unset($_SESSION['giohang'][$remove_item]);
                                    echo "<meta http-equiv='refresh' content='0'>";
                                }
                                
                                $tongtien=$tongtien+$dong['GIAMOI'] *$danhsach[$dong['MASACH']];
                            }
                        }
                    ?>
                    <tr>
                        <td colspan="6" align="center" class="SUM_BUY">
                            Tổng tiền : <?php echo number_format($tongtien, 0, ',', '.'); ?> <sup><u>đ</u></sub>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" align="center" >
                            <a href="./index.php" class="btngiohang-link">Tiếp tục mua sách
                                <!-- <input type="submit" class="btngiohang" name="sbtMuaTiep" value="Tiếp tục mua sách"> -->
                            </a>
                            <input type="button" name="sbtThanhToan" class="btngiohang" value="Thanh Toán">
                        </td>
                    </tr>
                </table>        
            </form>
    </div>
</div>

<?php 
    include'./footer.php';
?>