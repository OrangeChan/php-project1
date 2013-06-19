
    <!--Content Start-->
    <div id="content">
          <div class="forms">
        <div class="heading">
              <h2><?php echo $title; ?></h2>
              <form class="search" method="get" action="#">
            <input name="search" type="text" value="search" onfocus="if(this.value=='search')this.value=''" onblur="if(this.value=='')this.value='search'" />
            <input name="" type="submit" value="" />
          </form>
            </div>
        
        <?php echo validation_errors(); ?>
        <?php $attributes = array('class' => 'styleForm'); ?>
        <?php echo form_open('users/insert', $attributes) ?>
<p>
	Username<br />
	<input type="text" name="username" class="reg" />
</p>
<p>
	Password<br />
	<input type="text" name="password" class="reg" />
</p>

	<input type="submit" name="submit" value="Submit" /> 

</form>
        	
             
              
          </div>
             
      </div>


