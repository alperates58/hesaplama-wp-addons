function hcWalkPaceHesapla() {
    const dist = parseFloat(document.getElementById('hc-wp-dist').value);
    const min = parseInt(document.getElementById('hc-wp-min').value || 0);
    const sec = parseInt(document.getElementById('hc-wp-sec').value || 0);

    if (!dist || (!min && !sec)) {
        alert('Lütfen mesafe ve süre bilgilerini giriniz.');
        return;
    }

    const totalMinutes = min + (sec / 60);
    const totalHours = totalMinutes / 60;

    // Speed
    const speed = dist / totalHours;
    // Pace
    const paceDec = totalMinutes / dist;
    const pMin = Math.floor(paceDec);
    const pSec = Math.round((paceDec - pMin) * 60);

    document.getElementById('hc-wp-res-speed').innerText = speed.toFixed(1).toLocaleString('tr-TR');
    document.getElementById('hc-wp-res-pace').innerText = `${pMin}:${pSec < 10 ? '0' + pSec : pSec}`;

    document.getElementById('hc-walk-pace-result').classList.add('visible');
}
