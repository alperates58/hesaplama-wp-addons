function hcCMALHesapla() {
    const len = parseFloat(document.getElementById('hc-cmal-len').value);
    const spacing = parseFloat(document.getElementById('hc-cmal-spacing').value);
    const postPrice = parseFloat(document.getElementById('hc-cmal-post-price').value) || 0;
    const panelPrice = parseFloat(document.getElementById('hc-cmal-panel-price').value) || 0;
    const labor = parseFloat(document.getElementById('hc-cmal-labor').value) || 0;

    if (isNaN(len) || len <= 0 || isNaN(spacing) || spacing <= 0) {
        alert('Lütfen geçerli uzunluk ve aralık değerleri giriniz.');
        return;
    }

    const postCount = Math.ceil(len / spacing) + 1;
    const totalMaterial = (postCount * postPrice) + (len * panelPrice);
    const totalLabor = len * labor;
    const total = totalMaterial + totalLabor;

    document.getElementById('hc-cmal-val').innerText = total.toLocaleString('tr-TR', { maximumFractionDigits: 0 }) + ' ₺';
    document.getElementById('hc-cmal-result').classList.add('visible');
}
