function hcKurumlarVergisiHesapla() {
    const profit = parseFloat(document.getElementById('hc-kv-profit').value) || 0;
    const rate = parseFloat(document.getElementById('hc-kv-type').value) / 100;

    const totalTax = profit * rate;

    document.getElementById('hc-kv-res-rate').innerText = '%' + (rate * 100);
    document.getElementById('hc-kv-res-total').innerText = totalTax.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kurumlar-vergi-result').classList.add('visible');
}
