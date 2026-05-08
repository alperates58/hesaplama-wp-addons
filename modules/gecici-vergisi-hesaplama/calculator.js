function hcGeciciVergiHesapla() {
    const profit = parseFloat(document.getElementById('hc-gv-profit').value) || 0;
    const rate = parseFloat(document.getElementById('hc-gv-rate').value) / 100;

    const total = profit * rate;

    document.getElementById('hc-gv-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-gecici-result').classList.add('visible');
}
