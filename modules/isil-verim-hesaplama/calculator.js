function hcThermalEffHesapla() {
    const qin = parseFloat(document.getElementById('hc-tv-qin').value);
    const qout = parseFloat(document.getElementById('hc-tv-qout').value);

    if (isNaN(qin) || isNaN(qout) || qin <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    if (qout >= qin) {
        alert('Atılan ısı, giren ısıdan büyük veya eşit olamaz.');
        return;
    }

    // eta = 1 - (qout / qin)
    const eff = (1 - (qout / qin)) * 100;

    document.getElementById('hc-tv-res-val').innerText = '%' + eff.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    
    document.getElementById('hc-tv-result').classList.add('visible');
}
