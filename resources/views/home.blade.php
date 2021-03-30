@extends('layouts.app')

@section('content')

<div class="album py-5 ">
  <div class="container">
    <div class="row ">
      @foreach($posts as $recipe) 
      <div class="col-md-4 d-flex">
        <div class="card mb-4 shadow-sm d-inline-flex">
          <img src="{{ $recipe->image_path }}" width="100%" heigth="80%" alt="">
            <div class="card-body">
              <h4 class="card-text">{{ $recipe->recipe_name }}</h4>
              <p class="tags ">@foreach ( $recipe->tags as $tag ) {{ "#".$tag->tag_name }} @endforeach </p>
              <div class="d-flex justify-content-between align-items-center " >
                <div class="btn-group ">
                  <button type="button" class="btn btn-sm btn-outline-secondary"><a href="{{ route('recipe.show', $recipe->id) }}">もっと見る</a></button>
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

  @endsection