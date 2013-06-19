<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>云端控制台</title>
    <link href="/css/styles.css" rel="stylesheet" type="text/css" media="all" />
    <script src="http://code.jquery.com/jquery-1.4.4.js" type="text/javascript" charset="utf-8"></script>
</head>
<body class="bgc">
<div id="admin">
      <div id="wrap">
    <div id="head">
          <h1><a href="index.html">云端控制台<br />
            <span>二代云服务器</span></a></h1>
          <ul id="menu">
          	<li><a href="#">您好 <?php echo $username; ?> !</a></li>
            <li><a href="/index.php/login/logout">登出</a></li>
          </ul>
          <ul id="tablist">
        <li><a href="#a"><span>控制台</span></a></li>    
      </ul>
          <div id="tabsPanel">
        <div id="a" class="tab_content">
              <div class='carousel_container'>
            
            <div class='carousel_inner'>
                  <ul class='carousel_ul'>
                <li><a class="ico1" href='/index.php/vm/index'></a></li>
                <?php
										$session_data = $this -> session -> userdata('logged_in'); 
										if($session_data['level']==3){ ?>
                <li><a class="ico2" href='/index.php/vm/create'></a></li>
                <li><a class="ico3" href='/index.php/users/create'></a></li>
                <li><a class="ico4" href='/index.php/users/index'></a></li>
                <?php } ?>
                <li><a class="ico5" href='/index.php/changepassword/index'></a></li>
              </ul>
                </div>
           
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