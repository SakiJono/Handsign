<x-app-layout>

    <style>



    </style>

    <section class="recsection">
        <div class="textbox">
            <img src="{{ Storage::url($image->file_path) }}" class="img" width="250px">
            <p>{{ $image->file_title }}の手話表現を録画してください</p>
            <p>録画時間は5秒間です</p>
            <p>録画後動画を確認して保存をしてください</p>
        </div>

        <div>
            <div class="camera">
                <video id="localvideo" autoplay class="localvideo"></video>
                <video id="testvideo" class="testvideo"></video>
            </div>
            <div class="buttonbox">
                <div class="buttons">
                    <button id="start" class="upbutton beforebutton">カメラの起動</button>
                    <button id="stop" class="upbutton clickbutton">カメラの停止</button>
                </div>
                <div id="recbutton" class="buttons recbutton">
                    <button id="record" class="upbutton beforebutton">5秒間の録画開始</button>
                    <button type="submit" id="savebutton" class="upbutton clickbutton"> 保存 </button>
                </div>
                <div class="buttons">
                    <button id="reload" class="upbutton">やり直し</button>
                </div>
            </div>
        </div>
    </section>

    <div class="thanks" id="thanks">
        <div class="thanksillust">
            <p>ご協力ありがとうございました！</p>
            <img src="{{asset('img/お礼イラスト.png')}}" alt="" width="400px">
            <a href="{{route('video.index')}}" class="pagelink"><button class="button">戻る</button>
        </div></a>
    </div>



<script>

const localvideo = document.getElementById('localvideo');
const testvideo = document.getElementById('testvideo');
const start = document.getElementById('start');
const stop = document.getElementById('stop');
const record = document.getElementById('record');
const savevideo = document.getElementById('savevideo');
const savebutton = document.getElementById('savebutton');
const recbutton = document.getElementById('recbutton');
const reload = document.getElementById('reload');
const thanks = document.getElementById('thanks');
let record_data = [];


//やり直し
    reload.onclick = function(){
        location.reload(false);
    }

// カメラの起動
    start.onclick = function(){
        stop.style.zIndex = 3;
        recbutton.style.display = "block";
        startVideo();
    }

    function startVideo() {
        navigator.mediaDevices.getUserMedia({ video: true, audio: false })
        .then(function (stream) {
            localvideo.srcObject = stream;
            localvideo.playsInline = true;
            const recorder = new MediaRecorder(stream);
            record.onclick = function(){
                record.disabled = true;
                record.style.backgroundColor = '#a3a3a3';
                recorder.start();
                function timeup() {
                    recorder.stop();
                    savebutton.style.zIndex = 3;
                };
                setTimeout(timeup, 5000);
            };
            recorder.ondataavailable = function (e) {
            var testvideo = document.getElementById('testvideo');
            testvideo.setAttribute('controls', '');
            var outputdata = window.URL.createObjectURL(e.data);
            record_data.push(e.data)
            testvideo.style.display = "block";
            testvideo.src = outputdata;

            };
        }).catch(function (error) { // 失敗時の処理
        console.error('mediaDevice.getUserMedia() error:', error);
        return;
        });
            savebutton.onclick = function(){
                saveStreameVideo(record_data);
                savebutton.disabled = true;
            }
    }


// カメラの停止
    stop.onclick = function(){
        stop.style.zIndex = 1;
        recbutton.style.display = "none";
        stopStreamedVideo(localvideo);
    }

    function stopStreamedVideo(videoElem) {
        const stream = videoElem.srcObject;
        const tracks = stream.getTracks();

        tracks.forEach(function(track) {
            track.stop();
        });

        videoElem.srcObject = null;
    }

// 保存処理
    function saveStreameVideo (record_data){
    var blob = new Blob(record_data, { type: 'video/webm' });
    const id = '{{ $image->id }}'
    const userid = '{{Auth::user()->id}}'
    const data = new FormData();
    data.append('savevideo', blob, new Date() +'video.webm');
    data.append('handsign', id);
    data.append('userid', userid);
    axios.post('/video', data, {
        headers: { 'content-type': 'multipart/form-data' }
    })
    .then(res => {
    thanks.style.display = 'flex'
    stopStreamedVideo(localvideo);
    // window.location.href = '{{ url('/video') }}';
    }).catch(error => {
        new Error(error)
    });
    }

</script>


</x-app-layout>
