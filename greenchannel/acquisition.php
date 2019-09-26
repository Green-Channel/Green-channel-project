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
                                <li><a href="rearkiosk.php">主页</a></li>
                                <li class="active"><a href="acquisition.php">图像采集</a></li>
                                <li><a href="analysis.php">图像分析</a></li>

                                <li><a href="#">登录</a></li>
                                <li><a href="#">登出</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="row">
                    <div class="col-sm-offset-1 col-sm-10 control-label">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                扫描信息
                            </div>
                            <div class="panel-body">
                                <!-- 从数据库导出扫描图片 -->
                                <div>
                                    <?php
                                    $con=mysqli_connect("localhost","root","root");//ip 用户名 密码 
                                    mysqli_select_db($con,"greenchannel");//数据库名 
                                    mysqli_set_charset($con,'utf8');//utf-8格式 
                                    $sql="select * from img where id='1'"; 
                                    $result=mysqli_query($con,$sql); 
                                    while($row=mysqli_fetch_array($result)){ 
                                    echo "<img src='".$row['image']."' class='img-responsive' id='scanpic' alt='扫描图片' title='双击进入图片分析' />";}
                                    ?>
                                </div><br>


                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <div class="row">
                                            <!-- 从数据库导出摄像片段 -->
                                            <div class="col-xs-offset-1 col-xs-10 col-sm-offset-0 col-sm-4 control-label">
                                                <div class="embed-responsive embed-responsive-4by3">
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
                                            <div class="col-xs-12 col-sm-8 control-label">
                                                <div class="panel panel-default">
                                                    <div class="panel-body">
                                                        <form class="form-horizontal" role="form">
                                                            <!-- 货车报关货物&系统判定结果输入框 -->
                                                            <div class="form-group">
                                                                <label for="firstname" class="col-sm-4 control-label">货车报关货物</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="firstname" placeholder="请输入货车报关货物">
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="lastname" class="col-sm-4 control-label">系统判定结果</label>
                                                                <div class="col-sm-8">
                                                                    <input type="text" class="form-control" id="lastname" placeholder="请输入系统判定结果">
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <!-- 收费员判断 -->
                                                        <div class="panel panel-default">
                                                            <div class="panel-heading">
                                                                收费员判断
                                                            </div>
                                                            <div class="panel-body">
                                                                <div class="col-sm-12">
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="optionsRadiosinline" id="optionsRadios3" value="option1" checked>是
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="optionsRadiosinline" id="optionsRadios4" value="option2">否
                                                                    </label>
                                                                    <label class="radio-inline">
                                                                        <input type="radio" name="optionsRadiosinline" id="optionsRadios4" value="option2">补充
                                                                    </label><br><br>
                                                                    <div class="col-sm-12">
                                                                        <input type="text" class="form-control" id="lastname" placeholder="请输入补充内容">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- 按钮 -->
                                            <div class="col-xs-offset-1 col-xs-11 col-sm-offset-6 control-label">
                                                <button type="button" class="btn btn-default">开始采集</button>
                                                <button type="button" class="btn btn-default">停止采集</button>
                                                <a href="rearkiosk.php"><button type="button" class="btn">返回</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="rearkiosk.js"></script>
</body>

</html>
