function hcBulkModulusHesapla() {
    const v0 = parseFloat(document.getElementById('hc-bm-v0').value);
    const dp = parseFloat(document.getElementById('hc-bm-dp').value);
    const dv = parseFloat(document.getElementById('hc-bm-dv').value);

    if (isNaN(v0) || isNaN(dp) || isNaN(dv) || v0 <= 0 || dv === 0) {
        alert('Lütfen geçerli değerler girin. Hacim değişimi sıfır olamaz.');
        return;
    }

    // K = -V0 * (dp / dv)
    // Note: dv is usually negative for compression, so K is positive.
    // We'll treat the input dv as absolute decrease for simplicity.
    const kMpa = v0 * (dp / Math.abs(dv));
    const kGpa = kMpa / 1000;

    document.getElementById('hc-bm-res-val').innerText = kGpa.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' GPa';
    
    document.getElementById('hc-bm-result').classList.add('visible');
}
