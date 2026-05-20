function hcVideoDosyaBoyutuHesapla() {
    var bitrate = parseFloat(document.getElementById('hc-video-bitrate').value);
    var durationMin = parseFloat(document.getElementById('hc-video-duration-min').value);

    if (isNaN(bitrate) || isNaN(durationMin) || bitrate <= 0 || durationMin <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Dosya boyutu = (bitrate × dakika × 60 saniye) / 8 / 1000 = MB
    var fileSizeMb = (bitrate * durationMin * 60) / 8;
    var fileSizeGb = fileSizeMb / 1024;
    var perMinuteMb = bitrate * 60 / 8;
    var oneHourMb = (bitrate * 60 * 60) / 8;
    var oneHourGb = oneHourMb / 1024;

    var fileSizeMbStr = fileSizeMb.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 });
    var fileSizeGbStr = fileSizeGb.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    var perMinuteStr = perMinuteMb.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' MB';
    var oneHourStr = oneHourGb.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' GB';

    document.getElementById('hc-video-size-mb-val').innerText = fileSizeMbStr + ' MB';
    document.getElementById('hc-video-size-gb-val').innerText = fileSizeGbStr + ' GB';
    document.getElementById('hc-video-size-per-min-val').innerText = perMinuteStr;
    document.getElementById('hc-video-size-1h-val').innerText = oneHourStr;

    document.getElementById('hc-video-dosya-boyutu-hesaplama-result').classList.add('visible');
}
