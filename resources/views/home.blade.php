@extends('layouts.app')

@section('content')

<div class="album py-5 bg-light">
    <div class="container">
    

      <div class="row ">
      @foreach($posts as $recipe)
        
        <div class="col-md-4 d-flex">
          <div class="card mb-4 shadow-sm d-inline-flex">
          <img src="{{ $recipe->image_path }}" width="100%" heigth="80%" alt="">
            <div class="card-body">
              <h4 class="card-text">{{ $recipe->recipe_name }}</h4>
              <p class="tags">@foreach ( $recipe->tags as $tag ) {{ "#".$tag->tag_name }} @endforeach </p>
              <div class="d-flex justify-content-between align-items-center " >
              
              
                <div class="btn-group">
                  <button type="button" class="btn btn-sm btn-outline-secondary"><a href="/recipe/{{ $recipe->id }}">もっと見る</a></button>
                  <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                </div>
                <div class="d-flex flex-column">
                  <small class="text-muted">{{ $recipe->user->name }}</small>
                  <small class="text-muted">{{ $recipe->created_at }}</small>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        
        @endforeach 
      </div>
      
    </div>
  </div>



































{{---------------------------------------------------------------------------------------------------------------------}}
<!-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if (session('err_msg'))
                    <p class="text-danger">{{ session('err_msg') }}</p>
                    
                    @endif

                    {{ __('You are logged in!') }}
                </div>
                <table class="table">
                  <thead>
                    <tr>
                      <th scope="col" width="20%">レシピ名</th>
                      <th scope="col" width="15%">お酒のジャンル</th>
                      <th scope="col" width="40%">コメント</th>
                      <th scope="col" width="15%">画像</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($posts as $recipe)
                    
                    <tr>
                      <th scope="row">
                        <a href="/recipe/{{ $recipe->id }}">{{ $recipe->recipe_name }}</a>
                      </th>
                      <td>お酒</td>
                      <td>{{ \Str::limit($recipe->comment, 200 )}}</td>
                      <td>
                        <img src="{{ asset('storage/image/' . $recipe->image_path) }}" width="100%" heigth="100%" alt="">
                      </td>
                      
                      
                    </tr>
                    
              
                    @endforeach
                      </tbody>
                </table>
            </div>
        </div>
    </div>
</div> -->
@endsection
