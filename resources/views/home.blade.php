@extends('layouts.app')
@section('sibar')
    <div class="col-md-2" style="border: 1px solid #bce8f1; height: 400px; background-color:white; padding-top: 30px;">
        <ul>
            <li><a href="{{route('author.manager')}}">Quản lý tác giả</a></li>
            <li><a href="{{ route('user.manager') }}">Quản lý người dùng</a></li>
        </ul>
    </div>
    @endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
