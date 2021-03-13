@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
             <h2 class="text-center">お酒登録</h2>
             <form action="{{ action('App\Http\Controllers\Admin\TagController@update') }}" method="post">
                  @if (count($errors) > 0)
                     <ul>
                        @foreach($errors->all() as $e)
                               <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="tag_name" value="{{ $tag->tag_name }}" >
                        </div>
                        <input type="hidden" name="id" value="{{ $tag->id }}">
                        <input type="submit" class="btn btn-primary col-md-2" value="変更">
                        
                        
                    </div>
                    
                    {{ csrf_field() }}
                </form>
         </div>
     </div>
</div>
    @endsection