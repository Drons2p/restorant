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
          <div class="col-lg-3"> 
          
                  {{$dish->name}}  
                                       
       </div>      
          <div class="col-lg-4"> 
           
                  {{$dish->description}}
       </div>       
          <div class="col-lg-2"> 
           <button class="btn btn-primary ad-to-ord" data-id="{{$dish->id}}" data-name="{{$dish->name}}"> Добавить в заказ </button>
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
                                             
                           <select class="form-control" name="sent"> 
                                <option value="0">Сохранить как ченовик</option>
                                <option value="1">Отправить заказ</option>
                     
                            </select>
                            
                             <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                                                         <button type="submit" class="btn btn-primary">
                                                        Оотправить
                                                    </button>
                                 
                    @foreach ($draft->Dish as $draft_dish) 
                         <div><input class="hide" type="checkbox" name="dish[]" value="{{ $draft_dish->id }}" checked>{{ $draft_dish->name }} <span class="glyphicon glyphicon-trash del"></span></div>
                      @endforeach
                                   <input type="hidden" name="id" value="{{{$draft->id}}}"/>
                                     
                        </form>  
                        
          @Else 
                      <form id="order-form" class="form" role="form" method="POST" action="/order/create">          
                                             
                           <select class="form-control" name="sent"> 
                                <option value="0">Сохранить как ченовик</option>
                                <option value="1">Отправить заказ</option>
                     
                            </select>
                            
                             <input type="hidden" name="_token" value="{{{ csrf_token() }}}"/>
                                                         <button type="submit" class="btn btn-primary">
                                                        Оотправить
                                                    </button>
                                             
                                        </form> 
                                           
          @Endif
 
              
              
              </div>
              
   </div>
</div>
                
@stop

