function hcHydroPressHesapla() {
    const rho = parseFloat(document.getElementById('hc-hsp-rho').value);
    const h = parseFloat(document.getElementById('hc-hsp-h').value);
    const g = 9.80665;

    if (isNaN(rho) || isNaN(h) || rho <= 0 || h < 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // P = rho * g * h
    const pPa = rho * g * h;
    const pBar = pPa / 100000;

    document.getElementById('hc-hsp-res-val').innerText = Math.round(pPa).toLocaleString('tr-TR') + ' Pascal (Pa)';
    document.getElementById('hc-hsp-res-bar').innerText = pBar.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' Bar';
    
    document.getElementById('hc-hsp-result').classList.add('visible');
}
