<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <script src="/jquery/jquery-3.1.0.min.js"></script>
    <script src="/scr.js"></script>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <script src="/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="/style.css">
    <style>
        body {
            padding-top: 70px;

        }
    </style>

    <script>
    // CSRF protection
$.ajaxSetup(
{
    headers:
    {
        'X-CSRF-Token': $('input[name="_token"]').val()
    }
});

    </script>

    <!-- link href="//fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css" -->
    <link rel="stylesheet" type="text/css" href="/style.css">
    <!-- Custom CSS -->
</head>


<body>


<header id="header">
<div class="container-fluid">
   <div class="row">
			 @if (!Session::has('user_id'))
      
                           <div class="col-lg-3">  
                                        <form class="form-horizontal" role="form" method="POST" action="/login">                    
                                                  <input type="email" class="form-control" name="email" value="drons2p@ukr.net">          
                         </div> 
                                        
                            
                           <div class="col-lg-3">    
                                                 <input type="password" class="form-control" name="password" value="111111">
                                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                                
                         </div> 
                           <div class="col-lg-3">    
                                                     <button type="submit" class="btn btn-primary">
                                                            Войти
                                                    </button>
                                     
                         </div>              
                                        </form>
                          <div class="col-lg-3">  
                                                
                                                <!-- Button trigger modal -->
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#regModal">
                                           Регистрация
                                          </button>
                                    
                                    <!-- Modal -->
                                    <div class="modal fade" id="regModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="regModalLabel">Регистрация</h4>
                                          </div>
                                          <div class="modal-body">
                                            
                                          <form class="form-horizontal" role="form" method="POST" action="/user/registration">                    
                                                  <input type="email" class="form-control" name="email_r" value="drons2p@ukr.net">          
                                                    <input type="text" class="form-control" name="name_r" value="drons2p">          
               
                                                 <input type="password" class="form-control" name="password_r" value="222222">
                                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                                    
                                            
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                          
                                                     <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-btn fa-sign-in"></i>Зарегистрироваться
                                                    </button>
                                             
                                        </form> 
                                        
                                        </div>
                                        </div>
                                      </div>
                                    </div>

                    	    </div> 
      @Else
                   <div class="col-lg-offset-8 col-lg-2">  
<div id="id_user" data-id_user="{{\Session::get('user_id')}}" data-user_name="{{\Session::get('name')}}">{{\Session::get('name')}}</div>
                   
             <a href="/logout">Выйти</a> 
                 </div> 
                 
                   <div class="col-lg-2"> 
                  
          @can('create') <!-- проверяем права -->       
             <a href="/order/ind/index">Заказы индивидуальные</a><br />
             <a href="/order/grup/index">Заказы груповые</a> <br />
             <a href="/order/export">Экспорт заказов</a>   <br />
             <a href="/dish/export">Экспорт меню</a>    
    @endcan 
                 </div> 
	@endif
              
     </div> 
    
      </div> 
</header>




