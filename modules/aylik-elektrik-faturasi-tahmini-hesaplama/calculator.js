function hcFaturaTahminiHesapla() {
    const daily = parseFloat(document.getElementById('hc-be-daily').value);
    const price = parseFloat(document.getElementById('hc-be-price').value);

    if (isNaN(daily) || isNaN(price)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const monthlyUsage = daily * 30;
    const totalBill = monthlyUsage * price;

    document.getElementById('hc-res-be-usage').innerText = monthlyUsage.toLocaleString('tr-TR', { maximumFractionDigits: 1 }) + ' kWh';
    document.getElementById('hc-res-be-total').innerText = totalBill.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-be-result').classList.add('visible');
}
