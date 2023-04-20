@extends('landingpage.layout.index')
@section('content')

<div class="blog">
    <div class="container mx-auto">
        <div class="text-center title_blog">
            <p class="font-semibold text-base text-blue-500">Blogs</p>
            <h2 class="text-5xl font-bold">Bài viết mới</h2>
        </div>
        <div class="my-4 max-w-screen-xl mx-auto list_blog">
            <div class="">
                <div class="flex flex-wrap duration-700 ease-in-out justify-center"  data-carousel-item>
                    @foreach ($posts as $post)
                    <div class="w-1/4 ">
                        <a href="/blog/{{ $post->slug }}">
                            <img class="rounded image_item w-30" src="{{ $post->image }}"  alt="...">
                            <div class="info_item">
                                <label for="small" class="block mb-2 text-sm text_base dark:text-white">{{ $post->updated_at }}</label>
                                <label for="small" class="block mb-2 font-bold text-xl  dark:text-white rounded">{{ $post->name }}</label>
                                <label for="small" class="block mb-2 text-sm text_base dark:text-white">{!!  $post->sub_title  !!}</label>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
