<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="lib/html5shiv.js"></script>
<script type="text/javascript" src="lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/skin/yellow/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/lib/css/lhgcalendar.css" /><!--日历样式-->
<title>素材列表</title>
<link href="/Fun1/Public/ueditor/themes/default/css/umeditor.min.css" rel="stylesheet" />
<script src="/Fun1/Public/ueditor/third-party/jquery.min.js"></script>
<script src="/Fun1/Public/ueditor/umeditor.config.js"></script>
<script src="/Fun1/Public/ueditor/umeditor.min.js"></script>
<script src="/Fun1/Public/ueditor/lang/zh-cn/zh-cn.js"></script>

</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 咨询师管理 <span class="c-gray en">&gt;</span> 咨询师列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
		<a class="btn btn-primary radius" onclick="material_add('添加咨询师','add-consult.html','800','500')" href="javascript:;"><i class="Hui-iconfont"></i> 添加咨询师</a>
		
		</span> 
		<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> 
	</div>

	<div style="margin-top:10px; ">
		<form action="<?php echo U('Consult/index');?>" method="get">
	        <div class="controls">
	        	<label for="">时间:</label>
	        	<input type="text" id="start_time" style="width:150px;" name="start_time" value="<?php echo ($start_time); ?>" class="J_calendar input-text" placeholder="开始时间">~
				<input type="text" id="end_time" name="end_time" style="width:150px;" value="<?php echo ($end_time); ?>" class="J_calendar input-text" placeholder="结束时间">
	        	<label for="">姓名</label>
				<input style="width:150px" type="text" value="<?php echo ($name); ?>" class="input-text" id="name" name="name" placeholder="请输入姓名">
				<label for="">擅长:</label>
				<input style="width:150px" type="text" value="<?php echo ($description); ?>" class="input-text" id="description" name="description" placeholder="请输入擅长">
				<label for="">等级:</label>
				<span class="select-box inline">
	                <select name="grade" class="select" id="grade">
	                	<option value="-1">全部</option>
	                    <option value="1" <?php if($grade == '1'): ?>selected="selected"<?php endif; ?>>初级</option>
	                    <option value="2" <?php if($grade == '2'): ?>selected="selected"<?php endif; ?>>中级</option>
	                    <option value="3" <?php if($grade == '3'): ?>selected="selected"<?php endif; ?>>高级</option>
	                </select>	          
	            </span>
				<label for="">性别:</label>
				<span class="select-box inline">
	                <select name="sex" class="select" id="sex">
	                	<option value="2">全部</option>
	                    <option value="1" <?php if($sex == '1'): ?>selected="selected"<?php endif; ?>>男</option>
	                    <option value="-1" <?php if($sex == '-1'): ?>selected="selected"<?php endif; ?>>女</option>
	                </select>	          
	            </span>
				<label for="">是否上线:</label>
				<span class="select-box inline">
	                <select name="status" class="select" id="status">
	                	<option value="2">全部</option>
	                    <option value="1" <?php if($status == '1'): ?>selected="selected"<?php endif; ?>>上线</option>
	                    <option value="-1" <?php if($status == '-1'): ?>selected="selected"<?php endif; ?>>下线</option>
	                </select>	          
	            </span>
	            <label for="">是否推荐:</label>
				<span class="select-box inline">
	                <select name="recommend" class="select" id="recommend">
	                	<option value="2">全部</option>
	                    <option value="1" <?php if($recommend == '1'): ?>selected="selected"<?php endif; ?>>推荐</option>
	                    <option value="-1" <?php if($recommend == '-1'): ?>selected="selected"<?php endif; ?>>未推荐</option>
	                </select>	          
	            </span> 
	            <button style="color: white;" id="submit" type="submit" class="btn btn-blue"><i class="Hui-iconfont"></i> 搜索</button>
	        </div>
	    </form>
    </div>
	
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th>Id</th>
					<th>创建时间</th>
					<th>头像</th>
					<th>姓名</th>
					<th>性别</th>
					<th>等级</th>
					<th>电话</th>
					<th>住址</th>				
					<th>擅长</th>		
					<th>个人说明</th>		
					<!-- <th>类型</th> -->
					<th>是否推荐</th>
					<th>是否上线</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="text-c">
						<td><?php echo ($v["id"]); ?></td>
						<td class="text-1"><?php echo ($v["createtime"]); ?></td>
						<td><a href="<?php echo ($v["img"]); ?>" target="_blank"><img style="max-width: 80px;max-height: 80px;" src="<?php echo ($v["img"]); ?>"/></a></td>
						<td><?php echo ($v["name"]); ?></td>
						<td> 
							<?php if($v["sex"] == 1): ?><p>男</p><?php endif; ?>
							<?php if($v["sex"] == 0): ?><p>女</p><?php endif; ?>
						</td>
						<td> 
							<?php if($v["grade"] == 1): ?><p style="color: green"><b>初级</b></p><?php endif; ?>
							<?php if($v["grade"] == 2): ?><p style="color: #FFCC00"><b>中级</b></p><?php endif; ?>
							<?php if($v["grade"] == 3): ?><p style="color: red"><b>高级</b></p><?php endif; ?>
						</td>
						<td><?php echo ($v["phone"]); ?></td>
						<td><?php echo ($v["address"]); ?></td>
						<td><?php echo (mb_substr($v["description"],0,25,'utf-8')); ?>......</td>			
						<td><?php echo (mb_substr($v["background"],0,25,'utf-8')); ?>......</td>		
						<td> 
							<?php if($v["recommend"] == 1): ?><p style="color:green"><b>已推荐</b></p><?php endif; ?>
							<?php if($v["recommend"] == 0): ?><p>未推荐</p><?php endif; ?>
						</td>			
						<!-- <td>
							<?php if($v["articletype"] == 11): ?><p>素材</p><?php endif; ?>
							<?php if($v["articletype"] == 1): ?><p>情感</p><?php endif; ?>
							<?php if($v["articletype"] == 2): ?><p>性格</p><?php endif; ?>
							<?php if($v["articletype"] == 3): ?><p>趣味</p><?php endif; ?>
						</td> -->
						<td> 
							<?php if($v["status"] == 1): ?><p style="color:green"><b>已上线</b></p><?php endif; ?>
							<?php if($v["status"] == 0): ?><p>未上线</p><?php endif; ?>
						</td>
						
						<td class="f-14 td-manage">
							<a class="btn btn-success radius edit" data-id="<?php echo ($v["id"]); ?>" data-name1="<?php echo ($v["name"]); ?>" data-img="<?php echo ($v["img"]); ?>" data-sex1="<?php echo ($v["sex"]); ?>" data-grade1="<?php echo ($v["grade"]); ?>" data-phone="<?php echo ($v["phone"]); ?>" data-address="<?php echo ($v["address"]); ?>" data-description1="<?php echo ($v["description"]); ?>" data-background="<?php echo ($v["background"]); ?>" data-status="<?php echo ($v["status"]); ?>" data-recommend="<?php echo ($v["recommend"]); ?>" data-status1="<?php echo ($v["status"]); ?>" id="edit"  data-toggle="modal" data-target="#modify">修改</a>
							<?php if($v["status"] == 1): ?><a class="btn btn-default radius" data-id="<?php echo ($v["id"]); ?>" onclick="setStatus('0','<?php echo ($v["id"]); ?>')" href="javascript:;">下线</a><?php endif; ?>
							<?php if($v["status"] == 0): ?><a style="color: white;" class="btn btn-blue radius" data-id="<?php echo ($v["id"]); ?>" onclick="setStatus('1','<?php echo ($v["id"]); ?>')" href="javascript:;">上线</a><?php endif; ?>
							<?php if($v["recommend"] == 1): ?><a class="btn btn-default radius" data-id="<?php echo ($v["id"]); ?>" onclick="setRecommend('0','<?php echo ($v["id"]); ?>')" href="javascript:;">下推荐</a><?php endif; ?>
							<?php if($v["recommend"] == 0): ?><a style="color: white;" class="btn btn-blue radius" data-id="<?php echo ($v["id"]); ?>" onclick="setRecommend('1','<?php echo ($v["id"]); ?>')" href="javascript:;">推荐</a><?php endif; ?>
							<a style="color: white;" class="btn btn-yellow radius" onclick="setTop('<?php echo ($v["id"]); ?>')" href="javascript:;">置顶</a>
							<a class="btn btn-warning radius" onclick="setDown('<?php echo ($v["id"]); ?>')" href="javascript:;">下置顶</a>
							<a class="btn btn-danger radius" onclick="dele('<?php echo ($v["id"]); ?>')" href="javascript:;">删除</a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>

			</tbody>
		</table>
	</div>
	<?php echo ($page); ?>
