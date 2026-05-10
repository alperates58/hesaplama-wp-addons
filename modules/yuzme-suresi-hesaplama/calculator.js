function hcSwimTimeHesapla() {
    const pool = parseInt(document.getElementById('hc-st-pool').value);
    const laps = parseInt(document.getElementById('hc-st-laps').value);
    const min = parseInt(document.getElementById('hc-st-min').value || 0);
    const sec = parseInt(document.getElementById('hc-st-sec').value || 0);

    if (!laps || (!min && !sec)) {
        alert('Lütfen tur sayısı ve süre bilgilerini giriniz.');
        return;
    }

    const totalDist = laps * pool;
    const totalSeconds = laps * ((min * 60) + sec);

    const tMin = Math.floor(totalSeconds / 60);
    const tSec = Math.round(totalSeconds % 60);

    document.getElementById('hc-st-res-dist').innerText = totalDist.toLocaleString('tr-TR');
    document.getElementById('hc-st-res-time').innerText = `${tMin}:${tSec < 10 ? '0' + tSec : tSec}`;

    document.getElementById('hc-swim-time-result').classList.add('visible');
}
