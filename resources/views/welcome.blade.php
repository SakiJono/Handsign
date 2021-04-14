<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="logo.ico">
    <link rel="stylesheet" href="css/style.css">
    <title>手話文字</title>
</head>
<body>
    <div class="topIllust">
        <div class="titleComment" id="titleComment">
            <p class="titleComment1" id="titleComment1"></p>
            <img src="img/logo.png" alt="" class="titleComment7">
        </div>
        <img src="img/トップイラスト.png" alt="" class="Illust">
    </div>

</body>

<script>

    const titleComment1 = document.getElementById("titleComment1");
    const text = ["手話を知っていますか?",
                "こんにちはって表現知ってますか?",
                "外国語の翻訳アプリは沢山あるのに",
                "身近なろう者の伝えたいことを知るアプリは<br>見つかりませんでした",
                "そんな経験をもとに、<br>手話から文字への翻訳を目指すプロジェクトを始めました",
                ""];
        let num = -1;

        function slide_time() {
        if (num === 5) {
            clearInterval(setInterval(slide_time, 3000));
        } else {
            num++;
            titleComment1.animate(
            // キーフレーム
            [
            {opacity: 0},
            {opacity: 1}
            ],
            // オプション
            {
            duration: 500,      // アニメが終了するまでの時間(ミリ秒)
            fill: 'forwards'    // アニメ完了後に最初の状態に戻さない
            }
        );
        }
        titleComment1.innerHTML = text[num];
        }

        setInterval(slide_time, 5000);

</script>

</html>


            {{-- @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

