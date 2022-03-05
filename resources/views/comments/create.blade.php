<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Comment') }}
        </h2>
    </x-slot>
    @if ($message = Session::get('message'))
      <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
        <p class="text-sm">{{$message}}</p>
      </div>
    @endif

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                  <form action="{{ route('store.comment') }}" method="POST" class="space-y-8">
                      @csrf
                      <input type="hidden" name="comment_id" value="{{$comment->id}}"/>
                      <div class="space-y-8 divide-y divide-gray-200">
                          <div class="mt-6 grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">

                              <div class="sm:col-span-4">
                                  <label for="name" class="block text-sm font-medium text-gray-700">
                                      Your Name
                                  </label>
                                  <div class="mt-1 relative rounded-md shadow-sm">
                                      <input type="text" id="name" name="name" value="{{ old('name') ?? $comment->name ?? '' }}" class="{{ $errors->has('name') ? 'text-red-900 border-red-300 placeholder-red-300 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} block w-full pr-10 focus:outline-none sm:text-sm rounded-md">

                                  </div>
                                  @error('name')
                                  <p class="mt-2 text-sm text-red-600" id="name-error">{{ $message }}</p>
                                  @enderror
                              </div>

                              <div class="sm:col-span-4">
                                  <label for="email" class="block text-sm font-medium text-gray-700">
                                      Your Email
                                  </label>
                                  <div class="mt-1 relative rounded-md shadow-sm">
                                      <input type="text" id="email" name="email" value="{{ old('email') ?? $comment->email ?? '' }}" class="{{ $errors->has('email') ? 'text-red-900 border-red-300 placeholder-red-300 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} block w-full pr-10 focus:outline-none sm:text-sm rounded-md">

                                  </div>
                                  @error('email')
                                  <p class="mt-2 text-sm text-red-600" id="title-error">{{ $message }}</p>
                                  @enderror
                              </div>

                              <div class="sm:col-span-6">
                                  <label for="your_comment" class="block text-sm font-medium text-gray-700">
                                      Your comment
                                  </label>
                                  <div class="mt-1">
                                      <textarea id="your_comment" name="your_comment" rows="10" class="{{ $errors->has('your_comment') ? 'text-red-900 border-red-300 placeholder-red-300 focus:ring-red-500 focus:border-red-500' : 'border-gray-300 focus:ring-indigo-500 focus:border-indigo-500' }} shadow-sm block w-full sm:text-sm border-gray-300 rounded-md">{{ old('your_comment') ?? $comment->comment ?? '' }}</textarea>
                                  </div>
                                  @error('your_comment')
                                  <p class="mt-2 text-sm text-red-600" id="content-error">{{ $message }}</p>
                                  @enderror
                              </div>

                          </div>
                      </div>

                      <div class="pt-5">
                          <div class="flex justify-end">
                              <button type="submit" class="ml-3 mb-2 inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                  Submit
                              </button>
                          </div>
                      </div>
                  </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
