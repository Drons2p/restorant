@extends('layouts.default')
@section('content')


<div class="container-fluid">
   <div class="row">      
          <div class="col-lg-8"> 
          

                <div class="title">Меню</div>
                
          @can('create') <!-- проверяем права -->
        
                          <!-- Button trigger modal -->
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#catModal">
                                           Добавить категорию
                                          </button>
                                          
                                          <br /><br /><br />
                                          
                                              <!-- Modal -->
                                    <div class="modal fade" id="catModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="catModalLabel">Добавление категории</h4>
                                          </div>
                                          <div class="modal-body">
                                            
                                          <form class="form-horizontal" role="form" method="POST" action="/сategory/create">              
                                                    <input type="text" class="form-control" name="name" value="">                      
                                                    <input type="text" class="form-control" name="description" value="">          
                
                                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                                    
                                            
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                          
                                                     <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-btn fa-sign-in"></i>Добавить
                                                    </button>
                                             
                                        </form> 
                                        
                                        </div>
                                        </div>
                                      </div>
                                    </div>
                                                                           

            
    @endcan
    
                  
    @foreach ($categories as $category)
 
  <div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">{{$category->name}}</h3>
  </div>
  <div class="panel-body">  
  
  
<div class="container-fluid">
   <div class="row">      
          <div class="col-lg-6"> 
          {{$category->description}}

       </div>     
          <div class="col-lg-3"> 
          @can('create') <!-- проверяем права -->

                                         <!-- Button trigger modal -->
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#catModal{{$category->id}}">
                                           Редактировать категорию
                                          </button>      
                                                                         
                                              <!-- Modal -->
                                    <div class="modal fade" id="catModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="catModalLabel">Редактирование категории</h4>
                                          </div>
                                          <div class="modal-body">
                                            
                                          <form class="form-horizontal" role="form" method="POST" action="/сategory/save">            
                                                    <input type="text" class="form-control" name="name" value="{{$category->name}}">                      
                                                    <input type="text" class="form-control" name="description" value="{{$category->description}}">    
                                                    <input type="hidden" name="id" value="{{$category->id}}"/>   
                                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                                    
                                            
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                          
                                                     <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-btn fa-sign-in"></i>Сохринить
                                                    </button>
                                             
                                        </form> 
                                        
                                        </div>
                                        </div>
                                      </div>
                                    </div>
          
          
    @endcan
          
       </div>     
          <div class="col-lg-3"> 
                
          @can('create') <!-- проверяем права -->

          
                                                        <!-- Button trigger modal -->
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#dishcreateModal{{$category->id}}">
                                           Добавить блюдо
                                          </button>
                                          
                                          <br />
                                          
                                              <!-- Modal -->
                                    <div class="modal fade" id="dishcreateModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="dishcreateModalLabel">Добавление блюда</h4>
                                          </div>
                                          <div class="modal-body">
                                            
                                          <form class="form-horizontal" role="form" method="POST" action="/dish/create">              
                                                    <input type="text" class="form-control" name="name" value="">                      
                                                    <input type="text" class="form-control" name="description" value="">          
                                                     <input type="hidden" name="category_id" value="{{$category->id}}"/>  
                                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                                    
                                            
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                          
                                                     <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-btn fa-sign-in"></i>Добавить
                                                    </button>
                                             
                                        </form> 
                                        
                                        </div>
                                        </div>
                                      </div>
                                    </div>        
           
    @endcan
                 
                                     
       </div>     
    </div>  
</div> 

  <br /><br />
          
              @foreach ($category->dishes as $dish)
  
<div class="container-fluid">
   <div class="row">      
          <div class="col-lg-2"> 
          
                  {{$dish->name}}  
                                       
       </div>      
          <div class="col-lg-1"> 
          {{$dish->price}}

       </div>     
          <div class="col-lg-4"> 
           
                  {{$dish->description}}
       </div>       
          <div class="col-lg-2"> 
           <button class="btn btn-primary ad-to-ord" data-price="{{$dish->price}}" data-id="{{$dish->id}}" data-name="{{$dish->name}}"> Добавить в заказ </button>
       </div>     
          <div class="col-lg-3"> 
          
          @can('create') <!-- проверяем права -->

                                      <!-- Button trigger modal -->
                                    <button class="btn btn-primary" data-toggle="modal" data-target="#dishModal{{$dish->id}}">
                                           Редактировать блюдо
                                          </button>
                                          
                                          <br />
                                          
                                              <!-- Modal -->
                                    <div class="modal fade" id="dishModal{{$dish->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="dishModalLabel">Редактировать блюдо</h4>
                                          </div>
                                          <div class="modal-body">
                                            
                                          <form class="form-horizontal" role="form" method="POST" action="/dish/create">              
                                                    <input type="text" class="form-control" name="name" value="{{$dish->name}}">                      
                                                    <input type="text" class="form-control" name="description" value="{{$dish->description}}">          
                                                    
                                                    
                                                     <input type="hidden" name="category_id" value="{{$category->id}}"/>  
                                                                                                           
                                                           <select name="category_id"> 
                                                                   
                                                                    @foreach ($categories as $category_dish)
                                                                   
                                                                       @if($category_dish->id == $dish->category_id)
                                                                    <option selected value="{{$category_dish->id}}"> {{$category_dish->name}} </option>
                                                                    
                                                                   @Else 
                                                                    <option value="{{$category_dish->id}}">{{$category_dish->name}}</option>
                                                                   @Endif
                                                                    
                                                                    @endforeach
                                                                  
                                                            </select>
                                                                                                            
                                                    <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                                    
                                            
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                                          
                                                     <button type="submit" class="btn btn-primary">
                                                        <i class="fa fa-btn fa-sign-in"></i>Добавить
                                                    </button>
                                             
                                        </form> 
                                        
                                        </div>
                                        </div>
                                      </div>
                                    </div>
           
         
    @endcan         
                                       
       </div>     
    </div>  
