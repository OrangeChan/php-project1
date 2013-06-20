
				<!--Content Start-->
				<div id="content">
					<div class="forms">
						<div class="heading">
							<h2><a href="/index.php/vm/index">服务器列表</a> >
            <a href=""><?php echo $vm['vmname'];?></a>
            </h2>
							<form class="search" method="get" action="#">
								<input name="search" type="text" value="search" onfocus="if(this.value=='search')this.value=''" onblur="if(this.value=='')this.value='search'" />
								<input name="" type="submit" value="" />
							</form>
						</div>
						<?php echo validation_errors(); ?>
						<?php $attributes = array('class' => 'styleForm'); ?>
						<?php echo form_open('vm/update', $attributes) ?>
						<p>
							VM Name
							<br />
							<input type="input" name="vmname" class="reg" value='<?php echo $vm['vmname'];?>' />
						</p>
						<p>
							User
							<br />
							<select name = "uid">
								<?php
								foreach ($users as $user_item) {
									echo "<option value='" . $user_item['uid'] . "' ";
									if($user_item['uid']==$vm['uid'])
										echo "selected";
									echo ">" . $user_item['email'] . "</option>";
								}
								?>
							</select>
						</p>
						<p>
							Package
							<br />
							<select name = "package">
								<?php
		foreach($package as $package_item){
			echo "<option value='" . $package_item['pid'] . "' ";
			if($package_item['pid']==$vm['package'])
				echo "selected";
			echo ">" . $package_item['package_name'] . "</option>";
		}
	?>
							</select>
						</p>

						<p>
							Template
							<br />
							<select name = "template">
								<?php
		foreach($template as $template_item){
			echo "<option value='" . $template_item['tid'] . "' ";
			if($template_item['tid']==$vm['template'])
				echo "selected";
			echo ">" . $template_item['template_name'] . "</option>";
		}
	?>
							</select>
						</p>

						<!--
						<div id="p_scents">
							<p>
								IP
								<br />
								<?php foreach($ip as $ip_item){?>
									<input type="text" name="ip[]" id="ip_1" class="reg" value="<?php echo $ip_item['ip'] ?>" />
										
								<?php } ?>
								
								<input type="text" name="ip[]" id="ip_1"  class="reg"  />
								<button id="addScnt">
									Add
								</button>
							</p>
						</div>
						-->
						<input type="hidden" name="vmid" value="<?php echo $vm['vmid']; ?>" />

						<input type="submit" name="submit" value="Submit" />

						</form>

					</div>

				</div>

