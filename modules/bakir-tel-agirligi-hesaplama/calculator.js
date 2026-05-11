function hcBakirTelHesapla() {
    const capMm = parseFloat(document.getElementById('hc-bt-cap').value);
    const uzunluk = parseFloat(document.getElementById('hc-bt-uzunluk').value);
    const rhoCu = 8960; // kg/m3

    if (isNaN(capMm) || isNaN(uzunluk)) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const capMetre = capMm / 1000;
    const kesitAlani = (Math.PI * Math.pow(capMetre, 2)) / 4;
    const hacim = kesitAlani * uzunluk; // m3
    const agirlikKg = hacim * rhoCu;

    document.getElementById('hc-bt-res-kg').innerText = agirlikKg.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg';
    document.getElementById('hc-bt-res-g').innerText = (agirlikKg * 1000).toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' g';
    
    document.getElementById('hc-bt-result').classList.add('visible');
}
