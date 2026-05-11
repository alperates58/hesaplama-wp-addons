function hcVentCalcHesapla() {
    const v = parseFloat(document.getElementById('hc-vc-v').value);
    const nSel = document.getElementById('hc-vc-n').value;
    let n = parseFloat(nSel);
    
    if (nSel === 'custom') {
        n = parseFloat(document.getElementById('hc-vc-n-custom').value);
    }

    if (isNaN(v) || isNaN(n) || v <= 0 || n <= 0) {
        alert('Lütfen geçerli oda hacmi ve değişim katsayısı girin.');
        return;
    }

    // Q = V * n
    const q = v * n;

    document.getElementById('hc-vc-res-val').innerText = Math.round(q).toLocaleString('tr-TR') + ' m³/h';
    
    document.getElementById('hc-vc-result').classList.add('visible');
}
