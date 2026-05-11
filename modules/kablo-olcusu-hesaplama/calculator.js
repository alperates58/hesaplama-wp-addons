function hcAwgHesapla() {
    const awg = parseFloat(document.getElementById('hc-awg-val').value);

    if (isNaN(awg)) {
        alert('Lütfen bir AWG değeri girin.');
        return;
    }

    // Diameter d_n = 0.127 * 92 ^ ((36 - n) / 39)
    const diameter = 0.127 * Math.pow(92, (36 - awg) / 39);
    
    // Area A = (PI/4) * d^2
    const area = (Math.PI / 4) * Math.pow(diameter, 2);

    document.getElementById('hc-awg-res-dia').innerText = diameter.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' mm';
    document.getElementById('hc-awg-res-area').innerText = area.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' mm²';
    
    document.getElementById('hc-awg-result').classList.add('visible');
}
