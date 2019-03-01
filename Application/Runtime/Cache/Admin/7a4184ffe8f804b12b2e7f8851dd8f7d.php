<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
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
<!-- <link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/css/bootstrap.min.css" /> -->
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/skin/yellow/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/lib/css/lhgcalendar.css" /><!--日历样式-->
<title>文章列表</title>
<link href="/Fun1/Public/ueditor/themes/default/css/umeditor.min.css" rel="stylesheet" />
<script src="/Fun1/Public/ueditor/third-party/jquery.min.js"></script>
<script src="/Fun1/Public/ueditor/umeditor.config.js"></script>
<script src="/Fun1/Public/ueditor/umeditor.min.js"></script>
<script src="/Fun1/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
<script>
    $(function () {
        UM.getEditor('myEditor', {
		initialFrameWidth:"98%",
		//initialFrameHeight:"100%"
	});
});
</script>

</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 文章管理 <span class="c-gray en">&gt;</span> 文章列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
		<a class="btn btn-primary radius" onclick="article_add('添加文章','add-article.html')" href="javascript:;"><i class="Hui-iconfont"></i> 添加文章</a>
		
		</span> 
		<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> 
	</div>

	<div style="margin-top:10px; ">
		<form action="<?php echo U('Article/index');?>" method="get">
	        <div class="controls">
	        	<label for="">时间:</label>
	        	<input type="text" id="start_time" style="width:150px;" name="start_time" value="<?php echo ($start_time); ?>" class="J_calendar input-text" placeholder="开始时间">~
				<input type="text" id="end_time" name="end_time" style="width:150px;" value="<?php echo ($end_time); ?>" class="J_calendar input-text" placeholder="结束时间">
	        	<label for="">标题:</label>
				<input style="width:150px" type="text" value="<?php echo ($name); ?>" class="input-text" id="name" name="name" placeholder="请输入素材名">
				<label for="">描述:</label>
				<input style="width:150px" type="text" value="<?php echo ($description); ?>" class="input-text" id="description" name="description" placeholder="请输入描述">
				<label for="">类型:</label>
				<span class="select-box inline">
	                <select name="type" class="select" id="type">
	                	<option value="11">全部</option>
	                    <option value="1" <?php if($type == '1'): ?>selected="selected"<?php endif; ?>>情感</option>
	                    <option value="2" <?php if($type == '2'): ?>selected="selected"<?php endif; ?>>性格</option>
	                    <option value="3" <?php if($type == '3'): ?>selected="selected"<?php endif; ?>>趣味</option>
	                    <option value="10" <?php if($type == '10'): ?>selected="selected"<?php endif; ?>>综合</option>
	                </select>	          
	            </span>
				<label for="">是否推送:</label>
				<span class="select-box inline">
	                <select name="status" class="select" id="status">
	                	<option value="2">全部</option>
	                    <option value="1" <?php if($status == '1'): ?>selected="selected"<?php endif; ?>>已推送</option>
	                    <option value="-1" <?php if($status == '-1'): ?>selected="selected"<?php endif; ?>>未推送</option>
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
					<th width="60">articleID</th>
					<th width="120">创建时间</th>
					<th>标题</th>
					<th>封面</th>
					<th>描述</th>
					<th>内容</th>					
					<th>类型</th>
					<th>是否推送</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="text-c">
						<td><?php echo ($v["articleid"]); ?></td>
						<td class="text-1"><?php echo ($v["articlecreatetime"]); ?></td>
						<td><?php echo ($v["articletitle"]); ?></td>
						<td><a href="<?php echo ($v["articlecover"]); ?>" target="_blank"><img style="max-width: 80px;max-height: 80px;" src="<?php echo ($v["articlecover"]); ?>"/></a></td>
						<td><?php echo ($v["articledescription"]); ?></td>
						
						<td><?php echo (mb_substr($v["articlecontent"],0,30,'utf-8')); ?>……</td>				
						<td>
							<?php if($v["articletype"] == 10): ?><p>综合</p><?php endif; ?>
							<?php if($v["articletype"] == 1): ?><p>情感</p><?php endif; ?>
							<?php if($v["articletype"] == 2): ?><p>性格</p><?php endif; ?>
							<?php if($v["articletype"] == 3): ?><p>趣味</p><?php endif; ?>
						</td>
						<td> 
							<?php if($v["articlerecommend"] == 1): ?><p style="color:green"><b>已推送</b></p><?php endif; ?>
							<?php if($v["articlerecommend"] == 0): ?><p>未推送</p><?php endif; ?>
						</td>
						
						<td class="f-14 td-manage">
							<a class="btn btn-success radius edit"  data-articleid="<?php echo ($v["articleid"]); ?>" data-articletitle="<?php echo ($v["articletitle"]); ?>" data-articlecover="<?php echo ($v["articlecover"]); ?>" data-articledescription="<?php echo ($v["articledescription"]); ?>" data-articlecontent="<?php echo ($v["articlecontent"]); ?>" data-articletype="<?php echo ($v["articletype"]); ?>" data-articlerecommend="<?php echo ($v["articlerecommend"]); ?>" id="edit"  data-toggle="modal" data-target="#modify">修改</a>
							<?php if($v["articlerecommend"] == 1): ?><a class="btn btn-default radius" data-articleid="<?php echo ($v["articleid"]); ?>" onclick="setRecommend('0','<?php echo ($v["articleid"]); ?>')" href="javascript:;">不推送</a><?php endif; ?>
							<?php if($v["articlerecommend"] == 0): ?><a style="color: white;" class="btn btn-blue radius" data-articleid="<?php echo ($v["articleid"]); ?>" onclick="setRecommend('1','<?php echo ($v["articleid"]); ?>')" href="javascript:;">推&nbsp;&nbsp;&nbsp;送</a><?php endif; ?>
							<a class="btn btn-warning radius" data-articleid="<?php echo ($v["articleid"]); ?>" onclick="setChange('<?php echo ($v["articleid"]); ?>')" href="javascript:;">还原到上一次修改</a>
							<a class="btn btn-danger radius" data-articleid="<?php echo ($v["articleid"]); ?>" onclick="dele('<?php echo ($v["articleid"]); ?>')" href="javascript:;">删除</a>	
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
                <h5 class="modal-title" id="modLabel">文章列表 > 更改文章信息</h5>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<input type="text" hidden="true" id="articleId" name="articleId">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>标题：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" id="articleTitle" name="articleTitle">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">封面：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<button type="button" class="btn btn-secondary radius" onclick="uploadImg();">更换图片</button>
			<a target="_blank" id="set_img"><img src="" id="img" width="200px" height="200px"/></a>
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">描述：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" id="articleDescription" name="articleDescription">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">内容：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<script style="width: 50%;height: 200px;" type="text/plain" id="myEditor" name="articleContent"></script>
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">类型：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select id="articleType" class="select" name="state" size="1">
				<option value="1">情感</option>
				<option value="2">性格</option>
				<option value="3">趣味</option>
				<option value="10">综合</option>
			</select>
			</span> 
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">是否推送：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select id="articleRecommend" class="select" name="state" size="1">
				<option value="0">不推送</option>
				<option value="1">推送</option>
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
	  {"orderable":false,"aTargets":[0,2,3,4,5,6,7,8]}// 不参与排序的列
	]
});

