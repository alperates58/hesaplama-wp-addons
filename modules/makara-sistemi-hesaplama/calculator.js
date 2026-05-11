function hcMakaraHesapla() {
    const g = parseFloat(document.getElementById('hc-ms-weight').value);
    const n = parseInt(document.getElementById('hc-ms-ropes').value);

    if (isNaN(g) || isNaN(n) || n <= 0) {
        alert('Lütfen geçerli yük ve halat sayısı girin.');
        return;
    }

    // F = G / n
    const f = g / n;
    const ma = n; // Ideal case ignoring friction

    document.getElementById('hc-ms-res-force').innerText = f.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-ms-res-ma').innerText = ma.toLocaleString('tr-TR');

    document.getElementById('hc-ms-result').classList.add('visible');
}
