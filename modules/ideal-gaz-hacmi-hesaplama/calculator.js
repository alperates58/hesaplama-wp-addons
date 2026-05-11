function hcIdealVHesapla() {
    const n = parseFloat(document.getElementById('hc-iv-n').value);
    const p = parseFloat(document.getElementById('hc-iv-p').value);
    const tc = parseFloat(document.getElementById('hc-iv-t').value);

    if (isNaN(n) || isNaN(p) || isNaN(tc) || p <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const TK = tc + 273.15;
    const R = 0.083144; // L·bar/(K·mol)

    // V = nRT / P
    const vLitre = (n * R * TK) / p;
    const vM3 = vLitre / 1000;

    document.getElementById('hc-iv-res-val').innerText = vLitre.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Litre';
    document.getElementById('hc-iv-res-m3').innerText = vM3.toLocaleString('tr-TR', { maximumFractionDigits: 6 }) + ' m³';
    
    document.getElementById('hc-iv-result').classList.add('visible');
}
