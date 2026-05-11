function hcBrinellHesapla() {
    const F = parseFloat(document.getElementById('hc-bri-f').value);
    const D = parseFloat(document.getElementById('hc-bri-D').value);
    const d = parseFloat(document.getElementById('hc-bri-d').value);

    if (isNaN(F) || isNaN(D) || isNaN(d) || D <= d) {
        alert('Lütfen geçerli değerler girin (Bilye çapı iz çapından büyük olmalıdır).');
        return;
    }

    // HBW = (2 * F) / (pi * D * (D - sqrt(D^2 - d^2)))
    const denominator = Math.PI * D * (D - Math.sqrt(Math.pow(D, 2) - Math.pow(d, 2)));
    const HBW = (2 * F) / denominator;

    document.getElementById('hc-bri-res-hbw').innerText = HBW.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' HBW';
    
    document.getElementById('hc-bri-result').classList.add('visible');
}
