<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index(){
        $recipes = Recipe::all();

        return view('admin.recipe_index', ['recipes' => $recipes]);
    }
}
