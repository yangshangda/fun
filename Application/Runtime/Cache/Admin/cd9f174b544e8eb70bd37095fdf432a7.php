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
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>管理员回收站</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员 <span class="c-gray en">&gt;</span> 回收站 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

	<div class="cl pd-5 bg-1 bk-gray mt-20">
		<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> 
	</div>
	
	
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th>adminID</th>
					<th>创建时间</th>
					<th>登录名</th>
					<th>性别</th>
					<th>手机</th>
					<th>地址</th>
					<th>部门</th>
					<th>QQ</th>
					<th>微信</th>
					<th>邮箱</th>
					<th>角色</th>
					<th>描述</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="text-c">
						<td><?php echo ($v["adminid"]); ?></td>
						<td><?php echo ($v["admincreatetime"]); ?></td>
						<td><?php echo ($v["adminname"]); ?></td>
						<td>
							<?php if($v["adminsex"] == 1): ?>男<?php endif; ?>
							<?php if($v["adminsex"] == 0): ?>女<?php endif; ?>
						</td>
						<td><?php echo ($v["adminphone"]); ?></td>
						<td><?php echo ($v["adminaddress"]); ?></td>
						<td><?php echo ($v["admindepartment"]); ?></td>
						<td><?php echo ($v["adminqq"]); ?></td>
						<td><?php echo ($v["adminwechat"]); ?></td>
						<td><?php echo ($v["adminemail"]); ?></td>
						<td> 
							<?php if($v["adminstate"] == 1): ?><a style="color: red;">超级管理员</a><?php endif; ?>
							<?php if($v["adminstate"] == 0): ?>普通管理员<?php endif; ?>
						</td>
						<td><?php echo ($v["admindescription"]); ?></td>
						<td class="f-14 td-manage">
							<?php if($_SESSION['state']== 1): ?><a class="btn btn-primary radius" data-adminid="<?php echo ($v["adminid"]); ?>" onclick="recover('<?php echo ($v["adminid"]); ?>')" href="javascript:;">还原</a><?php endif; ?>
						</td>																										
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>

			</tbody>
		</table>
	</div>
	<?php echo ($page); ?>
</div>


<!--_footer 作为公共模版分离出去-->
 <script type="text/javascript" src="/Fun1/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Fun1/Public/lib/layer/2.4/layer.js"></script>
<!-- <script type="text/javascript" src="/Fun1/Public/li<!-- b/layer/2.4/layer.js"></script> -->
<script type="text/javascript" src="/Fun1/Public/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/Fun1/Public/static/h-ui.admin/js/H-ui.admin.js"></script> 

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Fun1/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/Fun1/Public/lib/datatables/1.10.0/new.jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/Fun1/Public/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">

$('.table-sort').dataTable({
	"aaSorting": [[ 1, "asc" ]],//默认第几个排序
	//"bStateSave": true,//状态保存
	"pading":false,
	"aoColumnDefs": [
	  //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
	  {"orderable":false,"aTargets":[0,2,3,4,5,6,7,8,9,11,12]}// 不参与排序的列
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
};
</script>

<script type="text/javascript">

// 还原
function recover(id) {
	if(confirm("确认还原此管理员吗？")){
		$.ajax({
	        url: "<?php echo U('Management/recover');?>",
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