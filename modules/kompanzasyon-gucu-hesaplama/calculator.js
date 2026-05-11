function hcCompHesapla() {
    const p = parseFloat(document.getElementById('hc-kg-p').value);
    const cos1 = parseFloat(document.getElementById('hc-kg-cos1').value);
    const cos2 = parseFloat(document.getElementById('hc-kg-cos2').value);

    if (isNaN(p) || isNaN(cos1) || isNaN(cos2) || cos1 <= 0 || cos2 <= 0 || cos1 > 1 || cos2 > 1) {
        alert('Lütfen geçerli değerler girin (cos φ değerleri 0 ile 1 arasında olmalıdır).');
        return;
    }

    // tan(phi) = sqrt(1 - cos^2) / cos
    const tan1 = Math.sqrt(1 - Math.pow(cos1, 2)) / cos1;
    const tan2 = Math.sqrt(1 - Math.pow(cos2, 2)) / cos2;

    // Qc = P * (tan1 - tan2)
    const qc = p * (tan1 - tan2);

    document.getElementById('hc-kg-res-val').innerText = (qc > 0 ? qc.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) : "0") + ' kVAr';
    
    document.getElementById('hc-kg-result').classList.add('visible');
}
