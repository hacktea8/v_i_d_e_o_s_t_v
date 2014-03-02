<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $web_title;?></title>
<link href="<?php echo $css_url;?>style.css" rel="stylesheet" />
<script type="text/javascript" src="<?php echo $js_url;?>jquery.js"></script>
<?php if('index_main' == $_a){ ?>
<script type="text/javascript" src="<?php echo $js_url;?>base.js"></script>
<script type="text/javascript" src="<?php echo $js_url;?>json.js"></script>
<script type="text/javascript" src="<?php echo $js_url;?>jquery.pngFix.js"></script>
<script type="text/javascript">
<!--
//指定当前组模块URL地址 
var URL = '/<?php echo $_c;?>/<?php echo $_a;?>';
var ROOT_PATH = '';
var APP	 =	 '/';
var STATIC = '/';
var VAR_MODULE = 'c';
var VAR_ACTION = 'a';
var CURR_MODULE = '<?php echo $_c;?>';
var CURR_ACTION = '<?php echo $_a;?>';

//定义JS中使用的语言变量
var CONFIRM_DELETE = '删除后将不可恢复，确定删除吗？';
var AJAX_LOADING = '提交请求中，请稍候...';
var AJAX_ERROR = 'AJAX请求发生错误！';
var ALREADY_REMOVE = '已删除';
var SEARCH_LOADING = '搜索中...';
var CLICK_EDIT_CONTENT = '点击修改内容';
//-->
</script>
<?php } ?>
</head>
<body style="
<?php if('index_top' == $_a){ echo 'background:#99A2B3;'; 
}elseif('index_change' == $_a){ echo 'background:#fff;';
}elseif('index_left' == $_a){echo 'background:#DEE4ED; overflow:hidden; overflow-y:scroll;';} ?>padding:0">
