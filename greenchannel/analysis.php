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
                                <li><a href="acquisition.php">图像采集</a></li>
                                <li class="active"><a href="analysis.php">图像分析</a></li>

                                <li><a href="#">登录</a></li>
                                <li><a href="#">登出</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>

                <div class="row">
                    <div class="col-sm-offset-1 col-sm-10 control-label">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <!-- 扫描图片分析模块 -->
                                <div class="col-sm-12 control-label">
                                    <ul id="myTab" class="nav nav-tabs">
                                        <li class="active">
                                            <a href="#pic1" data-toggle="tab">原图</a>
                                        </li>
                                        <li><a href="#pic2" data-toggle="tab">降噪（横向）</a></li>
                                        <li><a href="#pic3" data-toggle="tab">灰度均布</a></li>
                                        <li><a href="#pic4" data-toggle="tab">直方图</a></li>
                                        <li><a href="#pic5" data-toggle="tab">灰度变化曲线</a></li>
                                        <li><a href="#pic6" data-toggle="tab">上下翻转</a></li>
                                    </ul>
                                    <div id="myTabContent" class="tab-content">
                                        <div class="tab-pane fade in active" id="pic1">
                                            <!-- 从数据库导出扫描图片 -->
                                            <?php
                                    $con=mysqli_connect("localhost","root","root");//ip 用户名 密码 
                                    mysqli_select_db($con,"greenchannel");//数据库名 
                                    mysqli_set_charset($con,'utf8');//utf-8格式 
                                    $sql="select * from img where id='1'"; 
                                    $result=mysqli_query($con,$sql); 
                                    while($row=mysqli_fetch_array($result)){ 
                                    echo "<img src='".$row['image']."' class='img-responsive' id='Img' alt='扫描图片' step='0'  title='' />";}
                                    ?>
                                            <!-- 大小、亮度、顺时针、逆时针 -->
                                            <div id='jtDiv' style="text-align:left|middle">
                                                <div class="col-xs-offset-3 col-xs-6 col-sm-offset-3 col-sm-6 control-label">
                                                    缩小<input id='scaleSlider' type='range' min='0.5' max='1.0' step='0.1' value='1.0' />放大 </div>
                                                <div class="col-xs-offset-1 col-xs-10 col-sm-offset-3 col-sm-6 control-label">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-default" onclick="rotateImg('right')">顺时针</button>
                                                        <button type="button" class="btn btn-default" onclick="getSrcImg()">原图</button>
                                                        <button type="button" class="btn btn-default" onclick="rotateImg('left')">逆时针</button>
                                                    </div>
                                                </div>
                                                <div class="col-xs-offset-3 col-xs-6 col-sm-offset-3 col-sm-6 control-label">
                                                    变暗<input id='factorSlider' type='range' min='0.1' max='1.0' step='0.1' value='0.8' />变亮
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="pic2">
                                            <!-- 从数据库导出降噪后的图片 -->
                                            <?php
                                    $con=mysqli_connect("localhost","root","root");//ip 用户名 密码 
                                    mysqli_select_db($con,"greenchannel");//数据库名 
                                    mysqli_set_charset($con,'utf8');//utf-8格式 
                                    $sql="select * from img where id='2'"; 
                                    $result=mysqli_query($con,$sql); 
                                    while($row=mysqli_fetch_array($result)){ 
                                    echo "<img src='".$row['image']."' class='img-responsive' alt='' title='' />";}
                                    ?>
                                        </div>
                                        <div class="tab-pane fade" id="pic3">
                                            <!-- 从数据库导出灰度均布图片 -->
                                            <?php
                                    $con=mysqli_connect("localhost","root","root");//ip 用户名 密码 
                                    mysqli_select_db($con,"greenchannel");//数据库名 
                                    mysqli_set_charset($con,'utf8');//utf-8格式 
                                    $sql="select * from img where id='3'"; 
                                    $result=mysqli_query($con,$sql); 
                                    while($row=mysqli_fetch_array($result)){ 
                                    echo "<img src='".$row['image']."' class='img-responsive' alt='' title='' />";}
                                    ?>
                                        </div>
                                        <div class="tab-pane fade" id="pic4">
                                            <!-- 从数据库导出直方图图片 -->
                                            <?php
                                    $con=mysqli_connect("localhost","root","root");//ip 用户名 密码 
                                    mysqli_select_db($con,"greenchannel");//数据库名 
                                    mysqli_set_charset($con,'utf8');//utf-8格式 
                                    $sql="select * from img where id='4'"; 
                                    $result=mysqli_query($con,$sql); 
                                    while($row=mysqli_fetch_array($result)){ 
                                    echo "<img src='".$row['image']."' class='img-responsive' alt='' title='' />";}
                                    ?>
                                        </div>
                                        <div class="tab-pane fade" id="pic5">
                                            <!-- 从数据库导出灰度变化曲线图片 -->
                                            <?php
                                    $con=mysqli_connect("localhost","root","root");//ip 用户名 密码 
                                    mysqli_select_db($con,"greenchannel");//数据库名 
                                    mysqli_set_charset($con,'utf8');//utf-8格式 
                                    $sql="select * from img where id='5'"; 
                                    $result=mysqli_query($con,$sql); 
                                    while($row=mysqli_fetch_array($result)){ 
                                    echo "<img src='".$row['image']."' class='img-responsive' alt='' title='' />";}
                                    ?>
                                        </div>
                                        <div class="tab-pane fade" id="pic6">
                                            <!-- 从数据库导出上下翻转后的图片 -->
                                            <?php
                                    $con=mysqli_connect("localhost","root","root");//ip 用户名 密码 
                                    mysqli_select_db($con,"greenchannel");//数据库名 
                                    mysqli_set_charset($con,'utf8');//utf-8格式 
                                    $sql="select * from img where id='6'"; 
                                    $result=mysqli_query($con,$sql); 
                                    while($row=mysqli_fetch_array($result)){ 
                                    echo "<img src='".$row['image']."' class='img-responsive' alt='' title='' />";}
                                    ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- 按钮 -->
                                <div class="col-xs-2 col-xs-offset-9 col-sm-4 col-sm-offset-5 control-label">
                                    <a href="acquisition.php"><button type="button" class="btn">返回</button></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- 大小、亮度、顺时针、逆时针 -->
