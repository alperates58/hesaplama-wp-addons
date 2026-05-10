function hcRunPaceHesapla() {
    const dist = parseFloat(document.getElementById('hc-rp-dist').value);
    const hr = parseInt(document.getElementById('hc-rp-hr').value || 0);
    const min = parseInt(document.getElementById('hc-rp-min').value || 0);
    const sec = parseInt(document.getElementById('hc-rp-sec').value || 0);

    if (!dist || (!hr && !min && !sec)) {
        alert('Lütfen mesafe ve süre bilgilerini giriniz.');
        return;
    }

    const totalSeconds = (hr * 3600) + (min * 60) + sec;
    const totalMinutes = totalSeconds / 60;
    
    // Pace (dk/km)
    const paceDecimal = totalMinutes / dist;
    const paceMin = Math.floor(paceDecimal);
    const paceSec = Math.round((paceDecimal - paceMin) * 60);

    // Speed (km/s)
    const speed = dist / (totalSeconds / 3600);

    document.getElementById('hc-rp-res-pace').innerText = `${paceMin}:${paceSec < 10 ? '0' + paceSec : paceSec}`;
    document.getElementById('hc-rp-res-speed').innerText = speed.toFixed(2).toLocaleString('tr-TR');

    document.getElementById('hc-run-pace-result').classList.add('visible');
}
