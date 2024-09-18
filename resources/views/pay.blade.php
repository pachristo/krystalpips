@extends('dashboard.layout')
@section('title')
    {{ $p->name }}
@endsection
@section('body')

@section('badcock')
    <div class="badcock"></div>
@endsection


<div class="banner-image ">
    <div class="px-1 col-lg-12 py-lg-5">

        <div class="gradient-text text-uppercase price-head ">Make Payment </div>
        <p class="second-text price-head1">You are about to make Payment for {{ $p->name }}
        </p>

    </div>

</div>
@php
    $d = \App\Models\Setting::latest('created_at')->first();
@endphp
<style>
    .p-gh{
        font-family: 'Poppins';
font-size: 14px;
font-weight: 500;
line-height: 21px;
text-align: left;

    }
    .p-amount{
        font-family: 'Poppins';
font-size: 24px;
font-weight: 500;
line-height: 24px;
text-align: center;
color: #146614;

padding: 9px 16px 9px 16px;
gap: 10px;
border-radius: 10px ;
border: 1px solid;
opacity: 0px;

    }
    .p-address{
        font-family: 'Poppins', sans-serif;
font-size: 14px;
font-weight: 500;
line-height: 21px;
text-align: left;
color:#484848;
    }
    .p-address-default{
        font-family: 'Poppins', sans-serif;
font-size: 14px;
font-weight: 500;
line-height: 21px;
text-align: left;
color:#146614;
    }
    .text-dark{
        color: black!important;
    }
</style>
<div class="container">
    <div class="mx-0 row justify-content-center">

        <div class="mb-2 col-lg-4">
            <a href="">
                <div class="py-4 pl-2 shadow-sm pricing-card pl-lg-3 card">
                    <div class="card-body position-relative">
                        <div class="d-flex ">
                            <div class="col-3 d-flex align-items-center">
                                <img src="{{ asset('paym/paypal.png') }}"width="100" alt="" />


                            </div>
                            <div class="col-9 ps-4">
                                <div class=" text-start form-group">
                                    <h3  class="pb-1 mb-0"><strong class=" p-gh text-dark font-weight-bold">Payment With Paypal</strong></h3>
                                </div>
                                <button type="button" class="mt-2 bg-transparent border rounded text-start 4 w-100 p-amount btn"> $
                                    {{ number_format($p->price, 2) }}</button>
                            </div>

                        </div>
                        <br>
                        <div class="form-group p-address">Paypal Address:</div>
                        <h5 class=" p-address-default"> {{ $d->paypal ?? '' }}</h5>






                        <div class="right-0 p-3 text-white rounded bg-gray  bottom-4 p-lg-3 w-100">
<style>
    .btn-confirm{
  
padding: 10px;
gap: 10px;
border-radius: 10px;
border: 1px solid #0033998F;
opacity: 0px;
color:#0033998F;
font-family: Poppins;
font-size: 14px;
font-weight: 600;
line-height: 21px;
text-align: left;

    }
    .btn-confirm:hover{
        background:#0033998F;
        color:white;
    }
</style>
<a class="btn btn-confirm w-100" href="https://t.me/CEOKingsbet?text=hello, Just subscribe to your {{$p->name}} at ${{$p->price}} via paypal address {{$d->paypal}}">
    Confirm Transaction
</a>

                        </div>




                    </div>
                </div>
            </a>
            </a>
        </div>


        <div class="mb-2 col-lg-4">
            <a href="">
                <div class="py-4 pl-2 shadow-sm pricing-card pl-lg-3 card">
                    <div class="card-body position-relative">
                        <div class="d-flex ">
                            <div class="col-3 d-flex align-items-center">
                                <img src="{{ asset('paym/usdt.png') }}"width="100" alt="" />


                            </div>
                            <div class="col-9 ps-4">
                                <div class=" text-start form-group">
                                    <h3  class="pb-1 mb-0"><strong class=" p-gh text-dark font-weight-bold">Payment With USDT TRC20</strong></h3>
                                </div>
                                <button type="button" class="mt-2 bg-transparent border rounded text-start 4 w-100 p-amount btn"> $
                                    {{ number_format($p->price, 2) }}</button>
                            </div>

                        </div>
                        <br>
                        <div class="form-group p-address">USDT ADDRESS:</div>
                        <h5 class=" p-address-default"> {{ $d->usdt ?? '' }}</h5>






                        <div class="right-0 p-3 text-white rounded bg-gray  bottom-4 p-lg-3">
