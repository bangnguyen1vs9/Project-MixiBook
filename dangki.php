<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./assets/css/resets.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.2.0-web/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
    <section>
        <div class="leaves">
            <div class="set">
                <div>
                    <img src="./assets/img/leaf_01 (1).png">
                </div>
                <div>
                    <img src="./assets/img/leaf_02.png">
                </div>
                <div>
                    <img src="./assets/img/leaf_03.png">
                </div>
                <div>
                    <img src="./assets/img/leaf_04.png">
                </div>
                <div>
                    <img src="./assets/img/leaf_01 (1).png">
                </div>
                <div>
                    <img src="./assets/img/leaf_02.png">
                </div>
                <div>
                    <img src="./assets/img/leaf_03.png">
                </div>
                <div>
                    <img src="./assets/img/leaf_04.png">
                </div>
            </div>
        </div>
       <img src="./assets/img/bg.jpg" class="bg" alt="">
       <img src="./assets/img/girl (4).png" class="girl" alt="">
       <div class="sign-up">
       <?php
                //error_reporting(0); //Che lỗi
                $tendn = "";
                $mk = "";
                $mkre = "";
                $hoten = "";
                $diachi = "";
                $sdt = "";
                $mail = "";

                include'ketnoi.php';
                $conn = MoKetNoi();
                if($conn->connect_error)
                {
                    echo "Không kết nối được MySQL";
                }
                mysqli_select_db($conn,"bai12");

                if(isset($_POST['btnDangKy']))
                {
                    $tendn = $_POST['txtTenDN'];
                    $mk = $_POST['txtMK'];
                    $mkre = $_POST['txtMKRe'];
                    $hoten = $_POST['txtTen'];
                    $diachi = $_POST['txtDC'];
                    $sdt = $_POST['txtDT'];
                    $mail = $_POST['txtMail'];
                    $kt = 1;
                    if($mkre != $mk)
                    {
                        echo "<p> Bạn nhập lại mật khẩu chưa đúng!!! </p>";
                        $kt = 0;
                    }
                    if(empty($tendn) || empty($mk) || empty($mkre) || empty($hoten) || empty($sdt))
                    {
                        echo "<p> Bạn nhập những thông tin bắt buộc (*) chưa đầy đủ!!! </p>";
                        $kt = 0;
                    }
                    if(mysqli_num_rows(mysqli_query($conn,"SELECT TENDANGNHAP FROM NGUOIDUNG WHERE TENDANGNHAP = '$tendn'")) > 0)
                    {
                        echo "<p> Tên đăng nhập đã có. Vui lòng chọn tên đăng nhập khác!!! </p>";
                        $kt = 0;
                    }
                    if(mysqli_num_rows(mysqli_query($conn,"SELECT SDT FROM NGUOIDUNG WHERE SDT = '$sdt'")) > 0)
                    {
                        echo "<p> Số điện thoại đã có. Vui lòng nhập số điện thoại khác!!! </p>";
                        $kt = 0;
                    }
                    if($kt == 1)
                    {
                        $nguoidung = "INSERT INTO NGUOIDUNG(TENDANGNHAP, MATKHAU, HOTEN, DIACHI, SDT, EMAIL)
                        VALUES('{$tendn}', '{$mk}', '{$hoten}', '{$diachi}', '{$sdt}', '{$mail}')";
                        $results = mysqli_query($conn,$nguoidung) or die (mysqli_error($conn));
                        echo "<p> Bạn đã đăng ký thành công. Vui lòng đăng nhập!!! </p>";
                        // header('location: dangnhap.php');
                    }
                }
                ?>
                <form name="frmDK" method="post" action="dangki.php">
                    <table align="center" class="dkdntabls">
                        <caption> SIGN UP </caption>
                        <tr class="dkdn"> 
                            <td colspan="2" class="c3"> Thông tin tài khoản </td> 
                        </tr>
                        <tr class="dkdn">
                            <td> Tên đăng nhập (*) : </td>
                            <td> 
                                <input type="text" placeholder="Username" name="txtTenDN" required="true" value="<?php echo $tendn ?>">
                            </td> 
                        </tr>
                        <tr class="dkdn"> 
                            <td> Mật khẩu (*) : </td> 
                            <td> 
                                <input type="password" placeholder="Password" name="txtMK" required="true" value="<?php echo $mk ?>"> 
                            </td> 
                        </tr>
                        <tr class="dkdn"> 
                            <td> Nhập lại mật khẩu (*) : </td> 
                            <td> 
                                <input type="password" placeholder="Password" name="txtMKRe" required="true" value="<?php echo $mkre ?>"> 
                            </td> 
                        </tr>
                        <tr class="dkdn"> 
                            <td colspan="2" class="c3"> Thông tin cá nhân </td> 
                        </tr>
                        <tr class="dkdn"> 
                            <td> Họ tên (*) : </td> 
                            <td> 
                                <input type="text" placeholder="Name" name="txtTen" required="true" value="<?php echo $hoten ?>"> 
                            </td> 
                        </tr>
                        <tr class="dkdn"> 
                            <td> Địa chỉ : </td> 
                            <td> 
                                <input type="text" name="txtDC" placeholder="Address" required="true" value="<?php echo $diachi ?>"> 
                            </td> 
                        </tr>
                        <tr class="dkdn"> 
                            <td> Số điện thoại : </td> 
                            <td> 
                                <input type="number" placeholder="Phone Number" name="txtDT" required="true" value="<?php echo $sdt ?>"> 
                            </td> 
                        </tr>
                        <tr class="dkdn"> 
                            <td> Email : </td> 
                            <td> 
                                <input type="email" placeholder="Email" name="txtMail" value="<?php echo $mail ?>"> 
                            </td> 
                        </tr>
                        <tr class="dkdn btn-width"> 
                            <td colspan="2" class="btn-width-one"> 
                                <input class="btn-dk" type="submit" name="btnDangKy" value="Đăng Ký"> 
                            </td> 
                            <!-- <td> 
                                <input class="btn-dk btn-nl" type="reset" name="btnNhaplai" value="Nhập thông tin lại">  
                            </td> -->
                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td class="link-dkdntk">
                                <a href="./dangnhap.php">Đăng nhập tại đây.</a>
                            </td>
                        </tr>
                    </table>
                </form>
       </div>
       <img src="./assets/img/trees.png" class="trees" alt="">
    </section>
</body>
</html>