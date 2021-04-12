<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('ビデオ録画の画面') }}
        </h2>
    </x-slot>

    <div class="camera">
        <video id="video" autoplay width="600px"></video>
    </div><br>
    <button id="start">start!!</button>
    <button id="stop">stop!!</button>
    <button id="record">5秒間の録画開始</button>
    <div>
        <video id="testvideo" width="600px"></video>
    </div>

<script>

const video = document.getElementById('video');
const testvideo = document.getElementById('testvideo');
const start = document.getElementById('start');
const stop = document.getElementById('stop');
const record = document.getElementById('record');

// カメラの起動
    start.onclick = function(){
        startVideo();
    }

    function startVideo() {
        navigator.mediaDevices.getUserMedia({ video: true, audio: false })
        .then(function (stream) {
            console.log(stream)
            video.srcObject = stream;
            video.playsInline = true;
            const recorder = new MediaRecorder(stream)
                console.log(recorder)
                record.onclick = function(){
                recorder.start()
                console.log('startnow')
                function timeup() {
                    recorder.stop()
                };
                setTimeout(timeup, 3000);
            }
            recorder.ondataavailable = function (e) {
                console.log(e)
            var testvideo = document.getElementById('testvideo')
            testvideo.setAttribute('controls', '')
            var outputdata = window.URL.createObjectURL(e.data)
            // record_data.push(e.data)
            testvideo.src = outputdata
            }
        }).catch(function (error) { // 失敗時の処理はこちら.
        console.error('mediaDevice.getUserMedia() error:', error);
        return;
        });
    }


// カメラの停止
    stop.onclick = function(){
        stopStreamedVideo(video);
    }

    function stopStreamedVideo(videoElem) {
        const stream = videoElem.srcObject;
        const tracks = stream.getTracks();

        tracks.forEach(function(track) {
            track.stop();
        });

        videoElem.srcObject = null;
    }

</script>


</x-app-layout>
