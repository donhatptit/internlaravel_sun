
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
        <h2>Danh sách tác giả</h2>
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
        <p><a href="{{ route('addauthor') }}">Thêm</a></p>

        <table>
            <tr>
                <th>Họ và tên</th>
                <th>Giới tính</th>
                <th>Quê quán</th>
                <th>Hành động</th>
            </tr>
            @foreach($author as $list)
                <tr>
                    <td>{{ $list->name }}</td>
                    <td>@if($list->sex == '0')
                             Nam
                            @else  Nữ
                    @endif
                    </td>
                    <td>{{ $list->address }}</td>
                    <td>
                        <span><a href="{{ route('editauthor', ['id'=> $list->id]) }}">Sửa</a></span>&nbsp;&nbsp;
                        <span><a href="{{ route('deleteauthor', ['id' => $list->id]) }} " onclick="return window.confirm('Bạn có muốn xóa không?')" >Xóa</a></span>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
