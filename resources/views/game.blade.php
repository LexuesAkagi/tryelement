@extends('layouts.app')

@section('content')


<div class="flex justify-center">{{--player--}}
    <div class="grid grid-cols-{{count($unuseCards)}} gap-8 mt-14">
        @foreach ($unuseCards as $card)
        <div class="w-40 h-60 bg-info cursor-pointer" onclick="selectCard('{{ $card->id }}')">
            <img src={{asset($card->image_path)}} alt="カード画像" class="w-40 h-60 bg-info">
        </div>
        @endforeach
    </div>
</div>
<div class="flex justify-center">{{--battle--}}
    <div class="grid grid-cols-4 gap-8 mt-14">
        <div class="flex flex-col items-center justify-center">
            <div>PrayerScore</div>
            <div>{{ $gameScore }}</div>
        </div>
        <div class="w-60 h-80 bg-info">
            @if(isset($usedCard))
                <img src={{asset($usedCard->image_path)}} alt="カード画像"class="w-60 h-80 bg-info">
            @endif
        </div>
        <div class="w-60 h-80 bg-info">
            @if(isset($comUsedCard))
                <img src={{asset($comUsedCard->image_path)}} alt="カード画像"class="w-60 h-80 bg-info">
            @endif
        </div>
        <div class="flex flex-col items-center justify-center">
            <div>ComputerScore</div>
            <div>{{ $comGameScore }}</div>
        </div>
    </div>
</div>

<div class="flex justify-center">{{--computer--}}
    <div class="grid grid-cols-{{count($comUnuseCards)}} gap-8 mt-14">
        @foreach ($comUnuseCards as $card)
        <div class="w-40 h-60 bg-info cursor-pointer" onclick="selectCard('{{ $card->id }}')">
            <img src={{asset($card->image_path)}} alt="カード画像" class="w-40 h-60 bg-info">
        </div>
        @endforeach
    </div>
</div>
<div id="modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <!-- モーダルの背景を作成 -->
    <div class="fixed inset-0 bg-gray-900 opacity-50"></div>

    
    <div class="relative bg-white p-6 rounded-lg w-80">
        <!-- モーダルのコンテンツをここに挿入 -->
        <p>このカードでよろしいですか？</p>
        <div class="mt-4 flex justify-end">
            <form method="POST" action="{{ route('game.select') }}">
                @csrf
                <input type="hidden" name="selectedCardId" id="selectedCardId" value="">
                <!-- 他のフォームフィールドを追加 -->
                <button id="modal-confirm" class="px-4 py-2 bg-green-500 text-white rounded-lg mr-4">はい</button>
                <button id="modal-cancel" class="px-4 py-2 bg-gray-400 text-white rounded-lg">キャンセル</button>
            </form>
        </div>
    </div>
</div>
@if(isset($message))<!--各結果表示-->
    <div id="modal2" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <!-- モーダルの背景を作成 -->
        <div class="fixed inset-0 bg-gray-900 opacity-50"></div>
    
        <!-- モーダルのコンテンツを中央に配置 -->
        <div class="relative bg-white p-6 rounded-lg text-center w-100">
            <p></p>
            <button id="close-modal" class="px-4 py-2 bg-red-500 text-white rounded-lg mr-4 ">閉じる</button>

        </div>
    </div>
@endif
@if (isset($finmessage))<!--最終結果表示-->
    <div id="modal3" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <!-- モーダルの背景を作成 -->
        <div class="fixed inset-0 bg-gray-900 opacity-50"></div>
    
        <!-- モーダルのコンテンツを中央に配置 -->
        <div class="relative bg-white p-6 rounded-lg text-center w-100">
            <p></p>
            <a href="/" id="close-modal" class="px-4 py-2 bg-red-500 text-white rounded-lg mr-4 mt-40">トップページへ</a>
        </div>
    </div>
@endif
@endsection

