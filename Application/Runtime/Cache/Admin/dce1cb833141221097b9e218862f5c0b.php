<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />

<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/css/style.css" />

<title>测试管理 - 添加测试</title>
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
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>questionId：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" id="qid" name="qid">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>题号：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" id="num" name="num">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>标题：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="文本和图片可共存" id="title" name="title">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">标题图片：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<button type="button" value="titleimg" class="btn btn-secondary radius uploadImg">上传图片</button>
			<a hidden="ture" target="_blank" id="set_titleimg"><img src="" id="titleimg" width="200px" height="150px"/></a>
			<!-- <input class="btn btn-default radius"  hidden="ture" id="delect" onclick="delectImg();" value="删除"/> -->
			<button style="display:none;" value="titleimg" type="button" class="btn btn-default radius titleimg delectImg">删除</button>
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">A：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="内容：文本和图片二选一" id="title" name="title">
			<br/><br/>
			<input type="text" class="input-text" placeholder="分数" id="title" name="title">
			<br/><br/>
			<button type="button" value="aimg" class="btn btn-secondary radius uploadImg">上传图片A</button>
			<a hidden="ture" target="_blank" id="set_aimg"><img src="" id="aimg" width="200px" height="150px"/></a>
			<button style="display:none;" value="aimg" type="button" class="btn btn-default radius aimg delectImg">删除A</button>
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">B：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="内容：文本和图片二选一" id="title" name="title">
			<br/><br/>
			<input type="text" class="input-text" placeholder="分数" id="title" name="title">
			<br/><br/>
			<button type="button" value="bimg" class="btn btn-secondary radius uploadImg">上传图片B</button>
			<a hidden="ture" target="_blank" id="set_bimg"><img src="" id="bimg" width="200px" height="150px"/></a>
			<button style="display:none;" value="bimg" type="button" class="btn btn-default radius bimg delectImg">删除B</button>
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">C：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="内容：文本和图片二选一" id="title" name="title">
			<br/><br/>
			<input type="text" class="input-text" placeholder="分数" id="title" name="title">
			<br/><br/>
			<button type="button" value="cimg" class="btn btn-secondary radius uploadImg">上传图片C</button>
			<a hidden="ture" target="_blank" id="set_cimg"><img src="" id="cimg" width="200px" height="150px"/></a>
			<button style="display:none;" value="cimg" type="button" class="btn btn-default radius cimg delectImg">删除C</button>
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">D：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="内容：文本和图片二选一" id="title" name="title">
			<br/><br/>
			<input type="text" class="input-text" placeholder="分数" id="title" name="title">
			<br/><br/>
			<button type="button" value="dimg" class="btn btn-secondary radius uploadImg">上传图片D</button>
			<a hidden="ture" target="_blank" id="set_dimg"><img src="" id="dimg" width="200px" height="150px"/></a>
			<button style="display:none;" value="dimg" type="button" class="btn btn-default radius dimg delectImg">删除D</button>
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
	
	$("#submit").click(function(){
		var title = $("#title").val();
		var img = $("#set_img").attr('href');
		var description = $("#description").val();
		var type = $("#type option:selected").val();
		var state = $("#state option:selected").val();
		var premoney = $("#preMoney").val();
		var nowmoney = $("#nowMoney").val();

		$.ajax({
			url : "<?php echo U('Question/addQuestionnaire');?>",
			type : 'post',
			//dataType : 'json',
			data : {
				title:title,
				img:img,
				description:description,
				state:state,
				type:type,
				premoney:premoney,
				nowmoney:nowmoney,
			},
			success : function(e){
				console.log(e);
				alert('添加成功！');
				parent.location.reload();
				var index = parent.layer.getFrameIndex(window.name);
				parent.layer.close(index);
			},
			error : function(e){
				console.log(e);
				//layer.msg('error!',{icon:1,time:1000});
				alert('网络错误');
			}
		});
		
	});

	// 文件上传（JQUERY异步上传插件）
	$('.uploadImg').bind('click',function(file){
		var abcd = $(this).attr('value');
        $.upload({
            url: "<?php echo U('FileTools/uploadImg');?>",
            type : 'post',
            fileName: 'upload',
            params: {file: file, source: abcd + 'test'},
            //data: {source:'article'},
            dataType: 'json',
            onSend: function() {
                return true;
            },
            onComplate: function(e) {
            	console.log(e);
                $("#" + abcd).attr('src', e);
                $("#set_" + abcd).prop("hidden",false);
                $("#set_" + abcd).prop("href",e);
                $("." + abcd).css('display','block');
            }
        });
	})

	// 图片删除
	$('.delectImg').bind('click',function(){
		var abcd = $(this).attr('value');
		$("#" + abcd).attr('src', '');
        $("#set_" + abcd).prop("hidden",true);
        $("#set_" + abcd).prop("href",'');
		$("." + abcd).css('display','none');

	})

</script> 

</body>
</html>