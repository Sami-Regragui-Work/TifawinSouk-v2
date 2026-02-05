<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create(){
        return view('admin.categories.create');
    }

    public function store(Request $request){
        
        $request->validate([
            'title' => 'required|max:255' ,
            'description' => 'nullable' ,
        ]);

        Category::create([
            'title' => $request->title, 
            'description' => $request->description,
        ]);

        return redirect('/categories') ;
    }

    
}
