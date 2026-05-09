function hcPriceMeterHesapla() {
    const total = parseFloat(document.getElementById('hc-m-total').value) || 0;
    const len = parseFloat(document.getElementById('hc-m-len').value) || 0;

    if (len <= 0) return;

    const price = total / len;

    document.getElementById('hc-res-m-price').innerText = price.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    document.getElementById('hc-price-meter-result').classList.add('visible');
}
