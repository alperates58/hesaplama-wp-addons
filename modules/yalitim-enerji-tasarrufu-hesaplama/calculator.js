function hcYalitimHesapla() {
    const currentBill = parseFloat(document.getElementById('hc-it-bill').value);
    const savingPercent = parseFloat(document.getElementById('hc-it-type').value);

    if (isNaN(currentBill)) {
        alert('Lütfen mevcut fatura tutarını girin.');
        return;
    }

    const monthlySaving = currentBill * (savingPercent / 100);
    const newBill = currentBill - monthlySaving;

    document.getElementById('hc-res-it-monthly').innerText = monthlySaving.toLocaleString('tr-TR', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + ' ₺';
    document.getElementById('hc-res-it-new').innerText = newBill.toLocaleString('tr-TR', { minimumFractionDigits: 0, maximumFractionDigits: 0 }) + ' ₺';

    document.getElementById('hc-it-result').classList.add('visible');
}
