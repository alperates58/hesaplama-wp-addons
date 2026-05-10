function hcFireRateHesapla() {
    const total = parseFloat(document.getElementById('hc-fr-total').value);
    const waste = parseFloat(document.getElementById('hc-fr-waste').value);

    if (!total || isNaN(waste)) {
        alert('Lütfen geçerli miktarlar giriniz.');
        return;
    }

    const rate = waste / total;

    document.getElementById('hc-fr-res-val').innerText = rate.toLocaleString('tr-TR', { minimumFractionDigits: 4, maximumFractionDigits: 4 });
    document.getElementById('hc-fire-rate-result').classList.add('visible');
}
