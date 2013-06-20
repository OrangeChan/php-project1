<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title> | Conjure Admin</title>
  <link href="/css/styles.css" rel="stylesheet" type="text/css" media="all" />
  <link href="/font/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
  <script src="/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
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
  <link rel="stylesheet" href="/css/uniform.default.css" type="text/css" media="screen" />
  <link href="/css/jquery-ui.css" rel="stylesheet" type="text/css"/>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
  <script type="text/javascript" src="/js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="/js/jquery-ui.min2.js"></script>
  <script type="text/javascript">
  $(document).ready(function() {
    $("#progressbar").progressbar({ value: 60 });
	$("#progressbara").progressbarA({ value: 60 });
	$("#progressbarb").progressbarB({ value: 60 });
  });
  </script>
  <script type="text/javascript">
  $(document).ready(function() {
	if ($(".cont").is(":hidden")) {
		$(".lin").addClass("close");
		
	} else {
		$(".lin").removeClass("open");
		};
	 
	 $(".lin").click( function() {
			if ($(".cont").is(":hidden")) {
				$(".lin").html('<p>Content Open</p>');
				$(".cont").slideDown(500);
				
				$(".lin").addClass("open");
				$(".lin").removeClass("close");
				
			} else {
				$(".lin").html('<p>Content Closed</p>');
				$(".cont").slideUp(500);
				$(".lin").addClass("close");
				$(".lin").removeClass("open");
				$("#openCloseIdentifier").hide();
			}
		});  
	 
	 
	 
	 if ($(".cont2").is(":hidden")) {
		$(".lin2").addClass("close");
		
	} else {
		$(".lin2").addClass("open");
		};
	 
	 $(".lin2").click( function() {
			if ($(".cont2").is(":hidden")) {
				$(".lin2").html('<p>Content Open</p>');
				$(".cont2").slideDown(500);
				
				$(".lin2").addClass("open");
				$(".lin2").removeClass("close");
				
			} else {
				$(".lin2").html('<p>Content Closed</p>');
				$(".cont2").slideUp(500);
				$(".lin2").addClass("close");
				$(".lin2").removeClass("open");
				$("#openCloseIdentifier").hide();
			}
		}); 
	 $('.toolTip').mouseover(function(){
		$('span', this).fadeIn(500)
								  });
	 $('.toolTip').mouseout(function(){
		$('span', this).fadeOut(500)
								  })
  });
  </script>
  </head>

  <body class="bgc">
<div id="admin">
    <div id="wrap">
    <div id="head">
        <h1><a href="index.html">conjure admin<br />
          <span>ADMIN TEMPLATE</span></a></h1>
        <ul id="menu">
        <li><a href="dashboard.html">Dashboard</a></li>
        <li><a href="styles.html">Styles</a></li>
        <li><a href="forms.html">Forms</a></li>
        <li><a href="#">Table Data</a></li>
        <li class="ddm"><a>Multi-Level Menu</a>
            <ul class="ddl">
            <li><a href="#">Multi-Level Menu</a></li>
            <li><a href="#">Documentation</a></li>
            <li><a href="#">FAQ'S</a></li>
            <li><a href="#">Contact</a></li>
          </ul>
          </li>
      </ul>
        <ul id="tablist">
        <li><a href="#a"><span>Dashboard Links</span></a></li>
        <li><a href="#b"><span>Image Gallery</span></a></li>
      </ul>
        <div id="tabsPanel">
        <div id="a" class="tab_content">
            <div class='carousel_container'>
            <div class='left_scroll'><img src='/images/leftArrow.png' alt="" /></div>
            <div class='carousel_inner'>
                <ul class='carousel_ul'>
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
        <div class="styles">
        <div class="heading">
            <h2><a href="/index.php/vm/index">VM List</a> >
            <a href=""><?php echo $vm['vmname'];?></a>
            </h2>
            <form class="search" method="get" action="#">
            <input name="search" type="text" value="search" onfocus="if(this.value=='search')this.value=''" onblur="if(this.value=='')this.value='search'" />
            <input name="" type="submit" value="" />
          </form>
          </div>
        <h3>List Styles</h3>
        <div class="inner">
        	<ul class="list-bullets">
        		
        	</ul>
        	
            <ul class="list-styled">
            	
            <?php 
            echo form_open('vm/update');?>
<li><strong>Name</strong><br /><input type='input' name='vmname' value='<?php echo $vm['vmname'];?>' /></li>
<li><strong>User</strong><br /><select name = "uid">
	<?php
		foreach($users as $user_item){
			echo "<option value='" . $user_item['uid'] . "'>" . $user_item['email'] . "</option>";
		}
	?>
	</select><br /></li>

<li>
<label for="package"><strong>Package</strong></label> <br />
	<select name = "package">
	<?php
		foreach($package as $package_item){
			echo "<option value='" . $package_item['pid'] . "' ";
			if($package_item['pid']==$vm['package'])
				echo "selected";
			echo ">" . $package_item['package_name'] . "</option>";
		}
	?>
	</select><br />
</li>
	<li>
	<label for="template"><strong>Template</strong></label> <br />
	<select name = "template">
	<?php
		foreach($template as $template_item){
			echo "<option value='" . $template_item['tid'] . "' ";
			if($template_item['tid']==$vm['template'])
				echo "selected";
			echo ">" . $template_item['template_name'] . "</option>";
		}
	?>
	</select><br />
</li>

<input type="hidden" name="vmid" value="<?php echo $vm['vmid']; ?>" /> 	
<li><input type="submit" name="submit" value="Submit" /> </li>
</form>
          </ul>
          </div>
        
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
