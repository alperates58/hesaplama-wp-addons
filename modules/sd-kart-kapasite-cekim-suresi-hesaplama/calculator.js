function hcSdModDegis() {
    var mode = document.getElementById('hc-sd-mode').value;
    document.getElementById('hc-sd-video-group').style.display = mode === 'video' ? 'block' : 'none';
    document.getElementById('hc-sd-photo-group').style.display = mode === 'photo' ? 'block' : 'none';
}

function hcSdKartKapasineCekimSuresiHesapla() {
    var capacity = parseFloat(document.getElementById('hc-sd-capacity').value);
    var mode = document.getElementById('hc-sd-mode').value;

    if (isNaN(capacity) || capacity <= 0) {
        alert('Lütfen geçerli bir kapasite giriniz.');
        return;
    }

    // Kullanılabilir alan (~95%)
    var usableCapacity = capacity * 0.95;

    if (mode === 'video') {
        var bitrate = parseFloat(document.getElementById('hc-sd-video-bitrate').value);
        if (isNaN(bitrate) || bitrate <= 0) {
            alert('Lütfen geçerli bir bitrate giriniz.');
            return;
        }

        // Video süresi = (kapasite × 8) / bitrate (dakika cinsinden)
        var videoDurationMinutes = (usableCapacity * 1024 * 8) / bitrate;
        var hours = Math.floor(videoDurationMinutes / 60);
        var minutes = Math.round(videoDurationMinutes % 60);

        var resultStr = hours + ' saat ' + minutes + ' dakika';
        var usableStr = usableCapacity.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' GB';
        var recommendationStr = hours >= 4 ? '✓ Güvenli çekim süresi' : '⚠ Sınırlı çekim süresi (yedek kart önerilir)';

        document.getElementById('hc-sd-result-label').innerText = 'Maksimum Video Süresi:';
        document.getElementById('hc-sd-result-val').innerText = resultStr;
    } else {
        var photoSize = parseFloat(document.getElementById('hc-sd-photo-size').value);
        if (isNaN(photoSize) || photoSize <= 0) {
            alert('Lütfen geçerli bir fotoğraf boyutu giriniz.');
            return;
        }

        // Fotoğraf sayısı = kapasite / ortalama boyut
        var photoCount = Math.floor((usableCapacity * 1024) / photoSize);

        var resultStr = photoCount.toLocaleString('tr-TR');
        var usableStr = usableCapacity.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' GB';
        var recommendationStr = photoCount >= 1000 ? '✓ Yeterli kapasite' : '⚠ Sınırlı fotoğraf sayısı';

        document.getElementById('hc-sd-result-label').innerText = 'Toplam Fotoğraf Sayısı:';
        document.getElementById('hc-sd-result-val').innerText = resultStr;
    }

    document.getElementById('hc-sd-usable-space-val').innerText = usableStr;
    document.getElementById('hc-sd-recommendation-val').innerText = recommendationStr;

    document.getElementById('hc-sd-kart-kapasite-cekim-suresi-hesaplama-result').classList.add('visible');
}
