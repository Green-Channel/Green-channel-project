<!DOCTYPE html>
<!-- 
Name: Enshuang Zhao
Date: 09/18/2019
-->
<html lang="en">

<head>
    <title>绿通后亭</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" ;charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="rearkiosk.css">
    <link rel="stylesheet" href="bootstrap.min.css">
    <script src="jquery.min.js"></script>
    <script src="bootstrap.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                <!-- 导航栏 -->
                <nav class="navbar navbar-default" role="navigation">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="rearkiosk.php">后亭</a>
                        </div>
                        <div>
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="rearkiosk.php">主页</a></li>
                                <li><a href="acquisition.php">图像采集</a></li>
                                <li><a href="analysis.php">图像分析</a></li>

                                <li><a href="#">登录</a></li>
                                <li><a href="#">登出</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>


                <div class="row">
                    <!-- 摄像片段 -->
                    <div class="col-sm-offset-2 col-sm-8 control-label">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                摄像片段
                            </div>
                            <div class="panel-body">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <!-- 从数据库导出摄像片段 -->
                                    <?php
                                    $con=mysqli_connect("localhost","root","root");//ip 用户名 密码 
                                    mysqli_select_db($con,"greenchannel");//数据库名 
                                    mysqli_set_charset($con,'utf8');//utf-8格式 
                                    $sql="select * from video"; 
                                    $result=mysqli_query($con,$sql); 
                                    while($row=mysqli_fetch_array($result)){ 
                                    echo "<embed src='".$row['videochip']."' />";}
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 货车信息 -->
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 control-label">
                            <div class="panel panel-default">
                                <div class="panel-heading">货车信息</div>
                                <!-- 从数据库导出货车信息 -->


                                <?php  
                                $con = mysqli_connect('localhost','root','root');
                                if(!$con) {
                                    die('Could not connect : '.mysqli_error($con));
                                }
                                //choose database
                                mysqli_select_db($con,'greenchannel');
                                //set charset
                                mysqli_set_charset($con,'utf8');
                                $sql = "select * from vehicleinfor";
                                $result = mysqli_query($con,$sql);
                                echo "<table border='1'class='col-sm-offset-1 control-label' id='table1'>";
                                echo "<tr>";
                                echo "<th>货物类型</th>";
                                echo "<th>车轴</th>";
                                echo "<th>车牌</th>";
                                echo "<th>金额</th>";
                                echo "<th>车重</th>";
                                echo "<th>入关收费站</th>";
                                echo "</tr>";
                                while($row = mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>".$row['goodstype']."</td>";
                                    echo "<td>".$row['axle']."</td>";
                                    echo "<td>".$row['license']."</td>";
                                    echo "<td>".$row['amount']."</td>";
                                    echo "<td>".$row['weight']."</td>";
                                    echo "<td>".$row['station']."</td>";
                                    echo "</tr><br>";
                                }
                                echo "</table><br>";
                                mysqli_close($con);
                                ?>



                            </div>
                        </div>
                    </div>
                    <!-- 按钮 -->
                    <div class="row">
                        <div class="col-xs-2 col-xs-offset-4 col-sm-4 col-sm-offset-5 control-label">
                            <a href="acquisition.php"><button type="button" class="btn">图像采集</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
