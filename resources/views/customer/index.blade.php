@extends('layouts\customersapp')

@section('title','顧客一覧')

@section('first_menubar')
    @parent
    顧客検索
@endsection

@section('first_content')
    <form action="/customer/index" method="post">
        @csrf
        <table>
            <tr><td>id</td></tr>
            <tr><td><input type="text" name="id"></td></tr>
            <tr><td>姓</td><td>名</td></tr>
            <tr><td><input type="text" name="last_name"></td><td><input type="text" name="first_name"></td></tr>
            <tr><td>姓(ひらがな)</td><td>名(ひらがな)</td></tr>
            <tr><td><input type="text" name="last_name_ruby"></td><td><input type="text" name="first_name_ruby"></td></tr>
            <tr><td>メールアドレス</td></tr>
            <tr><td><input type="text" name="address"></td></tr>
            <tr><td>電話番号</td></tr>
            <tr><td><input type="text" name="phone_number_1"></td><td>－<input type="text" name="phone_number_2"></td><td>－<input type="text" name="phone_number_3"></td></tr>
        </table>
        <input type="submit" value="検索">
    </form>
@endsection

@section('second_menubar')
    @parent
    顧客一覧
@endsection

@section('second_content')
    <table border="1" >
        <tr style="color:#fff" bgcolor="#999"><th>ユーザーID</th><th>姓名</th><th>姓名(ひらがな)</th><th>登録日時</th></tr>
        @foreach($items as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->last_name}} {{$item->first_name}}</td>
                <td>{{$item->last_name_ruby}} {{$item->first_name_ruby}}</td>
                <td>{{$item->created_at}}</td>
            </tr>
        @endforeach
    </table>
@endsection

@section('footer')

@endsection