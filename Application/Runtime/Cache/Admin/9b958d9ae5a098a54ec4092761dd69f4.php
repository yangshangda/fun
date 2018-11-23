<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE HTML>
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
<title>测试列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 测试表 <span class="c-gray en">&gt;</span> 测试表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
		<a class="btn btn-primary radius" onclick="test_add('添加问卷','add-test.html')" href="javascript:;"><i class="Hui-iconfont"></i> 添加问卷</a>
		
		</span> 
		<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> 
	</div>
	
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="70">questionID</th>
					<th width="70">testID</th>
					<th>题号</th>
					<th>标题</th>
					<th>标题图片</th>
					<th>a内容</th>
					<th>a分数</th>
					<th>b内容</th>
					<th>b分数</th>
					<th>c内容</th>
					<th>c分数</th>
					<th>d内容</th>
					<th>d分数</th>					
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="text-c">										
						<td><?php echo ($v["questionid"]); ?></td>
						<td><?php echo ($v["testid"]); ?></td>						
						<td><?php echo ($v["testnumber"]); ?></td>
						<td><?php echo ($v["testtitle"]); ?></td>
						<td>
							<?php if($v["testimg"] != null): ?><a href="<?php echo ($v["testimg"]); ?>" target="_blank"><img style="max-width: 80px;max-height: 80px;" src="<?php echo ($v["testimg"]); ?>"/></a>
								<?php else: ?>无<?php endif; ?>
						</td>
						<td>
							<if condition="$v.atitle neq null"/><?php echo ($v["atitle"]); ?>
							<if condition="$v.aimg"/><a href="<?php echo ($v["aimg"]); ?>" target="_blank"><img style="max-width: 80px;max-height: 80px;" src="<?php echo ($v["aimg"]); ?>"/></a>
						</td>
						<td><?php echo ($v["ascore"]); ?></td>
						<td>
							<if condition="$v.btitle neq null"/><?php echo ($v["btitle"]); ?>
							<if condition="$v.bimg neq null"/><a href="<?php echo ($v["bimg"]); ?>" target="_blank"><img style="max-width: 80px;max-height: 80px;" src="<?php echo ($v["bimg"]); ?>"/></a>
						</td>
						<td><?php echo ($v["bscore"]); ?></td>
						<td>
							<if condition="$v.ctitle neq null"/><?php echo ($v["ctitle"]); ?>
							<if condition="$v.cimg neq null"/><a href="<?php echo ($v["cimg"]); ?>" target="_blank"><img style="max-width: 80px;max-height: 80px;" src="<?php echo ($v["cimg"]); ?>"/></a>
						</td>
						<td><?php echo ($v["cscore"]); ?></td>
						<td>
							<if condition="$v.dtitle neq null"/><?php echo ($v["dtitle"]); ?>
							<if condition="$v.dimg neq null"/><a href="<?php echo ($v["dimg"]); ?>" target="_blank"><img style="max-width: 80px;max-height: 80px;" src="<?php echo ($v["dimg"]); ?>"/></a>
						</td>
						<td><?php echo ($v["dscore"]); ?></td>			
						
						<td class="f-14 td-manage">
							<a style="text-decoration:none" onClick="article_stop(this,'10001')" href="javascript:;" title="下架"><i class="Hui-iconfont">&#xe6de;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_edit('资讯编辑','article-add.html','10001')" href="javascript:;" title="编辑"><i class="Hui-iconfont">&#xe6df;</i></a> <a style="text-decoration:none" class="ml-5" onClick="article_del(this,'10001')" href="javascript:;" title="删除"><i class="Hui-iconfont">&#xe6e2;</i></a>
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>

			</tbody>
		</table>
	</div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Fun1/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Fun1/Public/lib/layer/2.4/layer.js"></script>
<!-- <script type="text/javascript" src="/Fun1/Public/li<!-- b/layer/2.4/layer.js"></script> -->
<script type="text/javascript" src="/Fun1/Public/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/Fun1/Public/static/h-ui.admin/js/H-ui.admin.js"></script> 

<script type="text/javascript" src="/Fun1/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/Fun1/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/Fun1/Public/lib/laypage/1.2/laypage.js"></script>
<script src="/Fun1/Public/lib/jquery/jquery.upload.js"></script>
<script type="text/javascript">

$('.table-sort').dataTable({
	"aaSorting": [[ 0, "desc" ]],
	//"bStateSave": true,//状态保存
	"pading":false,
	"aoColumnDefs": [
	  {"orderable":false,"aTargets":[2,3,4,5,6,7,8,9,10,11,12]}// 不参与排序的列
	]
});

/*测试-增加*/
function test_add(title,url){
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