</div>


<!-- Modal -->
<div class="modal fade" id="modify" tabindex="-1" role="dialog" aria-labelledby="modifyLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog" role="document" style="width: 900px;">
        <div class="modal-content" style="width: 900px;">
            <div class="modal-header">
                <h5 class="modal-title" id="modLabel">咨询师列表 > 更改咨询师信息</h5>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal" id="form-admin-add">

	<div class="row cl">
		<input type="text" hidden="true" id="id" name="id">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>姓名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" id="name1" name="name1"/>
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">头像：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<button type="button" class="btn btn-secondary radius" onclick="uploadImg();">更换头像</button>
			<a target="_blank" id="set_img"><img src="" id="img" width="120px" height="120px"/></a>
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">性别：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select id="sex1" class="select" name="sex1" size="1">
				<option value="1">男</option>
				<option value="0">女</option>
			</select>
			</span> 
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">等级：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select id="grade1" class="select" name="grade1" size="1">
				<option value="1">初级</option>
				<option value="2">中级</option>
				<option value="3">高级</option>
			</select>
			</span> 
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">电话：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" id="phone" name="phone">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">住址：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" id="address" name="address">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">擅长：</label>
		<div class="formControls col-xs-8 col-sm-9">
 			<textarea name="" cols="60" rows="4" class="description1" id="description1" placeholder="" dragonfly="true"></textarea>
  		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">个人说明：</label>
		<div class="formControls col-xs-8 col-sm-9">
 			<textarea name="" cols="60" rows="5" class="background" id="background" placeholder="" dragonfly="true"></textarea>
   		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">是否推荐：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select id="recommend" class="select" name="recommend" size="1">
				<option value="0">不推荐</option>
				<option value="1">推荐</option>
			</select>
			</span> 
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">是否上线：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select id="status1" class="select" name="status1" size="1">
				<option value="1">上线</option>
				<option value="0">下线</option>				
			</select>
			</span> 
		</div>
	</div>

	</form>
            </div>
            <div class="modal-footer">
           		<button type="button" class="btn btn-primary save">保存</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>               
            </div>
        </div>
    </div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Fun1/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Fun1/Public/lib/layer/2.4/layer.js"></script>
