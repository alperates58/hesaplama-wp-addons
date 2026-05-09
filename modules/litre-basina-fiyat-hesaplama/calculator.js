function hcPriceLiterHesapla() {
    const total = parseFloat(document.getElementById('hc-lp-total').value) || 0;
    const vol = parseFloat(document.getElementById('hc-lp-vol').value) || 0;

    if (vol <= 0) return;

    const price = total / vol;

    document.getElementById('hc-res-lp-price').innerText = price.toLocaleString('tr-TR', {style: 'currency', currency: 'TRY'});
    document.getElementById('hc-price-liter-result').classList.add('visible');
}
