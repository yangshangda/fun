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
<link rel="stylesheet" type="text/css" href="/Fun/Public/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/Fun/Public/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/Fun/Public/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/Fun/Public/static/h-ui.admin/skin/yellow/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Fun/Public/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>文章列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 文章管理 <span class="c-gray en">&gt;</span> 文章列表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
		<a class="btn btn-primary radius" onclick="admin_add('添加文章','add-article.html')" href="javascript:;"><i class="Hui-iconfont"></i> 添加文章</a>
		
		</span> 
		<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> 
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
						<td><?php echo (mb_substr($v["articlecontent"],0,20,'utf-8')); ?>......</td>				
						<td>
							<?php if($v["articletype"] == 10): ?><p>综合</p><?php endif; ?>
							<?php if($v["articletype"] == 1): ?><p>情感</p><?php endif; ?>
							<?php if($v["articletype"] == 2): ?><p>性格</p><?php endif; ?>
							<?php if($v["articletype"] == 3): ?><p>趣味</p><?php endif; ?>
						</td>
						<td> 
							<?php if($v["articlerecommend"] == 1): ?><p style="color:green">已推送</p><?php endif; ?>
							<?php if($v["articlerecommend"] == 0): ?><p>未推送</p><?php endif; ?>
						</td>
						
						<td class="f-14 td-manage"><a style="text-decoration:none" onClick="article_stop(this,'10001')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_edit('资讯编辑','article-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>

				<!-- <tr class="text-c">
					<td>10001</td>
					<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','article-zhang.html','10001')" title="查看">资讯标题</u></td>
					<td>21212</td>
					<td class="td-status"><span class="label label-success radius">已发布</span></td>
					<td class="f-14 td-manage"><a style="text-decoration:none" onClick="article_stop(this,'10001')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_edit('资讯编辑','article-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr>
				<tr class="text-c">
					<td>10002</td>
					<td class="text-l"><u style="cursor:pointer" class="text-primary" onClick="article_edit('查看','article-zhang.html','10002')" title="查看">资讯标题</u></td>
					<td>行业动态</td>
					<td class="td-status"><span class="label label-success radius">草稿</span></td>
					<td class="f-14 td-manage"><a style="text-decoration:none" onClick="article_shenhe(this,'10001')" href="javascript:;" title="审核">审核</a> <a style="text-decoration:none" class="ml-5" onClick="article_edit('资讯编辑','article-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
				</tr> -->
			</tbody>
		</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
 <script type="text/javascript" src="/Fun/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Fun/Public/lib/layer/2.4/layer.js"></script>
<!-- <script type="text/javascript" src="/Fun/Public/li<!-- b/layer/2.4/layer.js"></script> -->
<script type="text/javascript" src="/Fun/Public/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/Fun/Public/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Fun/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<!-- <script type="text/javascript" src="/Fun/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script>  -->
<script type="text/javascript" src="/Fun/Public/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">

$('.table-sort').dataTable({
	"aaSorting": [[ 1, "desc" ]],//默认第几个排序
	"bStateSave": true,//状态保存
	"pading":false,
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,8]}// 不参与排序的列
	]
});

/*管理员-增加*/
function admin_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

</script> 
</body>
</html>