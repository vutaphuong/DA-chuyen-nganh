<?php
  include 'config/kiemtra_SESION.php';
  include 'classes/config.php';
  include 'classes/function.php';
  spl_autoload_register("loadClass");
?>
<!doctype html>
<html>
<head><meta http-equiv="content-type" content="text/html;charset=utf-8"/>

<title>Đăng ký môn học STUonline</title>
    <link href="css/hover.css" rel="stylesheet" media="all">
     <link href="css/magic.css" rel="stylesheet">
     <link href="css/logoheader.css" rel="stylesheet">
     <link href="css/dinhdangnut.css" rel="stylesheet">

     <!--<link href="css/Untitled-3.css" rel="stylesheet">-->

<script language=JavaScript>
    var txt=" Đăng ký môn học STUonline";
    var expert=500;
    // speed of roll
    var refresh=null;
    function marquee_title(){
    document.title=txt;
    txt=txt.substring(1,txt.lenghth)+txt.charAt(0);
    refresh=setTimeout("marquee_title()",expert);
    }
    marquee_title();
    </script>
    <!--icon-->
    <link href="image/amarok.png" rel="icon" />

      
</head>
<body >
    <?php
      $obj= new Db();
      $rows = $obj->select("SELECT hoten from giangvien where `magv`='$tennd'");
    ?>
    <div id="header">
    <table align="center" class="tb">
        <tr class="logo"><td class="logophai stu1">S</td><td class="logotrai stu2">T</td><td class="logophai stu1">U</td><td class="logotrai">o</td><td class="logophai">n</td><td class="logotrai">l</td><td class="logophai">i</td><td class="logotrai">n</td><td class="logophai">e</td></tr>
        </table>
        </div>
        
    <div id="main">
    <div id="thanweb">
    <div id="menutrai">
    <ul>
    <li class="hvr-sweep-to-right hvr-ripple-out"><a href="trangchugiangvien.php">Trang chủ</a></li>
    <li class="hvr-sweep-to-right hvr-ripple-out"><a>Thông báo ĐKMH</a></li>
    <li class="hvr-sweep-to-right hvr-ripple-out"><a>Quy định ĐKMH</a></li>
    <li class="hvr-sweep-to-right hvr-ripple-out"><a href="xemlichday.php">Xem lịch dạy</a></li>
    <li class="hvr-sweep-to-right hvr-ripple-out">Thông tin cá nhân</li>
    </ul>
    </div>
      <div id="noidung">
        <form action="xulythongtindangky.php" method="post"> 
          <table border="1" cellpadding="1" cellspacing="1" align="center" width="900px">
                <tr>
                  <td colspan="10" align="center" style="font-family: 'Comic Sans MS';font-size: 30px;color: blue;">Lịch dạy của Giảng viên:
                    <?php 
                      foreach ($rows as $row) {
                        # code...
                        echo $row['hoten'];
                      }
                    ?>
                  </td>
                </tr>
                <tr>
                <td align="center">Mã giảng viên</td>
                <td align="center">Tên giảng viên</td>
                <td align="center">Tên môn học</td>
                <td align="center">Tiết dạy</td>
                <td align="center">Ngày dạy</td>
                <td align="center">Phòng</td>
                </tr> 
            </table>  
      </div>
  <!--Chân web -->
  <div id="footer">
  <table align="center" style="padding-top:10px"><tr><td>
  DESIGN by Nguyễn Thế Mạnh &amp; Vũ Tá Phương
  </td></tr></table>
  </div>
            
</body>
</html>