/*文章-增加*/
function article_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*文章-修改*/
$('.edit').click(function(){
	
	var articleid = $(this).data('articleid');
	var articletitle = $(this).data('articletitle');
	var articlecover = $(this).data('articlecover');
	var articledescription = $(this).data('articledescription');
	var articlecontent = $(this).data('articlecontent');
	var articletype = $(this).data('articletype');
	var articlerecommend = $(this).data('articlerecommend');
    console.log($(this).data('articleid'));
   
	$('#articleId').val(articleid);
	$('#articleTitle').val(articletitle);
	$('#articleDescription').val(articledescription);
	//$('#articleContent').val(myEditor);
	UM.getEditor('myEditor').setContent(articlecontent);
	$('#articleType').val(articletype);
	$('#articleRecommend').val(articlerecommend);
	$("#img").attr('src', articlecover);
	$("#set_img").prop("href",articlecover);
	
});

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
                $("#set_img").prop("href",e);
            }
    });
}

/*文章-保存修改*/
$('.save').click(function(){
	var articleid = $("#articleId").val();
	var title = $("#articleTitle").val();
	var img = $("#set_img").attr('href');
	var description = $("#articleDescription").val();
	var content = UM.getEditor('myEditor').getContent();
	var type = $("#articleType option:selected").val();
	var recommend = $("#articleRecommend option:selected").val();

	$.ajax({
		url : "<?php echo U('Article/addArticle');?>",
		type : 'post',
		//dataType : 'json',
		data : {
			articleid:articleid,
			title:title,
			img:img,
			description:description,
			content:content,
			type:type,
			recommend:recommend,
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

// 修改是否推送
function setRecommend(recommend,id) {
    $.ajax({
        url: "<?php echo U('Article/setRecommend');?>",
        type : 'post',
        data : {
			id:id,
			articleRecommend:recommend,
		},
		success : function(e){
			//console.log(e);
			//alert('操作成功！');
			location.reload();
		},
		error : function(e){
			console.log(e);
			//layer.msg('error!',{icon:1,time:1000});
			alert('网络错误');
		}
    });
}

// 还原修改
function setChange(id) {
    $.ajax({
        url: "<?php echo U('Article/changeArticle');?>",
        type : 'post',
        data : {
			id:id
		},
		success : function(e){
			if(e == 'nochange') {
				alert('该文章未被修改过哦！');
				return;
			}
			//console.log(e);
			alert('还原成功！');
			location.reload();
		},
		error : function(e){
			console.log(e);
			//layer.msg('error!',{icon:1,time:1000});
			alert('网络错误');
		}
    });
}

$(function () {
 	$('.select:first').trigger("click");
  });

// 删除
function dele(id) {
	if(confirm("确定删除该文章吗?")){
		$.ajax({
	        url: "<?php echo U('Article/dele');?>",
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
</script> 
</body>
</html>