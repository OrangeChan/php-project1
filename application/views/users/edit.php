
    <!--Content Start-->
    <div id="content">
          <div class="forms">
        <div class="heading">
              <h2>
              	<a href="/index.php/users/index">账号列表</a> >
            <a href=""><?php echo $users['email'];?></a>
              	
              	</h2>
              <form class="search" method="get" action="#">
            <input name="search" type="text" value="search" onfocus="if(this.value=='search')this.value=''" onblur="if(this.value=='')this.value='search'" />
            <input name="" type="submit" value="" />
          </form>
            </div>
        
        <?php echo validation_errors(); ?>
        <?php $attributes = array('class' => 'styleForm'); ?>
        <?php echo form_open('users/update', $attributes) ?>
<p>
	Username<br />
	<input type="text" name="username" value="<?php echo $users['email'] ?>" class="reg" />
</p>
<p>
	Password<br />
	<input type="text" name="password" class="reg" />
</p>
<p>
	Status<br />
	<input type="text" name="status" value="<?php echo $users['status'] ?>" class="reg" />
</p>
	<input type="hidden" name="uid" value="<?php echo $users['uid'] ?>" class="reg" />
	<input type="submit" name="submit" value="Submit" /> 

</form>
        	
             
              
          </div>
             
      </div>

 

