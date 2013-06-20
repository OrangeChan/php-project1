<!--Content Start-->
    <div id="content">
          <div class="forms">
        <div class="heading">
              <h2>
              	<a href="/index.php/users/index">账号列表</a> >
            	<a href=""><?php echo $users['email'];?></a>
              </h2>
        </div>
        
        <?php echo validation_errors(); ?>
        <?php $attributes = array('class' => 'styleForm'); ?>
        <?php echo form_open('users/update', $attributes) ?>
			<p>用户邮箱<br /><input type="text" name="username" value="<?php echo $users['email'] ?>" class="reg" /></p>
			<p>密码<br /><input type="text" name="password" class="reg" /></p>
			<p>状态<br /><input type="text" name="status" value="<?php echo $users['status'] ?>" class="reg" /></p>
			
			<input type="hidden" name="uid" value="<?php echo $users['uid'] ?>" class="reg" />
			<input type="submit" name="submit" value="Submit" /> 
		</form>
      	</div>   
     </div>

 

