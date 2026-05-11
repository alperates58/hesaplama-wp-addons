function hcDcCableHesapla() {
    const volt = parseFloat(document.getElementById('hc-dcc-volt').value);
    const L = parseFloat(document.getElementById('hc-dcc-l').value);
    const I = parseFloat(document.getElementById('hc-dcc-i').value);
    const dvPercent = parseFloat(document.getElementById('hc-dcc-dv').value) / 100;
    const rhoCu = 0.0175; // Ohm.mm2/m

    if ([volt, L, I, dvPercent].some(isNaN) || volt <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const maxDv = volt * dvPercent;
    // S = (2 * L * I * rho) / deltaV
    const S = (2 * L * I * rhoCu) / maxDv;

    document.getElementById('hc-dcc-res-s').innerText = S.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' mm²';
    document.getElementById('hc-dcc-res-dv-val').innerText = 'Maksimum Gerilim Düşümü: ' + maxDv.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' V';
    
    document.getElementById('hc-dcc-result').classList.add('visible');
}
