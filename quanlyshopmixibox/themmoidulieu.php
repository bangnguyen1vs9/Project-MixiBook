<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>THÊM MỚI DỮ LIỆU</title>
    <link rel="stylesheet" href="../assets/css/resets.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.2.0-web/fontawesome-free-6.2.0-web/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <!-- <link rel="stylesheet" href="../assets/img/"> -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <form action="xulydulieu.php" method="post" class="appQLS">
    <div><a href="../index.php" class="vetrangchu">Về Trang chủ</a></div>
        
    <table class="table-list-QL">
            <caption>THÊM DỮ LIỆU SÁCH</caption>
            <tr class="list-items-one">
                <td>MÃ SÁCH</td>
                <td><input type="text" class="inputthemdulieusach" id="txtMASACH" name="txtMASACH" value=""></td>
            </tr>
            <tr class="list-items-one">
                <td>TỰA SÁCH</td>
                <td><input type="text" class="inputthemdulieusach" id="txtTUASACH" name="txtTUASACH" value=""></td>
            </tr>

            <tr class="list-items-one">
                <td>HÌNH ẢNH</td>
                <td>
                    <input type="file" class="inputthemdulieusach" id="txtHINH" name="txtHINH" value="" >
                </td>
            </tr>
            <tr class="list-items-one">
                <td>GIÁ MỚI</td>
                <td><input type="number" class="inputthemdulieusach" id="txtGIAMOI" name="txtGIAMOI" value=""></td>
            </tr>
            <tr class="list-items-one">
                <td>GIÁ CŨ</td>
                <td><input type="number" class="inputthemdulieusach" id="txtGIACU" name="txtGIACU" value=""></td>
            </tr>
            <tr class="list-items-one">
                <td>MÃ NHÀ XUẤT BẢN</td>
                <td><input type="text" class="inputthemdulieusach" id="txtMANXB" name="txtMANXB" value=""></td>
            </tr>
            <tr class="list-items-one">
                <td>MÃ THỂ LOẠI</td>
                <td><input type="text" class="inputthemdulieusach" id="txtMATL" name="txtMATL" value=""></td>
            </tr>
            <tr class="list-items-one">
                <td>MÃ TÁC GIẢ</td>
                <td><input type="text" class="inputthemdulieusach" id="txtMATG" name="txtMATG" value=""></td>
            </tr>


            <tr class="list-items-one">
                <td>MÔ TẢ SÁCH</td>
                <td><input type="text" class="inputthemdulieusach" id="txtMOTA" name="txtMOTA" value=""></td>
            </tr>


            <tr class="list-items-one">
                <td>TÊN THỂ LOẠI</td>
                <td><input type="text" class="inputthemdulieusach" id="txtTENTL" name="txtTENTL" value=""></td>
            </tr>


            <tr class="list-items-one">
                <td>DỊCH GIẢ</td>
                <td><input type="text" class="inputthemdulieusach" id="txtDICHGIA" name="txtDICHGIA" value=""></td>
            </tr>
            <tr class="list-items-one">
                <td>TÊN NHÀ XUẤT BẢN</td>
                <td><input type="text" class="inputthemdulieusach" id="txtTENNXB" name="txtTENNXB" value=""></td>
            </tr>


            <tr class="list-items-one">
                <td>TÊN TÁC GIẢ</td>
                <td><input type="text" class="inputthemdulieusach" id="txtTENTG" name="txtTENTG" value=""></td>
            </tr>
             
            <tr class="list-items-one">
                <td colspan="2" align="center">
                    <input type="submit" name="btnSave" class="inputthemdulieusach" id="btn" value="SAVE">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>