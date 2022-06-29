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
    <footer>
        <div class="text-center my-4 pt-5">
            <a href="/blogs/create"
                class="text-xs font-semibold bg-blue-500 hover:bg-blue-700 rounded-full py-2 px-4 text-white uppercase">
                Create new blog
            </a>
        </div>
    </footer>
</x-layout>