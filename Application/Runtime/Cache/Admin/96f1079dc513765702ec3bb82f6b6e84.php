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
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>导航轮播图列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 轮播图管理 <span class="c-gray en">&gt;</span> 轮播图列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
		<a class="btn btn-primary radius" onclick="banner_add('添加轮播图','add-banner.html')" href="javascript:;"><i class="Hui-iconfont"></i> 添加轮播图</a>
		
		</span> 
		<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> 
	</div>
	
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="60">bannerID</th>
					<th width="60">articleID</th>
					<th>创建时间</th>
					<th>标题</th>					
					<th>轮播图</th>
					<th>是否发布</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="text-c">
						<td><?php echo ($v["bannerid"]); ?></td>
						<td class="text-1"><?php echo ($v["articleid"]); ?></td>
						<td><?php echo ($v["bannercreatetime"]); ?></td>
						<td><?php echo ($v["bannertitle"]); ?></td>						
						<td><a href="<?php echo ($v["bannerimage"]); ?>" target="_blank"><img style="width: 200px;max-height: 100px;" src="<?php echo ($v["bannerimage"]); ?>"/></a></td>
						<td> 
							<?php if($v["bannerstatus"] == 1): ?><p style="color:green">已发布</p><?php endif; ?>
							<?php if($v["bannerstatus"] == 0): ?><p style="color:red">未发布</p><?php endif; ?>
						</td>
						
						<td class="f-14 td-manage">
							<a class="btn btn-success radius edit" data-bannerid="<?php echo ($v["bannerid"]); ?>" data-articleid="<?php echo ($v["articleid"]); ?>" data-bannertitle="<?php echo ($v["bannertitle"]); ?>" data-bannerimage="<?php echo ($v["bannerimage"]); ?>" data-bannerstatus="<?php echo ($v["bannerstatus"]); ?>" id="edit" href="javascript:void(0);" data-toggle="modal" data-target="#modify">修改</a>
							<?php if($v["bannerstatus"] == 1): ?><a class="btn btn-default radius" data-bannerid="<?php echo ($v["bannerid"]); ?>" onclick="setStatus('0','<?php echo ($v["bannerid"]); ?>')" href="javascript:;">不发布</a><?php endif; ?>
							<?php if($v["bannerstatus"] == 0): ?><a style="color: white;" class="btn btn-blue radius" data-bannerid="<?php echo ($v["bannerid"]); ?>" onclick="setStatus('1','<?php echo ($v["bannerid"]); ?>')" href="javascript:;">发&nbsp;&nbsp;&nbsp;布</a><?php endif; ?>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>

			</tbody>
		</table>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modify" tabindex="-1" role="dialog" aria-labelledby="modifyLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog" role="document" style="width: 900px;">
        <div class="modal-content" style="width: 900px;">
            <div class="modal-header">
                <h5 class="modal-title" id="modLabel">轮播图列表 > 更改轮播图信息</h5>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<input type="text" hidden="true" id="bannerId" name="bannerId">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>文章ID：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" id="articleId" name="articleId">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">标题：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" id="bannerTitle" name="bannerTitle">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">轮播图：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<button type="button" class="btn btn-secondary radius" onclick="uploadImg();">更换图片</button>
			<a target="_blank" id="set_img"><img src="" id="img" width="400px" height="200px"/></a>
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">是否发布：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select id="bannerStatus" class="select" name="state" size="1">
				<option value="0">不发布</option>
				<option value="1">发布</option>
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
<script type="text/javascript" src="/Fun1/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/Fun1/Public/lib/laypage/1.2/laypage.js"></script>
<script src="/Fun1/Public/lib/jquery/jquery.upload.js"></script>
<script type="text/javascript">

$('.table-sort').dataTable({
	"aaSorting": [[ 2, "desc" ]],
	//"bStateSave": true,//状态保存
	"pading":false,
	"aoColumnDefs": [
	  {"orderable":false,"aTargets":[3,4,5,6]}// 不参与排序的列
	]
});
/*轮播图-增加*/
function banner_add(title,url,w,h){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*轮播图-修改*/
$('.edit').click(function(){
	var bannerid = $(this).data('bannerid');
	var articleid = $(this).data('articleid');
	var bannertitle = $(this).data('bannertitle');
	var bannerimage = $(this).data('bannerimage');
	var bannerstatus = $(this).data('bannerstatus');

	$('#bannerId').val(bannerid);
	$('#articleId').val(articleid);
	$('#bannerTitle').val(bannertitle);
	$('#bannerStatus').val(bannerstatus);
	$("#img").attr('src', bannerimage);
	$("#set_img").prop("href",bannerimage);
	
});

// 文件上传（JQUERY异步上传插件）
function uploadImg(file) {
    $.upload({
            url: "<?php echo U('FileTools/uploadImg');?>",
            type : 'post',
            fileName: 'upload',
            params: {file: file,source:'banner'},
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

/*轮播图-保存修改*/
$('.save').click(function(){
	var bannerid = $("#bannerId").val();
	var articleid = $("#articleId").val();
	var title = $("#bannerTitle").val();
	var img = $("#set_img").attr('href');
	var status = $("#bannerStatus option:selected").val();

	$.ajax({
		url : "<?php echo U('Banner/addBanner');?>",
		type : 'post',
		//dataType : 'json',
		data : {
			bannerid:bannerid,
			articleid:articleid,
			title:title,
			img:img,
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

// 修改是否发布
function setStatus(status,id) {
    $.ajax({
        url: "<?php echo U('Banner/setStatus');?>",
        type : 'post',
        data : {
			id:id,
			status:status,
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
</script> 
</body>
</html>