<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>TryElement</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link href="https://cdn.jsdelivr.net/npm/daisyui@2.24.0/dist/full.css" rel="stylesheet" type="text/css" />
        <script src="https://cdn.tailwindcss.com"></script>
        @vite('resources/css/app.css')
    </head>

    <body>
            @include('commons.error_messages')

            @yield('content')
    </body>
    <script>
        let selectedCardId; // 選択されたカードのIDを保持する変数
    
        function selectCard(cardId) {
            selectedCardId = cardId; // カードが選択された際にIDを設定
            modal.classList.remove("hidden"); // モーダルを表示
        }
    
        document.addEventListener("DOMContentLoaded", function () {
            const confirmButton = document.getElementById("modal-confirm");
            const cancelButton = document.getElementById("modal-cancel");
    
            confirmButton.addEventListener("click", function () {
                // はいボタンがクリックされたときの処理をここに追加
                modal.classList.add("hidden");
                // 選択されたカードID（selectedCardId）をサーバーに送信して処理を進めるか、必要ならばカード情報を更新するなどの処理を実行
            });
    
            cancelButton.addEventListener("click", function () {
                // キャンセルボタンがクリックされたときの処理をここに追加
                modal.classList.add("hidden");
            });
        });
    </script>

</html>