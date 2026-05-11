function hcKdvTevkifatHesapla() {
    const amount = parseFloat(document.getElementById('hc-kt-amount').value);
    const kdvRate = parseFloat(document.getElementById('hc-kt-kdv').value) / 100;
    const tevkifatRate = parseFloat(document.getElementById('hc-kt-rate').value);

    if (isNaN(amount) || amount <= 0) {
        alert('Lütfen geçerli bir matrah tutarı girin.');
        return;
    }

    const kdv = amount * kdvRate;
    const tevkifat = kdv * tevkifatRate;
    const payableKdv = kdv - tevkifat;
    const total = amount + payableKdv;

    document.getElementById('hc-kt-res-kdv').innerText = kdv.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kt-res-tevkifat').innerText = tevkifat.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kt-res-payable').innerText = payableKdv.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-kt-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-kt-result').classList.add('visible');
}
