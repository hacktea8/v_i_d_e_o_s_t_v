<div class="mainDiv">
    <div class="leftDiv">
        <div class="box_7">
            <div style="height:25px" class="titleDiv">
                <h1>更新资料</h1>
            </div>
            <div class="main" style="padding:10px;">
                <div style="margin-top:10px;padding:3px;background: #ffffd8">请以<span class="red">第三人称</span>撰写，保持中立观点，并遵守我们的规定，帮助保持页面清洁。</div>
<div class="clear"></div>
<br>

<style type="text/css">
#myform {padding-left:78px;}
#myform td{ padding: 3px; }
</style>

<form method="post" name="myform" id="myform" onsubmit="post_entry();return false;" onkeydown="" action="/edite/index/<?php echo $_a;?>">
    <input type="hidden" name="header[id]" value="<?php echo @$info['id'];?>">
    <input type="hidden" name="header[uid]" value="<?php echo @$uinfo['uid'];?>">
    <table border="0" cellpadding="3" cellspacing="0">
    <tbody><tr>
        <td style="width:70px;font-size:14px;">分类:</td>
        <td style="font-weight:bold;">
<select id="parentcate">
<option value = "0">--请选择分类--</option>
<?php foreach($rootCate as $val){ ?>
<option value = "<?php echo $val['id'];?>" <?php echo $val['id'] === $pid ? 'selected = "selected" ': ''; ?>><?php echo $val['name'];?></option>
<?php } ?>
</select>
<select name="header[cid]" id="cateid">
<?php foreach($subCate as $val){ ?>
<option value = "<?php echo $val['id'];?>" <?php echo $val['id'] === $info['cid'] ? 'selected = "selected" ': ''; ?>><?php echo $val['name'];?></option>
<?php } ?>
</select></td>
    </tr>
	<tr>
        <td style="width:70px;font-size:14px;">中文名称:</td>
        <td><input type="text" id="cname" name="header[name]" value="<?php echo $info['name'];?>" class="input_1" style="width:200px"></td>
    </tr>
    <tr>
        <td style="font-size:14px;">资料封面:</td>
        <td><input type="text" id="cover" name="header[cover]" value="<?php echo @$info['cover'];?>" class="input_1" style="width:200px"></td>
    </tr>
    <tr>
        <td><img src="<?php echo $imguploadapiurl,@$info['cover'];?>" id="showcover"></td>
    </tr>
    <tr valign="top">
        <td style="font-size:14px;">封面上传:</td>
        <td><button id="uploadbtn">点我上传</button></td>
        <?php require 'upload_post.php';?>
    </tr>
    <tr>
        <td style="font-size:14px;">标签:</td>
        <td><input type="text" id="alias" name="header[tags]" value="<?php echo @$info['keyword'];?>" class="input_1" style="width:200px"><span class="red">(以英文逗号分隔,长度6个汉字以内)</span></td>
    </tr>
    <tr>
        <td style="font-size:14px;" valign="top">简介:</td>
        <td><?php $key_name = 'intro';$editor_name = 'body[intro]';require 'wind_editor.php';?></td>
    </tr>
    <tr>
        <td style="font-size:14px;" valign="top">普通下载地址:</td>
        <td><?php $key_name = 'downurl';$editor_name = 'body[downurl]';require 'wind_editor.php';?></td>
    </tr>
    <tr>
        <td style="font-size:14px;" valign="top">VIP下载地址:</td>
        <td><?php $key_name = 'vipdwurl';$editor_name = 'body[vipdwurl]';require 'wind_editor.php';?></td>
    </tr>
    <tr>
        <td style="font-size:14px;" valign="top"></td>
        <td height="50">
        <input type="submit" class="button" id="submit_button" value="保存">
<?php if(0){ ?>
        <input type="checkbox" value="1" checked="true" id="smartgbk" name="smartgbk">
        <label for="smartgbk">自动转换繁体字为简体</label>
<?php } ?>
        </td>
    </tr>
    </tbody></table>
    <script type="text/javascript">
    setTimeout('Sizzle("#submit_button")[0].disabled=false;',10);
    </script>
</form>


            </div>
        </div>
    </div>
    <div class="rightDiv">
        <div class="box_7">
            <div class="main" style="padding:0 10px 10px;">
                <div id="postNote" style="position: static; width: auto;">
    <h4>请在编辑前阅读以下说明：</h4>
    <div id="interdiction">
        <p>1、提交的内容不得违反版权规定。</p>
		<p>2、描述应以第三人称撰写，内容属实而无偏见，无个人观点。</p>
		<p>3、本页面用于书写内容，不可放入其他网站的链接。</p>
    </div>
    <h4>禁止发布:</h4>
    <div id="interdiction">
        <p>1、禁止添加色情，反动的内容。</p>
    	<p>2、禁止添加与资料内容无关的广告和链接。</p>
    	<p>3、禁止创建非电影、剧集、动漫、综艺、游戏、公开课资料。</p>
    	<p>4、禁止创建已经存在的重复资料。</p>
    </div>
    <h4>发布指南:</h4>
    <div id="policy">
        <p>1、所有填写内容必须为简体中文。</p>
        <p>2、中文名以大陆官方为准，无官方中文名则以大陆地区约定俗成的翻译为准。</p>
        <p>3、英文名以官方原名为准，若无官方英文名则可不填写，中文拼音（包括拼音首字母）不作为英文名。</p>
        <p>4、非英文原名、其他译名以及简称应填入别名栏，多个名称时以半角“,”分隔。</p>
        <p>5、发行时间需精确到日期，并且填写最早发行时间。</p>
        <p>6、导演、编剧、原作、演员、主持人、讲师或者制作发行公司存在多个时，一行一个。</p>
        <p>7、学院名称必须填写完整。如“哈佛大学”，不可简写为“哈佛”。学院名不可填写英文名。</p>
        <p>8、官网链接一定指向官方主页，不可填写其他资料站链接，若无官方网站可不填。</p>
        <p>9、语言以及地区以制作或发行公司所在地区为准，若无官方中文，则不选择中文选项。</p>
        <p>10、简介必须为简体中文，主要以介绍为主，不可填写个人评论，不可重复填写上方表单中已填写的内容。</p>
        <p>11、资料内容为转载时，必须填上转载来源的网页地址。</p>
    </div>
</div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
