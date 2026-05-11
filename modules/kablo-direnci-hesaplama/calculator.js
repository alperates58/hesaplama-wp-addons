function hcCableResHesapla() {
    const l = parseFloat(document.getElementById('hc-cr-len').value);
    const a = parseFloat(document.getElementById('hc-cr-area').value);
    const rho = parseFloat(document.getElementById('hc-cr-rho').value);

    if (isNaN(l) || isNaN(a) || isNaN(rho) || a <= 0 || l < 0) {
        alert('Lütfen geçerli uzunluk ve kesit değerleri girin.');
        return;
    }

    // R = rho * (L / A)
    const r = rho * (l / a);

    document.getElementById('hc-cr-res-val').innerText = r.toLocaleString('tr-TR', { maximumFractionDigits: 5 }) + ' Ω';
    
    document.getElementById('hc-cr-result').classList.add('visible');
}
