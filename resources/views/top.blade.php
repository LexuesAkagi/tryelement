@extends('layouts.app')

@section('content')

    <header>
        <div class="mt-10">
            <img class="d-block mx-auto" src="{{ asset('img/toppage.png') }}" alt="">
        </div>
    </header>
    
    <div class="text-center">
        <a href="#" class="btn btn-success btn-lg mt-10" href="#about">ゲームを始める</a>
    </div>
    
    <div class="grid grid-cols-2 gap-2">
        <div>
            <p class="ml-40">ゲーム説明</p>
            <p class="ml-40">コンピューターと１対１で戦うカードゲームです。</p>
            <p class="ml-40">１ゲームに各５枚のカードが配られ５ターンで勝敗が決まります。</p>
            <p class="ml-40">各カードは、個体値と属性を持っています。</p>
            <p class="ml-40">個体値：１・３・５・７　　属性：火・水・緑</p>
            <p class="ml-40">属性は</p>
            <p class="ml-40">火は水に弱く緑に強い</p>
            <p class="ml-40">水は緑に弱く火に強い</p>
            <p class="ml-40">緑は火に弱く水に強いという特性を持っています。</p>
            <p class="ml-40">同じ属性での戦いの場合は個体値で勝敗が決まります</p>
            <p class="ml-40">異なる属性の場合は、特性によって個体値に＋４されて戦いとなります</p>
        </div>
        <div>
            <img src="{{ asset('img/element.png') }}" alt="" style="width:400px">
        </div>
    </div>
@endsection