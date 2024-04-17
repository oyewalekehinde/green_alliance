<?php 
ob_start();
include('../classes/crud.php');
$db = new Database();
$rs=$db->checkLogin();
if(is_null($rs['admin_name'])){
	echo "<script language='javascript'>window.location='index.php';</script>";
	}
$date= date('d M, Y');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sansursuz Admin Panel</title>
<link href="../style/style.css" rel="stylesheet" type="text/css" />
<script src="../js/cal/ui/jquery-1.4.4.js"></script>
<link rel="stylesheet" href="../js/css/validationEngine.jquery.css" />
<script language="javascript" src="../js/jquery.validationEngine-en.js"></script>
<script language="javascript" src="../js/jquery.validationEngine.js"></script>
</head>

<body>
	<!-- admin header -->
    <div class="header">
        <div class="logo"><img src="../images/ad_the-morning-after_logo.gif" /></div>
        <div class="header-right" align="right">
        	<div>DATE:<?php echo $date;?></div>
            <div>Welcome: <?=$rs['admin_name']?> <a href="logout.php?logout='<?=$rs['admin_name']?>'">      Logout</a></div>
        </div>
        
    </div>
    <!-- admin header  end -->
    <!-- admin wrapper -->
