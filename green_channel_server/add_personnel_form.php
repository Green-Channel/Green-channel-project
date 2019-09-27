<!DOCTYPE html>
<html lang="en">
<!----------------连接数据库---------------------------->
<?php include("conn/conn.php");
?>	
<head>
<!-- param, meta, styles, scripts -->
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>绿色通道管理系统</title>
<link rel="stylesheet" href="bootstrap-fileinput-master/css/fileinput.min.css" rel="stylesheet">
    <script rel="stylesheet" href="bootstrap-fileinput-master/js/fileinput.min.js"></script>
<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js">
    </script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
<!-------------------------------js部分 未编写完成----------------------------------------->
 <script>
    
</script>
    
<body>
<div class="container">
  <form class="form-horizontal" role="form">
<!-------------------------------左侧信息输入---------------------------------------->
      <div class="col-sm-7">
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">名字</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="name">
		</div>
	</div>
      
	<div class="form-group">
		<label for="number" class="col-sm-2 control-label">编号</label>
		<div class="col-sm-5">
			<input type="text" class="form-control" id="number" >
		</div>
	</div> 
      
    <div class="form-group">
      <label for="inputPassword" class="col-sm-2 control-label">密码</label>
      <div class="col-sm-5">
        <input type="password" class="form-control" id="inputPassword" placeholder="请输入密码">
      </div>
    </div>
    <div class="radio form-group">
        <label class="col-sm-2 control-label">性别</label>
        <label class="radio-inline">
          <input type="radio" name="sex" id="optionsRadios1" value="man"  checked >男
        </label>
        <label class="radio-inline">
        <input type="radio" name="sex" id="optionsRadios2"  value="woman">女
        </label>
          </div>
          <br>
    <div class="form-group">
        <label class="col-sm-2 control-label">出生日期</label>
        <div class="col-sm-5">
            <input type="date" class="form-control" name="birthday">
        </div>
    </div>
    
    <div class="form-group">
      <label for="position" class="col-sm-2 control-label">职务</label>
      <div class="col-sm-5">
        <select class="form-control" name="position" id="position">
          <option>站长</option>
          <option>副站长</option>
          <option>收费员</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="memo" class="col-sm-2 control-label">备注</label>
        <div class="col-sm-5">
          <textarea class="form-control" rows="3" name="memo"></textarea>
        </div>
    </div>  
    </div>
<!---------------------------------右侧照片上传-------------------------------------->
<div class="col-sm-5">
    <div  style="height: 500px">
    <input id="file-Portrait1" type="file">
    </div>
</div>
    
       
<!--------------------------------按钮---------------------------------------->
    <button type="submit" class="btn btn-primary btn-lg " >保存</button>
      <button type="submit" class="btn btn-primary btn-lg " >取消</button>
       </form>
    </div>

    </body>