function hcCimTohumuHesapla() {
    const area = parseFloat(document.getElementById('hc-grass-area').value);
    const rate = parseFloat(document.getElementById('hc-grass-rate').value);

    if (isNaN(area) || isNaN(rate) || area <= 0 || rate <= 0) {
        alert('Lütfen geçerli pozitif değerler giriniz.');
        return;
    }

    const totalWeightKg = (area * rate) / 1000;

    document.getElementById('hc-grass-val').innerText = totalWeightKg.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    document.getElementById('hc-grass-note').innerText = `${area} m² alan için ${rate} g/m² ekim sıklığına göre hesaplanmıştır.`;
    document.getElementById('hc-grass-result').classList.add('visible');
}
