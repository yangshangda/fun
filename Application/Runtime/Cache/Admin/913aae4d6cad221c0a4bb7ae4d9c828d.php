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
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/skin/yellow/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>管理员表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 管理员表 <span class="c-gray en">&gt;</span> fun_admin <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<?php if($_SESSION['state']== 1): ?><span class="l">
		<a class="btn btn-primary radius" onclick="admin_add('添加管理员','add-management.html','800','500')" href="javascript:;"><i class="Hui-iconfont"></i> 添加管理员</a>
		</span><?php endif; ?>
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
							<?php if($_SESSION['state']== 1): ?><a class="btn btn-success radius edit" data-adminid="<?php echo ($v["adminid"]); ?>" data-adminname="<?php echo ($v["adminname"]); ?>" data-adminsex="<?php echo ($v["adminsex"]); ?>" data-adminphone="<?php echo ($v["adminphone"]); ?>" data-adminaddress="<?php echo ($v["adminaddress"]); ?>" data-admindepartment="<?php echo ($v["admindepartment"]); ?>" data-adminqq="<?php echo ($v["adminqq"]); ?>" data-adminwechat="<?php echo ($v["adminwechat"]); ?>" data-adminemail="<?php echo ($v["adminemail"]); ?>" data-adminstate="<?php echo ($v["adminstate"]); ?>" data-admindescription="<?php echo ($v["admindescription"]); ?>" id="edit" href="javascript:void(0);" data-toggle="modal" data-target="#modify">修改</a>						
								<a class="btn btn-warning radius reset" data-adminid="<?php echo ($v["adminid"]); ?>" onclick="" href="javascript:;">重置密码</a>	
								<a class="btn btn-danger radius" data-adminid="<?php echo ($v["adminid"]); ?>" onclick="recycle('<?php echo ($v["adminid"]); ?>')" href="javascript:;">删除</a>					
								<!-- <a class="btn btn-secondary radius"  href="javascript:;">重置密码</a> -->
							<?php elseif($_SESSION['id']== $v[adminid]): ?>													
								<a class="btn btn-success radius edit" data-adminid="<?php echo ($v["adminid"]); ?>" data-adminname="<?php echo ($v["adminname"]); ?>" data-adminsex="<?php echo ($v["adminsex"]); ?>" data-adminphone="<?php echo ($v["adminphone"]); ?>" data-adminaddress="<?php echo ($v["adminaddress"]); ?>" data-admindepartment="<?php echo ($v["admindepartment"]); ?>" data-adminqq="<?php echo ($v["adminqq"]); ?>" data-adminwechat="<?php echo ($v["adminwechat"]); ?>" data-adminemail="<?php echo ($v["adminemail"]); ?>" data-adminstate="<?php echo ($v["adminstate"]); ?>" data-admindescription="<?php echo ($v["admindescription"]); ?>" id="edit" href="javascript:void(0);" data-toggle="modal" data-target="#modify">修改</a>				
								<a class="btn btn-warning radius edit2" data-adminid="<?php echo ($v["adminid"]); ?>" onclick="" href="javascript:;" data-toggle="modal" data-target="#modify2">修改密码</a><?php endif; ?>
						</td>																										
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>

			</tbody>
		</table>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="modify" tabindex="-1" role="dialog" aria-labelledby="modifyLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modLabel">管理员表 > 更改个人信息</h5>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<input type="text" hidden="true" id="adminId" name="adminId">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>管理员登录名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" id="adminName" name="adminName">
		</div>
	</div>
	
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="radio-box">
				<input value="1" type="radio" name="sex" id="sex-1" class="sex">
				<label for="sex-1">男</label>
			</div>
			<div class="radio-box">
				<input value="0" type="radio" name="sex" id="sex-0" class="sex">
				<label for="sex-0">女</label>
			</div>
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">手机：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" id="phone" name="phone">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">邮箱：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="@" name="email" id="email">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">地址：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" name="address" id="address">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">部门：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" name="department" id="department">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">QQ：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" name="qq" id="qq">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">微信：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" name="weChat" id="weChat">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">角色：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select id="state" class="select" name="state" size="1">
				<option value="0">普通管理员</option>
				<option value="1">超级管理员</option>
			</select>
			</span>
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">描述：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<textarea id="description" name="" cols="" rows="" class="textarea" id="textarea" placeholder="100个字符以内" dragonfly="true" onKeyUp="$.Huitextarealength(this,100)"></textarea>
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

