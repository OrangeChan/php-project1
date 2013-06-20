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
								<p class="descripHead">
									用户邮箱
								</p>
								<p class="incHead">
									最後更新時間
								</p>
								<p class="decHead">
									状态
								</p>
								<p class="editHead">
									等級
								</p>
							</li>								
								<?php foreach ($users as $user_item){ ?>
									 <li class="odd">
							<div class="chk">
									<label>
										<a href="/index.php/users/edit/<?php echo htmlspecialchars($user_item['uid']); ?>"><img src="/images/editIco.png" alt="edit" /></a>
										<a href="/index.php/users/delete/<?php echo htmlspecialchars($user_item['uid']); ?>"><img src="/images/deletIco.png" alt="edit" /></a>
									</label>
								</div>
    	<p class="descrip"><?php echo htmlspecialchars($user_item['email']) ?></p>
    	<p class="inc"><?php echo htmlspecialchars($user_item['udate']) ?></p>
    	<p class="dec"><?php echo htmlspecialchars($user_item['status']) ?></p>
    	<p class="edit"><?php echo htmlspecialchars($user_item['level']); ?></p>
    	<p class="dec"><a href="/index.php/vm/userVm/<?php echo htmlspecialchars($user_item['uid']) ?>">View Vms</a></p>
    	</li>
   
   

<?php } ?>
								
						</ul>
					</div>
					<img src="/images/sepLine.png" alt="" class="sepline" />

				</div>
			
		
