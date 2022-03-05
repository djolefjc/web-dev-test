<x-app-layout>
  @if ($message = Session::get('message'))
    <div class="bg-blue-100 border-t border-b border-blue-500 text-blue-700 px-4 py-3" role="alert">
      <p class="text-sm">{{$message}}</p>
    </div>
  @endif
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Comments
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(!count($comments))
                <p class="text-center font-bold text-3xl">No comments found!</p>
            @else
                <div class="bg-white mb-8 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex flex-col">
                        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <thead>
                                            <tr>
                                            <th>
                                              Email
                                            </th>
                                            <th>
                                              Comment
                                            </th>
                                            <th>
                                              Entity type
                                            </th>
                                            <th>
                                              Actions
                                            </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($comments as $comment)
                                            <tr class="{{ $loop->iteration % 2 ? 'bg-white' : 'bg-gray-50' }}">
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                  <a href="mailto:{{$comment->email}}"> {{ $comment->email }} </a>
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                    {{ $comment->comment }}
                                                </td>
                                                <td>
                                                  @if(str_contains($comment->entity_type,'Post'))
                                                    Post
                                                  @elseif(str_contains($comment->entity_type,'News'))
                                                    Article
                                                  @endif
                                                 </td>
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                  <form class="inline-block" action="{{ route('comment.approve', $comment->id) }}" method="POST">
                                                      @method('POST')
                                                      @csrf
                                                      <button type="submit" class="ml-4 text-indigo-600 hover:text-indigo-900">@if($comment->approved == 0) Approve @else Disapprove @endif</button>
                                                  </form>
                                                  <a href="{{ route('comment.show', $comment->id) }}" target="_blank" class="text-indigo-600 hover:text-indigo-900">View</a>
                                                    <a href="{{ route('comment.edit', $comment->id) }}" class="ml-4 text-indigo-600 hover:text-indigo-900">Edit</a>
                                                    <form class="inline-block" action="{{ route('comment.destroy', $comment->id) }}" method="POST">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button type="submit" class="ml-4 text-indigo-600 hover:text-indigo-900">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{ $comments->links() }}
            @endif
        </div>
    </div>
</x-app-layout>
