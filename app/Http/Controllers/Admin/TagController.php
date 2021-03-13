<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{

    public function add(){
        $tags = Tag::all();

        return view('admin.tag_create', ['tags' => $tags]);
    }

    public function create(Request $request){
        $tag = new Tag;
        $form = $request->all();
        // dd($form);
        unset($form['_token']);

        $tag->fill($form)->save();

        return redirect('admin/tag/create');

    }

    public function edit($id){
        $tag = Tag::find($id);
        
        return view('admin.tag_edit', ['tag' => $tag]);
    }

    public function update(Request $request){
        // dd($request);
        $tag = Tag::find($request->id);
        $tag_form = $request->all();

        unset($tag_form['_token']);

        $tag->fill($tag_form)->save();
        return redirect('admin/tag/create');

    }

    public function delete(Request $request){
        $tag  = Tag::find($request->id);
        $tag->delete();
        return redirect('admin/tag/create');

    }
}
