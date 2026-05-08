function hcYemekHesapla() {
    const daily = parseFloat(document.getElementById('hc-ye-daily').value) || 0;
    const days = parseFloat(document.getElementById('hc-ye-days').value) || 0;

    const total = daily * days;

    document.getElementById('hc-ye-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-yemek-result').classList.add('visible');
}
