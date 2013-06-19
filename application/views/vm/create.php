
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
        <?php echo form_open('vm/insert', $attributes) ?>
<p>
	VM Name <br />
	<input type="input" name="vmname" class="reg" />
</p>

	<p>
	Package <br />
	<select name = "package">
	<?php
		foreach($package as $package_item){
			echo "<option value='" . $package_item['pid'] . "'>" . $package_item['package_name'] . "</option>";
		}
	?>
	</select></p>
	
	<p>
	Template <br />
	<select name = "template">
	<?php
		foreach($template as $template_item){
			echo "<option value='" . $template_item['tid'] . "'>" . $template_item['template_name'] . "</option>";
		}
	?>
	</select></p>
	

<div id="p_scents">
    <p id="p_ip_1">
    	IP<br />
    	<select name = "ip[]" id="ip_1">
    	<?php
		foreach($ip as $ip_item){
			echo "<option value='" . $ip_item['ipid'] . "'>" . $ip_item['ip'] . "</option>";
		}
		?>
    	</select>
    	<button id="addScnt">Add</button>
    </p>
</div>

	<input type="submit" name="submit" value="Submit" /> 

</form>
        	
             
              
          </div>
             
      </div>


<script src="http://code.jquery.com/jquery-1.4.4.js" type="text/javascript" charset="utf-8"></script>
<script type="text/javascript">
$(document).ready(function() {
            var scntDiv = $('#p_scents');
        var i = $('#p_scents p').size() + 1;
        
        $('#addScnt').live('click', function() {
        	if(i<=5){
                $('<p id=p_ip_'+i+'></p>').appendTo(scntDiv);
                
                var newElem = $('#ip_' + (i-1)).clone().attr('id', 'ip_' + i);
                
                $('#p_ip_'+i).append(newElem);
   
                $('<button id="remScnt">Remove</button>').appendTo($('#p_ip_'+i));
                
                $('#count').val(i);
                i++;
               }
                //<div class="button" id="uniform-remScnt"><span>"Add"<button id="remScnt" style="opacity:0;">Add</button></span></div>
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