function hcDamgaVergisiHesapla() {
    const amount = parseFloat(document.getElementById('hc-dv-amount').value) || 0;
    const rate = parseFloat(document.getElementById('hc-dv-type').value);

    const total = amount * rate;

    document.getElementById('hc-dv-res-rate').innerText = '%' + (rate * 100).toLocaleString('tr-TR', { maximumFractionDigits: 3 });
    document.getElementById('hc-dv-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-damga-result').classList.add('visible');
}
