<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher;

class PublishersController extends Controller
{

    public function index()
    {
        $publishers = Publisher::all();
        return view('publishers', compact('publishers'));
    }

    public function add()
    {
    	return view('publisher-add');
    }

    public function create(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
    	$publisher = new Publisher();
    	$publisher->name = $request->name;
    	$publisher->save();
    	return redirect('/publishers'); 
    }

    public function edit(Publisher $publisher)
    {
        return view('publisher-edit', compact('publisher'));
    }

    public function update(Request $request, Publisher $publisher)
    {
    	if(isset($_POST['delete'])) {
    		$publisher->delete();
    		return redirect('/publishers');
    	}
    	else
    	{
            $this->validate($request, [
                'name' => 'required'
            ]);
    		$publisher->name = $request->name;
	    	$publisher->save();
	    	return redirect('/publishers'); 
    	}
    }
}