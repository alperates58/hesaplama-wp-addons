function hcVadeliCekHesapla() {
    const amount = parseFloat(document.getElementById('hc-vc-amount').value) || 0;
    const days = parseInt(document.getElementById('hc-vc-days').value) || 0;
    const rate = parseFloat(document.getElementById('hc-vc-rate').value) || 0;

    // Formula: Discount = (Amount * Rate * Days) / 36000
    const discount = (amount * rate * days) / 36000;
    const presentValue = amount - discount;

    document.getElementById('hc-vc-res-discount').innerText = discount.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';
    document.getElementById('hc-vc-res-total').innerText = presentValue.toLocaleString('tr-TR', { minimumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-vadeli-cek-result').classList.add('visible');
}
