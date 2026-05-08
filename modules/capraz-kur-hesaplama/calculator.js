function hcCrossRateHesapla() {
    const rate1 = parseFloat(document.getElementById('hc-cr-rate1').value) || 0;
    const rate2 = parseFloat(document.getElementById('hc-cr-rate2').value) || 0;

    if (rate2 === 0) {
        alert('İkinci kur sıfır olamaz.');
        return;
    }

    const cross = rate1 / rate2;

    document.getElementById('hc-cr-res-val').innerText = cross.toLocaleString('tr-TR', { minimumFractionDigits: 4, maximumFractionDigits: 6 });

    document.getElementById('hc-cross-rate-result').classList.add('visible');
}
