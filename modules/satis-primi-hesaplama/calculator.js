function hcSatisPrimHesapla() {
    const sales = parseFloat(document.getElementById('hc-sp-sales').value) || 0;
    const rate = parseFloat(document.getElementById('hc-sp-rate').value) || 0;
    const quota = parseFloat(document.getElementById('hc-sp-quota').value) || 0;

    const diff = Math.max(0, sales - quota);
    const total = (diff * rate) / 100;

    document.getElementById('hc-sp-res-diff').innerText = diff.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-sp-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-satis-prim-result').classList.add('visible');
}
