<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<!--HTML Header Start-->
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>云端控制台</title>
    <link href="<?php echo base_url();?>css/styles.css" rel="stylesheet" type="text/css" media="all" />
    </head>
	<!--HTML Header End-->
	<!--HTML Body Start-->
    <body>
<div id="login">
	<div id="log-Sup">
    	<div id="logWrap">
        <h1>云端控制台<br /><span>二代云服务器</span></h1>
        <div id="LogPannel">
        	<h2>登入</h2>
   			<?php echo form_open('verifylogin'); ?>
              <input name="username" type="text" value="电邮地址" onfocus="if(this.value=='电邮地址')this.value=''" onblur="if(this.value=='')this.value='电邮地址'" />
              <input name="password" type="password" value="密码" onfocus="if(this.value=='密码')this.value=''" onblur="if(this.value=='')this.value='密码'" />
              <input name="submit" type="submit" value="登入" />
              
              <!-- <p><a class="sign" href="/index.php/resetpassword/index">忘记密码</a>?</p> -->
          </form>  
        <div class="message">
              <p><?php echo validation_errors(); //display message for $this->form_validation->set_message ?></p>
            </div>
      </div>
        </div>
  </div>
      <div class="push"></div>
    </div>
<div id="foot">
      <p>云端控制台 | 二代云服务器 2013</p>
    </div>
</body>
<!--HTML Body End-->
</html>
