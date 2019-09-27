<!doctype html>
<html lang="en">
	
<head>
<!-- param, meta, styles, scripts -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>欢迎登陆</title>
<link href="css/styles.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="login">
    <div class="container">
    <h2 class="heading text-center">绿色通道管理系统</h2>
       <div class="input_border">
        <form action="login.php" method="POST"  role="form" class="form-horizontal">
            <div class="form-group">
                <label for="num" class="col-sm-offset-2 col-sm-2 control-label">编号:</label>
                <div class="col-sm-5 ">

                <input type="text" class="form-control main" id="num" name="num">
                </div>
                
            </div>
        <br>
            <div class="form-group">
                <label for="password" class="col-sm-offset-2 col-sm-2 control-label">密码:</label>
                <div class="col-sm-5">
                <input type="password" id="password" name="password" class="form-control main" >
                </div>
            </div>
             <br>
            
    <button type="submit" class="btn btn-primary btn-lg center-block" >登陆</button>
       </form>
           
           </div>
    </div>
</body>
</html>
