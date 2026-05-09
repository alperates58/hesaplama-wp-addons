function hcKoşuTempoHesapla() {
    const dist = parseFloat(document.getElementById('hc-rp-dist').value);
    const h = parseInt(document.getElementById('hc-rp-h').value) || 0;
    const m = parseInt(document.getElementById('hc-rp-m').value) || 0;
    const s = parseInt(document.getElementById('hc-rp-s').value) || 0;

    const totalSeconds = (h * 3600) + (m * 60) + s;

    if (isNaN(dist) || totalSeconds <= 0) {
        alert('Lütfen geçerli mesafe ve süre girin.');
        return;
    }

    const secondsPerKm = totalSeconds / dist;
    const pM = Math.floor(secondsPerKm / 60);
    const pS = Math.round(secondsPerKm % 60);

    const speedKmh = dist / (totalSeconds / 3600);

    document.getElementById('hc-rp-value').innerText = pM + ":" + (pS < 10 ? "0" + pS : pS) + " dk/km";
    document.getElementById('hc-rp-speed').innerText = speedKmh.toFixed(2).toLocaleString('tr-TR') + " km/sa";

    document.getElementById('hc-run-pace-result').classList.add('visible');
}
