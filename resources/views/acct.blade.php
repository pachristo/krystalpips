@extends('dashboard.layout')
@section('title')
    Account Management
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

            <div class="gradient-text text-uppercase price-head ">OOPs! You don’t have a Account plan </div>
            <p class="second-text price-head1">Check the available Account management plans and make payment for anyone of your choice to get signal calls
            </p>

        </div>

    </div>
    @php
    $d=\App\Models\AccountManagement::get();
@endphp
    <div class="container">
        <div class="mx-0 row justify-content-center">
            @foreach ($d as $e=>$v )
            <div class="mb-2 col-lg-5">
                <a href="">
                    <div class="py-4 pl-2 shadow-sm pricing-card pl-lg-3 card">
                        <div class="card-body position-relative">
                            <h5 class="head"> {{ $v->name }}</h5>

                        @if($v->benefits!=null)
                         @foreach ($v->benefits as  $value)

                            <p class="ben">🎯 &nbsp; {{ $value['benefit']}}</p>
                            @endforeach
@endif

                            <div class="right-0 forex-icon position-absolute bottom-4"><img src="{{ asset('forex-icon.svg') }}" ></div>
                            <div class="py-3 amount-box w-100">
                                ${{ $v->price }}
                            </div>

                            <a href="{{ route('acct.pricing',['id'=>$v->id,'name'=>$v->name]) }}" class="blue-btn">
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
