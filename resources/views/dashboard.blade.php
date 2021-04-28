<x-app-layout>



    <div class="explanation" id="explanation">

    </div>


    <section class="navisection">
        <div class="imgbox">
            <a href="{{ route('handsign.index')}}" ><img src="img/ありがとう.gif" alt="" width="300px"></a>
            <img src="img/クリック.gif" alt="" width="100px" class="clickimg">
        </div>
        <div class="textbox">
            <div  class="h1title">
                <h1>使い方</h1>
            </div>
            <p>
                <a href="{{ route('handsign.index')}}" class="underline">①募集中の手話表現</a>
                の中から、<br>投稿する表現のイラストを選択してください。
            </p>

            <p>②カメラを起動し5秒間で手話表現の動画を<br>撮影してください。</p>
            <p>③投稿して頂いた動画は<a href="{{ route('video.index')}}" class="underline">投稿済みの動画を見る</a><br>から確認出来ます。</p>
        </div>
    </section>
</x-app-layout>
