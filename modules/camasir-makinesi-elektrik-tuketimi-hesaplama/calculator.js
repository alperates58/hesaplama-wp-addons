function hcCamasirMakinesiHesapla() {
    const cycle = parseFloat(document.getElementById('hc-wm-cycle').value);
    const freq = parseFloat(document.getElementById('hc-wm-freq').value);
    const price = parseFloat(document.getElementById('hc-wm-price').value);

    if (isNaN(cycle) || isNaN(freq) || isNaN(price)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    const monthlyKwh = cycle * freq * 4.33;
    const monthlyCost = monthlyKwh * price;

    document.getElementById('hc-res-wm-usage').innerText = monthlyKwh.toLocaleString('tr-TR', { maximumFractionDigits: 2 }) + ' kWh';
    document.getElementById('hc-res-wm-cost').innerText = monthlyCost.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + ' ₺';

    document.getElementById('hc-wm-result').classList.add('visible');
}
