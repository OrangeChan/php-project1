
    <!--Content Start-->
    <div id="content">
        <div class="styles">
        <div class="heading">
            <h2><a href="/index.php/vm/index">虚拟机列表</a> >
            <a href=""><?php echo $vm_status['vmname'];?></a>
            </h2>
            <!--<form class="search" method="get" action="#">
            <input name="search" type="text" value="search" onfocus="if(this.value=='search')this.value=''" onblur="if(this.value=='')this.value='search'" />
            <input name="" type="submit" value="" />
          </form>-->	
          </div>
        <h3></h3>
        <div class="inner">
        	<ul class="list-bullets">
        		
        	</ul>
        	
            <ul class="list-styled">
            <?php
echo "<li><strong>名稱</strong><br />" . $vm_status['vmname'] . "</li>";
echo "<li><strong>封包</strong><br />" . $vm_status['package'] . "</li>";
echo "<li><strong>模板</strong><br />" . $vm_status['template'] . "</li>";
echo "<li><strong>開啟時間</strong><br />" . $vm_status['up_time'] . "</li>";
echo "<li><strong>客戶操作系統</strong><br />" . $vm_status['guest_OS'] . "</li>";
echo "<li><strong>記憶體用量</strong><br />" . $vm_status['memory_usage'] . "</li>";
echo "<li><strong>可用記憶體</strong><br />" . $vm_status['memory_available'] . "</li>";
echo "<li><strong>心跳</strong><br />" . $vm_status['heart_beat']  . "</li>";
echo "<li><strong>處理哭數目</strong><br />" . $vm_status['processor_number'] . "</li>";
echo "<li><strong>處理哭負荷</strong><br />" . $vm_status['processor_load'] . "</li>";
?>
          </ul>
          </div>
        
      </div>
      </div>


