function hcMuhtasarVergiHesapla() {
    const rent = parseFloat(document.getElementById('hc-mv-rent').value) || 0;
    const sm = parseFloat(document.getElementById('hc-mv-sm').value) || 0;
    const salaryTax = parseFloat(document.getElementById('hc-mv-salary').value) || 0;

    const rentTax = rent * 0.20;
    const smTax = sm * 0.20;
    const total = rentTax + smTax + salaryTax;

    document.getElementById('hc-mv-res-rent').innerText = rentTax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-mv-res-sm').innerText = smTax.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-mv-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-muhtasar-result').classList.add('visible');
}
