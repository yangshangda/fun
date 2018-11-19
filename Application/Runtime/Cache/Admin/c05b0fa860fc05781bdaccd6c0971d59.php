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
<title>添加文章 - 文章管理</title>
<link href="/Fun1/Public/ueditor/themes/default/css/umeditor.min.css" rel="stylesheet" />
<script src="/Fun1/Public/ueditor/third-party/jquery.min.js"></script>
<script src="/Fun1/Public/ueditor/umeditor.config.js"></script>
<script src="/Fun1/Public/ueditor/umeditor.min.js"></script>
<script src="/Fun1/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
    $(function () {
        UM.getEditor('myEditor');
    });
</script>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>
<article class="page-container" display="none">
	<form class="form form-horizontal" id="form-admin-add" display="none">
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>文章标题：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" id="adminName" name="adminName">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>封面上传：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<button type="button" class="btn btn-secondary radius" onclick="uploadImg();">上传图片</button>
			<a hidden="ture" target="_blank" id="set_img"><img src="" id="img" width="200px" height="200px"/></a>
			<!-- <input style="width: 60px;height: 25px;" hidden="ture" id="delect" type="button" onclick="delectImg();" value="删除"/> -->
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">描述：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" id="description" name="description">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">内容：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<script type="text/plain" id="myEditor" name="content"></script>
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>类型：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="adminRole" size="1">
				<option value="0">不推送</option>
				<option value="1">推送</option>
			</select>
			</span> 
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>是否推送：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="adminRole" size="1">
				<option value="0">不推送</option>
				<option value="1">推送</option>
			</select>
			</span> 
		</div>
	</div>

	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" id="submit" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
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
	

	// $("#submit").click(function(){
	// 	// var adminName = $("#adminName").val();
	// 	// var phone = $("#phone").val();
	// 	// var email = $("#email").val();
	// 	// var address = $("#address").val();
	// 	// var department = $("#department").val();
	// 	// var qq = $("#qq").val();
	// 	// var weChat = $("#weChat").val();
	// 	// var textarea = $("#textarea").val();
	// 	// var data = $("#handle-form").serialize();
	// 	$.ajax({
	// 		url : "<?php echo U('FileTools/uploadThumb');?>",
	// 		type : 'post',
	// 		//dataType : 'json',
	// 		data : {
	// 			// adminName:adminName,
	// 			// phone:phone,
	// 			// email:email,
	// 			// address:address,
	// 			// department:department,
	// 			// qq:qq,
	// 			// weChat:weChat,
	// 			// textarea:textarea,
	// 		},
	// 		success : function(e){
	// 			console.log(e);
	// 			// alert('添加成功！');
	// 			// location.reload();
	// 			// parent.location.reload();
	// 			// var index = parent.layer.getFrameIndex(window.name);
	// 			// parent.$('.btn-refresh').click();
	// 			// parent.layer.close(index);
	// 			//layer.msg('添加成功!',{icon:1,time:1000});
	// 		},
	// 		error : function(e){
	// 			console.log(e);
	// 			//layer.msg('error!',{icon:1,time:1000});
	// 			alert('网络错误');
	// 		}
	// 	});
		
	// });
	
	// 文件上传（JQUERY异步上传插件）
    function uploadImg(file) {
        $.upload({
                url: "<?php echo U('FileTools/uploadImg');?>",
                type : 'post',
                fileName: 'upload',
                params: {file: file,source:'article'},
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

    function uploadImg(file) {
        $.upload({
                url: "<?php echo U('FileTools/uploadImg');?>",
                type : 'post',
                fileName: 'upload',
                params: {file: file,source:'article'},
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
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>