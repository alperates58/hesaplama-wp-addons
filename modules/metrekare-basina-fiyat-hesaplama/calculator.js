function hcPriceM2Hesapla() {
    const total = parseFloat(document.getElementById('hc-m2-total').value) || 0;
    const area = parseFloat(document.getElementById('hc-m2-area').value) || 0;

    if (area <= 0) return;

    const price = total / area;

    document.getElementById('hc-res-m2-price').innerText = price.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    document.getElementById('hc-price-m2-result').classList.add('visible');
}
