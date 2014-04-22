<div class="main">
      <div class="container container-custom">
        <div class="register-progress clearfix">
          <div class="pross pross-ok"><span class="index">1</span>填写注册信息
            <div class="pross-dir"><span class="outside"></span><span class="inside"></span></div>
          </div>
          <div class="pross"><span class="index">2</span>邮箱激活
            <div class="pross-dir"><span class="outside"></span><span class="inside"></span></div>
          </div>
          <div class="pross"><span class="index">3</span>注册成功
          </div>
        </div>
        <div class="register-info">
          <h3><span class="icon"></span>注册帐号</h3>
          <div class="user-info">
            <form method="post" action="/member/logining" name="userform" id="fm1">
             <input type="hidden" value="register" name="postdata[action]">
              <span></span>
              <ul>
                <li><span>用户名</span>
                  <input type="text" value="" class="user-name" tabindex="1" name="postdata[uname]" id="username">
                </li>
                <li><span>登录邮箱</span>
                  <input type="text" value="" class="email" tabindex="2" name="postdata[email]" id="email">
                </li>
                <li><span>登录密码</span>
                  <input type="password" value="" class="password main-password" tabindex="3" name="postdata[upwd]" id="password">
                </li>
                <li><span>再输入一次</span>
                  <input type="password" id="confirmpassword" name="postdata[confirmupwd]" class="password password-agin" tabindex="4">
                </li>
                <li>
                	<div>
                	<span class="code-title">验证码</span>
                    	<input type="text" value="" class="code" tabindex="5" name="validateCode" id="validateCode">
                  </div>
                  <div class="clearfix">
                  	<img class="code-img" id="yanzheng" src="/ajax/verifyhandler.ashx">
                  	<a class="change-code" href="javascript:void(0);"> 看不清？换一张 </a>
                  </div>
                </li>
                <li class="provision-item">
                	<span></span>
                	<span class="provision">
                    	<input type="checkbox" checked="checked" accesskey="w" tabindex="6" name="agree" id="agree">
                    	我已仔细阅读并接受
                    	<a target="_blank" href="/html/registration-policy.html">CSDN注册条款</a>
                    </span>
                </li>
                <li class="next-btn">
                	<span></span>
                	<input type="button" tabindex="7" value="下一步" class="next-step">
                </li>
              </ul>
            </form>
          </div>
          <div class="tooltip-info" id="tooltip"><span class="icon-border"></span><span class="icon-bg"></span><span class="strength"><em class="level">低</em><span></span><span></span><span></span></span><span class="state"></span><span class="mess"></span></div>        </div>      </div>
    </div>
