function hcOkHizHesapla() {
    const ibo = parseFloat(document.getElementById('hc-arrow-ibo').value);
    const weight = parseFloat(document.getElementById('hc-arrow-weight').value);
    const length = parseFloat(document.getElementById('hc-arrow-length').value);
    const grains = parseFloat(document.getElementById('hc-arrow-grains').value);
    const stringExtra = parseFloat(document.getElementById('hc-arrow-string').value);

    if (isNaN(ibo) || isNaN(weight) || isNaN(length) || isNaN(grains)) {
        alert('Lütfen tüm değerleri giriniz.');
        return;
    }

    // Tahmini hız hesaplama (Common standard adjustments)
    let fps = ibo;

    // 1. Çekiş Mesafesi Etkisi: 30 inch standardına göre her inch için +/- 10 fps
    fps += (length - 30) * 10;

    // 2. Çekiş Ağırlığı Etkisi: 70 lbs standardına göre her lb için +/- 2 fps
    fps += (weight - 70) * 2;

    // 3. Ok Ağırlığı Etkisi: Her 3 grain fazlalık için -1 fps (Standard: 5 grain/lb)
    const standardGrains = weight * 5;
    fps -= (grains - standardGrains) / 3;

    // 4. Kiriş Ağırlığı Etkisi: Kiriş üzerindeki her 3 grain için -1 fps
    fps -= (stringExtra / 3);

    const resultFps = Math.round(fps);
    const resultMps = resultFps * 0.3048; // FPS to m/s

    document.getElementById('hc-res-arrow-fps').innerText = resultFps;
    document.getElementById('hc-res-arrow-mps').innerText = resultMps.toFixed(1);

    document.getElementById('hc-arrow-result').classList.add('visible');
    document.getElementById('hc-arrow-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
