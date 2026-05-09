function hcGCAAHesapla() {
    const w1 = parseFloat(document.getElementById('hc-gcaa-w1').value);
    const w2 = parseFloat(document.getElementById('hc-gcaa-w2').value);
    const days = parseFloat(document.getElementById('hc-gcaa-days').value);

    if (isNaN(w1) || isNaN(w2) || isNaN(days) || days <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const dailyGain = (w2 - w1) / days;

    document.getElementById('hc-gcaa-val').innerText = dailyGain.toLocaleString('tr-TR', { maximumFractionDigits: 3 }) + ' kg/gün';
    document.getElementById('hc-gcaa-note').innerText = `Toplam artış: ${(w2 - w1).toLocaleString('tr-TR')} kg.`;
    document.getElementById('hc-gcaa-result').classList.add('visible');
}
