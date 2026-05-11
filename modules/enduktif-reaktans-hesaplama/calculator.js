function hcIndReactHesapla() {
    const f = parseFloat(document.getElementById('hc-xl-f').value);
    const lVal = parseFloat(document.getElementById('hc-xl-l').value);
    const unit = parseFloat(document.getElementById('hc-xl-unit').value);

    if (isNaN(f) || isNaN(lVal) || f < 0 || lVal < 0) {
        alert('Lütfen geçerli frekans ve endüktans değerleri girin.');
        return;
    }

    const lH = lVal * unit; // Convert to Henry

    // XL = 2 * PI * f * L
    const xl = 2 * Math.PI * f * lH;

    document.getElementById('hc-xl-res-val').innerText = xl.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' Ω';
    
    document.getElementById('hc-xl-result').classList.add('visible');
}
