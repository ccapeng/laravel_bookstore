<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Publisher;
use App\Models\Author;
use App\Models\Book;

class BooksController extends Controller
{

    public function index()
    {
        $books = Book::all();
        return view('dashboard', compact('books'));
    }

    public function add()
    {
        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();
    	return view('book-add', compact('categories', 'publishers', 'authors'));
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        $book = new Book();
        
        // error_log('title: '. $request->title);
        // error_log('category: '. $request->category);
        // error_log('publisher: '. $request->publisher);
        // error_log('author: '. $request->author);

        $book->title = $request->title;
        $book->category_id = $request->category;
        $book->publisher_id = $request->publisher;
        $book->author_id = $request->author;

        // error_log('book: '. $book);

    	$book->save();
    	return redirect('/dashboard'); 
    }

    public function edit(Book $book)
    {
        $categories = Category::all();
        $publishers = Publisher::all();
        $authors = Author::all();
        return view('book-edit', compact('book', 'categories', 'publishers', 'authors'));
    }

    public function update(Request $request, Book $book)
    {
    	if(isset($_POST['delete'])) {
    		$book->delete();
    		return redirect('/dashboard');
    	}
    	else
    	{
            $this->validate($request, [
                'title' => 'required'
            ]);
            
            error_log('title: '. $request->title);
            error_log('category: '. $request->category);
            error_log('publisher: '. $request->publisher);
            error_log('author: '. $request->author);

            $book->title = $request->title;
            $book->category_id = $request->category;
            $book->publisher_id = $request->publisher;
            $book->author_id = $request->author;

            error_log('book: '. $book);

	    	$book->save();
	    	return redirect('/dashboard'); 
    	}    	
    }
}