@extends('layout.main')
@section('body')
@php
    $d=\DB::table('homepages')->get();
@endphp
@section('banner')
<div class="lg:px-[240px]  flex items-center justify-between lg:min-h-[10rem] min-h-20 ">
    <div class="w-[625px]  mt-32 lg:mt-0">
        <h1
            class="font-bold lg:text-4xl text-2xl bg-gradient-to-l from-[#001133] to-[#003399] bg-clip-text text-transparent mb-2.5 inline-block">
            <span class="lg:block"> :: Blogs</span>

        </h1>
        {{-- <p class="text-[#434242] text-base lg:text-lg mb-2.5">
            No more losses ! This is an intensive program designed for those who
            want to master the skills of professional Forex Trading with proven
            strategies and earn more with Free signals.
        </p> --}}
        {{-- <a class="primary-btn px-5 py-2.5 " href="{{ url('dashboard') }}">Join now</a> --}}
    </div>
</div>
@endsection





        @php
            $blog=\App\Models\Blog::latest('created_at')->paginate(6);
        @endphp




<div class="container px-4 py-8 mx-auto">
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
      <!-- Blog Card 1 -->
      @foreach ($blog as $k => $v)
      <div class="overflow-hidden bg-white rounded-lg shadow-md">
        <a  href="{{ url('blog') }}/{{ $v->slug }}" >
        <img src="{{ asset('storage/'.$v->photo) }}" alt="Blog Image" class="object-cover w-full h-48">
        <div class="p-4">
          <h2 class="mb-2 text-xl font-bold"> {{ \Str::limit($v->title, 30, '..') }}</h2>
          <p class="text-base text-gray-700"> {{ \Str::limit($v->description, 120, '..') }}</p>
          <a  href="{{ url('blog') }}/{{ $v->slug }}" class="inline-block mt-4 font-semibold text-indigo-600 hover:text-indigo-800">Read More</a>
        </div>
        </a>
      </div>
      @endforeach







    </div>
</div>





@endsection
