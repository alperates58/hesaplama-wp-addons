function hcBBDHesapla() {
    const area = parseFloat(document.getElementById('hc-bbd-area').value);
    const volumePerBlock = parseFloat(document.getElementById('hc-bbd-size').value);
    const fillPercent = parseFloat(document.getElementById('hc-bbd-fill').value) || 100;

    if (isNaN(area) || area <= 0) {
        alert('Lütfen geçerli bir alan giriniz.');
        return;
    }

    // Standard 20x40 block faces have 12.5 blocks per m2
    const totalBlocks = area * 12.5;
    const totalVolume = totalBlocks * volumePerBlock * (fillPercent / 100);

    document.getElementById('hc-bbd-val').innerText = totalVolume.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' m³';
    document.getElementById('hc-bbd-result').classList.add('visible');
}
