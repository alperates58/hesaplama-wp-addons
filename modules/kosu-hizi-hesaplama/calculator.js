function hcKoşuHızıHesapla() {
    const dist = parseFloat(document.getElementById('hc-rs-dist').value);
    const h = parseInt(document.getElementById('hc-rs-h').value) || 0;
    const m = parseInt(document.getElementById('hc-rs-m').value) || 0;
    const s = parseInt(document.getElementById('hc-rs-s').value) || 0;

    const totalSeconds = (h * 3600) + (m * 60) + s;

    if (isNaN(dist) || totalSeconds <= 0) {
        alert('Lütfen geçerli mesafe ve süre girin.');
        return;
    }

    const speedKmh = dist / (totalSeconds / 3600);
    const secondsPerKm = totalSeconds / dist;
    const pM = Math.floor(secondsPerKm / 60);
    const pS = Math.round(secondsPerKm % 60);

    document.getElementById('hc-rs-value').innerText = speedKmh.toFixed(2).toLocaleString('tr-TR') + " km/sa";
    document.getElementById('hc-rs-pace').innerText = pM + ":" + (pS < 10 ? "0" + pS : pS) + " dk/km";

    document.getElementById('hc-run-speed-result').classList.add('visible');
}
