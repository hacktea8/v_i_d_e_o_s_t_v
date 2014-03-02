<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<link href="/public/css/admin/style.css" rel="stylesheet" />
<script type="text/javascript" src="/public/js/jquery.js"></script>
<script type="text/javascript" src="/public/js/base.js"></script>
<script type="text/javascript" src="/public/js/json.js"></script>
<script type="text/javascript" src="/public/js/jquery.pngFix.js"></script>
<script type="text/javascript">
<!--
//指定当前组模块URL地址 
var URL = '/admin/yundisk_list';
var ROOT_PATH = '';
var APP	 =	 '/admin/yundisk_list';
var STATIC = '/admin/Tpl/Default/Static';
var VAR_MODULE = 'm';
var VAR_ACTION = 'a';
var CURR_MODULE = 'SharegoodsModule';
var CURR_ACTION = 'index';

//定义JS中使用的语言变量
var CONFIRM_DELETE = '你确定要删除选择项吗？';
var AJAX_LOADING = '提交请求中，请稍候...';
var AJAX_ERROR = 'AJAX请求发生错误！';
var ALREADY_REMOVE = '已删除';
var SEARCH_LOADING = '搜索中...';
var CLICK_EDIT_CONTENT = '点击修改内容';
//-->
</script>
</head>
<body>
	<div class="fanwe-body">
		<div class="fb-title"><div><p><span>云盘接口管理 > 接口列表</span></p></div></div>
		<div class="fb-body">
			<table class="body-table" cellpadding="0" cellspacing="1" border="0">
				<tr>
					<td class="body-table-td">
						<div class="body-table-div">
<script type="text/javascript" src="/public/js/dataList.js"></script>
<div class="handle-btns">
	<div class="img-button "><p><input type="button" id="editData" name="editData" value="编辑" onclick="editData(this,'checkList')" class="editData"></p></div>
</div>
<!-- Think 系统列表组件开始 -->
<table id="checkList" class="table-list list" cellpadding="0" cellspacing="0" border="0">
  <thead>
    <tr>
	  <th width="30" class="first"><input type="checkbox" onclick="checkAll('checkList')"></th><th width="50" >
	  <a href="javascript:sortBy('id','','index')" title="">UID</a></th>
	  <th width="100" ><a href="javascript:void(0);" title="">用户名</a></th>
	  <th width="80" ><a href="javascript:void(0);" title=" ">access_token</a></th>
	  <th width="80" ><a href="javascript:void(0);" title=" ">refresh_token</a></th>
	  <th width="80" ><a href="javascript:void(0);" title=" ">session_key</a></th>
	  <th width="80" ><a href="javascript:void(0);" title=" ">session_secret</a></th>
	  <th width="30" ><a href="javascript:sortBy('sort','','index')" title="按照排序 ">排序</a></th><th width="50" ><a href="javascript:sortBy('status','','index')" title="按照状态 ">状态</a></th><th width="60">操作</th></tr></thead>
  <tbody>
    <?php foreach($list as $val){?>
<tr ="" class="">
  <td class="first"><input type="checkbox" name="key"	value="<?php echo $val['uid'];?>"></td>
  <td ><?php echo $val['uid'];?></td>
  <td align="left" >
    <span class="pointer" module="AlbumCategory" href="javascript:;" onclick="textEdit(this,'<?php echo $val['uid'];?>','name')"><?php echo $val['uname'];?></span></td>
   <td ><span class="pointer" module="AlbumCategory" href="javascript:;" ><?php echo $val['access_token'];?></span></td>
   <td ><span class="pointer" module="AlbumCategory" href="javascript:;" ><?php echo $val['refresh_token'];?></span></td>
   <td ><span class="pointer" module="AlbumCategory" href="javascript:;" ><?php echo $val['session_key'];?></span></td>
   <td ><span class="pointer" module="AlbumCategory" href="javascript:;" ><?php echo $val['session_secret'];?></span></td>
   <td ><span class="pointer" module="AlbumCategory" href="javascript:;" ><?php echo $val['sort'];?></span></td>
  <td ><span class="pointer" module="AlbumCategory" href="javascript:;" onclick="toggleStatus(this,'<?php echo $val['uid'];?>','status')"><img status="<?php echo $val['flag'];?>" title="<?php echo $val['flag'];?>" alt="<?php echo $val['flag'];?>" src="/public/images/status-<?php echo $val['flag'];?>.gif" /></span></td>
  <td><a href="/admin/yundisk_detail/<?php echo $val['uid'];?>">编辑</a>&nbsp;&nbsp;<a href="javascript:;" onclick="">删除</a>&nbsp;&nbsp;</td></tr>
<?php }?>
  </tbody>
</table>
<!-- Think 系统列表组件结束 -->

<div class="pager"><strong><?php echo $ptotal;?></strong> 条记录&nbsp;│&nbsp;<strong><?php echo $psize;?></strong> / 1 页&nbsp;│&nbsp;<?php echo $pagestr;?>  </div>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="ajax-loading"></div>
</body>
<script type="text/javascript">
jQuery(function($){
	updateBodyDivHeight();
	$(window).resize(function(){
		updateBodyDivHeight();
	});
});

function updateBodyDivHeight()
{
	jQuery(".body-table-div").height(jQuery(".fanwe-body").height() - 36);
	if(jQuery(".body-table-div").get(0).scrollHeight > jQuery(".body-table-div").height())
	{
		var width = jQuery(".body-table-div").width() - 16;
		jQuery(".body-table-div > *").each(function(){
			if(!$(this).hasClass('ajax-loading'))
			{
				$(this).width(width)	
			}
		});
	}
}
</script>
</html>
