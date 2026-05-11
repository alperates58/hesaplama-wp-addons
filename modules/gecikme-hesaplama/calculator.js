function hcGecikmeHesapla() {
    const dist = parseFloat(document.getElementById('hc-ge-dist').value);
    const speed = parseFloat(document.getElementById('hc-ge-speed').value);
    const extra = parseFloat(document.getElementById('hc-ge-extra').value) || 0;

    if (isNaN(dist) || isNaN(speed) || speed <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Yayılma Gecikmesi (sn) = Mesafe / Hız
    const propDelayMs = (dist / speed) * 1000;
    const totalDelayMs = propDelayMs + extra;
    const rttMs = totalDelayMs * 2;

    document.getElementById('hc-ge-res-ms').innerText = totalDelayMs.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' ms';
    document.getElementById('hc-ge-res-rtt').innerText = 'RTT (Gidiş-Dönüş): ' + rttMs.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' ms';
    
    document.getElementById('hc-ge-result').classList.add('visible');
}