<!-- <script type="text/javascript" src="/Fun1/Public/li<!-- b/layer/2.4/layer.js"></script> -->
<script type="text/javascript" src="/Fun1/Public/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/Fun1/Public/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Fun1/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
<!-- <script type="text/javascript" src="/Fun1/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>  -->
<script type="text/javascript" src="/Fun1/Public/lib/datatables/1.10.0/new.jquery.dataTables.min.js"></script> 
<!-- <script type="text/javascript" src="/Fun1/Public/lib/laypage/1.2/laypage.js"></script> -->
<script src="/Fun1/Public/lib/jquery/jquery.upload.js"></script>
<script src="/Fun1/Public/lib/lhgcalendar.js"></script> <!--日历js-->
<!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
<!-- <script src="/Fun1/Public/lib/jquery/jquery-3.0.0.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script> -->
<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.0.0.min.js"></script> -->
<!-- <script type="text/javascript" src="http://libs.baidu.com/jquery/2.1.4/jquery.min.js"></script> -->
<script type="text/javascript">
	function showCalendarByOption(elem, hasSeconds, hasTime) {
	console.log(elem);
	if (elem == '.J_calendar') {
	    var format = 'yyyy-MM-dd';
	    // var format = 'yyyy-MM-dd HH:mm:ss';
	} else {
	    var format = 'yyyy-MM-dd';
	}
	$(elem).calendar({format: format});
	}

	$('.J_calendar').ready(function () {
	showCalendarByOption('.J_calendar', false);
	});
	$('.J_calendar1').ready(function () {
	showCalendarByOption('.J_calendar1', false);
	});
	$('#submit').click(function(){
		var start_time = $('#start_time').val();
		var start = new Date(start_time.replace("-", "/").replace("-", "/"));
		var end_time = $('#end_time').val();
		var end = new Date(end_time.replace("-", "/").replace("-", "/"));
		if(end < start) {
			alert('开始时间不能大于结束时间！');
			return false;
		}
	})
</script>
<script type="text/javascript">

$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],
	//"bStateSave": true,//状态保存
	"pading":false,
	"aoColumnDefs": [
	  {"orderable":false,"aTargets":[0,2,3,4,5,6,7]}// 不参与排序的列
	]
});

/*文章-增加*/
function material_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}
</script>

