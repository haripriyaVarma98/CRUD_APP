<x-layout>
    <main class="max-w-6xl mx-auto space-y-6">
        <div class="mt-8 flex flex-col justify-between">
            <div class="pb-6 text-center">
                <h3 class="font-bold text-3xl lg:text-4xl mt-10">
                    {{ $blog->title }}
                </h3>
                <div class="mb-2 py-2 px-4 text-xs">
                    <span class="block text-gray-400 ml-2">
                        Published <time> {{$blog->created_at->diffForHumans()}} </time>
                    </span>
                    <a href="/blogs/{{ $blog->category_id }}"
                        class="font-semibold text-blue-500 ml-2">
                        {{ $blog->category->name }}
                    </a>
                </div>
            </div>

            <div class="space-y-4 lg:text-lg leading-loose">
                {!! $blog->body !!}
            </div>
        </div>
        <footer class="flex justify-between items-center mt-8">
            <div class="flex items-center text-sm">
                <a href="#">
                    <h5 class="font-bold text-green-500"> {{ $blog->author->name }}</h5>
                </a>
            </div>
        </footer>
    </main>
</x-layout>