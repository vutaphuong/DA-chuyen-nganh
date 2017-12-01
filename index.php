<?php
if (!isset($_SESSION)) 
  {
    session_start();
  }

include 'config/select.php';
?>
<!doctype html>
<html>
<head><meta http-equiv="content-type" content="text/html;charset=utf-8"/>

<title>Đăng ký môn học STUonline</title>
    <link href="css/hover.css" rel="stylesheet" media="all">
     <link href="css/magic.css" rel="stylesheet">
     <link href="css/logoheader.css" rel="stylesheet">

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
    

        if (isset($_POST['submit'])) 
        {
            # code...
            
            $m = $_POST["tendn"];  
            $t = $_POST["password"];
            $num_rowssv=dangnhap('sinhvien','mssv',$m,$t);
            $num_rowsgv=dangnhap('giangvien','magv',$m,$t);
            $num_rowsnv=dangnhap('nhanvien','manv',$m,$t);

            if ($num_rowssv!=0 )
            {
                $_SESSION['user']=$_POST["tendn"];
                header('Location: trangchu.php');                
            }
            elseif ($num_rowsnv!=0) 
            {
                $_SESSION['user']=$_POST["tendn"];
                header('Location: quanlythongtin.php');                
            }
            elseif ($num_rowsgv!=0) 
            {
                $_SESSION['user']=$_POST["tendn"];
                header('Location: xemlichday.php');                
            }
            else
            {
                $baoloi='Tên đăng nhập hoặc mật khẩu không đúng';
            }

                $valueten=$_POST['tendn'];
            if ($_POST['tendn']=='') 
            {
                $baoloiten='Tên đăng nhập không được bỏ trống';
            }
            elseif (strlen(trim($_POST['tendn'],' '))<8) 
            {
                $baoloiten='Tên đăng nhập phải lớn hơn 8 ký tự, không bao gồm khoảng trắng ở đầu và cuối';
            }
            else
            {
                $baoloiten='';
            }
            if ($_POST['password']=='') 
            {
                $baoloipw='Bạn chưa điền mật khẩu';
            }
            elseif (strlen($_POST['password'])<8 || strlen(str_replace(' ','',$_POST['password']))!=strlen($_POST['password']) || strlen($_POST['password'])>12) 
            {
                $baoloipw='Mật khẩu phải 8 đến 12 ký tự và không bao gồm các khoảng trắng';
            }
            else
            {
                $baoloipw='';
            }
        }
        else
        {
            $baoloi='';
            $valueten='';
            $baoloiten='';
            $baoloipw='';
        }
    ?>
    <table align="center" class="tb">
        <tr class="logo"><td class="logophai stu1">S</td><td class="logotrai stu2">T</td><td class="logophai stu1">U</td><td class="logotrai">o</td><td class="logophai">n</td><td class="logotrai">l</td><td class="logophai">i</td><td class="logotrai">n</td><td class="logophai">e</td></tr>
        <form action="index.php" method="post">
                <tr align="center">
                    <td colspan="9" class="inputdnphai ">
                    <input type="text" class="inputdn" placeholder="Tên đăng nhập" name="tendn" maxlength="10" value="<?php echo $valueten ?>">
                    </td>
                </tr> 
                <tr align="center"><td colspan="9" class="baoloi"><?php echo $baoloiten; ?></td></tr>
                <tr align="center">
                    <td colspan="9" class="inputdntrai">
                    <input class="inputdn" type="password" placeholder="Mật khẩu" name="password" maxlength="10">
                    </td>
                </tr>
                <tr align="center"><td colspan="9" class="baoloi"><?php echo $baoloipw; ?></td></tr>
                <tr align="center"><td colspan="9" >
                    <input type="submit" class="inputdnphai sbm hvr-ripple-out" value="Đăng nhập" name="submit">
                </td></tr>
                <tr align="center"><td colspan="9" class="baoloi"><?php echo $baoloi; ?></td></tr>
            </form>
                
            </table>
            
</body>
</html>