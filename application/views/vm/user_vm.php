<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>云端控制台</title>
		<link href="/css/styles.css" rel="stylesheet" type="text/css" media="all" />
		<link href="/font/stylesheet.css" rel="stylesheet" type="text/css" media="all" />
		<script src="/js/jquery.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/js/jquery.uniform.js" type="text/javascript" charset="utf-8"></script>
		<script type="text/javascript" charset="utf-8">
			$(function() {
				$("input, select").uniform();
			});
		</script>
		<link rel="stylesheet" href="/css/uniform.defaultstyle3.css" type="text/css" media="screen" />
		<script src="/YUI/2.6.0/build/yahoo-dom-event/yahoo-dom-event.js" type="text/javascript"></script>
		<script src="/YUI/2.6.0/build/calendar/calendar-min.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(document).ready(function() {
				$('.ddm').hover(function() {
					$('.ddl').slideDown();
				}, function() {
					$('.ddl').slideUp();
				});
			});
		</script>
		<script type="text/javascript" src="/js/DD_roundies_0.0.2a-min.js"></script>
		<script type="text/javascript">
			DD_roundies.addRule('#tabsPanel', '5px 5px 5px 5px', true);

		</script>
		<script type="text/javascript" src="/js/script-carasoul.js"></script>
		<link href="/YUI/2.6.0/build/fonts/fonts-min.css" rel="stylesheet" type="text/css" />
		<link href="/YUI/2.6.0/build/calendar/assets/skins/sam/calendar.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript">
			$(document).ready(function() {

				$('#checkall').live('click', function() {

					$('.chkl').each(function() {
						$(this).attr('checked', $(this).is(':checked') ? '' : 'checked');
					}).trigger('change');

				});
				$('#checkall').click(function() {

					$('span').toggleClass('checked');
					$('#checkall').toggleClass('clicked');

				});
			});
		</script>
	</head>
	<body class="bgc">
		<div id="admin">
			<div id="wrap">
				<div id="head">
					<h1><a href="index.html">控制版面
					<br />
					<span></span></a></h1>
					<ul id="menu">
          	<li><a href="#">您好 <?php echo $username; ?> !</a></li>
            <li><a href="/index.php/login/logout">登出</a></li>
          </ul>
					<ul id="tablist">
						<li>
							<a href="#a"><span>选单</span></a>
						</li>
						
					</ul>
					<div id="tabsPanel">
						<div id="a" class="tab_content">
							<div class='carousel_container'>
								<div class='left_scroll'><img src='/images/leftArrow.png' alt="" />
								</div>
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
								<div class='right_scroll'><img src='/images/rightArrow.png' alt="" />
								</div>
							</div>
						</div>
						<div id="b" class="tab_content">
							<div class='carousel_container'>
								<div class='left_scroll2'><img src='/images/leftArrow.png' alt="" />
								</div>
								<div class='carousel_inner'>
									<ul class='carousel_ul2'>
										<li>
											<a class="ico1" href='#'></a>
										</li>
										<li>
											<a class="ico2" href='#'></a>
										</li>
										<li>
											<a class="ico3" href='#'></a>
										</li>
										<li>
											<a class="ico4" href='#'></a>
										</li>
										<li>
											<a class="ico5" href='#'></a>
										</li>
										<li>
											<a class="ico6" href='#'></a>
										</li>
										<li>
											<a class="ico7" href='#'></a>
										</li>
										<li>
											<a class="ico8" href='#'></a>
										</li>
										<li>
											<a class="ico9" href='#'></a>
										</li>
									</ul>
								</div>
								<div class='right_scroll2'><img src='/images/rightArrow.png' alt="" />
								</div>
							</div>
						</div>
						<!--Tab End-->
					</div>
					<img src="/images/shadow.png" class="shadow" alt="" />
				</div>
				<!--Content Start-->
				<div id="content">
					<div class="datalist">
						<div class="heading">
							<a href=""><h2>VM 列表</h2></a>
							<!--<select name="sort">
								<option>Sort By</option>
								<option>Option1</option>
								<option>Option2</option>
							</select>-->
						</div>
						<ul id="lst">
							<li>
								<div class="chk">
									<a id="checkall"></a>
								</div>
								<p class="title">
									<strong>封包</strong>
								</p>
								<p class="descripHead">
									客戶操作系統
								</p>
								<p class="incHead">
									IP
								</p>
								<p class="decHead">
									模板
								</p>
								<p class="editHead">
									操作
								</p>
							</li>								
								<?php foreach ($user_vm as $vm_item){ ?>
									 <li class="odd">
							<div class="chk">
									<label>
										<input class="chkl" type="checkbox" name="chk" value="checkbox" />
									</label>
								</div>
   <p class="title"><?php echo htmlspecialchars($vm_item['package']) ?></p>
    	<p class="descrip"><?php echo htmlspecialchars($vm_item['guest_OS']) ?></p>
    	<p class="inc"><?php
    	 foreach($vm_item['ip'] as $ip){
    	 	echo $ip."<br />";
		 } 
    	 ?></p>
    	<p class="dec"><?php echo htmlspecialchars($vm_item['template']) ?></p>
    	<p class="edit"><a href="/index.php/vm/start/<?php echo htmlspecialchars($vm_item['vmname']); ?>">开机</a>
    	<a href="/index.php/vm/stop/<?php echo htmlspecialchars($vm_item['vmname']); ?>">关机</a>
    	<a href="/index.php/vm/status/<?php echo htmlspecialchars($vm_item['vmname']); ?>">状况</a>
    	<a href="/index.php/vm/reboot/<?php echo htmlspecialchars($vm_item['vmname']); ?>">重启</a></p></li>
   
   

<?php } ?>
								
						</ul>
					</div>
					<img src="/images/sepLine.png" alt="" class="sepline" />

				</div>
			</div>
			<div class="push"></div>
		</div>
		<div id="foot">
			<p>
				© Conjure Admin. All rights reserved.  |  Designed by: <a href="http://www..com" target="_blank">Template World</a>
			</p>
		</div>
	</body>
</html>
