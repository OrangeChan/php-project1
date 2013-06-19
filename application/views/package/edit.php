<?php echo form_open('package/update') ?>

	<label for="package_name">Package name</label> 
	<input type="input" name="package_name" value="<?php echo $package['package_name']; ?>" /><br />
	<input type="hidden" name="pid" value="<?php echo $package['pid']; ?>" /> 	
	<input type="submit" name="submit" value="Submit" /> 

</form>