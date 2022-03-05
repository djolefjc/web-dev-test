<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          View Comment
      </h2>
    </x-slot>

  <div class="text-lg max-w-prose  mx-auto rounded shadow-lg px-2 py-2">
    <div class="font-bold mb-2"><a href="#">{{$main_comment->name}}</a></div>
    <p class="text-gray-700 text-base">
      {{$main_comment->comment}}
    </p>
    </div>
@if(count($comments) > 0)
<div class="relative px-4 sm:px-6 pt-10 lg:px-8">
    <div class="text-lg max-w-prose mx-auto">
        <span class="block text-base text-indigo-600 font-semibold tracking-wide uppercase">Repplies</span>
      </div>
      @foreach($comments as $comment)
      <div class="text-lg max-w-prose  mx-auto rounded shadow-lg px-2 py-2">
        <div class="font-bold mb-2"><a href="#" id="comment_id">{{$comment->name}}</a></div>
        <p class="text-gray-700 text-base">
          {{$comment->comment}}
        </p>
        </div>
      @endforeach
    </div>
  @endif
  </x-app-layout>
