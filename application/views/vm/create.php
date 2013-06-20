<!--Content Start-->
	<div id="content">
		<div class="forms">
        	<div class="heading">
              <h2><?php echo $title; ?></h2> 
            </div>
        <?php echo validation_errors(); ?>
        <?php $attributes = array('class' => 'styleForm'); ?>
        <?php echo form_open('vm/insert', $attributes) ?>
        
		<p>服务器名称<br /><input type="input" name="vmname" class="reg" /></p>
		<p>服务计划<br />
			<select name = "package">
		<?php
		foreach($package as $package_item){
			echo "<option value='" . $package_item['pid'] . "'>" . $package_item['package_name'] . "</option>";
		}?>
			</select>
		</p>
		<p>范本<br />
			<select name = "template">
		<?php
		foreach($template as $template_item){
			echo "<option value='" . $template_item['tid'] . "'>" . $template_item['template_name'] . "</option>";
		}?>
			</select>
		</p>
		<div id="p_scents">
    		<p id="p_ip_1">IP地址<br />
    		<select name = "ip[]" id="ip_1">
    		<?php
			foreach($ip as $ip_item){
				echo "<option value='" . $ip_item['ipid'] . "'>" . $ip_item['ip'] . "</option>";
			}?>
    		</select>
    		<button id="addScnt">增加IP</button>
    		</p>
		</div>
		<input type="submit" name="submit" value="确认" /> 
		</form>
     </div>       
	</div>
<!--Get IP List Start-->
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
<!--Get IP List End-->