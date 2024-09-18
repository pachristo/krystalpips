@extends('dashboard.layout')
@section('title')
Profile dashboard - krystalpips.com

@endsection

@section('body')

@include('partial.user_breadcrumb')
<div class="container-xxl mt-3">
    @livewire('profile-update')
</div>

@endsection
