function hcAcilDurumHesapla() {
    const expense = parseFloat(document.getElementById('hc-ef-expense').value) || 0;
    const months = parseInt(document.getElementById('hc-ef-months').value);

    const total = expense * months;

    document.getElementById('hc-ef-res-val').innerText = total.toLocaleString('tr-TR') + ' ₺';

    document.getElementById('hc-efund-result').classList.add('visible');
}
