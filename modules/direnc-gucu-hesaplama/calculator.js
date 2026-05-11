function hcResistorPowerHesapla() {
    const V = parseFloat(document.getElementById('hc-rg-v').value);
    const I = parseFloat(document.getElementById('hc-rg-i').value);
    const R = parseFloat(document.getElementById('hc-rg-r').value);

    let P = 0;
    let count = 0;
    if (!isNaN(V)) count++;
    if (!isNaN(I)) count++;
    if (!isNaN(R)) count++;

    if (count < 2) {
        alert('Lütfen en az iki değeri doldurun.');
        return;
    }

    if (!isNaN(V) && !isNaN(I)) {
        P = V * I;
    } else if (!isNaN(I) && !isNaN(R)) {
        P = Math.pow(I, 2) * R;
    } else if (!isNaN(V) && !isNaN(R)) {
        if (R === 0) { alert('Direnç 0 olamaz.'); return; }
        P = Math.pow(V, 2) / R;
    }

    document.getElementById('hc-rg-res-w').innerText = P.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' Watt';
    document.getElementById('hc-rg-res-mw').innerText = (P * 1000).toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' mW';
    
    document.getElementById('hc-rg-result').classList.add('visible');
}
