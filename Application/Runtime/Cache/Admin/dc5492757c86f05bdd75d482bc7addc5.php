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
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加咨询师 - 咨询师管理</title>
<link href="/Fun1/Public/ueditor/themes/default/css/umeditor.min.css" rel="stylesheet" />
<script src="/Fun1/Public/ueditor/third-party/jquery.min.js"></script>
<script src="/Fun1/Public/ueditor/umeditor.config.js"></script>
<script src="/Fun1/Public/ueditor/umeditor.min.js"></script>
<script src="/Fun1/Public/ueditor/lang/zh-cn/zh-cn.js"></script>

<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>
<article class="page-container" display="none">
	<form class="form form-horizontal" id="form-admin-add" display="none">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>姓名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" id="name1" name="name1">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>头像上传：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<button type="button" class="btn btn-secondary radius" onclick="uploadImg();">上传头像</button>
			<a hidden="ture" target="_blank" id="set_img"><img src="" id="img" width="120px" height="120px"/></a>
			<!-- <input style="width: 60px;height: 25px;" hidden="ture" id="delect" type="button" onclick="delectImg();" value="删除"/> -->
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
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
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否上线：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select id="recommend" class="select" name="recommend" size="1">
				<option value="0">下线</option>
				<option value="1">上线</option>
			</select>
			</span> 
		</div>
	</div>

	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" id="submit" type="button" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="/Fun1/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Fun1/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Fun1/Public/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/Fun1/Public/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Fun1/Public/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/Fun1/Public/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/Fun1/Public/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<!-- 引入无刷新上传文件插件 -->
<script src="/Fun1/Public/lib/jquery/jquery.upload.js"></script>
<script type="text/javascript">

	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#submit").click(function(){

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
		alert('aaaaa');
		$.ajax({
			url : "<?php echo U('Consult/addConsult');?>",
			type : 'post',
			//dataType : 'json',
			data : {
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
				console.log(e);
				alert('操作成功！');
				location.reload();
				parent.location.reload();
				var index = parent.layer.getFrameIndex(window.name);
				parent.layer.close(index);
			},
			error : function(e){
				// e.preventDefault();
				return false;
				console.log(e);
				//layer.msg('error!',{icon:1,time:1000});
				alert('网络错误');

			}
		});
		
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
                    $("#delect").prop("hidden",false);
                    $("#set_img").prop("href",e);
                }
        });
    }

</script> 

</body>
</html>