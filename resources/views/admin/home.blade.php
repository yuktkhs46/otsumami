@extends('layouts.app')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">
    

      <div class="row justify-content-center">

        <div class="col-md-4 d-flex">
          <div class="card mb-4 shadow-sm d-inline-flex" width="100%">
            <div class="card-body">
              <a href="{{ action('App\Http\Controllers\Admin\RecipeController@index') }}"><p class="card-text">レシピ一覧</p></a>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex">
          <div class="card mb-4 shadow-sm d-inline-flex" width="100%">
            <div class="card-body">
              <a href="{{ action('App\Http\Controllers\Admin\UserController@index') }}"><p class="card-text">ユーザー一覧</p></a>
            </div>
          </div>
        </div>
        <div class="col-md-4 d-flex">
          <div class="card mb-4 shadow-sm d-inline-flex" width="100%">
            <div class="card-body">
              <a href="{{ action('App\Http\Controllers\Admin\TagController@index')}}"><p class="card-text">お酒登録</p></a>
            </div>
          </div>
        </div>

      </div>
      
    </div>
  </div>



@endsection
