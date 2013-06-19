<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
 <head>
   <title>Simple Login with CodeIgniter - Private Area</title>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
 
 <script type="text/javascript">
        $(document).ready(function() {
            var scntDiv = $('#p_scents');
        var i = $('#p_scents p').size() + 1;
        
        $('#addScnt').live('click', function() {
                $('<p><label for="ip_' + i +'">IP</label><input type="text" id="ip_' + i +'" size="20" name="ip[]" /> <button id="remScnt">Remove</button></p>').appendTo(scntDiv);
                $('#count').val(i);
                i++;
                
                return false;
        });
        
        $('#remScnt').live('click', function() { 
                if( i > 2 ) {
                        $(this).parents('p').remove();
                        i--;
                        $('#count').val(i-1);
                }
                return false;
        });
        });
    </script>
 </head>
 <body>
   <h1>Home</h1>
   <h2>Welcome <?php echo $username; ?>!</h2>
   <a href="login/logout">Logout</a>
  
  <?php echo validation_errors(); ?>

<?php echo form_open('users/create') ?>

	<label for="username">Username</label> 
	<input type="input" name="username" /><br />

	<label for="password">Password</label>
	<input type="password" name="password" /><br />
	
	<input type="submit" name="submit" value="Submit" /> 

</form>

<?php echo form_open('vm/create') ?>

	<label for="vmname">VM Name</label> 
	<input type="input" name="vmname" /><br />

	<label for="uid">User</label> 	
	<select name = "uid">
	<?php
		foreach($users as $user_item){
			echo "<option value='" . $user_item['uid'] . "'>" . $user_item['email'] . "</option>";
		}
	?>
	</select><br />
	
	<label for="package">Package</label> 
	<select name = "package">
	<?php
		foreach($package as $package_item){
			echo "<option value='" . $package_item['pid'] . "'>" . $package_item['package_name'] . "</option>";
		}
	?>
	</select><br />
	
	<label for="template">Template</label> 
	<select name = "template">
	<?php
		foreach($template as $template_item){
			echo "<option value='" . $template_item['tid'] . "'>" . $template_item['template_name'] . "</option>";
		}
	?>
	</select><br />
	
<div id="p_scents">
    <p>
    	<label for="ip_1">IP</label><input type="text" name="ip[]" id="ip_1" /><button id="addScnt">Add</button>
    </p>
</div>
	<input type="hidden" id="count" name="count" />
	<input type="submit" name="submit" value="Submit" /> 

</form>
  
<a href="/index.php/vm/viewUserVm">List of VMs</a>

 </body>
</html>

