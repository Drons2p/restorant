@extends('layouts.default')
@section('content')

        <div class="container">
            <div class="content">

        @foreach ($orders as $order)
           


         @if($order->sent == 0)
                <div class="panel panel-default">
              @Else 
                <div class="panel panel-success">
          @Endif
          
             

  <div class="panel-heading">
    <h3 class="panel-title">{{ $order->Grups()->first()->name }} - {{ $order->created_at}}</h3>
  </div>
  <div class="panel-body">
   
             <?php $price = 0; ?>
            @foreach ($order->dish as $dish)
         <?php $price = $price + $dish->price; ?>
         {{ $dish->pivot->user_name}} - {{ $dish->name}} - {{ $dish->price}} <a href="/order/detach/{{$order->id}}/{{ $dish->id}}/{{$dish->pivot->user_id}}"><span class="glyphicon glyphicon-trash del"></span></a><br />
         
          @endforeach
          
          Всего {{ $price }}
          
  </div> 

            </div>
        
      @endforeach
        </div>
        </div>
@stop

