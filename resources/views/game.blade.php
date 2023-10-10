@extends('layouts.app')

@section('content')


<div class="flex justify-center">{{--computer--}}
    <div class="grid grid-cols-5 gap-8 mt-14">
        @foreach ($drawCards as $card)
        <div class="w-40 h-60 bg-info cursor-pointer" onclick="selectCard('{{ $card->id }}')">
            <img src="{{ $card->image_path }}" alt="カード画像" class="w-40 h-60 bg-info">
        </div>
        @endforeach
    </div>
</div>
<div id="modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <!-- モーダルの背景を作成 -->
    <div class="fixed inset-0 bg-gray-900 opacity-50"></div>
    
    <!-- モーダルのコンテンツを中央に配置 -->
    <div class="relative bg-white p-6 rounded-lg w-80">
        <!-- モーダルのコンテンツをここに挿入 -->
        <p>このカードでよろしいですか？</p>
        <div class="mt-4 flex justify-end">
            <button id="modal-confirm" class="px-4 py-2 bg-green-500 text-white rounded-lg mr-4">はい</button>
            <button id="modal-cancel" class="px-4 py-2 bg-gray-400 text-white rounded-lg">キャンセル</button>
        </div>
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

