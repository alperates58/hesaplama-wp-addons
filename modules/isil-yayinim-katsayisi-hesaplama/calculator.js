function hcThermalDiffHesapla() {
    const k = parseFloat(document.getElementById('hc-td-k').value);
    const rho = parseFloat(document.getElementById('hc-td-rho').value);
    const cp = parseFloat(document.getElementById('hc-td-cp').value);

    if (isNaN(k) || isNaN(rho) || isNaN(cp) || rho <= 0 || cp <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // alpha = k / (rho * cp)
    const alpha = k / (rho * cp);

    document.getElementById('hc-td-res-val').innerText = alpha.toExponential(4) + ' m²/s';
    
    document.getElementById('hc-td-result').classList.add('visible');
}
