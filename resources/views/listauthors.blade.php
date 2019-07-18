
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
@section('content')
    <div class="container">
        <h2>Danh sách tác giả</h2>
        <p><a href="{{ route('add') }}">Thêm</a></p>

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
                        <span><a href="{{ route('edit', ['id'=> $list->id])}}">Sửa</a></span>&nbsp;&nbsp;
                        <span><a href="delete/{{ $list->id }}">Xóa</a></span>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
