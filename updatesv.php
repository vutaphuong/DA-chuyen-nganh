<?php
	try{
		$pdh = new PDO("mysql:host=localhost;dbname=dkmhonline","root","");
		$pdh->query("set name 'utf8' ");
	}
	catch(Exception $e){
		echo $e->getMessage(); exit;
	}

	$mssv = isset($_GET["mssv"])?$_GET["mssv"]:"";
	$sql = "update from dangky where mssv = :mssv ";
	$sql1 = "update from sinhvien where mssv= :mssv ";
	$arr = array(":mssv"=>$mssv);

	$stm = $pdh->prepare($sql);
	$stm->execute($arr);  
	$stm1 = $pdh->prepare($sql1);
	$stm1->execute($arr);              
	$n = $stm->rowCount();
	if($n>0) $thongbao = "Đã thêm $n sinh viên !";
	else $thongbao="Thêm bị lỗi!";
?>
<script language="javascript">
	alert("<?php echo $thongbao;?>");
	window.location = "themsinhvien.php";
</script>