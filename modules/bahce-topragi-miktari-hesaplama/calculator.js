function hcBahceTopragiHesapla() {
    const area = parseFloat(document.getElementById('hc-bt-area').value);
    const depth = parseFloat(document.getElementById('hc-bt-depth').value);
    const density = parseFloat(document.getElementById('hc-bt-density').value) || 1.3;

    if (isNaN(area) || isNaN(depth) || area <= 0 || depth <= 0) {
        alert('Lütfen geçerli alan ve derinlik değerleri giriniz.');
        return;
    }

    const volumeM3 = area * (depth / 100);
    const weightTon = volumeM3 * density;

    document.getElementById('hc-bt-vol').innerText = volumeM3.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m³';
    document.getElementById('hc-bt-weight').innerText = weightTon.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' ton';
    
    document.getElementById('hc-bt-note').innerText = `Hesaplama ${density} ton/m³ yoğunluk üzerinden yapılmıştır. Toprak tipine göre ağırlık değişebilir.`;
    document.getElementById('hc-bt-result').classList.add('visible');
}
