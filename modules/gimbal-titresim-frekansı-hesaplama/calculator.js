function hcGimbalTitresimFrekansıHesapla() {
    var moment = parseFloat(document.getElementById('hc-gimbal-moment').value);
    var damping = parseFloat(document.getElementById('hc-gimbal-damping').value);
    var source = document.getElementById('hc-gimbal-source').value;

    if (isNaN(moment) || isNaN(damping) || moment <= 0 || damping <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    // Sünüm kaynağına göre spring constant tahmini
    var sourceFreqs = { drone: 35, vehicle: 20, handheld: 5, structural: 50 };
    var sourceFreq = sourceFreqs[source] || 20;

    // K = ω² × m (natural frequency'den spring constant)
    var omega = sourceFreq * 2 * Math.PI;
    var k = Math.pow(omega, 2) * moment;

    // Doğal frekans = sqrt(k/m) / (2π)
    var naturalFreq = Math.sqrt(k / moment) / (2 * Math.PI);

    // Kritik damping = 2 × sqrt(k × m)
    var criticalDamping = 2 * Math.sqrt(k * moment);

    // Sönümleme oranı = c / c_critical
    var dampingRatio = damping / criticalDamping;

    // Sönümlü frekans = naturalFreq × sqrt(1 - dampingRatio²)
    var dampedFreq = naturalFreq * Math.sqrt(Math.max(0, 1 - Math.pow(dampingRatio, 2)));

    // Rezonans frekansı (peak) = naturalFreq × sqrt(1 - 2ζ²) (ζ < 1/√2 için)
    var resonanceFreq = naturalFreq * Math.sqrt(Math.max(0, 1 - 2 * Math.pow(dampingRatio, 2)));

    var recommendation = '';
    if (dampingRatio < 0.3) {
        recommendation = '⚠ Yetersiz sönümleme, titreşim hissedilir';
    } else if (dampingRatio < 1.0) {
        recommendation = '✓ İyi sönümleme oranı';
    } else {
        recommendation = 'Aşırı sönümleme (tepki yavaş)';
    }

    var naturalFreqStr = naturalFreq.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' Hz';
    var dampingRatioStr = dampingRatio.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    var resonanceStr = resonanceFreq.toLocaleString('tr-TR', { minimumFractionDigits: 1, maximumFractionDigits: 1 }) + ' Hz';

    document.getElementById('hc-gimbal-natural-freq-val').innerText = naturalFreqStr;
    document.getElementById('hc-gimbal-damping-ratio-val').innerText = dampingRatioStr;
    document.getElementById('hc-gimbal-resonance-val').innerText = resonanceStr;
    document.getElementById('hc-gimbal-recommendation-val').innerText = recommendation;

    document.getElementById('hc-gimbal-titresim-frekansı-hesaplama-result').classList.add('visible');
}
