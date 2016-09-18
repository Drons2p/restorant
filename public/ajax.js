
$( document ).ready(function() { 
      
   urlcur = window.location.href;
    
         timerId = setInterval(function() {
      
         $.ajax({ 
    method: "GET", 
    success: function(){
//  alert(111);   
   urlcur = window.location.href;
          $( "#checkbox_form" ).load( urlcur + " #checkbox_form" );
            
         // alert( "тик" ); 
             
            $( ".del" ).on('click', function(){
                   $(this).parent().remove()
                   clearInterval(timerId);
             TotalPrice();
            })
        
        }

    }); 
             
          
        }, 2000);
    
    //    console.log(timerId);
    
    
    
    });