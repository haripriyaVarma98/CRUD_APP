<x-layout>
    <main class="max-w-6xl mx-auto space-y-6 text-center">
        <h1 class="text-center font-bold text-xl text-blue-500">Blogs</h1>
        @if ($blogs->count())
           <x-blog-grid :blogs="$blogs"/>
           {{$blogs->links()}}
        @else
            <p class="text-center">No blogs yet!!</p>
        @endif
    </main>
</x-layout>