<script type="text/javascript">
    // Get the image from id
    var img = document.getElementById('Img');
    var width = img.width;
    var height = img.height;
    var step = parseInt(img.getAttribute('step'));

    // Zoom in or out
    var scaleSlider = document.getElementById('scaleSlider'),
        scale = 1.0,
        MINIMUM_SCALE = 0.5,
        MAXIMUM_SCALE = 1.0;

    scaleSlider.onchange = function(e) {
        scale = e.target.value;
        if (scale < MINIMUM_SCALE) {
            scale = MINIMUM_SCALE;
        } else if (scale > MAXIMUM_SCALE) {
            scale = MAXIMUM_SCALE;
        }
        zoomImg(scale);
    };

    // Brightness 
    var factorSlider = document.getElementById('factorSlider'),
        factor = 0.8,
        MINIMUM_FACTOR = 0.1,
        MAXIMUM_FACTOR = 1.0;
    factorSlider.onchange = function(e) {
        factor = e.target.value;
        if (factor < MINIMUM_FACTOR) {
            factor = MINIMUM_FACTOR;
        } else if (factor > MAXIMUM_FACTOR) {
            factor = MAXIMUM_FACTOR;
        }
        brightenImg(factor);
    }


    function getSrcImg() {
        img.width = width;
        img.height = height;
        img.style.transform = "rotate(0deg)";
        img.style.filter = "brightness(0.8)";
        scaleSlider.value = 1.0;
        factorSlider.value = 0.8;
    }


    function zoomImg(scale) {
        sw = width * scale,
            sh = height * scale;
        img.width = sw;
        img.height = sh;
    }


    function rotateImg(direction) {
        //最小与最大旋转方向，图片旋转4次后回到原方向
        var min_step = 0;
        var max_step = 3;
        if (step === null) {
            step = min_step;
        }
        if (direction == 'right') {
            step++;
            //旋转到原位置，即超过最大值
            if (step > max_step) {
                step = min_step;
            }
        } else {
            step--;
            if (step < min_step) {
                step = max_step;
            }
        }
        img.setAttribute('step', step);
        //旋转角度以弧度值为参数
        var degree = step * 90;
        img.style.transform = "rotate(" + degree + "deg";
    }

    function brightenImg(factor) {
        img.style.filter = "brightness(" + factor + ")";
    }

</script>

</html>
