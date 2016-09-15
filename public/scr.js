
total_price = 0;

$( document ).ready(function() {
    TotalPrice();
        $( ".ad-to-ord" ).on('click', function(){
               
              
              id = $(this).data( "id" );
              name = $(this).data( "name" );
              price = $(this).data( "price" );
             
              
              $('#order-form').append('<div class="order_row" data-price="'+ price +'"><input class="hide" type="checkbox" name="dish[]" value="'+id+'" checked> '+name+' '+ price +' <span class="glyphicon glyphicon-trash del"></span></div>');
              
              total_price = total_price + price;
               
              $("#total").text(total_price);
             
             TotalPrice();
             
              
            $( ".del" ).on('click', function(){
                   $(this).parent().remove() 
             TotalPrice();
            }); 
             
        });
        
        
        $( ".del" ).on('click', function(){
               $(this).parent().remove() 
             TotalPrice();
               
        });   
            
function TotalPrice() {
    
total_price = 0;
    
    $( ".order_row" ).each(function() {
        price = $(this).data( "price" );
        total_price = total_price + price;
        
      });
      
        $("#total").text(total_price);
    
}
            
});