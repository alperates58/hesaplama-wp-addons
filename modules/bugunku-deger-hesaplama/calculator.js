function hcBugunkuDegerHesapla() {
    const fv = parseFloat(document.getElementById('hc-pv-fv').value);
    const rate = parseFloat(document.getElementById('hc-pv-rate').value) / 100;
    const years = parseFloat(document.getElementById('hc-pv-years').value);

    if (isNaN(fv) || isNaN(rate) || isNaN(years)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const pv = fv / Math.pow(1 + rate, years);
    const discount = fv - pv;

    document.getElementById('hc-pv-res-total').innerText = pv.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-pv-res-discount').innerText = discount.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-pv-result').classList.add('visible');
}
