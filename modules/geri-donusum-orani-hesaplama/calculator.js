function hcRecyclingRateHesapla() {
    const recycled = parseFloat(document.getElementById('hc-gr-recycled').value);
    const disposed = parseFloat(document.getElementById('hc-gr-disposed').value);

    if (isNaN(recycled) || isNaN(disposed) || (recycled + disposed) === 0) {
        alert('Lütfen geçerli atık miktarları girin.');
        return;
    }

    const total = recycled + disposed;
    const rate = (recycled / total) * 100;

    document.getElementById('hc-gr-res-val').innerText = '%' + rate.toLocaleString('tr-TR', { maximumFractionDigits: 2 });
    document.getElementById('hc-gr-res-desc').innerText = 'Toplam Atık: ' + total.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kg';
    
    document.getElementById('hc-gr-result').classList.add('visible');
}
