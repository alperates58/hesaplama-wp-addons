function hcSarkaçPeriyoduHesapla() {
    const lCm = parseFloat(document.getElementById('hc-pp-length').value);
    const angleDeg = parseFloat(document.getElementById('hc-pp-angle').value);
    const g = parseFloat(document.getElementById('hc-pp-planet').value);

    if (isNaN(lCm) || lCm <= 0 || isNaN(angleDeg) || angleDeg < 0 || angleDeg >= 90) {
        alert('Lütfen geçerli ve pozitif bir ip uzunluğu ile 0-90° arası salınım açısı giriniz.');
        return;
    }

    const L = lCm / 100; // cm -> m

    // T0 = 2 * pi * sqrt(L / g)
    const t0 = 2 * Math.PI * Math.sqrt(L / g);

    // Borda's correction for larger angles
    // T ≈ T0 * (1 + (1/16)*theta0^2) where theta0 is in radians
    const theta0 = angleDeg * (Math.PI / 180);
    const T = t0 * (1 + (1 / 16) * Math.pow(theta0, 2));

    const f = 1 / T;

    document.getElementById('hc-pp-val').innerText = T.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' saniye';
    document.getElementById('hc-pp-theo-val').innerText = t0.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' saniye';
    document.getElementById('hc-pp-freq-val').innerText = f.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Hz (Hertz)';

    document.getElementById('hc-sarkac-periyodu-result').classList.add('visible');
}
