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
<title>问卷列表</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 问卷表 <span class="c-gray en">&gt;</span> 问卷表 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">

	<div class="cl pd-5 bg-1 bk-gray mt-20"> 
		<span class="l">
		<a class="btn btn-primary radius" onclick="question_add('添加问卷','add-questionnaire.html')" href="javascript:;"><i class="Hui-iconfont"></i> 添加问卷</a>
		
		</span> 
		<span class="r">共有数据：<strong><?php echo ($count); ?></strong> 条</span> 
	</div>
	
	
	<div class="mt-20">
		<table class="table table-border table-bordered table-bg table-hover table-sort table-responsive">
			<thead>
				<tr class="text-c">
					<th width="70">questionID</th>
					<th>类型</th>
					<th width="120">创建时间</th>
					<th>标题</th>
					<th>封面</th>
					<th>描述</th>
					<th>是否付费</th>										
					<th>原价（单位：元）</th>
					<th>现价（单位：元）</th>
					<th>操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($info)): $i = 0; $__LIST__ = $info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr class="text-c">
						<td><?php echo ($v["questionid"]); ?></td>
						<td>
							<?php if($v["questiontype"] == 10): ?><p>综合</p><?php endif; ?>
							<?php if($v["questiontype"] == 1): ?><p>情感</p><?php endif; ?>
							<?php if($v["questiontype"] == 2): ?><p>性格</p><?php endif; ?>
							<?php if($v["questiontype"] == 3): ?><p>趣味</p><?php endif; ?>
						</td>
						<td><?php echo ($v["questioncreatetime"]); ?></td>
						<td><?php echo ($v["questiontitle"]); ?></td>
						<td><a href="<?php echo ($v["questioncover"]); ?>" target="_blank"><img style="max-width: 80px;max-height: 80px;" src="<?php echo ($v["questioncover"]); ?>"/></a></td>
						<td><?php echo ($v["questiondescription"]); ?></td>
						<td>
							<?php if($v["questionpaystate"] == 0): ?><p>否</p><?php endif; ?>
							<?php if($v["questionpaystate"] == 1): ?><p style="color: red;">付费</p><?php endif; ?>
						</td>
						<td style="text-decoration:line-through;"><?php echo ($v["premoney"]); ?></td>				
						<td style="color: red"><strong><?php echo ($v["nowmoney"]); ?></strong></td>				
						
						<td class="f-14 td-manage">
							<a class="btn btn-success radius edit" data-questionid="<?php echo ($v["questionid"]); ?>" data-questiontype="<?php echo ($v["questiontype"]); ?>" data-questiontitle="<?php echo ($v["questiontitle"]); ?>" data-questioncover="<?php echo ($v["questioncover"]); ?>" data-questiondescription="<?php echo ($v["questiondescription"]); ?>" data-questionpaystate="<?php echo ($v["questionpaystate"]); ?>" data-premoney="<?php echo ($v["premoney"]); ?>" data-nowmoney="<?php echo ($v["nowmoney"]); ?>" id="edit" href="javascript:void(0);" data-toggle="modal" data-target="#modify">修改</a>
							<?php if($v["questionpaystate"] == 1): ?><a class="btn btn-default radius" data-questionid="<?php echo ($v["questionid"]); ?>" onclick="setPayState('0','<?php echo ($v["questionid"]); ?>')" href="javascript:;">不付费</a><?php endif; ?>
							<?php if($v["questionpaystate"] == 0): ?><a style="color: white;" class="btn btn-blue radius" data-questionid="<?php echo ($v["questionid"]); ?>" onclick="setPayState('1','<?php echo ($v["questionid"]); ?>')" href="javascript:;">&nbsp;付&nbsp;费&nbsp;</a><?php endif; ?>
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
                <h5 class="modal-title" id="modLabel">问卷列表 > 更改问卷信息</h5>
            </div>
            <div class="modal-body">
                <form class="form form-horizontal" id="form-admin-add">
	<div class="row cl">
		<input type="text" hidden="true" id="questionId" name="questionId">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>标题：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" id="questionTitle" name="questionTitle">
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
		<label class="form-label col-xs-4 col-sm-3">原价（单位：元）：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input style="text-decoration:line-through;" type="text" class="input-text" placeholder="" id="preMoney" name="preMoney">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">现价（单位：元）：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input style="color: red" type="text" class="input-text" placeholder="" id="nowMoney" name="nowMoney">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">描述：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" id="questionDescription" name="questionDescription">
		</div>
	</div>

	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">类型：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select id="questionType" class="select" name="state" size="1">
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
			<select id="questionPayState" class="select" name="state" size="1">
				<option value="0">不付费</option>
				<option value="1">付费</option>
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
<script type="text/javascript" src="/Fun1/Public/static/h-ui.admin/js/H-ui.admin.js"></script> 

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
	  {"orderable":false,"aTargets":[0,1,3,4,5,6,9]}// 不参与排序的列
	]
});

/*问卷-增加*/
function question_add(title,url){
	var index = layer.open({
		type: 2,
		title: title,
		content: url
	});
	layer.full(index);
}

/*问卷-修改*/
$('.edit').click(function(){
	var questionid = $(this).data('questionid');
	var questiontype = $(this).data('questiontype');
	var questiontitle = $(this).data('questiontitle');
	var questioncover = $(this).data('questioncover');
	var questiondescription = $(this).data('questiondescription');
	var premoney = $(this).data('premoney');
	var nowmoney = $(this).data('nowmoney');
	var questionpaystate = $(this).data('questionpaystate');

	$('#questionId').val(questionid);
	$('#questionType').val(questiontype);
	$('#questionTitle').val(questiontitle);
	//$('#articleContent').val(myEditor);
	$('#questionDescription').val(questiondescription);
	$('#preMoney').val(premoney);
	$('#nowMoney').val(nowmoney);
	$('#questionPayState').val(questionpaystate);
	$("#img").attr('src', questioncover);
	$("#set_img").prop("href",questioncover);
	
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

/*问卷-保存修改*/
$('.save').click(function(){
	var questionid = $("#questionId").val();
	var title = $("#questionTitle").val();
	var img = $("#set_img").attr('href');
	var description = $("#questionDescription").val();
	var premoney = $("#preMoney").val();
	var nowmoney = $("#nowMoney").val();

	var type = $("#questionType option:selected").val();
	var state = $("#questionPayState option:selected").val();

	$.ajax({
		url : "<?php echo U('Question/addQuestionnaire');?>",
		type : 'post',
		//dataType : 'json',
		data : {
			questionid:questionid,
			title:title,
			img:img,
			description:description,
			premoney:premoney,
			nowmoney:nowmoney,
			type:type,
			state:state,
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

// 修改是否付费
function setPayState(paystate,id) {
    $.ajax({
        url: "<?php echo U('Question/setPayState');?>",
        type : 'post',
        data : {
			id:id,
			questionpaystate:paystate,
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