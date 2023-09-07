@extends('index')
@section('content')
    <style>
        .error-container{
            display: flex;
            width: 100%;
            margin: 8% 0;
            justify-content: center;
        }
        @media screen and (min-width:0) and (max-width: 600px){            
            .error{
                width: 100%;
            }
        }
    </style>
    <div class="error-container">
        <img class="error" src="{{asset('images/404-error-not-found.png')}}" alt="">
    </div>
@endsection