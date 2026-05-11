function hcIdealPHesapla() {
    const n = parseFloat(document.getElementById('hc-ip-n').value);
    const v = parseFloat(document.getElementById('hc-ip-v').value);
    const tc = parseFloat(document.getElementById('hc-ip-t').value);

    if (isNaN(n) || isNaN(v) || isNaN(tc) || v <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const TK = tc + 273.15;
    const R = 0.083144; // L·bar/(K·mol)

    // P = nRT / V
    const pBar = (n * R * TK) / v;
    const pPa = pBar * 100000;

    document.getElementById('hc-ip-res-val').innerText = pBar.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' bar';
    document.getElementById('hc-ip-res-pa').innerText = Math.round(pPa).toLocaleString('tr-TR') + ' Pascal (Pa)';
    
    document.getElementById('hc-ip-result').classList.add('visible');
}
