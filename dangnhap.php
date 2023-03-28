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
                error_reporting(0);
                $dntendn="";
                $dnmk="";
                if(isset($_POST['btnDangNhap']))
                {
                    session_start();
                    include'ketnoi.php';
                $conn = MoKetNoi();
                if($conn->connect_errno)
                {
                    echo"Không kết nối được MySQL";
                }
                mysqli_select_db($conn,"bai12");
                $dntendn=$_POST['txtDNTenDN'];
                $dnmk=$_POST['txtDNMK'];
                $kt=1;
                if(empty($dntendn)|| empty($dnmk))
                {
                    echo"<p> Bạn chưa nhập đầy đủ thông tin đăng nhập. </p>";
                    $kt=0;
                }
                $query=mysqli_query($conn,"SELECT TENDANGNHAP,HOTEN,MATKHAU,PHANLOAI FROM NGUOIDUNG WHERE TENDANGNHAP='$dntendn'");
                if(mysqli_num_rows($query)==0)
                {
                    echo"<p> Tên đăng nhập này không tồn tại. Vui lòng kiểm tra lại hoặc đăng ký lại. </p>";
                    $kt=0;
                }
                else
                {
                    $row = mysqli_fetch_array($query);
                    if($dnmk != $row['MATKHAU'])
                    {
                        echo"<p> Mật khẩu không đúng. Vui lòng nhập lại</p>";
                        $kt=0;
                    }
                }
                if($kt==1)
                {
                    // $_SESSION['tendangnhap']=$dntendn;
                    $_SESSION['tendangnhap'] = $row['HOTEN'];
                    $_SESSION['loainguoidung']=$row['PHANLOAI'];
                    header('Location: index.php');
                }
            }
                ?>
            <form name="frmDK" method="post" action="dangnhap.php">
                    <table align="center" class="dkdntabls">
                        <caption> SIGN IN </caption>
                        <tr class="dkdn"> 
                            <td> Tên đăng nhập : </td> 
                            <td> <input type="text" name="txtDNTenDN" required="true"value="<?php echo $dntendn ?>"> </td> 
                        </tr>
                        <tr class="dkdn"> 
                            <td> Mật khẩu (*) : </td> 
                            <td> <input type="password" name="txtDNMK" required="true" value="<?php echo $dnmk ?>"> </td> 
                        </tr>
                        <tr class="dkdn"> 
                            <td colspan="2"> 
                                <input class="btn-dk" type="submit" name="btnDangNhap" value="Đăng Nhập"> 
                            </td> 
                            <!-- <td>
                                <input class="btn-dk" type="reset" name="btnNhaplai" value="Nhập thông tin lại">  
                            </td> -->
                        </tr>
                        <tr>
                            <td>

                            </td>
                           <td colspan="2" class="link-dkdntk">
                                <a href="./dangki.php">Đăng ký tài khoản ?</a>
                           </td> 
                        </tr>
                    </table>
                </form>
                </div>
        </div>
        <img src="./assets/img/trees.png" class="trees" alt="">
    </section>
</body>
</html>