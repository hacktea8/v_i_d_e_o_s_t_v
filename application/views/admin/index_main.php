	<div class="fanwe-body">
		<div class="fb-title"><div><p><span>分享 > 分享列表</span></p></div></div>
		<div class="fb-body">
			<table class="body-table" cellpadding="0" cellspacing="1" border="0">
				<tr>
					<td class="body-table-td">
						<div class="body-table-div">
<div class="handle-btns">
	<div class="img-button "><p><input type="button" id="editShare" name="editShare" value="编辑" onclick="editData(this,'checkList','share_id')" class="editShare"></p></div>
	<div class="img-button "><p><input type="button" id="removeShare" name="removeShare" value="删除" onclick="removeData(this,'checkList')" class="removeShare"></p></div>
</div>
<div class="search-box">
    <form action="/admin/index.php">
		<span>分享内容</span>
		<input class="textinput" type="text" value="" name="keyword" size="12" />
		<small></small>
		<span>用户名</span>
		<input class="textinput" type="text" value="" name="uname" id="user_name" size="8" />
		<small></small>
		<span>分享类型</span>
		<select name="type">
			<option value="all"  >全部</option>
			<option value="default"  >默认分享</option>
			
			<!--<option value="ask"  >问答</option>-->
			<!--<option value="ershou"  >二手</option>-->
			<!--<option value="fav"  >喜欢分享</option>-->
			<!--<option value="comments"  >分享评论</option>-->
			<!--<option value="ask_post"  >问答回复</option>
			<option value="bar"  >主题</option>
			<option value="bar_post"  >主题回复</option>
			-->
			
			<option value="album"  >杂志社</option>
			<option value="album_item"  >杂志社分享</option>
			<option value="album_best"  >推荐杂志社</option>
		</select>
		<small></small>
		<span>分享数据</span>
		<select name="share_data">
			<option value="default"  >无图分享</option>
			<option value="img" selected="selected" >有图分享</option>
			<!--<option value="goods"  >商品</option>-->
			<option value="photo"  >图片</option>
			<!--<option value="goods_photo"  >商品+图片</option>-->
		</select>
		<!--  
		<small></small>
		<span>分享分类</span>
		<select name="cate_id">
			<option value="0" selected="selected" >全部</option>
			<option value="-1"  >无分类</option>
			<option value="2"  >|--&nbsp;&nbsp;上装</option><option value="14"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;T台热荐</option><option value="15"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;潮流趋势</option><option value="16"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;最夯风格</option><option value="17"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;专属衣厨</option><option value="18"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;内衣</option><option value="3"  >|--&nbsp;&nbsp;下装</option><option value="19"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;流行元素</option><option value="20"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;裙子vs裤子</option><option value="21"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;牛仔很忙</option><option value="4"  >|--&nbsp;&nbsp;鞋子</option><option value="22"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;类别</option><option value="23"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;鞋型</option><option value="24"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;风格&元素</option><option value="25"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;流行大集合</option><option value="5"  >|--&nbsp;&nbsp;包包</option><option value="26"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;有型有款</option><option value="27"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;风格&元素</option><option value="28"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;潮流风向标</option><option value="6"  >|--&nbsp;&nbsp;配饰</option><option value="29"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;配件</option><option value="30"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;风格</option><option value="31"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;元素</option><option value="7"  >|--&nbsp;&nbsp;美妆</option><option value="32"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;护肤</option><option value="33"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;彩妆</option><option value="34"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;热门品牌</option><option value="35"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;热门讨论</option><option value="8"  >|--&nbsp;&nbsp;家居</option><option value="36"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;生活&趣玩</option><option value="37"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;瓶瓶&罐罐</option><option value="38"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;文具控</option><option value="39"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;收纳控</option><option value="40"  >&nbsp;&nbsp;&nbsp;&nbsp;|--&nbsp;&nbsp;数码控</option>		</select>
		-->
		<small></small>
		<span>审核</span>
		<select name="status">
			<option value="-1"  >全部</option>
			<option value="0" selected="selected" >未审核</option>
			<option value="1"  >已审核</option>
		</select>
		<input class="submit_btn" type="submit" value="搜索" />
		<input type="hidden" name="m" value="Share" />
		<input type="hidden" name="a" value="index" />
	</form>
</div>
<!-- Think 系统列表组件开始 -->
<table id="checkList" class="table-list list" cellpadding="0" cellspacing="0" border="0"><thead><tr><th width="30" class="first"><input type="checkbox" onclick="checkAll('checkList')"></th><th width="50" ><a href="javascript:sortBy('share_id','','index')" title="按照编号 ">编号</a></th><th ><a href="javascript:sortBy('content','','index')" title="按照分享内容 ">分享内容</a></th><th width="100" ><a href="javascript:sortBy('cate_name','','index')" title="按照分享分类 ">分享分类</a></th><th width="100" ><a href="javascript:sortBy('user_name','','index')" title="按照用户名 ">用户名</a></th><th width="100" ><a href="javascript:sortBy('create_time','','index')" title="按照发布时间 ">发布时间</a></th><th width="30" ><a href="javascript:sortBy('collect_count','','index')" title="按照喜欢 ">喜欢</a></th><th width="30" ><a href="javascript:sortBy('relay_count','','index')" title="按照转发 ">转发</a></th><th width="90" ><a href="javascript:sortBy('comment_count','','index')" title="按照评论 ">评论</a></th><th width="90" ><a href="javascript:sortBy('type','','index')" title="按照分享类型 ">分享类型</a></th><th width="90" ><a href="javascript:sortBy('share_data','','index')" title="按照分享数据 ">分享数据</a></th><th width="60" ><a href="javascript:sortBy('status','','index')" title="按照审核 ">审核</a></th><th width="80">操作</th></tr></thead><tbody></tbody></table>
<!-- Think 系统列表组件结束 -->

<div class="pager"></div>
						</div>
					</td>
				</tr>
			</table>
		</div>
	</div>
	<div class="ajax-loading"></div>
