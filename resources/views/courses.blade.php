@extends('dashboard.layout')
@section('title')
Courses -pricing
@endsection
@section('body')
@php
    $d=\DB::table('homepages')->get();
@endphp
@section('badcock')

<div class="badcock"></div>
@endsection


    <div class="banner-image " >
        <div class="px-1 col-lg-6 py-lg-5 offset-lg-3">

            <div class="gradient-text text-uppercase price-head ">OOPs! Are you in need of rich Knowledge base material on Trading and more</div>
            <p class="second-text price-head1">Kindly select the one that fits your goals and proceed to pay
            </p>

        </div>

    </div>
    @php
    $d=\App\Models\Bot::whereDate('date',\Carbon\Carbon::now()->format('Y-m-d'))->get();
@endphp
    <div class="container">
        <div class="mx-0 row justify-content-center">
            @foreach ($d as $e=>$v )
            <div class="mb-2 col-lg-5">
                <a href="">
                    <div class="py-4 pl-2 shadow-sm pricing-card pl-lg-3 card">
                        <div class="card-body position-relative">
                            <h5 class="head"> {{ $v->name }}</h5>



                            <p class="ben">
                                <img src="{{asset('storage/'.$v->image)}}" alt="" class="my-2 rounded w-100" height="220">
                            </p>



                            <div class="right-0 forex-icon position-absolute bottom-4"><img src="{{ asset('forex-icon.svg') }}" ></div>
                            <div class="py-3 amount-box w-100">
                                ${{ $v->price }}
                            </div>

                            <a href="{{ route('courses.pricing',['id'=>$v->id,'name'=>$v->name]) }}" class="blue-btn">
                                Proceed to Payment
                            </a>


                        </div>
                    </div>
                </a>
                </a>
            </div>

            @endforeach

        </div>
    </div>








    </div>
@endsection
