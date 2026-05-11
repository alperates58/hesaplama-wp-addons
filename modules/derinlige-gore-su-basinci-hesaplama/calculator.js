function hcSuBasinciHesapla() {
    const h = parseFloat(document.getElementById('hc-sb-h').value);
    const rho = parseFloat(document.getElementById('hc-sb-rho').value);
    const g = 9.80665;

    if (isNaN(h) || isNaN(rho)) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // P = rho * g * h
    const pPa = rho * g * h;
    const pBar = pPa / 100000;
    const pPsi = pPa / 6894.76;

    document.getElementById('hc-sb-res-pa').innerText = Math.round(pPa).toLocaleString('tr-TR') + ' Pa';
    document.getElementById('hc-sb-res-bar').innerText = pBar.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' bar';
    document.getElementById('hc-sb-res-psi').innerText = pPsi.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' PSI';
    
    document.getElementById('hc-sb-result').classList.add('visible');
}