<a class="btn btn-confirm w-100" href="https://t.me/CEOKingsbet?text=hello, Just subscribe to your {{$p->name}} at ${{$p->price}} via usdt address {{$d->usdt}}">
    Confirm Transaction
</a>


                        </div>




                    </div>
                </div>
            </a>
            </a>
        </div>

        <div class="mb-2 col-lg-4">
            <a href="">
                <div class="py-4 pl-2 shadow-sm pricing-card pl-lg-3 card">
                    <div class="card-body position-relative">
                        <div class="d-flex ">
                            <div class="col-3 d-flex align-items-center">
                                <img src="{{ asset('paym/neteller.jpeg') }}"width="100" alt="" />


                            </div>
                            <div class="col-9 ps-4">
                                <div class=" text-start form-group">
                                    <h3  class="pb-1 mb-0"><strong class=" p-gh text-dark font-weight-bold">Payment With NETELLER</strong></h3>
                                </div>
                                <button type="button" class="mt-2 bg-transparent border rounded text-start 4 w-100 p-amount btn"> $
                                    {{ number_format($p->price, 2) }}</button>
                            </div>

                        </div>
                        <br>
                        <div class="form-group p-address">NETELLER ADDRESS:</div>
                        <h5 class=" p-address-default"> {{ $d->net ?? '' }}</h5>






                        <div class="right-0 p-3 text-white rounded bg-gray  bottom-4 p-lg-3">
<a class="btn btn-confirm w-100" href="https://t.me/CEOKingsbet?text=hello, Just subscribe to your {{$p->name}} at ${{$p->price}} via neteller address {{$d->net}}">
    Confirm Transaction
</a>


                        </div>




                    </div>
                </div>
            </a>
            </a>
        </div>


        <div class="mb-2 col-lg-4">
            <a href="">
                <div class="py-4 pl-2 shadow-sm pricing-card pl-lg-3 card">
                    <div class="card-body position-relative">
                        <div class="d-flex ">
                            <div class="col-3 d-flex align-items-center">
                                <img src="{{ asset('paym/skrill.jpeg') }}"width="100" alt="" />


                            </div>
                            <div class="col-9 ps-4">
                                <div class=" text-start form-group">
                                    <h3  class="pb-1 mb-0"><strong class=" p-gh text-dark font-weight-bold">Payment With SKRILL</strong></h3>
                                </div>
                                <button type="button" class="mt-2 bg-transparent border rounded text-start 4 w-100 p-amount btn"> $
                                    {{ number_format($p->price, 2) }}</button>
                            </div>

                        </div>
                        <br>
                        <div class="form-group p-address">SKRILL ADDRESS:</div>
                        <h5 class=" p-address-default"> {{ $d->skrill ?? '' }}</h5>






                        <div class="right-0 p-3 text-white rounded bg-gray  bottom-4 p-lg-3">
<a class="btn btn-confirm w-100" href="https://t.me/CEOKingsbet?text=hello, Just subscribe to your {{$p->name}} at ${{$p->price}} via skrill address {{$d->skrill}}">
    Confirm Transaction
</a>


                        </div>




                    </div>
                </div>
            </a>
            </a>
        </div>


        <div class="mb-2 col-lg-4">
            <a href="">
                <div class="py-4 pl-2 shadow-sm pricing-card pl-lg-3 card">
                    <div class="card-body position-relative">
                        <div class="d-flex ">
                            <div class="col-3 d-flex align-items-center">
                                <img src="{{ asset('paym/bitcoin.png') }}"width="100" alt="" />


                            </div>
                            <div class="col-9 ps-4">
                                <div class=" text-start form-group">
                                    <h3  class="pb-1 mb-0"><strong class=" p-gh text-dark font-weight-bold">Payment With BITCOIN</strong></h3>
                                </div>
                                <button type="button" class="mt-2 bg-transparent border rounded text-start 4 w-100 p-amount btn"> $
                                    {{ number_format($p->price, 2) }}</button>
                            </div>

                        </div>
                        <br>
                        <div class="form-group p-address">BITCOIN ADDRESS:</div>
                        <h5 class=" p-address-default"> {{ $d->btc ?? '' }}</h5>






                        <div class="right-0 p-3 text-white rounded bg-gray  bottom-4 p-lg-3">

<a class="btn btn-confirm w-100" href="https://t.me/CEOKingsbet?text=hello, Just subscribe to your {{$p->name}} at ${{$p->price}} via Bitcoin address {{$d->btc}}">
    Confirm Transaction
