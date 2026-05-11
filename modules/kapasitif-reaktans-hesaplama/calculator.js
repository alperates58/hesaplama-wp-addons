function hcCapReactHesapla() {
    const f = parseFloat(document.getElementById('hc-xc-f').value);
    const cVal = parseFloat(document.getElementById('hc-xc-c').value);
    const unit = parseFloat(document.getElementById('hc-xc-unit').value);

    if (isNaN(f) || isNaN(cVal) || f <= 0 || cVal <= 0) {
        alert('Lütfen geçerli frekans ve kapasite değerleri girin.');
        return;
    }

    const cF = cVal * unit; // Convert to Farad

    // XC = 1 / (2 * PI * f * C)
    const xc = 1 / (2 * Math.PI * f * cF);

    document.getElementById('hc-xc-res-val').innerText = xc.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Ω';
    
    document.getElementById('hc-xc-result').classList.add('visible');
}
