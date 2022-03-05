<x-guest-layout>
  @if ($message = Session::get('message'))
    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
      <p class="text-sm">{{$message}}</p>
    </div>
  @endif
    <div class="relative py-16 bg-white overflow-hidden">
        <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
            <div class="relative h-full text-lg max-w-prose mx-auto" aria-hidden="true">
                <svg class="absolute top-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
                </svg>
                <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                </svg>
                <svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
                </svg>
            </div>
        </div>
        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="text-lg max-w-prose mx-auto">
                <span class="block text-base text-center text-indigo-600 font-semibold tracking-wide uppercase">Post</span>
                <h1>
                    <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">{{ $post->title }}</span>
                </h1>
            </div>
            <div class="mt-6 prose prose-indigo prose-lg text-gray-500 mx-auto">
                <p>{!! nl2br(e($post->content)) !!}</p>
            </div>
        </div>
        <div class="relative px-4 pt-10 sm:px-6 lg:px-8">
            <div class="text-lg max-w-prose mx-auto">
                <span class="block text-base text-indigo-600 font-semibold tracking-wide uppercase">Post a comment</span>
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="bg-white border-b border-gray-200">
                                <form action="{{ route('store.comment') }}" method="POST" class="space-y-8">
                                    @csrf
                                    <input type="hidden" name="entity_id" value="{{$post->id}}"/>
                                    <input type="hidden" name="entity_type" value="Post" />
                                    <input type="hidden" id="parent_id" name="parent_id" value=""/>
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
    <div class="relative px-4 sm:px-6 pt-10 lg:px-8">
        <div class="text-lg max-w-prose mx-auto">
            <span class="block text-base text-indigo-600 font-semibold tracking-wide uppercase">Comments</span>
          </div>
          @foreach($comments as $comment)
          <div class="text-lg max-w-prose  mx-auto rounded shadow-lg px-2 py-2">
            <div class="font-bold mb-2"><button onclick="setReply()" value="{{$comment->id}}" id="comment_id">{{$comment->name}}</button></div>
            <p class="text-gray-700 text-base">
              {{$comment->comment}}
            </p>
            </div>
          @endforeach
          {{$comments->links()}}
        </div>

        <script>

          function setReply() {
            document.getElementById("parent_id").value = event.target.value;
            document.getElementById("your_comment").value = "@"+event.target.innerHTML+" ";

          }

        </script>

</x-guest-layout>
