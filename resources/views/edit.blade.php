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


<div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2 class="text-center">レシピ編集</h2>
                <form action="{{ action('App\Http\Controllers\RecipeController@update') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    
                    <div class="form-group row">
                        <label class="col-md-2" for="title">レシピ名</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="recipe_name" value="{{ $post->recipe_name }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">ジャンル</label>
                        <div class="col-md-10">
                            
                            <input type="text" class="form-control" name="tag_name" value="@foreach ($post->tags as $tag) {{'#'.$tag->tag_name}} @endforeach ">
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="body">コメント</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="comment" rows="20">{{ $post->comment }}</textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="title">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                        <div>
                            設定中： {{ $post->image_path }}
                        </div>
                    </div>
                    <input type="hidden" name="id" value="{{ $post->id }}">
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                
                </form>
            </div>
        </div>
    </div>
    @endsection