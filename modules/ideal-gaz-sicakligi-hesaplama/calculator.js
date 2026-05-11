function hcIdealTHesapla() {
    const p = parseFloat(document.getElementById('hc-it-p').value);
    const v = parseFloat(document.getElementById('hc-it-v').value);
    const n = parseFloat(document.getElementById('hc-it-n').value);

    if (isNaN(p) || isNaN(v) || isNaN(n) || n <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const R = 0.083144; // L·bar/(K·mol)

    // T = PV / nR
    const TK = (p * v) / (n * R);
    const TC = TK - 273.15;

    document.getElementById('hc-it-res-val').innerText = TC.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' °C';
    document.getElementById('hc-it-res-k').innerText = TK.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' Kelvin (K)';
    
    document.getElementById('hc-it-result').classList.add('visible');
}
