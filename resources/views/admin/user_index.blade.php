@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h2>投稿済みレシピ一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="" role="button" class="btn btn-primary">新規作成</a>
            </div>
            <div class="col-md-8">
                <form action="" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">タイトル</label>
                        
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="admin-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="25%">名前</th>
                                <th width="10%">email</th>
                                <th width="50%">password</th>
                                <th width="10%">削除</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->password }}</td>
                            <td><a href="">×</a></td>   
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection