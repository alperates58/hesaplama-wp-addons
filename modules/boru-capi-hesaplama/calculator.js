function hcBoruCapiHesapla() {
    const debiSaat = parseFloat(document.getElementById('hc-bc-debi').value); // m3/h
    const hiz = parseFloat(document.getElementById('hc-bc-hiz').value); // m/s

    if (isNaN(debiSaat) || isNaN(hiz) || hiz <= 0) {
        alert('Lütfen geçerli değerler girin (Hız 0\'dan büyük olmalıdır).');
        return;
    }

    // m3/saat -> m3/s
    const debiSaniye = debiSaat / 3600;

    // D = sqrt(4Q / (pi * v))
    const capMetre = Math.sqrt((4 * debiSaniye) / (Math.PI * hiz));
    const capMm = capMetre * 1000;

    document.getElementById('hc-bc-res-mm').innerText = capMm.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' mm';
    document.getElementById('hc-bc-res-m').innerText = capMetre.toLocaleString('tr-TR', { maximumFractionDigits: 4 }) + ' m';
    
    document.getElementById('hc-bc-result').classList.add('visible');
}
