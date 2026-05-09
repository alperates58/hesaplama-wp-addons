function hcFirinTuketimHesapla() {
    const usage = parseFloat(document.getElementById('hc-op-usage').value);
    const freq = parseFloat(document.getElementById('hc-op-freq').value);
    const price = parseFloat(document.getElementById('hc-op-price').value);

    if (isNaN(usage) || isNaN(freq) || isNaN(price)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const monthlyKwh = usage * freq * 4.33;
    const monthlyCost = monthlyKwh * price;

    document.getElementById('hc-res-op-kwh').innerText = monthlyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kWh';
    document.getElementById('hc-res-op-cost').innerText = monthlyCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-op-result').classList.add('visible');
}
