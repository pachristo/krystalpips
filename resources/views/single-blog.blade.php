@extends('layout.main')
@section('title')
    {{ $blog->title }}
@endsection
@section('meta_description')
    {{ $blog->description }}
@endsection
@section('css')

@endsection
@section('body')




    @section('banner')
<div class="lg:px-[240px]  flex items-center justify-between lg:min-h-[10rem] min-h-20 ">
    <div class="w-[625px]  mt-32 lg:mt-0">
        <h1
            class="font-bold lg:text-4xl text-2xl bg-gradient-to-l from-[#001133] to-[#003399] bg-clip-text text-transparent mb-2.5 inline-block">
            <span class="lg:block"> :: Blogs</span>

        </h1>
        <h6 class="text-[#434242] text-base lg:text-lg mb-2.5">
            {{ $blog->title }}
        </h6>
        {{-- <a class="primary-btn px-5 py-2.5 " href="{{ url('dashboard') }}">Join now</a> --}}
    </div>
</div>
@endsection


    <div class=" py-lg-5 container-fluid">
        <div class="container">
            <div class="p-1 bg-white rounded p-lg-3">



                <!-- Component Code -->
                <div class="w-full">

                    <div class="flex flex-col max-w-[900px] mx-auto mb-10 overflow-hidden text-center rounded">
                        <a href="#">
                            <img class="w-full my-4" src="{{ asset('storage/' . $blog->photo) }}" alt="Sunset in the mountains">
                        </a>


                    </div>
                    <hr />

                </div>

                <div class="max-w-[900px]  mx-auto">
                    <div
                        class="flex flex-col justify-between mt-3 leading-normal bg-white rounded-b lg:rounded-b-none lg:rounded-r">
                        <div class="">
                            {!! $blog->content !!}
                        </div>

                    </div>
                </div>
            </div>

        </div>





        {{--
            <div class="cs-blog-detail">
                <div class="cs-main-post">
                </div>
                <div class="cs-post-title">
                    <div class="cs-author">

                    <div class="post-option">

                        <span class="post-date text-dark"><a href=""><i class="cs-color icon-calendar6"></i>{{ \Carbon\Carbon::parse($blog->created_at)->format('jS, M Y') }}</a></span>

                    </div>
                </div>
                <div class="cs-post-option-panel">
                    <div class="rich-editor-text">

                    </div>
                </div>
                <div class="cs-tags">


                </div>

            </div>
            </div> --}}
    </div>
    </div>


    </div>
@endsection
