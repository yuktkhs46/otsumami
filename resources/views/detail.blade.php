@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- 各ページごとにtitleタグを入れるために@yieldで空けておきます。 --}}
        <title>@yield('title')</title>

        <!-- Scripts -->
         {{-- Laravel標準で用意されているJavascriptを読み込み --}}
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        {{-- Laravel標準で用意されているCSSを読み込み --}}
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    

    <div class="container bg-beige">
     <div class="row justify-content-center pt-5">
      <div class="card">
        <div class="card-body">
          <div class="row d-flex-row">
            <div class="left-box col-6">
              <img src="{{ asset('storage/image/' . $post->image_path) }}" width="100%" heigth="100%" alt="">
              <div class="d-flex">
                <div class="tag-group d-inline-flex">
                  @foreach ($post->tags as $tag)
                  <p>{{ "#".$tag->tag_name }}</p>
                  @endforeach
                </div>
              </div>
              
              
            </div>
            <div class="right-box col-6">
              <div class="recipe-name"><h2>{{ $post->recipe_name }}</h2></div>
              <div class="comment">{{ $post->comment }}</div>
            </div>
          </div>
          <div class="row d-flex-row">
            <a href="/home">レシピ一覧に戻る</a>
            <a href="/recipe/edit/{{ $post->id }}">編集</a>
            <a href="{{ action('App\Http\Controllers\RecipeController@delete', ['id' => $post->id ]) }}">削除</a> 
            
          </div>
        </div>
      </div>

            <!-- <div class="card">
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col" width="20%">レシピ名</th>
                      <th scope="col" width="15%">お酒のジャンル</th>
                      <th scope="col" width="40%">コメント</th>
                      <th scope="col" width="15%">画像</th>
                      <th scope="col" width="15%">編集</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">{{ $post->recipe_name }}</th>
                      <td>お酒</td>
                      <td>{{ \Str::limit($post->comment, 200 )}}</td>
                      <td>
                        <img src="{{ asset('storage/image/' . $post->image_path) }}" width="100%" heigth="100%" alt="">
                      </td>
                      <td>
                      <a href="/recipe/edit/{{ $post->id }}">編集</a>
                      <a href="{{ action('App\Http\Controllers\RecipeController@delete', ['id' => $post->id ]) }}">削除</a> 
                      </td>
                    </tr>
                      </tbody>
                </table>
            </div> -->
        
    </div>
</div>
@endsection