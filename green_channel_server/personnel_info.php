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

<link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">  
	<script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js">
    </script>
	<script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
</head>
    <!-------------------------------------------js部分------------------------------------>
  
<script>

    get_personnel_info();
   
   function get_personnel_info(){
        $.ajax({                                      //第一个ajax 取得总记录数
            type:"POST",
            url:"get_personnel_info.php",
            data:{curpage:$('.pageCurrent').html(),pageSize:15},
            dataType: 'json',
            success:function(json){
                //if(json.code==200){
                     alert("aa");
                    var total=json.total;//总记录数
                    var curp=1;//当前页
                    var opt;//选择框当前页
                    var perpage=15;//每页显示记录数
                    
                    
                    $(".totalRecords").html(total);//显示总记录数
                    $(".pageCurrent").html(curp);
                   // $(".pageSize").html(perpage);
                    
                    var option='';
                    //计算总页数
                    if(total % perpage==0){
                        opt=parseInt(total/perpage);
                        for(var i=1;i<=opt;i++){
                            option+='<option value'+i+'>'+i+'</option>';
                        }
                    }
                    else{
                        opt=parseInt(total/perpage)+1;
                        for(var i=1;i<=opt+1;i++){
                            option+='<option value'+i+'>'+i+'</option>';
                        }
                    }
                    $(".totalPages").text(opt);
                    $("#gotoPage").html(option);

            },
        });
    };
    
$("pages>li:first-child").addClass("active");
    var pc=$(".pageCurrent").text();
//获取select值    
function getId(value){
    pc=value;
    $(".pageCurrent").text(pc);
    systemActivity_list();  
};
//首页  
$("#firstPage").on("click",function(e){
    e.preventDefault();
    pc=1;
    $(".pageCurrent").text(pc);
    $("#gotoPage").val(pc);
    systemActivity_list(); 
});
    
//上一页
$("#prevPage").on("click",function(e){
    e.preventDefault();
    if(parseInt($(".pageCurrent").text())>1){
        pc=parseInt($(".pageCurrent").text())-1;
    }
    else pc=1;
    $(".pageCurrent").text(pc);
    $("#gotoPage").val(pc);
    systemActivity_list(); 
});
//下一页
$("#nextPage").on("click",function(e){
    e.preventDefault();
    if(parseInt($(".pageCurrent").text())<parseInt($(".totalPages").text())){
        pc=parseInt($(".pageCurrent").text())+1;
    }
    else pc=$(".totalPages").text();
    $(".pageCurrent").text(pc);
    $("#gotoPage").val(pc);
    systemActivity_list(); 
});
//末页
$("#firstPage").on("click",function(e){
    e.preventDefault();
    pc=$(".totalPages").text();
    $(".pageCurrent").text(pc);
    $("#gotoPage").val(pc);//??????????????????
    systemActivity_list(); 
    
});                  
 // systemActivity_list();  

function systemActivity_list(){  //第二个ajax 获取新一页记录
    alert("bb1");
    $.ajax({
            type:"POST",
            url:"get_personnel_info.php",
            data:{curpage:$('.pageCurrent').Text(),pageSize:15},
            dataType: 'json',
         
            success:function(json){
             
                          
              var info = JSON.parse(info);
             alert(info[0].F01);
                    var html="";
                   alert(info.length);
             for(var i=0;i<info.length;i++){
                        var info=info[i];
                        if(info[i].F05==1) {info[i].F05="女";}
                        else{info[i].F05="男";   }                           
         
                    html+='<tr><td>info[i].F01</td> <td>info[i].F02</td><td>info[i].F03</td><td>info[i].F04</td><td>info[i].F05</td><td>info[i].F06</td><td>info[i].F07</td><td><button class="btn btn-primary " >照片</button><button class="btn btn-primary">修改</button><button class="btn btn-primary deletedData">删除</button></td></tr>';
                    }
                   
                   $("#Allactivities tbody").html(html);
                }   
    
    
});}
    $(function(){systemActivity_list();});
</script>
<body>
<!------------------------------------- 导航栏 --------------------------------->  
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">绿色通道</a>
      </div>
      <div>
        <ul class="nav navbar-nav">
            <li><a href="main.php">主页</a></li>
            <li class="active"><a href="#">人员信息管理</a></li>
            <li><a href="cargo_info.php">货物信息管理</a></li>
            <li><a href="car_info.php">车辆信息管理</a></li>
            <li><a href="#">打印报表</a></li>
        </ul>
    </div>
    </div>
</nav>
 <!------------------------------------- 人员信息界面 --------------------------------->    
<table id ="Allactivities"class ="table text-center table-bordered blue">          
    <thead>                  
        <tr>                                            
            <th>编号</th>                      
            <th>姓名</th> 
            <th>职务</th>
            <th>权限</th>
            <th>性别</th>
            <th>出生日期</th>
            <th>密码</th>
            <th>操作</th>
        </tr>
    </thead>          
    <tbody></tbody>          
    <tfoot>                  
        <tr>                       
            <td class="center" nowrap ="true" colspan="8">  
                <div id="page_turn" >
                    共<span class="totalRecords"></span>条记录&nbsp;
                    分为<span class="totalPages"></span>页&nbsp;
                    当前为第<span class="pageCurrent"></span>页&nbsp;
                   
                    <span id="page_link">
                        <a href="#" id="firstPage">首页</a>                                   
                        <a href="#" id="prevPage">上一页</a>                                    
                        <a href ="#" id ="nextPage">下一页</a>               
                        <a href="#"id="lastPage">末页</a> 
                        <select id ="gotoPage" onchange ="getId（value)"> </ select>
                    </span>
                </div>   
            </td>
        </tr>
    </tfoot>
    </table>


    
    </body>
</html>