</div>     
 
                  
                  <br />
          @endforeach
    <br /><br /><br />
    
  </div>
</div>    

      @endforeach
 
 
              </div>
              
          <div class="col-lg-4"> 
                <div class="title">Заказ</div>
         @if($draft)
         
                      
             <form id="order-form" class="form" role="form" method="POST" action="/order/create">          
                                      
			 @if (Session::has('user_id'))
	         
<div class="container-fluid">
   <div class="row">      
          <div class="col-lg-6"> 
                           <select class="form-control" name="sent"> 
                           
                                <option value="0">Как ченовик</option>
                                <option value="1">Как заказ</option>
                            </select>
                            
                           <select class="form-control" name="grup_id"> 
                           
                                <option value="0">Индивидуальный</option>
                                
              @foreach ($Usergrupobj as $Usergrup)
             
                                <option value="{{$Usergrup->id}}">Как заказ в группу {{$Usergrup->name}}</option>
                   @endforeach           
                            </select>
                      
       </div>     

    
          <div class="col-lg-6"> 
          
                             <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                                                         <button type="submit" class="btn btn-primary">
                                                        Оотправить
                                                    </button>
                      
       </div>     
    </div>  
</div>     

     
                            

			@endif
                                 
                    @foreach ($draft->Dish as $draft_dish) 
                         <div  class="order_row" data-price="{{ $draft_dish->price }}"><input class="hide" type="checkbox" name="dish[]" value="{{ $draft_dish->id }}" checked>{{ $draft_dish->name }} {{ $draft_dish->price }} <span class="glyphicon glyphicon-trash del"></span></div>
                      @endforeach
                                   <input type="hidden" name="id" value="{{{$draft->id}}}"/>
                                     
                        </form>  
                        
          @Else 
                      <form id="order-form" class="form" role="form" method="POST" action="/order/create">          
                                        
			 @if (Session::has('user_id'))     
               
<div class="container-fluid">
   <div class="row">      
          <div class="col-lg-6"> 
          
                           <select class="form-control" name="sent"> 
                                <option value="0">Как ченовик</option>
                                <option value="1">Как заказ</option>
                     
                            </select>
                                                 <select class="form-control" name="grup_id"> 
                           
                                <option value="0">Индивидуальный</option>
                                
              @foreach ($Usergrupobj as $Usergrup)
                                <option value="{{$Usergrup->id}}">Как заказ в группу {{ $Usergrup->name }}</option>
                   @endforeach           
                            </select>
       </div>     

    
          <div class="col-lg-6"> 
           
                             <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                                                         <button type="submit" class="btn btn-primary">
                                                        Отправить
                                                    </button>
                                             
       </div>     
    </div>  
</div>     

     

			@endif
                            
                                        </form> 
                                           
          @Endif
 
        <br />
        
 <div>Всего: <div id="total"></div></div>
        
 
                
                      
              <br />
    
                <div class="title">Группы</div>
                  
    @foreach ($grups as $grup)
        
        {{ $grup->name }} - основатель {{ $grup->founder()->name }}
       @if(!in_array($grup->id, $Userreqslist))
           @if(in_array($grup->id, $Usergruplist))
            
             <a href="/grup/detach/{{\Session::get('user_id')}}/{{$grup->id}}"> - Покинуть</a> 
                  
              @Else 
           <a href="/grup/req/{{$grup->id}}"> - Присоеденится</a>   
                                       
              @Endif                  
          @Endif
        <br />
        @foreach ($grup->users as $user)
        
               {{ $user->name }} <a href="/grup/detach/{{$user->id}}/{{$grup->id}}">Удалить</a>  <br />
        
          @endforeach
          <br />
          
      @endforeach
        
        <br /><br /><br />
                
                <div class="title">Запросы</div>
                
        @foreach ($reqs as $req)
        
          {{ $req->grup->name }} - {{ $req->user->name }} -  <a href="/grup/accept/ {{$req->id}}">Принять</a> <br /> 
        
          @endforeach
          <br /><br />
              
              </div>
              
   </div>
</div>
                
@stop

