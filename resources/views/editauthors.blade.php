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
    <h3>Sửa tác giả</h3>
    <div>
        <form action="{{ route('update.author', $editauthors->id) }}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <label for="name">Họ và tên</label>
            <input type="text" id="name" name="name" value="{{ $editauthors->name }}" placeholder="Họ và tên..">

            <label for="sex">Giơí tính</label> <br>
            <input type="radio" value="0" @if($editauthors->sex == "0")  checked  @endif name="gender" >Nam

            <input type="radio" value="1" @if($editauthors->sex == "1")  checked  @endif name ="gender" >Nữ <br>

            <label for="country">Quê quán</label>
            <input type="text" id="quequan" name="quequan" value="{{ $editauthors->address }}" placeholder="Địa chỉ..">
            <input type="submit" value="Submit">
        </form>
    </div>
</div>
</body>
</html>
