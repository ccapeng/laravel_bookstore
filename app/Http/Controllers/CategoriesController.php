<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('categories', compact('categories'));
    }

    public function add()
    {
    	return view('category-add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
    	$category = new Category();
    	$category->name = $request->name;
    	$category->save();
    	return redirect('/categories'); 
    }

    public function edit(Category $category)
    {
        return view('category-edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
    	if(isset($_POST['delete'])) {
    		$category->delete();
    		return redirect('/categories');
    	}
    	else
    	{
            $this->validate($request, [
                'name' => 'required'
            ]);
    		$category->name = $request->name;
	    	$category->save();
	    	return redirect('/categories'); 
    	}    	
    }
}