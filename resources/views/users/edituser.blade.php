
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    input[type=text], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }
    input[type=password], select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
    }
    .container{
        width: 1000px;
        margin: auto;
    }
</style>
<body>
<div class="container">
    <h3>Sửa nguời dùng</h3>

    <div>
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('update.user', ['id'=>$editusers->id]) }}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <label for="name">Họ và tên</label>
            <input type="text" id="name" name="name" value="{{ $editusers->name }}" placeholder="Nguyễn Văn A">

            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="{{ $editusers->email }}" disabled="" placeholder="nva@gmail.com">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Nhập password mới.." >
            <label>Chọn quyền</label>
            <input type="checkbox" name="level"  value="Editor" @if($editusers->level == 1)  checked @endif  >Editor
            {{--            <label for="passwordcofrm">Nhập lại pasbbsword</label>--}}
            {{--            <input type="text" id="passwordcofirm" name="passwordcoform" placeholder="Nhập lại password">--}}
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
</body>
</html>
