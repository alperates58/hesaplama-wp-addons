function hcSarkaçFrekansıHesapla() {
    const lCm = parseFloat(document.getElementById('hc-pf-length').value);
    const g = parseFloat(document.getElementById('hc-pf-planet').value);

    if (isNaN(lCm) || lCm <= 0) {
        alert('Lütfen geçerli ve pozitif bir ip uzunluğu giriniz.');
        return;
    }

    const L = lCm / 100; // cm -> m

    // omega = sqrt(g / L)
    const omega = Math.sqrt(g / L);

    // f = omega / (2 * pi)
    const f = omega / (2 * Math.PI);

    // T = 1 / f
    const T = 1 / f;

    document.getElementById('hc-pf-val').innerText = f.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Hz (Hertz)';
    document.getElementById('hc-pf-angular-val').innerText = omega.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' rad/s';
    document.getElementById('hc-pf-period-val').innerText = T.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' saniye';

    document.getElementById('hc-sarkac-frekansi-result').classList.add('visible');
}
