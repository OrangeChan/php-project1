
				<!--Content Start-->
				<div id="content">
					<div class="datalist">
						<div class="heading">
							<h2><a href="/index.php/users/index"><?php echo $title; ?></a> > <a href=""><?php echo $email ?></a></h2>
						</div>
						<ul id="lst">
							<li>
								<div class="chk">
									<!--<a id="checkall"></a>-->
								</div>
								<p class="title">
									<strong>Package</strong>
								</p>
								<p class="descripHead">
									Guest Operating System
								</p>
								<p class="incHead">
									IP
								</p>
								<p class="decHead">
									Template
								</p>
								<p class="editHead">
									Action
								</p>
							</li>								
								<?php foreach ($vm as $vm_item){ ?>
									 <li class="odd">
							<div class="chk">
								
									<label>
										<?php
										$session_data = $this -> session -> userdata('logged_in'); 
										if($session_data['level']==3){ ?>
										<a href="/index.php/vm/edit/<?php echo htmlspecialchars($vm_item['vmid']); ?>"><img src="/images/editIco.png" alt="edit" /></a>
										<a href="/index.php/vm/delete/<?php echo htmlspecialchars($vm_item['vmid']); ?>"><img src="/images/deletIco.png" alt="edit" /></a>
										<?php }?>
										
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
			
		
