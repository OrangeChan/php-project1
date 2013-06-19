
    <!--Content Start-->
    <div id="content">
          <div class="forms">
        <div class="heading">
              <h2>更改密码</h2>
              <form class="search" method="get" action="#">
            <input name="search" type="text" value="search" onfocus="if(this.value=='search')this.value=''" onblur="if(this.value=='')this.value='search'" />
            <input name="" type="submit" value="" />
          </form>
            </div>
        
        <?php echo validation_errors(); ?>
        <?php echo $warning; ?>
        <?php $attributes = array('class' => 'styleForm'); ?>
        <?php echo form_open('changepassword/change', $attributes) ?>
<p>
	原密码<br />
	<input type="password" name="old_password" class="reg" />
</p>
<p>
	新密码<br />
	<input type="password" name="new_password" class="reg" />
</p>

	<input type="submit" name="submit" value="Submit" /> 

</form>
        	
             
              
          </div>
             
      </div>


