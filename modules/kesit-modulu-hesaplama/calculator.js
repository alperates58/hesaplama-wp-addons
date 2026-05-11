function hcSectionModulusHesapla() {
    const b = parseFloat(document.getElementById('hc-sm-b').value);
    const h = parseFloat(document.getElementById('hc-sm-h').value);

    if (isNaN(b) || isNaN(h) || b <= 0 || h <= 0) {
        alert('Lütfen geçerli genişlik ve yükseklik değerleri girin.');
        return;
    }

    // S = (b * h^2) / 6
    const sMm3 = (b * Math.pow(h, 2)) / 6;
    const sCm3 = sMm3 / 1000;

    document.getElementById('hc-sm-res-val').innerText = Math.round(sMm3).toLocaleString('tr-TR') + ' mm³';
    document.getElementById('hc-sm-res-cm3').innerText = sCm3.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' cm³';
    
    document.getElementById('hc-sm-result').classList.add('visible');
}
