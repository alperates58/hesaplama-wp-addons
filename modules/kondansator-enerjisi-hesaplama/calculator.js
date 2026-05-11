function hcCapEnergyHesapla() {
    const cVal = parseFloat(document.getElementById('hc-ce-c').value);
    const unit = parseFloat(document.getElementById('hc-ce-unit').value);
    const v = parseFloat(document.getElementById('hc-ce-v').value);

    if (isNaN(cVal) || isNaN(v) || cVal <= 0 || v < 0) {
        alert('Lütfen geçerli kapasite ve gerilim değerleri girin.');
        return;
    }

    const cF = cVal * unit;

    // E = 0.5 * C * V^2
    const energy = 0.5 * cF * Math.pow(v, 2);

    document.getElementById('hc-ce-res-val').innerText = energy.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' Joule';
    
    document.getElementById('hc-ce-result').classList.add('visible');
}
