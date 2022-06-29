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
    {{-- <footer class="bg-gray-100 border border-black border-opacity-5 rounded-xl py-16 px-10 mt-16"> --}}
        <h5 class="text-3xl text-center mt-6 mb-3">Comments</h5>
    <footer class="max-w-6xl mx-auto px-10 mb-10">
        <div class="mt-5 max-w-2xl mx-auto">
            {{-- <x-comment :comments ="{{$comments}}"/> --}}
            <div class="px-4 py-2" id="comment-section">
                @foreach ($comments as $value)
                    <section class="flex text-m bg-gray-100 border border-gray-200 rounded-xl px-8 py-4 my-4">
                        <div class="comment-body">
                            <header class="comment-row ">
                                <h3 class="font-bold">{{$value->user->name}}</h3>
                                <p class="text-xs">Commented <time> {{$value->created_at->diffForHumans()}} </time></p>
                            </header>
                            <p>{{$value->comment}}</p>
                        </div>
                    </section>
                @endforeach
            </div>
            <div class="relative mx-auto text-center px-4 py-2">
                <form id="comment-form" method="POST" action="/blog/addComment" data-blog="{{$blog->id}}" class="text-sm py-2 px-4 border border-gray-300 rounded-xl my-4">
                    @csrf
                    <div class="flex items-center bg-white-400">
                        <textarea id="comment" name="comment" type="text" placeholder="add your comment here"
                               class="w-full py-3 pl-4 focus-within:outline-none"></textarea>
                    </div>
                    <button type="submit" id="add-comment"
                            class="float-right bg-blue-500 hover:bg-blue-600 mt-4 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 ml-2 my-2">
                        Post your comment
                    </button>
                </form>
            </div>
        </div>
    </footer>
</x-layout>
@include('Blog.comment-script')
