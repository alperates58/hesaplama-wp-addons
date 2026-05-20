function hcVideoKareHiziYavasEkimHesapla() {
    var recordFps = parseFloat(document.getElementById('hc-slowmo-record-fps').value);
    var playbackFps = parseFloat(document.getElementById('hc-slowmo-playback-fps').value);

    if (isNaN(recordFps) || isNaN(playbackFps) || recordFps <= 0 || playbackFps <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Yavaşlama oranı = çekim fps / oynatma fps
    var ratio = recordFps / playbackFps;

    // Hız yüzdesi = (oynatma fps / çekim fps) × 100
    var speedPercentage = (playbackFps / recordFps) * 100;

    // 1 saniye çekim × ratio = video süresi (saniye)
    var oneSecondCapture = ratio + ' saniye';

    // 1 saatlik çekim = 3600 saniye × ratio
    var oneHourDuration = Math.round(3600 * ratio);
    var hours = Math.floor(oneHourDuration / 3600);
    var minutes = Math.floor((oneHourDuration % 3600) / 60);
    var seconds = oneHourDuration % 60;
    var oneHourStr = hours + ' saat ' + minutes + ' dakika ' + seconds + ' saniye';

    var ratioStr = ratio.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + 'x yavaş';
    var percentageStr = speedPercentage.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + '%';
    var durationStr = oneSecondCapture;

    document.getElementById('hc-slowmo-ratio-val').innerText = ratioStr;
    document.getElementById('hc-slowmo-percentage-val').innerText = percentageStr;
    document.getElementById('hc-slowmo-duration-val').innerText = durationStr;
    document.getElementById('hc-slowmo-1hour-val').innerText = oneHourStr;

    document.getElementById('hc-video-kare-hizi-yavas-cekim-hesaplama-result').classList.add('visible');
}
