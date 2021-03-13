@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 mx-auto">
             <h2 class="text-center">お酒登録</h2>
             <form action="{{ action('App\Http\Controllers\Admin\TagController@create') }}" method="post">
                  @if (count($errors) > 0)
                     <ul>
                        @foreach($errors->all() as $e)
                               <li>{{ $e }}</li>
                        @endforeach
                    </ul>
                    @endif
                    <div class="form-group row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="tag_name" value="">
                        </div>
                        <input type="submit" class="btn btn-primary col-md-2" value="登録">
                        
                        
                    </div>
                    
                    {{ csrf_field() }}
                </form>

                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="5%">ID</th>
                                <th width="25%">お酒の種類</th>
                                <th width="10%">操作</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->id }}</td>
                            <td>{{ $tag->tag_name}}</td>
                            <td>
                                <a href="/tag/edit/{{ $tag->id }}">編集</a>
                                <a href="{{ action('App\Http\Controllers\Admin\TagController@delete', ['id' => $tag->id ]) }}">削除</a> 
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
         </div>
     </div>
</div>
    @endsection