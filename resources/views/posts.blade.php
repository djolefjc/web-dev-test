<x-guest-layout>
    <div class="bg-white py-8 px-4 sm:px-6 lg:py-12 lg:px-8">
        <div class="relative max-w-lg mx-auto divide-y-2 divide-gray-200 lg:max-w-7xl">
            <a href="{{ route('posts') }}" class="block font-bold text-2xl">Posts</a>
            <div class="mt-6 pt-10 grid gap-16 lg:grid-cols-2 lg:gap-x-5 lg:gap-y-12">
                @forelse($posts as $post)
                <div>
                    <p class="text-sm text-gray-500">
                        <time datetime="2020-03-16">{{ \Carbon\Carbon::parse($post->created_at)->format('M d, Y') }}</time>
                    </p>
                    <a href="{{ route('post.show', $post->id) }}" class="mt-2 block">
                        <p class="text-xl font-semibold text-gray-900">
                            {{ $post->title }}
                        </p>
                        <p class="mt-3 text-base text-gray-500">
                            {{ substr($post->content, 0, 150) }}
                        </p>
                    </a>
                    <div class="mt-3">
                        <a href="{{ route('post.show', $post->id) }}" class="text-base font-semibold text-indigo-600 hover:text-indigo-500">
                            Read full story
                        </a>
                    </div>
                </div>
                @empty
                <p class="lg:col-span-2 text-center font-bold text-3xl">No posts found!</p>
                @endforelse
                <div class="lg:col-span-2">
                    {{ $posts->links() }}
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>