<!-- Modal -->
<div class="modal fade" id="modify2" tabindex="-1" role="dialog" aria-labelledby="modifyLabel" aria-hidden="true" style="display: none">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modLabel">管理员表 > 修改密码</h5>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<input type="text" hidden="true" id="adminId2" name="adminId2">
		<label class="form-label col-xs-4 col-sm-3">原密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" placeholder="" id="oldPwd" name="oldPwd">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">新密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" placeholder="" name="newPwd" id="newPwd">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">确认密码：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="password" class="input-text" placeholder="" name="surePwd" id="surePwd">
		</div>
	</div>
	</form>
            </div>
            <div class="modal-footer">
           		<button type="button" class="btn btn-primary save2">保存</button>
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
<script type="text/javascript" src="/Fun1/Public/static/h-ui.admin/js/H-ui.admin.js"></script> 

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Fun1/Public/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/Fun1/Public/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
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

/*管理员-修改*/
$('.edit').click(function(){
	var adminid = $(this).data('adminid');
	var adminname = $(this).data('adminname');
	var adminsex = $(this).data('adminsex');
	var adminphone = $(this).data('adminphone');
	var adminaddress = $(this).data('adminaddress');
	var admindepartment = $(this).data('admindepartment');
	var adminqq = $(this).data('adminqq');
	var adminwechat = $(this).data('adminwechat');
	var adminemail = $(this).data('adminemail');
	var adminstate = $(this).data('adminstate');
	var admindescription = $(this).data('admindescription');

	$('#adminId').val(adminid);
	$('#adminName').val(adminname);
	var radios = $(".sex");
	if(adminsex == '1'){
		$("input[name='sex']").get(0).checked=true;
	}else{
		$("input[name='sex']").get(1).checked=true;
	}

	$('#phone').val(adminphone);
	$('#address').val(adminaddress);
	$('#department').val(admindepartment);
	$('#qq').val(adminqq);
	$('#weChat').val(adminwechat);
	$('#email').val(adminemail);
	$('#state').val(adminstate);
	$('#description').val(admindescription);
});

/*管理员-保存修改*/
$('.save').click(function(){
	var adminid = $('#adminId').val();
	var adminname = $('#adminName').val();
	var adminsex = $('input[name="sex"]:checked').val();
	var adminphone = $('#phone').val();
	var adminaddress = $('#address').val();
	var admindepartment = $('#department').val();
	var adminqq = $('#qq').val();
	var adminwechat = $('#weChat').val();
	var adminemail = $('#email').val();
	var adminstate = $('#state').val();
	var admindescription = $('#description').val();

	$.ajax({
		url : "<?php echo U('Management/editManagement');?>",
		type : 'post',
		//dataType : 'json',
		data : {
			adminId:adminid,
			adminName:adminname,
			sex:adminsex,
			phone:adminphone,
			email:adminemail,
			address:adminaddress,
			department:admindepartment,
			qq:adminqq,
			weChat:adminwechat,
			state:adminstate,
			textarea:admindescription,
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

/*管理员-重置密码*/
$('.reset').click(function(){
	var adminid = $(this).data('adminid');
	if(confirm("确定重置该员工密码?")){
	 　　$.ajax({
			url : "<?php echo U('Management/resetPassword');?>",
			type : 'post',
			//dataType : 'json',
			data : {
				adminId:adminid,
			},
			success : function(e){
				alert('操作成功！');
				//location.reload();
			},
			error : function(e){
				console.log(e);
				//layer.msg('error!',{icon:1,time:1000});
				alert('网络错误');

			}
		});
	}
});

/*管理员-更改密码*/
$('.edit2').click(function(){
	var adminid = $(this).data('adminid');
	$('#adminId2').val(adminid);
});
/*管理员-保存更改密码*/
$('.save2').click(function(){
	var adminid = $('#adminId2').val();
	var oldPwd = $('#oldPwd').val();
	var newPwd = $('#newPwd').val();
	var surePwd = $('#surePwd').val();
	if(!oldPwd) {
		alert('请输入原密码！');
		return false;
	}
	if(!newPwd) {
		alert('请输入新密码！');
		return false;
	}
	if(!surePwd) {
		alert('请再次输入新密码！');
		return false;
	}
	if(newPwd != surePwd) {
		alert('两次输入的新密码不一致！');
		return false;
	}

	$.ajax({
		url : "<?php echo U('Management/alterPassword');?>",
		type : 'post',
		//dataType : 'json',
		data : {
			adminId:adminid,
			oldPwd:oldPwd,
			newPwd:newPwd,
		},
		success : function(e){
			console.log(e);
			if (e == "-1") {
				alert('原密码不正确！');
			}else {
				alert('修改成功,请重新登录！');
				$.ajax({
					url : '/Fun1/Admin/Login/logout',
					type : 'post',
					//dataType : 'json',
					data : {},
					success : function(e){
						parent.location.reload();
					},
					error : function(e){}
					});
			}			
			//location.reload();
		},
		error : function(e){
			console.log(e);
			//layer.msg('error!',{icon:1,time:1000});
			alert('网络错误');
		}
	});
});

// 删除-进入回收站
function recycle(id) {
	$.ajax({
        url: "<?php echo U('Management/recycle');?>",
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


</script> 
</body>
</html>