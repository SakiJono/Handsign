<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ビデオ録画の画面') }}
        </h2>
    </x-slot>

    <div class="camera">
        <video id="localvideo" autoplay width="600px"></video>
    </div>
    <button id="start">start!!</button>
    <button id="stop">stop!!</button>
    <button id="record">5秒間の録画開始</button>
    <button type="submit" id="savebutton"> save </button>
    <video id="testvideo" width="600px"></video>
    {{-- <div>
        @include('common.errors')
                <form class="mb-6" action="{{ route('video') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <input type="hidden" name="savevideo" id="savevideo">
                    <button type="submit" id="savebutton"> save </button>
                </form>
    </div> --}}




<script>

const localvideo = document.getElementById('localvideo');
const testvideo = document.getElementById('testvideo');
const start = document.getElementById('start');
const stop = document.getElementById('stop');
const record = document.getElementById('record');
const savevideo = document.getElementById('savevideo');
const savebutton = document.getElementById('savebutton');
let record_data = [];

// カメラの起動
    start.onclick = function(){
        startVideo();
    }

    function startVideo() {
        navigator.mediaDevices.getUserMedia({ video: true, audio: false })
        .then(function (stream) {
            localvideo.srcObject = stream;
            localvideo.playsInline = true;
            const recorder = new MediaRecorder(stream);
            record.onclick = function(){
                recorder.start();
                function timeup() {
                    recorder.stop();
                };
                setTimeout(timeup, 5000);
            };
            recorder.ondataavailable = function (e) {
            var testvideo = document.getElementById('testvideo');
            testvideo.setAttribute('controls', '');
            var outputdata = window.URL.createObjectURL(e.data);
            record_data.push(e.data)
            testvideo.src = outputdata;

            };
        }).catch(function (error) { // 失敗時の処理はこちら.
        console.error('mediaDevice.getUserMedia() error:', error);
        return;
        });
            savebutton.onclick = function(){
                saveStreameVideo(record_data);
            }
    }


// カメラの停止
    stop.onclick = function(){
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
    // console.log(blob.size);
    // document.getElementById('savevideo').value = blob.size;
    // window.URL.revokeObjectURL(url)
    const data = new FormData();
    data.append('savevideo', blob, new Date() +'video.webm');
    axios.post('/video', data, {
        headers: { 'content-type': 'multipart/form-data' }
    })
    .then(res => {
    console.log(res);
    window.location.href = '{{ url('/dashboard') }}';
    }).catch(error => {
        new Error(error)
    });
    }

</script>


</x-app-layout>
