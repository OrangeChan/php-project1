<!--Content Start-->
<div id="content">
	<div class="datalist">
		<div class="heading">
			<a href=""><h2><?php echo $title; ?></h2></a>
		</div>
		<ul id="lst">
			<li>
			<div class="chk">
			<!--<a id="checkall"></a>-->
			</div>
			<p class="title"><strong>服务计划</strong></p>
			<p class="descripHead">操作系统</p>
			<p class="incHead">IP地址</p>
			<p class="decHead">范本</p>
			<p class="editHead">操作</p>
			</li>								
			<?php foreach ($vm as $vm_item){ ?>
			<li class="odd">
					<div class="chk">
					<label>
					<?php
					$session_data = $this -> session -> userdata('logged_in'); 
					if($session_data['level']==3){ ?>
					<a href="/index.php/vm/edit/<?php echo htmlspecialchars($vm_item['vmid']); ?>"><img src="/images/editIco.png" alt="edit" /></a>
					<a href="#" onClick="checkbox(<?php echo htmlspecialchars($vm_item['vmid']); ?>)"><img src="/images/deletIco.png" alt="delete" /></a>
					<?php }?>						
					</label>
					</div>
   			
		   			<p class="title"><?php echo htmlspecialchars($vm_item['package']) ?></p>
		    		<p class="descrip"><?php echo htmlspecialchars($vm_item['guest_OS']) ?></p>
		    		<p class="inc"><?php
		    	 		foreach($vm_item['ip'] as $ip){
		    	 			echo $ip."<br />";
						 }?>
					</p>
		    		<p class="dec"><?php echo htmlspecialchars($vm_item['template']) ?></p>
		    		<p class="edit"><a href="/index.php/vm/start/<?php echo htmlspecialchars($vm_item['vmname']); ?>">Start</a>
		    		<a href="/index.php/vm/stop/<?php echo htmlspecialchars($vm_item['vmname']); ?>">Stop</a>
		    		<a href="/index.php/vm/status/<?php echo htmlspecialchars($vm_item['vmname']); ?>">Status</a>
		    		<a href="/index.php/vm/reboot/<?php echo htmlspecialchars($vm_item['vmname']); ?>">Reset</a></p>
    		</li>
			<?php } ?>
		</ul>
	</div>
	<img src="/images/sepLine.png" alt="" class="sepline" />
</div>
			
<script type="text/javascript">
function checkbox(vmid) {
 
  var confirmmessage = "Are you sure you want to delete this vm?";
  var go = "/index.php/vm/delete/"+vmid;
  var message = "Action Was Cancelled";
 
  if (confirm(confirmmessage)) {
 
      window.location = go;
 
  } else {
 
       alert(message);
 
  }
 
}
</script>
