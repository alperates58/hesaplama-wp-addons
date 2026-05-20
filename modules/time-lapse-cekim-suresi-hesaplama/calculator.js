function hcTimelapsModDegis() {
    var mode = document.getElementById('hc-timelapse-mode').value;
    document.getElementById('hc-timelapse-capture-group').style.display = mode === 'capture-to-video' ? 'block' : 'none';
    document.getElementById('hc-timelapse-video-group').style.display = mode === 'video-to-capture' ? 'block' : 'none';
    document.getElementById('hc-timelapse-interval-group').style.display = mode === 'interval' ? 'block' : 'none';
}

function hcTimeLapseCekimSuresiHesapla() {
    var mode = document.getElementById('hc-timelapse-mode').value;
    var fps = parseFloat(document.getElementById('hc-timelapse-fps').value);

    if (isNaN(fps) || fps <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    if (mode === 'capture-to-video') {
        var captureHours = parseFloat(document.getElementById('hc-timelapse-capture-hours').value);
        if (isNaN(captureHours) || captureHours <= 0) {
            alert('Lütfen geçerli bir çekim süresi giriniz.');
            return;
        }

        // Çekim süresi dakika cinsinden
        var captureMinutes = captureHours * 60;

        // Default interval (2 saniye)
        var interval = 2;

        // Frame sayısı = (çekim süresi × 60) / interval
        var frames = Math.round(captureMinutes * 60 / interval);

        // Video süresi = frame sayısı / fps
        var videoSeconds = frames / fps;
        var videoMinutes = Math.floor(videoSeconds / 60);
        var seconds = Math.round(videoSeconds % 60);

        document.getElementById('hc-timelapse-result-label1').innerText = 'Video Uzunluğu (' + interval + 's interval):';
        document.getElementById('hc-timelapse-result-val1').innerText = videoMinutes + ' dk ' + seconds + ' sn';
        document.getElementById('hc-timelapse-result-label2').innerText = 'Toplam Kare Sayısı:';
        document.getElementById('hc-timelapse-result-val2').innerText = frames.toLocaleString('tr-TR');
        document.getElementById('hc-timelapse-result-label3').innerText = 'Çekim Süresi:';
        document.getElementById('hc-timelapse-result-val3').innerText = captureHours.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' saat';

    } else if (mode === 'video-to-capture') {
        var videoSeconds = parseFloat(document.getElementById('hc-timelapse-video-seconds').value);
        if (isNaN(videoSeconds) || videoSeconds <= 0) {
            alert('Lütfen geçerli bir video uzunluğu giriniz.');
            return;
        }

        var interval = 2;
        var frames = Math.round(videoSeconds * fps);
        var captureSeconds = frames * interval;
        var captureHours = captureSeconds / 3600;

        document.getElementById('hc-timelapse-result-label1').innerText = 'Çekim Süresi (' + interval + 's interval):';
        document.getElementById('hc-timelapse-result-val1').innerText = captureHours.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' saat';
        document.getElementById('hc-timelapse-result-label2').innerText = 'Toplam Kare Sayısı:';
        document.getElementById('hc-timelapse-result-val2').innerText = frames.toLocaleString('tr-TR');
        document.getElementById('hc-timelapse-result-label3').innerText = 'Video Uzunluğu:';
        document.getElementById('hc-timelapse-result-val3').innerText = videoSeconds.toLocaleString('tr-TR') + ' saniye';

    } else {
        var interval = parseFloat(document.getElementById('hc-timelapse-interval').value);
        if (isNaN(interval) || interval <= 0) {
            alert('Lütfen geçerli bir interval giriniz.');
            return;
        }

        var captureHours = parseFloat(document.getElementById('hc-timelapse-capture-hours').value);
        if (isNaN(captureHours) || captureHours <= 0) {
            alert('Lütfen geçerli bir çekim süresi giriniz.');
            return;
        }

        var captureMinutes = captureHours * 60;
        var frames = Math.round(captureMinutes * 60 / interval);
        var videoSeconds = frames / fps;
        var videoMinutes = Math.floor(videoSeconds / 60);
        var seconds = Math.round(videoSeconds % 60);

        document.getElementById('hc-timelapse-result-label1').innerText = 'Video Uzunluğu:';
        document.getElementById('hc-timelapse-result-val1').innerText = videoMinutes + ' dk ' + seconds + ' sn';
        document.getElementById('hc-timelapse-result-label2').innerText = 'Toplam Kare Sayısı:';
        document.getElementById('hc-timelapse-result-val2').innerText = frames.toLocaleString('tr-TR');
        document.getElementById('hc-timelapse-result-label3').innerText = 'Interval:';
        document.getElementById('hc-timelapse-result-val3').innerText = interval.toLocaleString('tr-TR') + ' saniye';
    }

    document.getElementById('hc-time-lapse-cekim-suresi-hesaplama-result').classList.add('visible');
}
