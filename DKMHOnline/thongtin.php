<?php
if (!isset($_SESSION)) 
  {
    session_start();
  }

if (isset($_SESSION['user'])) {
  
  $tennd=$_SESSION['user'];
}
else
{  
  header('Location: index.php');
}
include 'config/config.php';
?>
<!doctype html>
<html>
<head><meta http-equiv="content-type" content="text/html;charset=utf-8"/>

<title>Đăng ký môn học STUonline</title>
    <link href="css/hover.css" rel="stylesheet" media="all">
     <link href="css/magic.css" rel="stylesheet">
     <link href="css/logoheader.css" rel="stylesheet">
     <link href="css/dinhdangnut.css" rel="stylesheet">
     <link href="css/nutdangnhap.css" rel="stylesheet">
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
    <div id="header">
    <table align="center" class="tb">
        <tr class="logo"><td class="logophai stu1">S</td><td class="logotrai stu2">T</td><td class="logophai stu1">U</td><td class="logotrai">o</td><td class="logophai">n</td><td class="logotrai">l</td><td class="logophai">i</td><td class="logotrai">n</td><td class="logophai">e</td></tr>
        </table>
        </div>
        
    <div id="main">
    <div id="thanweb">
    <div id="menutrai">
    <ul>
    <li class="hvr-sweep-to-right hvr-ripple-out"><a>Trang chủ</a></li>
    <li class="hvr-sweep-to-right hvr-ripple-out"><a>Thông báo ĐKMH</a></li>
    <li class="hvr-sweep-to-right hvr-ripple-out"><a>Quy định ĐKMH</a></li>
    <li class="hvr-sweep-to-right hvr-ripple-out"><a>Đăng ký môn học</a></li>
    <li class="hvr-sweep-to-right hvr-ripple-out"><a>Thông báo học phí</a></li>
    <li class="hvr-sweep-to-right hvr-ripple-out"><a href="thongtin.php">Thông tin cá nhân</a></li>
    </ul>
    </div>
    <div id="noidung">
      <?php
        # code...
            if (isset($_POST['submit'])) 
            {
                $sothich=$_POST['st'];
                $sqleditst="UPDATE `sinhvien` SET `sothich` = '$sothich' WHERE `sinhvien`.`sothich` = '$tennd'";        
                $dataeditst = $obj->prepare($sqleditst);
                $dataeditst->execute();


                $editavatar=$_POST['editavt'];
                $sqleditavt="UPDATE `sinhvien` SET `avt` = '$editavatar' WHERE `sinhvien`.`avt` = '$tennd'";       
                $editdataavt = $obj->prepare($sqleditavt);
                $editdataavt->execute();

                $editemail=$_POST['email'];
                $sqleditemail="UPDATE `sinhvien` SET `email` = '$editemail' WHERE `sinhvien`.`email` = '$tennd'";
                $dataeditemail = $obj->prepare($sqleditemail);
                $dataeditemail->execute();

                $editsdt=$_POST['sdt'];
                $sqleditsdt="UPDATE `sinhvien` SET `sdt` = '$editsdt' WHERE `sinhvien`.`sdt` = '$tennd'";
                $editdatasdt = $obj->prepare($sqleditsdt);
                $editdatasdt->execute();
           }

            $sqlhoten="SELECT hoten FROM `sinhvien`";
            $sqlhoten."WHERE MSSV='$tennd'";;        
            $datahoten = $obj->prepare($sqlhoten);
            $datahoten->execute();
            $manghoten=$datahoten->fetch(PDO::FETCH_ASSOC);
            $hoten=$manghoten['hoten'];


            $sqlgt="SELECT gt FROM `sinhvien`";
            $sqlgt."WHERE MSSV='$tennd'";        
            $datagt = $obj->prepare($sqlgt);
            $datagt->execute();
            $manggt=$datagt->fetch(PDO::FETCH_ASSOC);
            $gt=$manggt['gt'];

            $sqlquequan="SELECT quequan FROM `sinhvien`";
            $sqlquequan."WHERE MSSV='$tennd'";        
            $dataquequan = $obj->prepare($sqlquequan);
            $dataquequan->execute();
            $mangquequan=$dataquequan->fetch(PDO::FETCH_ASSOC);
            $quequan=$mangquequan['quequan'];

            $sqlnoio="SELECT noio FROM `sinhvien`";
            $sqlnoio."WHERE MSSV='$tennd'";        
            $datanoio = $obj->prepare($sqlnoio);
            $datanoio->execute();
            $mangnoio=$datanoio->fetch(PDO::FETCH_ASSOC);
            $noio=$mangnoio['noio'];

            $sqlsothich="SELECT sothich FROM `sinhvien`";
            $sqlsothich."WHERE MSSV='$tennd'";        
            $datasothich = $obj->prepare($sqlsothich);
            $datasothich->execute();
            $mangst=$datasothich->fetch(PDO::FETCH_ASSOC);
            $st=$mangst['sothich'];

            $sqlavt="SELECT avt FROM `sinhvien`";
            $sqlavt."WHERE MSSV='$tennd'";        
            $dataavt = $obj->prepare($sqlavt);
            $dataavt->execute();
            $mangavt=$dataavt->fetch(PDO::FETCH_ASSOC);
            $avt=$mangavt['avt'];


            $sqlemail="SELECT email FROM `sinhvien`";
            $sqlemail."WHERE MSSV='$tennd'";        
            $dataemail = $obj->prepare($sqlemail);
            $dataemail->execute();
            $mangemail=$dataemail->fetch(PDO::FETCH_ASSOC);
            $email=$mangemail['email'];

            $sqlsdt="SELECT sdt FROM `sinhvien`";
            $sqlsdt."WHERE MSSV='$tennd'";        
            $datasdt = $obj->prepare($sqlsdt);
            $datasdt->execute();
            $mangsdt=$datasdt->fetch(PDO::FETCH_ASSOC);
            $sdt=$mangsdt['sdt'];
            if ($avt=='' && $gt=="Nam") {
              # code...
                $avatar='image/nam.png';
            }
            else
            {
                $avatar='image/nu.jpg';
            }

    ?>
    <table style="font-size:14px">
                <tr><td colspan="2"><div class="khungavt"><img src="<?php echo $avatar;?>"></div></td></tr>
                <tr ><td>Tên đăng nhập: </td><td style="font-weight: bold;"><?php echo $tennd;?></td></tr> 
                <tr ><td>Họ và tên: </td><td style="font-weight: bold;"><?php echo $hoten;?></td></tr>
                <tr ><td>Giới tính: </td><td style="font-weight: bold;"><?php echo $gt;?></td></tr> 
                <tr ><td>Quê quán</td><td style="font-weight: bold;"><?php echo $quequan;?></td></tr> 
                <tr ><td>Nơi ở hiện tại</td><td style="font-weight: bold;"><?php echo $noio;?></td></tr>
                <tr ><td>Sở thích: </td><td style="font-weight: bold;"><?php echo $st;?></td></tr> 
                <tr ><td>Email: </td><td style="font-weight: bold;"><?php echo $email;?></td></tr> 
                <tr ><td>Số điện thoại: </td><td style="font-weight: bold;">0<?php echo $sdt?></td></tr> 
                <tr><td colspan="2" ><a href="editinfosv.php" >Chỉnh sửa</a></td></tr>
              </table>
            </div>
    </div>            
  </div>
  <!--Chân web -->
  <div id="footer">
  <table align="center" style="padding-top:10px"><tr><td>
  DESIGN by Nguyễn Thế Mạnh &amp; Vũ Tá Phương
  </td></tr></table>
  </div>
            
</body>
</html>