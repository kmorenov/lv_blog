@extends('layouts.main_app')
@section('header')
    @include('partials.header')
@endsection




@section('content')
    <div class="single">
        <div class="container">
            <div class="col-md-8 single-main">
                <div class="single-grid">
                    @if($post->hasImage())
                        <img src="{{$post->getImagePath('thumb_')}}" alt=""/>
                    @endif

                    <h1>{{ $post->title }}</h1>
                    <h5>{{ $post->created_at->format('M jS Y g:ia') }}</h5>
                    <hr>
                    {!! nl2br(e($post->content)) !!}
                    <hr>
                    <button class="btn btn-primary" onclick="history.go(-1)">
                        « Back
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection