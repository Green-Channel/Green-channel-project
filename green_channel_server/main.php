<!DOCTYPE html>
<!----------------连接数据库，打开session会话---------------------------->
<?php include("conn/conn.php");
 session_start();
?>
<html lang="zh">
<head>
<!-- param, meta, styles, scripts -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>绿色通道管理系统</title>
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</head>
<body>
 <!-- 根据session中登陆者编号，从数据库中读取人员信息 -->   
<?php 
   
     $num= empty($_SESSION['number']) ? false : $_SESSION['number'];
    
    $query=mysqli_query($conn, "select * from personnel_info where F01='$num' ");
    $info=mysqli_fetch_array($query);
    
    $pos=$info['F03'];
    $query=mysqli_query($conn, "select H02 from position_info where H01='$pos'");
    $pos=mysqli_fetch_array($query);
    $path=$info['F08'];
					
			?>
    
    <div class="jumbotron text-center" style="margin-bottom:0">
  <h1>您好,<?php echo $info['F02'];?>,欢迎进入绿色通道管理系统</h1>
   
</div>
<!------------------------------- 导航栏 --------------------------------->  
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">绿色通道</a>
      </div>
      <div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="#">主页</a></li>
            <li><a href="personnel_info.php">人员信息管理</a></li>
            <li><a href="cargo_info.php">货物信息管理</a></li>
            <li><a href="car_info.php">车辆信息管理</a></li>
            <li><a href="#">打印报表</a></li>
        </ul>
    </div>
    </div>
</nav>
<!--------------------------------- 展示个人信息 ---------------------------------->  
    <div class="container">
        <div class="row">
          <div class="col-md-5">
              <h2>个人信息</h2>
              <h5>照片:</h5>
              <div> <?php        echo "<img src='$path' />" ;         ?> </div>
          </div>
           
          <div class="col-md-7 bor">
              <h5>姓名:<?php echo $info['F02'];?></h5>
              <br><br>
              <h5>性别:<?php if($info['F05']=="0")echo "男"; else echo "女"?></h5>
              <br><br>
              <h5>职务:<?php echo $pos[0];?></h5>
              <br><br>
            </div>    
        </div>
    </div>
    </body>
</html>