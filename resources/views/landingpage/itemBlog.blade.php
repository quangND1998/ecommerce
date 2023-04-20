@extends('landingpage.layout.index')
@section('content')
    <div class="">
        <div class="container mx-auto">
            <div class="flex justify-between hearder_itemBlog">
                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                        <a href="#" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                            <svg aria-hidden="true" class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                            Blog
                        </a>
                        </li>
                        <li>
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <a href="#" class="ml-1 text-sm font-medium text-gray-700 hover:text-blue-600 md:ml-2 dark:text-gray-400 dark:hover:text-white">Meet AutoManage, the best Al management tools</a>
                        </div>
                        </li>
                        <li aria-current="page">
                        <div class="flex items-center">
                            <svg aria-hidden="true" class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                            <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2 dark:text-gray-400">Projects</span>
                        </div>
                        </li>
                    </ol>
                </nav>
                <div>
                    <a href="" class=" border rounded-lg px-3 py-2 hover:no-underline "><i class="fa-regular fa-copy mr-2"></i>Coppy link</a>
                    <button class="px-2 py-1 border px-3 py-2 rounded-lg"><i class="fa-brands fa-facebook-f"></i></button>
                </div>
            </div>
            <div class="text-center max-w-4xl mx-auto mt-5">
                <p class="text-gray-500 text-sm my-3">{{ $post->updated_at }}</p>
                <h2 class="text-5xl font-bold title_itemblog">{{ $post->name }}</h2>
                <p class="text-gray-500 text-base my-3">{!! $post->sub_title !!} </p>
            </div>
            <div class="my-5">
                <img src="{{ $post->image }}" class="mx-auto" alt="">
            </div>
            <div class="max-w-3xl mx-auto">
                <div class="mb-5">
                    {!! $post->description !!}
                </div>
                <div class="flex">
                    <p>Tag:</p>
                    @foreach ($post->tags as $tag)
                        <p class="px-2 py-1 text-xs bg-gray-100 rounded-xl w-fit mx-2">{{ $tag->name }}</p>
                    @endforeach
                </div>
            </div>
            <div class="max-w-screen-xl mx-auto my-4">
                <div class="min-[320px]:block sm:flex flex justify-between footer_itemblog">
                    <h2 class="min-[320px]:pb-4 text-3xl font-bold mx-8">Bài viết khác</h2>
                    <a href="" class="min-[320px]:ml-8  rounded-3xl border px-3 py-2 mr-8 hover:no-underline">Xem tất cả <i class="fa-solid fa-chevron-right ml-2"></i></a>
                </div>

                <div class="min-[320px]:block sm:flex sm:flex-wrap sm:justify-start flex justify-center">
                    @foreach ($post_others as $post_other)
                    <div class=" item_blog ">
                        <a href="/blog/{{ $post_other->slug }}.html">
                            <div>
                                <img src="{{ $post_other->image }}" alt="">
                            </div>
                            <div class="my-3">
                                <p class="text-sm text-gray-500">{{ $post->updated_at }}</p>
                                <h3 class="text-2xl font-semibold my-2">{{ $post->name }}</h3>
                                <p class="text-gray-500 text-sm my-3 clamp three-lines">{!! $post->sub_title !!}</p>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
