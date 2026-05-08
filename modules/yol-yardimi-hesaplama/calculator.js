function hcYolHesapla() {
    const daily = parseFloat(document.getElementById('hc-yo-daily').value) || 0;
    const days = parseFloat(document.getElementById('hc-yo-days').value) || 0;

    const total = daily * days;

    document.getElementById('hc-yo-res-total').innerText = total.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-yol-result').classList.add('visible');
}
