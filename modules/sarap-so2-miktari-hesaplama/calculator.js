function hcWineSO2Hesapla() {
    const volume = parseFloat(document.getElementById('hc-ws-vol').value);
    const ppm = parseFloat(document.getElementById('hc-ws-target').value);
    const strength = parseFloat(document.getElementById('hc-ws-source').value);

    if (!volume || !ppm) return;

    // Formül: (Litre * PPM) / (10 * Yüzde)
    const result = (volume * ppm) / (10 * strength);

    const resultDiv = document.getElementById('hc-wine-so2-result');
    const unit = strength === 57 ? " g" : " ml";
    document.getElementById('hc-ws-res-val').innerText = result.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + unit;
    
    resultDiv.classList.add('visible');
}
