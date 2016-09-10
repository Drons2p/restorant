

$( document ).ready(function() {
    
        $( ".ad-to-ord" ).on('click', function(){
               
              
              id = $(this).data( "id" );
              name = $(this).data( "name" );
             
              
              $('#order-form').append('<div><input class="hide" type="checkbox" name="dish[]" value="'+id+'" checked> '+name+' <span class="glyphicon glyphicon-trash del"></span></div>');
              
            $( ".del" ).on('click', function(){
                   $(this).parent().remove() 
            }); 
             
        });
        
        
        $( ".del" ).on('click', function(){
               $(this).parent().remove() 
        });   
            
});