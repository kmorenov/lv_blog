{{--<html>--}}
{{--<head>--}}
{{--<title>{{ config('blog.title') }}</title>--}}
{{--<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"--}}
{{--rel="stylesheet">--}}
{{--</head>--}}
{{--<body>--}}

@extends('layouts.main_app')
@section('header')
    @include('partials.header')
@endsection

@section('content')
    <div class="content">
        <div class="container">
            <div class="content-grids">
                <div class="col-md-8 content-main">
                    <div class="content-grid">
                        {{--<h1>{{ config('blog.title') }}</h1>--}}
                        <h5>Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</h5>
                        <hr>
                        @forelse ($posts as $post)
                            <div class="content-grid-info">
                                @if($post->hasImage())
                                    <img src="{{$post->getImagePath('thumb_')}}" alt=""/>
                                @endif
                                <div class="post-info">
                                    <h4>
                                        {!!
                                            link_to_route('frontend.posts.show', $post->title, ['slug' => $post->slug]).
                                            $post->created_at->format('M jS Y') . "/ 0 Comments"
                                        !!}
                                    </h4>
                                    <p>
                                        {{ str_limit($post->content) }}
                                    </p>
                                    <a href="{{URL::route('frontend.posts.show', ['slug' => $post->slug])}}">
                                        <span></span>READ MORE
                                    </a>
                                </div>
                            </div>
                        @empty
                            <div content="content-grid-info">
                                <p>No Posts YEEEEET</p>
                            </div>
                        @endforelse
                        <hr>
                        {!! $posts->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--</body>--}}
{{--</html>--}}

@section('sidebar')
    @parent
    <h1>Second</h1>
    @parent
@endsection