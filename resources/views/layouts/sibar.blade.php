@section('sibar')
    <div class="col-md-2" style="border: 1px solid #bce8f1; height: 400px; background-color:white; padding-top: 30px;">
        <ul>
            <li><a href="{{route('author.manager')}}">Quản lý tác giả</a></li>
            <li><a href="{{ route('user.manager') }}">Quản lý người dùng</a></li>

        </ul>
    </div>
@endsection