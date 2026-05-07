function hcMolariteHesapla() {
    const n = parseFloat(document.getElementById('hc-molar-n').value);
    const vMl = parseFloat(document.getElementById('hc-molar-v').value);

    if (isNaN(n) || isNaN(vMl) || n <= 0 || vMl <= 0) {
        alert('Lütfen geçerli mol ve hacim değerleri giriniz.');
        return;
    }

    // mL -> L
    const vL = vMl / 1000;

    // M = n / V
    const molarity = n / vL;

    document.getElementById('hc-res-molar-val').innerText = molarity.toLocaleString('tr-TR', { 
        minimumFractionDigits: 2, 
        maximumFractionDigits: 4 
    });

    document.getElementById('hc-molarity-result').classList.add('visible');
    document.getElementById('hc-molarity-result').scrollIntoView({ behavior: 'smooth', block: 'nearest' });
}
