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
<link rel="stylesheet" type="text/css" href="/Fun1/Public/lib/css/lhgcalendar.css" /><!--日历样式-->
<!--[if IE 6]>
<script type="text/javascript" src="lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>折线图</title>
</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 统计管理 <span class="c-gray en">&gt;</span> 折线图 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
<div class="page-container">
    <div style="margin-top:10px; ">
        <form action="<?php echo U('Record/record');?>" method="get">
            <div class="controls">
                <label for="">时间:</label>
                <input type="text" id="time" style="width:150px;" name="time" value="" class="J_calendar input-text" placeholder="时间">
                <label for="">天数:最近</label>
                <input style="width:30px" type="text" value="" class="input-text" id="j" name="j" placeholder="7">天的数据
                <label for="">文章id:</label>
                <input style="width:50px" type="text" value="" class="input-text" id="articleId" name="articleId" placeholder="">
                <label for="">测试题id:</label>
                <input style="width:50px" type="text" value="" class="input-text" id="testId" name="testId" placeholder="">
                <label for="">用户id:</label>
                <input style="width:150px" type="text" value="" class="input-text" id="uid" name="uid" placeholder="">
                <!-- <label for="">是否上线:</label>
                <span class="select-box inline">
                    <select name="status" class="select" id="status">
                        <option value="2">全部</option>
                        <option value="1" <?php if($status == '1'): ?>selected="selected"<?php endif; ?>>上线</option>
                        <option value="-1" <?php if($status == '-1'): ?>selected="selected"<?php endif; ?>>下线</option>
                    </select>             
                </span>  --> 
                <button style="color: white;" id="submit" type="button" class="btn btn-blue"><i class="Hui-iconfont"></i> 搜索</button>
            </div>
        </form>
    </div><br/>
	<!-- <div class="f-14 c-error">特别声明：Highcharts 是一个用纯 JavaScript编写的一个图表库，仅免费提供给个人学习、个人网站，如果在商业项目中使用，请去Highcharts官网网站购买商业授权。或者您也可以选择其他免费的第三方图表插件，例如百度echarts。H-ui.admin不承担任何版权问题。</div> -->
	<div id="container" style="min-width:700px;height:400px"></div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Fun1/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Fun1/Public/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/Fun1/Public/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/Fun1/Public/static/h-ui.admin/js/H-ui.admin.js"></script><!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/Fun1/Public/lib/hcharts/Highcharts/5.0.6/js/highcharts.js"></script>
<script type="text/javascript" src="/Fun1/Public/lib/hcharts/Highcharts/5.0.6/js/modules/exporting.js"></script>
<script src="/Fun1/Public/lib/lhgcalendar.js"></script> <!--日历js-->
<script type="text/javascript">
$(function () {
    $.ajax({
        url : "<?php echo U('Record/record');?>",
        type : 'post',
        //dataType : 'json',
        data : {},
        success : function(e){
            var data = eval('('+e+')');
            var categories = data.categories;
            var articleLogCount = data.articleLogCount;
            var resultLogCount = data.resultLogCount;

            $('#time').val(data.time);
            $('#j').val(data.j + 1);
            $('#articleId').val(data.articleId);
            $('#testId').val(data.testId);
            Highcharts.chart('container', {
                title: {
                    text: '数据统计',
                    x: -20 //center
                },
                subtitle: {
                    text: 'Source: Fun用户数据',
                    x: -20
                },
                xAxis: {
                    categories: categories
                },
                yAxis: {
                    title: {
                        text: '数量 (个)'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: '°C'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                    name: '文章',
                    data: articleLogCount
                }, {
                    name: '测试题',
                    data: resultLogCount
                }]
            });
        },
        error : function(e){
            console.log(e);
            //layer.msg('error!',{icon:1,time:1000});
            alert('网络错误');
        }
    });
});
</script>
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
        var start_time = $('#time').val();
        var start = new Date(start_time.replace("-", "/").replace("-", "/"));

        var date = new Date();
        var Y = date.getFullYear(); 
        var M = (date.getMonth() + 1 < 10 ? '0' + (date.getMonth() + 1) : date.getMonth() + 1);
        var D = date.getDate() < 10 ? '0' + date.getDate() : date.getDate();
        var end_time = Y+'-'+M+'-'+D;
        var end = new Date(end_time.replace("-", "/").replace("-", "/"));
        if(end < start) {
            alert('时间不能大于今天哦！');
            return false;
        }

        var j = $('#j').val();
        var articleId = $('#articleId').val();
        var testId = $('#testId').val();
        var uid = $('#uid').val();
        $.ajax({
            url : "<?php echo U('Record/record');?>",
            type : 'post',
            //dataType : 'json',
            data : {
                time: start_time,
                j: j-1,
                articleId: articleId,
                testId: testId,
                uid: uid,
            },
            success : function(e){
                var data = eval('('+e+')');
                var categories = data.categories;
                var articleLogCount = data.articleLogCount;
                var resultLogCount = data.resultLogCount;
                //console.log(articleLogCount);
                //var categories = data.categories;
                //此为数据插入
                Highcharts.chart('container', {
                title: {
                    text: '数据统计',
                    x: -20 //center
                },
                subtitle: {
                    text: 'Source: Fun用户数据',
                    x: -20
                },
                xAxis: {
                    categories: categories
                },
                yAxis: {
                    title: {
                        text: '数量 (个)'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    valueSuffix: '°C'
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'middle',
                    borderWidth: 0
                },
                series: [{
                    name: '文章',
                    data: articleLogCount
                }, {
                    name: '测试题',
                    data: resultLogCount
                }]
            });
                
            },
            error : function(e){
                console.log(e);
                //layer.msg('error!',{icon:1,time:1000});
                alert('网络错误');
            }
        });

    })
</script>
</body>
</html>