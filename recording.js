window.onload = function() {
    navigator.mediaDevices.getUserMedia({ audio: true, video: true }).then(stream => {
        document.getElementById("vid").srcObject = stream;
    });
}

let shouldStop = false;
let stopped = false;
const videoElement = document.getElementsByTagName("video")[0];
const downloadLink = document.getElementById('download');
const stopButton = document.getElementById('stop');


function startRecord() {
    $('.btn-info').prop('disabled', true);
    $('#stop').prop('disabled', false);
    $('#download').css('display', 'none')
}

function stopRecord() {
    $('.btn-info').prop('disabled', false);
    $('#stop').prop('disabled', true);
    $('#download').css('display', 'block')
}
const audioRecordConstraints = {
    echoCancellation: true
}

stopButton.addEventListener('click', function() {
    shouldStop = true;
});




const handleRecord = function({ stream, mimeType }) {
    let recordedChunks = [];
    stopped = false;
    const mediaRecorder = new MediaRecorder(stream);
    mediaRecorder.ondataavailable = function(e) {
        if (e.data.size > 0) {
            recordedChunks.push(e.data);
        }
        if (shouldStop === true && stopped === false) {
            mediaRecorded.stop();
            stopped = true;
        }
    };
    mediaRecorder.onstop = function() {
        const blob = new Blob(recordedChunks, {
            type: mimeType
        });
        recordedChunks = []
        const filename = window.prompt('Enter file name');
        downloadLink.href = URL.createObjectURL(blob);
        downloadLink.download = `${filename || 'recording'}.webm`;
        stopRecord();
        videoElement.srcObject = null;
        //  document.getElementById("vid").srcObject = stream;
    };
    mediaRecorder.start(200);
};

//audio recording
async function recordAudio() {
    const mimeType = 'audio/webm';
    shouldStop = false;
    const stream = await navigator.mediaDevices.getUserMedia({ audio: true });
    handleRecord({ stream, mimeType })
}

//video recording
async function recordVideo() {
    const mimeType = 'video/webm';
    shouldStop = false;
    const constraints = {
        video: true
    };
    const stream = await navigator.mediaDevices.getUserMedia(constraints);
    handleRecord({ stream, mimeType })
}


//screen recording

async function recordScreen() {
    const mimeType = 'video/webm';
    shouldStop = false;
    const constraints = {
        video: {
            cursor: 'motion'
        }
    };
    if (!(navigator.mediaDevices && navigator.mediaDevices.getDisplayMedia)) {
        return window.alert('Screen Record not supported!')
    }
    let stream = null;
    const displayStream = await navigator.mediaDevices.getDisplayMedia({ video: { cursor: "motion" }, audio: { 'echoCancellation': true } });
    if (window.confirm("Record audio with screen?")) {
        const audioContext = new AudioContext();

        const voiceStream = await navigator.mediaDevices.getUserMedia({ audio: { 'echoCancellation': true }, video: false });
        const userAudio = audioContext.createMediaStreamSource(voiceStream);

        const audioDestination = audioContext.createMediaStreamDestination();
        userAudio.connect(audioDestination);

        if (displayStream.getAudioTracks().length > 0) {
            const displayAudio = audioContext.createMediaStreamSource(displayStream);
            displayAudio.connect(audioDestination);
        }

        const tracks = [...displayStream.getVideoTracks(), ...audioDestination.stream.getTracks()]
        stream = new MediaStream(tracks);
        handleRecord({ stream, mimeType });
    } else {
        stream = displayStream;
        handleRecord({ stream, mimeType });
    };
    videoElement.srcObject = stream;
    // document.getElementById("vid").srcObject = stream;
}