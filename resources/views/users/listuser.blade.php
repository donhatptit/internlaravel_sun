
@extends('layouts.app')
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        padding: 8px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }
    .container{
        width: 1000px;
        margin: auto;
    }
</style>
@include('layouts.sibar');
@section('content')
    <div class="container">
        <h2>Danh sách người dùng </h2>
        @if(session('mess'))
            <div class="alert alert-danger">
                <li>{{ 'Xóa thành công!' }}</li>

            </div>
        @endif
        @if(session('message'))
            <div class="alert alert-success">
                <li>{{ 'Sửa thành công!' }}</li>

            </div>
        @endif
        @if(session('status'))
            <div class="alert alert-success">
                <li>{{ 'Thêm thành công!' }}</li>

            </div>
        @endif
        <p><a href="{{ route('adduser') }}">Thêm</a></p>

        <table>
            <tr>
                <th>Họ và tên</th>
                <th>Email</th>
                <th>Level</th>
                <th>Hành động</th>
            </tr>
            @foreach($users as $list)
                <tr>
                    <td>{{ $list->name }}</td>
                    <td>
                        {{ $list->email }}
                    </td>
                    <td>
                        @if($list->level == 0)
                            Admin
                            @else
                        Editor
                            @endif
                    </td>
                    <td>
                        <span><a href="{{ route('edituser', ['id' => $list->id]) }}">Sửa</a></span>&nbsp;&nbsp;
                        <span><a href="{{ route('delete.user', ['id' => $list->id]) }}" onclick="return window.confirm('Bạn có muốn xóa không ?') ">Xóa</a></span>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection

