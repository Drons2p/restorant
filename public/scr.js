
total_price = 0;

$( document ).ready(function() {
    TotalPrice();
        $( ".ad-to-ord" ).on('click', function(){
               
              
              id = $(this).data( "id" );
              name = $(this).data( "name" );
              price = $(this).data( "price" );
              
              
              id_user = $("#id_user").data("id_user");
              user_name = $("#id_user").data("user_name");
        
              
              $('#order-form').append('<div class="order_row order_red" data-price="'+ price +'"><input class="hide" type="checkbox" name="dish[]" value="'+id+":"+id_user+":"+user_name+'" checked> '+name+' - '+ price +' - '+ user_name +' <span class="glyphicon glyphicon-trash del"></span></div>');
              
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