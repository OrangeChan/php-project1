
    <!--Content Start-->
    <div id="content">
        <div class="styles">
        <div class="heading">
            <h2><a href="/index.php/vm/index">服务器列表</a> >
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
echo "<li><strong>服务器名称</strong><br />" . $vm_status['vmname'] . "</li>";
echo "<li><strong>服务计划</strong><br />" . $vm_status['package'] . "</li>";
echo "<li><strong>范本</strong><br />" . $vm_status['template'] . "</li>";
echo "<li><strong>运作時間</strong><br />" . $vm_status['up_time'] . "</li>";
echo "<li><strong>操作系統</strong><br />" . $vm_status['guest_OS'] . "</li>";
echo "<li><strong>記憶體分配量</strong><br />" . $vm_status['memory_usage'] . "</li>";
echo "<li><strong>記憶體使用量</strong><br />" . $vm_status['memory_available'] . "</li>";
echo "<li><strong>运行情况</strong><br />" . $vm_status['heart_beat']  . "</li>";
echo "<li><strong>處理器數目</strong><br />" . $vm_status['processor_number'] . "</li>";
echo "<li><strong>處理器負荷</strong><br />" . $vm_status['processor_load'] . "</li>";
?>
          </ul>
          </div>
        
      </div>
      </div>


