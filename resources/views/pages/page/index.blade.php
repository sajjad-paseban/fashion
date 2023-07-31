@extends('index')
@section('content')
    <div class="section">
        <h2 class="title">
            {{$post->title}}
            <hr>
        </h2>
        <p class="section-paragraph">
        </p>
        <div class="section-content seo-content">
            {!! $post->content !!}
        </div>
    </div>
    <style>
        
        div.seo-content video{
            width: calc(100%) !important;
            height: auto;
            margin: 20px 0;
        }
        div.seo-content{
            direction: rtl;
            overflow-x: hidden;
            padding: 0 50px;
            font-family: 'yekan';
        }
        footer{
            margin-top: 500px !important;
        }
    </style>
@endsection
