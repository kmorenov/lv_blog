@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @include('admin.sidebar')

        <div class="col-md-9">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">


                    <ul class="nav" role="tablist">
                        <li role="presentation">
                            <a href="{{ url('/admin') }}">
                                Dashboard
                            </a>
                        </li>

                    </ul>
                    <li role="presentation">
                        <a href="{{ url('/admin') }}">
                            News
                        </a>
                    </li>

                    Your application's dashboard.

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
