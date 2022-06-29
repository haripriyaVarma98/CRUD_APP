@props(['blogs'])

<div class="lg:grid lg:grid-cols-6">
    @foreach ($blogs as $blog)
        <article class = 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl col-span-2'>
            <div class="py-6 px-5">
                <div class="">
                    <img src="uploadedImages/{{$blog->image_name}}" alt="Blog illustration" class="w-full rounded-xl">
                </div>

                <div class="mt-8 flex flex-col justify-between">
                    <header>
                        <div class="mt-4">
                            <h1 class="text-3xl">
                                <a href="/blogs/{{ $blog->slug }}">{{ $blog->title }}</a>
                            </h1>
                            <div class="mb-2">
                                <a href="/blogs/{{ $blog->category_id }}"
                                    class="text-xs font-semibold py-2 px-4 text-blue-500">
                                    Category: {{ $blog->category->name }}
                                </a>
                            </div>
                            
                            <span class="mt-2 block text-gray-400 text-xs">
                                Published <time> {{$blog->created_at->diffForHumans()}} </time>
                            </span>
                        </div>
                    </header>

                    <div class="text-sm mt-4 space-y-4">
                            {!! $blog->brief !!}
                    </div>

                    <footer class="flex justify-between items-center mt-8">
                        <div class="flex items-center text-sm">
                            <div class="ml-3">
                                <a href="#">
                                    <h5 class="font-bold text-green-500"> {{ $blog->author->name }}</h5>
                                </a>
                            </div>
                        </div>

                        <div>
                            <a href="/blogs/{{ $blog->slug }}"
                                class="text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-4">
                                Read More
                            </a>
                        </div>
                    </footer>
                </div>
            </div>
        </article>
    @endforeach
</div>
