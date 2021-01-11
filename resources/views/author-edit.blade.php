<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Edit Author') }}
      </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
            <form method="POST" action="/author/{{ $author->id }}">
                <div class="form-group">
                  <label class="block text-grey-darker text-sm font-bold mb-2" for="lastname">
                    Last Name
                  </label>
                  <input name="last_name" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" value="{{$author->last_name }}" id="lastname"/> 
                    @if ($errors->has('last_name'))
                        <span class="text-danger">{{ $errors->first('last_name') }}</span>
                    @endif
                </div>

                <div class="form-group mt-3">
                  <label class="block text-grey-darker text-sm font-bold mb-2" for="firstname">
                    First Name
                  </label>
                  <input name="first_name" class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" value="{{$author->first_name }}" id="firstname"/> 
                    @if ($errors->has('first_name'))
                        <span class="text-danger">{{ $errors->first('first_name') }}</span>
                    @endif
                </div>

                <div class="form-group mt-3">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                      Update
                    </button>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
  </div>

</x-app-layout>