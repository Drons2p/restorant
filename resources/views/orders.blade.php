@extends('layouts.default')
@section('content')

        <div class="container">
            <div class="content">

        @foreach ($orders as $order)
        
         {{-- $order->users->name --}} - {{ $order->created_at}} <br />
         
            @foreach ($order->dish as $dish)
         
         {{ $dish->name}} <br />
         
          @endforeach
          
          <br /><br />
          
      @endforeach

            </div>
        </div>
@stop

