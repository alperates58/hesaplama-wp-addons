function hcCimHesapla() {
    const vol = parseFloat(document.getElementById('hc-cim-vol').value);
    const cementPerM3 = parseFloat(document.getElementById('hc-cim-ratio').value);

    if (isNaN(vol) || vol <= 0) {
        alert('Lütfen geçerli bir hacim giriniz.');
        return;
    }

    const totalCementKg = vol * cementPerM3;
    const bags = Math.ceil(totalCementKg / 50);
    
    // Ratios (approximate)
    // Sand is usually 0.4 - 0.5 m3 per m3 of concrete
    // Gravel is usually 0.8 - 0.9 m3 per m3 of concrete
    const sandVol = vol * 0.45;
    const gravelVol = vol * 0.85;

    document.getElementById('hc-cim-bags').innerText = bags.toLocaleString('tr-TR') + ' Torba';
    document.getElementById('hc-cim-sand').innerText = sandVol.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m³';
    document.getElementById('hc-cim-gravel').innerText = gravelVol.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' m³';
    
    document.getElementById('hc-cim-result').classList.add('visible');
}
