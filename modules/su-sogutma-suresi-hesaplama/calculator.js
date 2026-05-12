function hcSuSogumaSuresiHesapla() {
    const t0 = parseFloat(document.getElementById('hc-wc-start').value);
    const target = parseFloat(document.getElementById('hc-wc-target').value);
    const env = parseFloat(document.getElementById('hc-wc-env').value);

    if (t0 <= target) {
        alert('Hedef sıcaklık mevcut sıcaklıktan düşük olmalıdır.');
        return;
    }

    if (target <= env) {
        alert('Hedef sıcaklık ortam sıcaklığından yüksek olmalıdır.');
        return;
    }

    // k katsayısı (Newton'un Soğuma Kanunu için yaklaşık değerler)
    let k = 0.02; 
    if (env === 0) k = 0.15; // Buzlu su (hızlı ısı transferi)
    if (env === -18) k = 0.04; // Dondurucu (soğuk hava sirkülasyonu)

    const minutes = -Math.log((target - env) / (t0 - env)) / k;

    const resultDiv = document.getElementById('hc-water-cool-result');
    document.getElementById('hc-wc-res-val').innerText = Math.round(minutes) + ' Dakika';
    
    resultDiv.classList.add('visible');
}
