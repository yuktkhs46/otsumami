@extends('layouts.app')
@section('content')

    <div class="container bg-beige">
      <div class="row justify-content-center pt-5">
        <div class="card">
          <div class="card-body">
            <div class="row d-flex-row">
              <div class="left-box col-6">
                <img src="{{ $post->image_path }}" width="100%" heigth="100%" alt="">
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
                <div class="btn-group mx-auto">
                  <button type="button" class="btn-flat-border btn-block "><a href="/">レシピ一覧に戻る</a></button>
                </div>
                <div class=" pull-left">
                  @can ("update", $post)
                  <button type="button" class="btn-flat-border btn-sm "><a href="/recipe/edit/{{ $post->id }}">編集</a></button>
                  <button type="button" class="btn-flat-border btn-sm "><a href="route('delete', ['id' => $post->id ]) }}">削除</a></button>
                  @endcan
                </div>
                  
                
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection