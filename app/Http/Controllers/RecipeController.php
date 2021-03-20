<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Recipe;
use App\Models\Tag;


class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request){
        $posts = Recipe::all();
        $tags = Tag::all();
        // dd($posts); 
        // echo phpinfo();
        return view('home', ['posts' => $posts, 'tags' => $tags] );
    }

    public function add(){
        
        return view('create');
    }

    public function create(Request $request){
        $recipe = new Recipe;
        $form = $request->all();
        // dd($form);
        
        //画像が送信されたら保存して $recipe->image_pathカラム にパスを保存する
        if (isset($form['image'])) {//変数に値が入っているかをチェック
            $path = $request->file('image')->store('image');// 画像をstorage/app/public/images配下に保存
            $recipe->image_path = basename($path);//パスからを取得したファイル名をimage_pathカラムに保存
        } else {
            $recipe->image_path = null;
        }
        
        
        preg_match_all('/#([a-zA-z0-9０-９ぁ-んァ-ヶ亜-熙]+)/u', $request->tag_name, $match);
     
        $tags = [];
        foreach ($match[1] as $tag) {
            $record = Tag::firstOrCreate(['tag_name' => $tag]);
            array_push($tags, $record);
        };

        //投稿に紐付けされるタグのIDを配列化
        $tags_id = [];
        foreach ($tags as $tag) {
            array_push($tags_id, $tag['id']);
        };
        
        unset($form['_token']);
        unset($form['image']);

        $recipe->fill($form)->save();
        $recipe->tags()->attach($tags_id); // 投稿にタグつけするためにattachメソッドを使う
        
        return redirect('/home');
    }

    // ブログ詳細画面を表示する
    public function showDetail($id){
        $post = Recipe::find($id);

        if (empty($post)) {
            abort(404);    
          }
        return view('detail', ['post' => $post]);

    }

    // レシピ編集画面を表示する
    public function edit($id){
        
        $post = Recipe::find($id);
        
        return view('edit', ['post' => $post]);
    }

    // レシピを更新する
    public function update(Request $request){
        
        $recipe = Recipe::find($request->id);
        
        $recipe_form = $request->all();
        
        if ($request->remove == 'true') {
            $recipe_form['image_path'] = null;
        } elseif($request->file('image')) {
            $path = $request->file('image')->store('image');
            $recipe_form['image_path'] = basename($path);
        } else {
            $recipe_form['image_path'] = $recipe->image_path;
        }

        unset($recipe_form['_token']);
        unset($recipe_form['remove']);
        unset($recipe_form['image']);

        $recipe->fill($recipe_form)->save();

        return redirect('/home');


    }

    // レシピ削除
    public function delete(Request $request){
        

        $recipe = Recipe::find($request->id);
        
        $recipe->delete();
        return redirect('/home');
    }

}