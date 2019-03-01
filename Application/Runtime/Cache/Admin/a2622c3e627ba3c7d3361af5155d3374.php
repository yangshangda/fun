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
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/skin/yellow/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/static/h-ui.admin/css/style.css" />
<link rel="stylesheet" type="text/css" href="/Fun1/Public/lib/css/lhgcalendar.css" /><!--日历样式-->
<title>柱状图统计</title>
<!-- <link href="/Fun1/Public/ueditor/themes/default/css/umeditor.min.css" rel="stylesheet" />
<script src="/Fun1/Public/ueditor/third-party/jquery.min.js"></script>
<script src="/Fun1/Public/ueditor/umeditor.config.js"></script>
<script src="/Fun1/Public/ueditor/umeditor.min.js"></script>
<script src="/Fun1/Public/ueditor/lang/zh-cn/zh-cn.js"></script> -->

</head>
<body>
<nav class="breadcrumb"><i class="Hui-iconfont">&#xe67f;</i> 首页 <span class="c-gray en">&gt;</span> 统计管理 <span class="c-gray en">&gt;</span> 柱状图统计 <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
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

	<div id="container" style="min-width:700px;height:400px"></div>
</div>
<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/Fun1/Public/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Fun1/Public/lib/layer/2.4/layer.js"></script>
<!-- <script type="text/javascript" src="/Fun1/Public/li<!-- b/layer/2.4/layer.js"></script> -->
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

            //console.log(articleLogCount);
            //var categories = data.categories;
            //此为数据插入
            $('#container').highcharts({
                chart: {
                    type: 'column'
                },
                title: {
                    text: '数据统计'
                },
                subtitle: {
                    text: 'Source: Fun用户数据'
                },
                xAxis: {
                    categories:categories
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: '数量 (个)'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} 个</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: '文章',
                    data: articleLogCount

                }, {
                    name: '测试题',
                    data: resultLogCount

                }]
            });//数据插入结束
            
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
                $('#container').highcharts({
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: '数据统计'
                    },
                    subtitle: {
                        text: 'Source: Fun用户数据'
                    },
                    xAxis: {
                        categories:categories
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: '数量 (个)'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                            '<td style="padding:0"><b>{point.y:.1f} 个</b></td></tr>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [{
                        name: '文章',
                        data: articleLogCount

                    }, {
                        name: '测试题',
                        data: resultLogCount

                    }]
                });//数据插入结束
                
            },
            error : function(e){
                console.log(e);
                //layer.msg('error!',{icon:1,time:1000});
                alert('网络错误');
            }
        });

    })
</script>

<script type="text/javascript">
// $('#submit').click(function(){
//     alert('该管理员已被拉黑！');
// })
</script>
</body>
</html>