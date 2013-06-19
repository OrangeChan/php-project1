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