</a>

                        </div>




                    </div>
                </div>
            </a>
            </a>
        </div>


        <div class="mb-2 col-lg-4">
            <a href="">
                <div class="py-4 pl-2 shadow-sm pricing-card pl-lg-3 card">
                    <div class="card-body position-relative">
                        <div class="d-flex ">
                            <div class="col-3 d-flex align-items-center">
                                <img src="{{ asset('paym/pm.jpeg') }}"width="100" alt="" />


                            </div>
                            <div class="col-9 ps-4">
                                <div class=" text-start form-group">
                                    <h3  class="pb-1 mb-0"><strong class=" p-gh text-dark font-weight-bold">Payment With PERFECT MONEY</strong></h3>
                                </div>
                                <button type="button" class="mt-2 bg-transparent border rounded text-start 4 w-100 p-amount btn"> $
                                    {{ number_format($p->price, 2) }}</button>
                            </div>

                        </div>
                        <br>
                        <div class="form-group p-address">PERFECT MONEY ADDRESS:</div>
                        <h5 class=" p-address-default"> {{ $d->pm ?? '' }}</h5>






                        <div class="right-0 p-3 text-white rounded bg-gray  bottom-4 p-lg-3">

<a class="btn btn-confirm w-100" href="https://t.me/CEOKingsbet?text=hello, Just subscribe to your {{$p->name}} at ${{$p->price}} via Perfect Money address {{$d->pm}}">
    Confirm Transaction
</a>

                        </div>




                    </div>
                </div>
            </a>
            </a>
        </div>


        <div class="mb-2 col-lg-4">
            <a href="">
                <div class="py-4 pl-2 shadow-sm pricing-card pl-lg-3 card">
                    <div class="card-body position-relative">
                        <div class="d-flex ">
                            <div class="col-3 d-flex align-items-center">
                                <img src="{{ asset('paym/western.png') }}"width="100" alt="" />


                            </div>
                            <div class="col-9 ps-4">
                                <div class=" text-start form-group">
                                    <h3  class="pb-1 mb-0"><strong class=" p-gh text-dark font-weight-bold">Payment With WESTERN UNION</strong></h3>
                                </div>
                                <button type="button" class="mt-2 bg-transparent border rounded text-start 4 w-100 p-amount btn"> $
                                    {{ number_format($p->price, 2) }}</button>
                            </div>

                        </div>
                        <br>
                        <div class="form-group p-address">WESTERN UNION DETAILS:</div>
                        <div class=""> {!!  $d->wu??'' !!}</div>






                        <div class="right-0 p-3 text-white rounded bg-gray  bottom-4 p-lg-3">

<a class="btn btn-confirm w-100" href="https://t.me/CEOKingsbet?text=hello, Just subscribe to your {{$p->name}} at ${{$p->price}} via Western Union ">
    Confirm Transaction
</a>

                        </div>




                    </div>
                </div>
            </a>
            </a>
        </div>

        <div class="mb-2 col-lg-4">
            <a href="">
                <div class="py-4 pl-2 shadow-sm pricing-card pl-lg-3 card">
                    <div class="card-body position-relative">
                        <div class="d-flex ">
                            <div class="col-3 d-flex align-items-center">
                                <img src="{{ asset('paym/moneyg.png') }}"width="100" alt="" />


                            </div>
                            <div class="col-9 ps-4">
                                <div class=" text-start form-group">
                                    <h3  class="pb-1 mb-0"><strong class=" p-gh text-dark font-weight-bold">Payment With MONEY GRAM</strong></h3>
                                </div>
                                <button type="button" class="mt-2 bg-transparent border rounded text-start 4 w-100 p-amount btn"> $
                                    {{ number_format($p->price, 2) }}</button>
                            </div>

                        </div>
                        <br>
                        <div class="form-group p-address">MONEY GRAM DETAILS:</div>
                        <div class=""> {!!  $d->mg??'' !!}</div>






                        <div class="right-0 p-3 text-white rounded bg-gray  bottom-4 p-lg-3">
<a class="btn btn-confirm w-100" href="https://t.me/CEOKingsbet?text=hello, Just subscribe to your {{$p->name}} at ${{$p->price}} via Money Gram ">
    Confirm Transaction
</a>


                        </div>




                    </div>
                </div>
            </a>
            </a>
        </div>
    </div>
</div>








</div>
@endsection
