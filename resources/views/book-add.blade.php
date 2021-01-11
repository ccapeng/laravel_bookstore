<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Add Book') }}
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <form method="POST" action="/book">
                <div class="form-group">
                  <label class="block text-grey-darker text-sm font-bold mb-2" for="title">
                    Title
                  </label>
                  <input name="title" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" placeholder='Enter Book title' id="title"/> 
                    @if ($errors->has('title'))
                        <span class="text-danger">{{ $errors->first('title') }}</span>
                    @endif
                </div>

                <div class="form-group mt-6">
                  <label class="block text-grey-darker text-sm font-bold mb-2" for="category">
                    Category
                  </label>
                  <select name="category" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" id="category">
                    @foreach($categories as $category)
                      <option value="{{$category->id}}">
                        {{$category->name}}
                      </option>
                    @endforeach
                  </select>
                </div>

                <div class="form-group mt-6">
                  <label class="block text-grey-darker text-sm font-bold mb-2" for="publisher">
                    Publisher
                  </label>
                  <select name="publisher" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" id="publisher">
                    @foreach($publishers as $publisher)
                      <option value="{{$publisher->id}}">
                        {{$publisher->name}}
                      </option>
                    @endforeach
                  </select>
                  </select>
                </div>

                <div class="form-group mt-6">
                  <label class="block text-grey-darker text-sm font-bold mb-2" for="author">
                    Author
                  </label>
                  <select name="author" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" id="author">
                    @foreach($authors as $author)
                      <option value="{{$category->id}}">
                        {{$author->last_name}}, {{$author->first_name}}
                      </option>
                    @endforeach
                  </select>
                  </select>
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                      Add
                    </button>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
  </div>

</x-app-layout>