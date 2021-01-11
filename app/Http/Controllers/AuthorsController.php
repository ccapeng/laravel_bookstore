<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class AuthorsController extends Controller
{

    public function index()
    {
        $authors = Author::all();
        return view('authors', compact('authors'));
    }

    public function add()
    {
    	return view('author-add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'last_name' => 'required',
            'first_name' => 'required'
        ]);
    	$author = new Author();
        $author->last_name = $request->last_name;
        $author->first_name = $request->first_name;
    	$author->save();
    	return redirect('/authors'); 
    }

    public function edit(Author $author)
    {
        return view('author-edit', compact('author'));
    }

    public function update(Request $request, Author $author)
    {
    	if(isset($_POST['delete'])) {
    		$author->delete();
    		return redirect('/authors');
    	}
    	else
    	{
            $this->validate($request, [
                'last_name' => 'required',
                'first_name' => 'required'
            ]);
            error_log('last name: '. $request->last_name);
            error_log('first name: '. $request->first_name);
            $author->last_name = $request->last_name;
            $author->first_name = $request->first_name;
	    	$author->save();
	    	return redirect('/authors'); 
    	}
    }
}