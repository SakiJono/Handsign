<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="logo.ico">
    <link rel="stylesheet" href="css/style.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <title>{{ config('app.name') }}</title>
</head>
<body>
    <div class="topIllust" id="topIllust">
        <div class="titleComment" id="titleComment">
            <p class="titleComment1" id="titleComment1">手話を知っていますか?</p>
                <img src="img/logo.png" alt="" class="titleComment7" id="titleComment7">
        </div>
        <img src="img/トップイラスト.png" alt="" class="Illust">
    </div>

    <div class="explanation" id="explanation">
        @if (Route::has('login'))
        <div class="header">
            <img src="img/logo文字なし.png" alt="" class="logo">
            <div class="anchorbox">
                @auth
                <a href="{{ url('/dashboard') }}" class="anchor">マイページ</a>
                @else
                <a href="{{ route('login') }}" class="anchor">ログイン</a>

                @if (Route::has('register'))
                <a href="{{ route('register') }}" class="anchor">新規登録</a>
                @endif
                @endauth
            </div>
            @endif
        </div>
        <section class="section1box">
            <h1 class="section1title">このサイトは現在開発中の手話翻訳アプリ作成のための、<br>
                仲間を募るWEBサイトです。</h1>
            <h2 class="section1">手話をカメラで撮影し、リアルタイムに文字に<br>
                変換するアプリを目指しています。</h2>
            <p class="section1">開発のため、たくさんの方の手話をしている<br>
                動画を集める必要があります！</p>
            <p class="section1">このサイトを訪れてくれた、手話に関心のある<br>
                皆様、どうぞお力をお貸しください。</p>
        </section>

        <div class="buttonbox">
            <a href="{{ route('login') }}" class="button"><p>ログイン</p></a>
            <a href="{{ route('register') }}" class="button"><p>新規登録</p></a>
        </div>


    </div>


</body>

<script>

    const titleComment1 = document.getElementById("titleComment1");
    const text = ["こんにちはって表現知ってますか?",
                "外国語の翻訳アプリは沢山あるのに",
                "身近なろう者の伝えたいことを知るアプリは<br>見つかりませんでした",
                "そんな経験をもとに、<br>手話から文字への翻訳を目指すプロジェクトを始めました",
                ""];
        let num = -1;

        function slide_time() {
        if (num === 4) {
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

    const topIllust = document.getElementById('topIllust');
    const explanation = document.getElementById('explanation');
    topIllust.onclick = function(){
        topIllust.style.display = 'none';
        explanation.style.display = 'block'
    }

</script>

</html>




