
total_price = 0;

$( document ).ready(function() {
    
        $( ".ad-to-ord" ).on('click', function(){
               
              
              id = $(this).data( "id" );
              name = $(this).data( "name" );
              price = $(this).data( "price" );
             
              
              $('#order-form').append('<div><input class="hide" type="checkbox" name="dish[]" value="'+id+'" checked> '+name+' '+ price +' <span class="glyphicon glyphicon-trash del"></span></div>');
              
              total_price = total_price + price;
               
              $("#total").text(total_price);
              
            $( ".del" ).on('click', function(){
                   $(this).parent().remove() 
            }); 
             
        });
        
        
        $( ".del" ).on('click', function(){
               $(this).parent().remove() 
        });   
            
});