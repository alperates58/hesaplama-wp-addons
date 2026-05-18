function hcKmSaHızHesapla() {
    const distVal = parseFloat(document.getElementById('hc-kms-dist').value);
    const distUnit = document.getElementById('hc-kms-dist-unit').value;
    
    const hrs = parseFloat(document.getElementById('hc-kms-hr').value) || 0;
    const mins = parseFloat(document.getElementById('hc-kms-min').value) || 0;
    const secs = parseFloat(document.getElementById('hc-kms-sec').value) || 0;

    if (!distVal || distVal <= 0) {
        alert('Lütfen geçerli bir mesafe değeri giriniz.');
        return;
    }

    const totalSeconds = (hrs * 3600) + (mins * 60) + secs;
    if (totalSeconds <= 0) {
        alert('Lütfen geçerli bir zaman süresi giriniz.');
        return;
    }

    // Mesafeyi metre cinsine çevirelim
    let distM = distVal;
    if (distUnit === 'km') {
        distM = distVal * 1000;
    }

    // Hız m/s
    const speedMs = distM / totalSeconds;
    
    // Hız km/sa
    const speedKmh = speedMs * 3.6;

    // 100m koşu süresi
    const time100m = speedMs > 0 ? (100 / speedMs) : 0;

    document.getElementById('hc-kms-val').innerText = speedKmh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' km/sa';
    document.getElementById('hc-kms-ms-val').innerText = speedMs.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m/s';
    
    if (time100m > 0 && time100m < 1000) {
        document.getElementById('hc-kms-100m-val').innerText = time100m.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' saniye';
    } else {
        document.getElementById('hc-kms-100m-val').innerText = '-';
    }

    document.getElementById('hc-km-sa-hiz-result').classList.add('visible');
}
