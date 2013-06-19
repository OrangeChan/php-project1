<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>云端控制台</title>
    <link href="<?php echo base_url();?>font/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo base_url();?>js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(function(){
        $("input").uniform();
		$('.sign').click(function(){
			$('.message').fadeIn();
		})
		$('.message').click(function(){
			$('.message').fadeOut();
		})
      });
    </script>
    <link rel="stylesheet" href="<?php echo base_url();?>css/uniform.default.css" type="text/css" media="screen" />
    <link href="<?php echo base_url();?>css/styles.css" rel="stylesheet" type="text/css" media="all" />
    </head>

    <body>
<div id="login">
      <div id="log-Sup">
    <div id="logWrap">
          <h1>conjure admin<br />
        <span>ADMIN TEMPLATE</span></h1>
          <div id="LogPannel">
        <h2>Reset Password</h2>
        <?php echo validation_errors();
   
   echo form_open('resetpassword/resetpw'); ?>
              <input name="username" type="text" value="Username" onfocus="if(this.value=='Username')this.value=''" onblur="if(this.value=='')this.value='Username'" />
              <input name="submit" type="submit" value="Submit" />
            </form>
      </div>
        </div>
  </div>
      <div class="push"></div>
    </div>
<div id="foot">
      <p>© Conjure Admin. All rights reserved.  |  Designed by: <a href="http://www..com" target="_blank">Template World</a></p>
    </div>
</body>
</html>
