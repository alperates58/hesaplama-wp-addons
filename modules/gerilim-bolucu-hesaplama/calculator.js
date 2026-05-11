function hcVDividerHesapla() {
    const vin = parseFloat(document.getElementById('hc-vd-vin').value);
    const r1 = parseFloat(document.getElementById('hc-vd-r1').value);
    const r2 = parseFloat(document.getElementById('hc-vd-r2').value);

    if (isNaN(vin) || isNaN(r1) || isNaN(r2) || (r1 + r2) === 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    // Vout = Vin * (R2 / (R1 + R2))
    const vout = vin * (r2 / (r1 + r2));
    const currentMa = (vin / (r1 + r2)) * 1000;

    document.getElementById('hc-vd-res-val').innerText = vout.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' V';
    document.getElementById('hc-vd-res-current').innerText = 'Hattaki Akım: ' + currentMa.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' mA';
    
    document.getElementById('hc-vd-result').classList.add('visible');
}
