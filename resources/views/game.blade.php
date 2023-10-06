@extends('layouts.app')

@section('content')


<div class="flex justify-center">{{--computer--}}
    <div class="grid grid-cols-5 gap-8 mt-14">
        <div class="w-40 h-60 bg-info"></div>
        <div class="w-40 h-60 bg-info"></div>
        <div class="w-40 h-60 bg-info"></div>
        <div class="w-40 h-60 bg-info"></div>
        <div class="w-40 h-60 bg-info"></div>
    </div>
</div>


<div class="flex justify-center">{{--battle--}}
    <div class="grid grid-cols-2 gap-8 mt-14">
        <div class="w-60 h-80 bg-info"></div>
        <div class="w-60 h-80 bg-info"></div>
    </div>
</div>


<div class="flex justify-center">{{--player--}}
    <div class="grid grid-cols-5 gap-8 mt-14">
        <div class="w-40 h-60 bg-info"></div>
        <div class="w-40 h-60 bg-info"></div>
        <div class="w-40 h-60 bg-info"></div>
        <div class="w-40 h-60 bg-info"></div>
        <div class="w-40 h-60 bg-info"></div>
    </div>
</div>


@endsection