<script type="text/javascript">
/*文章-修改*/
$('.edit').click(function(){

	var id = $(this).data('id');
	var name = $(this).data('name1');
	var img = $(this).data('img');
	var sex = $(this).data('sex1');
	var grade = $(this).data('grade1');
	var phone = $(this).data('phone');
	var address = $(this).data('address');
	var description = $(this).data('description1');
	var background = $(this).data('background');
	var recommend = $(this).data('recommend');
	var status = $(this).data('status1');

   
	$('#id').val(id);
	$('#name1').val(name);
	$('#sex1').val(sex);
	$('#grade1').val(grade);
	$('#phone').val(phone);
	$('#address').val(address);
	$('#description1').val(description);
	$('#background').val(background);
	$('#recommend').val(recommend);
	$('#status1').val(status);
	$("#img").attr('src', img);
	$("#set_img").prop("href",img);
	
});

// 文件上传（JQUERY异步上传插件）
function uploadImg(file) {
    $.upload({
            url: "<?php echo U('FileTools/uploadImg');?>",
            type : 'post',
            fileName: 'upload',
            params: {file: file,source:'consult'},
            //data: {source:'article'},
            dataType: 'json',
            onSend: function() {
                return true;
            },
            onComplate: function(e) {
            	console.log(e);
                $("#img").attr('src', e);
                $("#set_img").prop("hidden",false);
                $("#set_img").prop("href",e);
            }
    });
}

/*文章-保存修改*/
$('.save').click(function(){
	var id = $("#id").val();
	var name = $("#name1").val();
	var sex = $("#sex1 option:selected").val();
	var grade = $("#grade1 option:selected").val();
	var phone = $("#phone").val();
	var address = $("#address").val();
	var description = $("#description1").val();
	var background = $("#background").val();
	var img = $("#set_img").attr('href');
	var recommend = $("#recommend option:selected").val();
	var status = $("#status1 option:selected").val();

	$.ajax({
		url : "<?php echo U('Consult/addConsult');?>",
		type : 'post',
		//dataType : 'json',
		data : {
			id:id,
			name:name,
			sex:sex,
			grade:grade,
			phone:phone,
			address:address,
			description:description,
			background:background,
			img:img,
			recommend:recommend,
			status:status,
		},
		success : function(e){
			alert('操作成功！');
			location.reload();	
		},
		error : function(e){
			console.log(e);
			//layer.msg('error!',{icon:1,time:1000});
			alert('网络错误');
		}
	});
});

// 修改是否上线
function setStatus(status,id) {
    $.ajax({
        url: "<?php echo U('Consult/setStatus');?>",
        type : 'post',
        data : {
			id:id,
			status:status,
		},
		success : function(e){
			//console.log(e);
			alert('操作成功！');
			location.reload();
		},
		error : function(e){
			console.log(e);
			//layer.msg('error!',{icon:1,time:1000});
			alert('网络错误');
		}
    });
}

// 修改是否推荐
function setRecommend(recommend,id) {
    $.ajax({
        url: "<?php echo U('Consult/setRecommend');?>",
        type : 'post',
        data : {
			id:id,
			recommend:recommend,
		},
		success : function(e){
			//console.log(e);
			alert('操作成功！');
			location.reload();
		},
		error : function(e){
			console.log(e);
			//layer.msg('error!',{icon:1,time:1000});
			alert('网络错误');
		}
    });
}

// 置顶
function setTop(id) {
    if(confirm("确认置顶该咨询师吗？")){
    	$.ajax({
	        url: "<?php echo U('Consult/setTop');?>",
	        type : 'post',
	        data : {
				id:id,
			},
			success : function(e){
				//console.log(e);
				alert('操作成功！');
				location.reload();
			},
			error : function(e){
				console.log(e);
				//layer.msg('error!',{icon:1,time:1000});
				alert('网络错误');
			}
	    });
    }
}

// 下置顶
function setDown(id) {
	if(confirm("确认下置顶该咨询师吗？")){
		$.ajax({
	        url: "<?php echo U('Consult/setDown');?>",
	        type : 'post',
	        data : {
				id:id,
			},
			success : function(e){
				//console.log(e);
				alert('操作成功！');
				location.reload();
			},
			error : function(e){
				console.log(e);
				//layer.msg('error!',{icon:1,time:1000});
				alert('网络错误');
			}
	    });
	}
}

// 删除
function dele(id) {
	if(confirm("确认删除改咨询师吗吗？")){
		$.ajax({
	        url: "<?php echo U('Consult/dele');?>",
	        type : 'post',
	        data : {
				id:id,
			},
			success : function(e){
				//console.log(e);
				alert('操作成功！');
				location.reload();
			},
			error : function(e){
				console.log(e);
				//layer.msg('error!',{icon:1,time:1000});
				alert('网络错误');
			}
	    });
	}
}

$(function () {
 	$('.select:first').trigger("click");
  });
</script> 

</body>
</html>