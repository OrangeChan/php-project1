<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>云端控制台</title>
    <link href="/css/styles.css" rel="stylesheet" type="text/css" media="all" />
    <link href="/font/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
    <script src="http://code.jquery.com/jquery-1.4.4.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript">
 $(document).ready(function(){
     $('.ddm').hover(
	   function(){
		 $('.ddl').slideDown();
	   },
	   function(){
		 $('.ddl').slideUp();
	   }
	 );
 });
</script>
    <script type="text/javascript" src="/js/DD_roundies_0.0.2a-min.js"></script>
    <script type="text/javascript">
DD_roundies.addRule('#tabsPanel', '5px 5px 5px 5px', true);

</script>
    <script type="text/javascript" src="/js/script-carasoul.js"></script>
    <script src="/js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
      $(function(){
        $("input, select, button").uniform();
      });
    </script>
    <link rel="stylesheet" href="/css/uniform.defaultstyle2.css" type="text/css" media="screen" />
    <link rel="stylesheet" type="text/css" href="/css/jquery.cleditor.css" />
    <script type="text/javascript" src="/js/jquery.cleditor.js"></script>
    <script type="text/javascript">
      $(document).ready(function() {
        $("#input").cleditor(
			{
				width:        900, // width not including margins, borders or padding
                height:       250, // height not including margins, borders or padding
			}
							 );
      });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            var scntDiv = $('#p_scents');
        var i = $('#p_scents p').size() + 1;
        
        $('#addScnt').live('click', function() {
                $('<p><input type="text" id="ip_' + i +'" size="20" name="ip[]" class="reg" /> <button id="remScnt">Remove</button></p>').appendTo(scntDiv);
                $('#count').val(i);
                i++;
                
                return false;
        });
        
        $('#remScnt').live('click', function() { 
                if( i > 2 ) {
                        $(this).parents('p').remove();
                        i--;
                        $('#count').val(i-1);
                }
                return false;
        });
        });
    </script>
    </head>

    <body class="bgc">
<div id="admin">
      <div id="wrap">
    <div id="head">
          <h1><a href="index.html">云控制台<br />
            <span>二代云服务器</span></a></h1>
          <ul id="menu">
          	<li><a href="#">您好 <?php echo $username; ?> !</a></li>
            <li><a href="/index.php/login/logout">登出</a></li>
          </ul>
                
          <ul id="tablist">
        <li><a href="#a"><span>Dashboard Links</span></a></li>
      </ul>
          <div id="tabsPanel">
        <div id="a" class="tab_content">
              <div class='carousel_container'>
            <div class='left_scroll'><img src='/images/leftArrow.png' alt="" /></div>
            <div class='carousel_inner'>
                  <ul class='carousel_ul'>
                <li>
											<a class="ico1" href='/index.php/vm/viewuservm'></a>
										</li>
										<li>
											<a class="ico2" href='/index.php/changepassword/index'></a>
										</li>
              </ul>
                </div>
            <div class='right_scroll'><img src='/images/rightArrow.png' alt="" /></div>
          </div>
            </div>
        <div id="b" class="tab_content">
              <div class='carousel_container'>
            <div class='left_scroll2'><img src='/images/leftArrow.png' alt="" /></div>
            <div class='carousel_inner'>
                  <ul class='carousel_ul2'>
                <li><a class="ico1" href='#'></a></li>
                <li><a class="ico2" href='#'></a></li>
                <li><a class="ico3" href='#'></a></li>
                <li><a class="ico4" href='#'></a></li>
                <li><a class="ico5" href='#'></a></li>
                <li><a class="ico6" href='#'></a></li>
                <li><a class="ico7" href='#'></a></li>
                <li><a class="ico8" href='#'></a></li>
                <li><a class="ico9" href='#'></a></li>
              </ul>
                </div>
            <div class='right_scroll2'><img src='/images/rightArrow.png' alt="" /></div>
          </div>
            </div>
        <!--Tab End--> 
      </div>
          <img src="/images/shadow.png" class="shadow" alt="" /> </div>
    <!--Content Start-->
    <div id="content">
          <div class="forms">
        <div class="heading">
              <h2>Create user</h2>
              <form class="search" method="get" action="#">
            <input name="search" type="text" value="search" onfocus="if(this.value=='search')this.value=''" onblur="if(this.value=='')this.value='search'" />
            <input name="" type="submit" value="" />
          </form>
            </div>
        
        <?php echo validation_errors(); ?>
        <?php $attributes = array('class' => 'styleForm'); ?>
        <?php echo form_open('users/insert', $attributes) ?>
<p>
	Original Password<br />
	<input type="text" name="old_password" class="reg" />
</p>
<p>
	New Password<br />
	<input type="text" name="password" class="reg" />
</p>

	<input type="submit" name="submit" value="Submit" /> 

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
